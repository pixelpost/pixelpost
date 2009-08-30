<?PHP
/*
Requires Pixelpost version 1.8 or newer
Defensio FRONT-side ADDON-Version 1.4

Written by: Schonhose
@:			schonhose@pixelpost.org
WWW:		http://foto.schonhose.nl/

Pixelpost www: http://www.pixelpost.org/

License: http://www.gnu.org/copyleft/gpl.html

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

//*******************************************************************************************************************
//   GENERAL INFORMATION DISPLAYED IN ADDON LIST
//*******************************************************************************************************************
$addon_name = "Pixelpost Defensio comment filter (Front Side)";
$addon_version = '1.4';
$result = mysql_query("SELECT `status` FROM `{$pixelpost_db_prefix}addons` WHERE `addon_name` LIKE '%akismet%' and `type`='front'") or die(mysql_error());
$akismet = mysql_fetch_array($result);
if ($akismet['status'] == 'on')
{
    $akismet_warning = "<br /><br /><font color=\"red\"><strong>Defensio is not designed to work with Akismet. It is suggested to disable Akismet if you want to use Defensio.</strong></font>";
} else
{
    $akismet_warning = null;
}
$addon_description = "<a name='defensio'></a>Pixelpost Add-On to filter spam using Defensio (<a href='http://www.defensio.com' target='_blank'>Info</a>). This is the front side of the addon, it checks the comments and marks them in the database." . $akismet_warning . "<br /><br /><img src=\"../addons/_defensio/images/poweredbyd.png\">";

//*******************************************************************************************************************
//   WORKSPACE STUFF
//*******************************************************************************************************************
add_front_functions('check_defensio_comment', 'comment_accepted');

//*******************************************************************************************************************
//   MAIN FUNCTION CALL
//*******************************************************************************************************************
function check_defensio_comment()
{
    global $pixelpost_db_prefix, $cfgrow, $parent_id, $message, $ip, $name, $url, $email;
    $defensio_conf = sql_array("SELECT * FROM {$pixelpost_db_prefix}defensio");
    // the following code tries to get the full addon path.
    $filename = basename(__file__, ".php");
    $query = "SELECT `addon_name` FROM `{$pixelpost_db_prefix}addons` WHERE `addon_name` LIKE '%" . $filename . "%'";
    $result = mysql_query($query) or die(mysql_error());
    while ($row = mysql_fetch_array($result))
    {
        $addon_path = $row[0];
    }
    $pos = strpos($addon_path, "/");
    if ($pos === false)
    {
        $addon_path = null;
    } else
    {
        $addon_path = substr($addon_path, 0, $pos);
    }
    $defensio_conf['addon_path'] = "addons/" . $addon_path;
    // build $comment array used for testing.
    $comment = array();
    $comment['owner-url'] = $defensio_conf['blog'];
    $comment['user-ip'] = $ip;
    $comment['comment_post_ID'] = $parent_id;
    $comment['permalink'] = $defensio_conf['blog'] . "index.php?showimage=" . $parent_id;
    $comment['comment-type'] = 'comment';
    $comment['comment-author'] = $name;
    $comment['comment-content'] = $message;
    $comment['comment-author-email'] = $email;
    $comment['comment-author-url'] = $url;
    $comment['referrer'] = $_SERVER['HTTP_REFERER'];
    //$comment['trusted-user'] = 'true';
    // get the date/time of the original posting
    $query = "SELECT `datetime` FROM `{$pixelpost_db_prefix}pixelpost` WHERE `id` = '" . $parent_id . "'";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result)==1){
    	// check comment
		while ($row = mysql_fetch_array($result))
    	{
   	    	$comment['article-date'] = gmdate("Y/m/d", $row[0]);
    	}
    	defensio_check_comment_front($defensio_conf, $comment);
    } else {
		// trying to comment on a non-existent blog post
		header("HTTP/1.0 404 Not Found");
		header("Status: 404 File Not Found!");
    	echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><HTML><HEAD>\n<TITLE>404 Not Found</TITLE>\n</HEAD><BODY>\n<H1>Not Found</H1>\nThe comment could not be accepted because the blogpost doesn't exists.<P>\n<P>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.\n</BODY></HTML>";
    	exit;
	}
}

//*******************************************************************************************************************
//   SUPPORTING FUNCTIONS
//*******************************************************************************************************************
// These functions are taken from the Defensio wordpress addon and modified to work with Pixelpost.
// Do not copy the orignal functions as they have Wordpress specific code embedded!!!
function defensio_post_front($action, $defensio_conf, $args = null)
{
    // Use snoopy to post
    if (file_exists($defensio_conf['addon_path'] . '/libraries/Snoopy.class.php')) {
   		require_once ($defensio_conf['addon_path'] . '/libraries/Snoopy.class.php');
	} else {
   		require_once ($defensio_conf['addon_path'] . '/libraries/snoopy.class.php');
	} 
    $snoopy = new Snoopy();
    $snoopy->read_timeout = $defensio_conf['post_timeout'];
    // Supress the possible fsock warning
    @$snoopy->submit(defensio_url_for_front($action, $defensio_conf, $defensio_conf['key']), $args, array());
    // Defensio will return 200 nomally, 401 on authentication failure, anything else is unexpected behaivour
    if ($snoopy->status == 200 or $snoopy->status == 401)
        return $snoopy->results;
    else
        return false;
}

// Returns the URL for possible actions
function defensio_url_for_front($action, $defensio_conf, $key = null)
{
    if ($key == null)
        return null;
    else
    {
        if ($action == 'audit-comment')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];
    }
}

function defensio_check_comment_front($defensio_conf, $comment)
{
    global $pixelpost_db_prefix, $cfgrow;
    define('DF_SUCCESS', 'success');
    define('DF_FAIL', 'fail');
    require_once ($defensio_conf['addon_path'] . '/libraries/spyc.php');
    if ($r = defensio_post_front('audit-comment', $defensio_conf, $comment))
    {
        $ar = Spyc::YAMLLoad($r);
        if (isset($ar['defensio-result']))
        {
            if ($ar['defensio-result']['status'] == DF_SUCCESS)
            {
                // Set metadata about the comment
                // Mark it as SPAM
                $query = "UPDATE {$pixelpost_db_prefix}comments SET `spaminess` = '" . $ar['defensio-result']['spaminess'] . "', `signature` = '" . $ar['defensio-result']['signature'] . "' WHERE id = last_insert_id()";
                mysql_query($query);
                if ($ar['defensio-result']['spam'])
                {
                	$cfgrow['commentemail'] = 'no';
                    // in this case defensio thinks it is spam
                    $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn' WHERE id = last_insert_id()";
                    mysql_query($query);
                    $query = "SELECT defensio_addon FROM {$pixelpost_db_prefix}spamlog LIMIT 1";
                    if (mysql_query($query))
                    {
                        $query = "UPDATE `{$pixelpost_db_prefix}spamlog` SET `defensio_addon`=`defensio_addon`+1";
                        $result = mysql_query($query) or die(mysql_error());
                    }
                } else
                {
                    //Apply wp preferences in case approved value has been changed to spam by another plug-in
                    // check here what another plugin has done
                }
            } else
            {
                // Succesful http request, but Defensio failed.
                //Put comment in moderation queue.
                $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn',`spaminess` = '-1' WHERE id = last_insert_id()";
                mysql_query($query);
            }
        }
    } else
    {
        // Unsuccesful POST to the server. Defensio might be down.
        // Put comment in moderation queue.
        $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn',`spaminess` = '-1' WHERE id = last_insert_id()";
        mysql_query($query);
    }
}
?>