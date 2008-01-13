<?PHP
//error_reporting(E_ALL ^ E_NOTICE);
$addon_name = "Pixelpost Akismet comment filter (Front Side)";
$addon_version = '1.3';
$addon_description = 'Checking the Comments with Akismet';

add_front_functions('check_akismet_comment','comment_accepted');


function check_akismet_comment() {
	global $cfgrow, $name, $email, $url, $message, $parent_id, $pixelpost_db_prefix;
	// query for testing if the function is performed anyway
		 $params = array('comment_type' => 'comment', 'comment_author' => $name, 'comment_author_email' => $email, 'comment_author_url' => $url, 'comment_content' => $message);
	   if ('true' == pp_auto_check_comment($params)) {
	      $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'spm' WHERE id = last_insert_id()";
      	mysql_query($query);
		 		$cfgrow['commentemail'] = 'no';
		    	eval_addon_front_workspace('comment_blocked_askimet');
		 		$extra_message = '<b>Your comment is marked as SPAM by Akismet Spam Checker and now in moderation queue until the Administrator has reviewed it.</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	    }
        else eval_addon_front_workspace('comment_passed_askimet'); 

	    $akismet_comment_checked = true;
}

function pp_auto_check_comment( $comment ) {
  global $cfgrow, $pixelpost_db_prefix;
  
  $kkey = $cfgrow['akismet_key'];
  $pp_api_host = $kkey.'.rest.akismet.com';
	$pp_api_port = 80;

  $comment['user_ip']    = $_SERVER['REMOTE_ADDR'];
  $comment['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
  $comment['referrer']   = $_SERVER['HTTP_REFERER'];
  $comment['blog']       = $cfgrow['siteurl'];

  $ignore = array( 'HTTP_COOKIE' );

  foreach ( $_SERVER as $key => $value )
    if ( !in_array( $key, $ignore ) )
      $comment["$key"] = $value;

  $query_string = '';
  foreach ( $comment as $key => $data )
    $query_string .= $key . '=' . urlencode( stripslashes($data) ) . '&';
  $response = ppf_http_post($query_string, $pp_api_host, '/1.1/comment-check', $pp_api_port);
     mysql_query($query);
  return $response[1];
}

function ppf_http_post($request, $host, $path, $port = 80) {
  global $pixelpost_db_prefix;
  $pp_user_agent = "Pixelpost/".Get_Pixelpost_Version($pixelpost_db_prefix )." | Akismet/1.12";

  $http_request  = "POST $path HTTP/1.0\r\n";
  $http_request .= "Host: $host\r\n";
  $http_request .= "Content-Type: application/x-www-form-urlencoded; charset=utf-8\r\n";
  $http_request .= "Content-Length: " . strlen($request) . "\r\n";
  $http_request .= "User-Agent: {$pp_user_agent}\r\n";
  $http_request .= "\r\n";
  $http_request .= $request;

  $response = '';

  if( false !== ( $fs = fsockopen($host, $port, $errno, $errstr, 30) ) ) {
    fwrite($fs, $http_request);

    while ( !feof($fs) )
      $response .= fgets($fs, 1160); // One TCP-IP packet
    fclose($fs);
    $response = explode("\r\n\r\n", $response, 2);
  }
  return $response;
}
?>