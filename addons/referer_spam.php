<?php

// SVN file version:
// $Id$

// Admin page
if( isset( $_GET['view']) && $_GET['view']=='addons')
{
$addon_name = "Pixelpost Anti-Spam";
$addon_version = "1.0";

// Check to see if the ban table exists, if not, create it
$query = "SELECT id FROM {$pixelpost_db_prefix}ban LIMIT 1";
if( !mysql_query( $query))
{
  $query = "CREATE TABLE {$pixelpost_db_prefix}ban (
	  id INT(11) NOT NULL auto_increment,
	  banlist MEDIUMTEXT NOT NULL default '',
	  PRIMARY KEY  (id)
	)";
  mysql_query( $query);
  $query = "INSERT INTO {$pixelpost_db_prefix}ban VALUES ( NULL, 'tramadol\n-online\nadipex\nadvicer\nambien\nbllogspot\ncarisoprodol\ncasino\ncasinos\nbaccarrat\ncialis\ncwas\ncyclen\ncyclobenzaprine\nday-trading\ndiscreetordering\ndutyfree\nduty-free\nfioricet\nfreenet-shopping\nincest\nlevitra\nmacinstruct\nmeridia\nonline-gambling\npaxil\nphentermine\nplatinum-celebs\npoker-chip\npoze\nprescription\nsoma\nslot-machine\ntaboo\nteen\ntramadol\ntrim-spa\nultram\nviagra\nxanax\nbooker\nzolus\nchatroom\npoker\ncasino\ntexas\nholdem')";
  mysql_query( $query);
}

// Update the ban list if the form is called
if( isset( $_POST['antispamupdate']) && isset( $_POST['banlist']))
{
  $banlist = str_replace( "\r\n", "\n", $_POST['banlist']);
  $banlist = str_replace( "\r", "\n", $banlist);
  if(version_compare(phpversion(),"4.3.0")=="-1")	$banlist = mysql_escape_string($banlist);
  else	$banlist = mysql_real_escape_string($banlist);

  $query = "UPDATE {$pixelpost_db_prefix}ban SET banlist='$banlist' LIMIT 1";
  mysql_query($query) or die( mysql_error());
}

// Get the ban list
$where = '';
$query = "SELECT banlist FROM {$pixelpost_db_prefix}ban LIMIT 1";
$result = mysql_query($query) or die( mysql_error());
if( $row = mysql_fetch_row($result))
{
  $banlist = $row[0];
  $banlistarray = explode( "\n", $banlist);
  foreach( $banlistarray as $banword)
  {
    $banword = trim($banword);
    if( $banword == '') continue;
    $where .= " referer LIKE '%{$banword}%' OR";
  }
}
else
{
  $banlist = '';
  $where .= ' 0 OR';
}

if( isset( $_POST['antispamclean']))
{
// Delete evil referers
  $query = "DELETE FROM {$pixelpost_db_prefix}visitors WHERE $where 0";
  //echo $query;
  mysql_query($query) or die( mysql_error());
  $deleted_rows = mysql_affected_rows();
  $deleted_rows_str = "<font color='red'><b>$deleted_rows</b> referers were deleted from the visitors table</font><br /><br />";
}

$addon_description = "Creates a list of url's that are not allowed as entries in the referer table.
  Add lists of banned words to the textbox below, one word per line.  Any referer with that word
  in the url will be deleted from the visitors table.  Be careful with short words like sex which
  could form part of a valid url.<br /><br />

  <form method='post' action='index.php?view=addons'>
  <input type='hidden' name='antispamclean' value='1' />
  <input type='submit' value='Clean Referers' />
  </form>

  $deleted_rows_str

  <b>Banned words</b><br />
  <form method='post' action='index.php?view=addons'>
  <input type='hidden' name='antispamupdate' value='1' />
  <textarea name='banlist' style='width:300px;height:100px;' rows=\"\" cols=\"\">$banlist</textarea><br />
  <input type='submit' value='Update Banlist' />
  </form>";
}
?>