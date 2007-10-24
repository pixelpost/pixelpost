<?php

// SVN file version:
// $Id$

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"]) {
	die ("Try another day!!");
}

// view=comments
if($_GET['view'] == "comments") {
 // delete a comment
    if($_GET['action'] == "delete") {
	    $delid = $_GET['delid'];
	    $query = sql_query("DELETE FROM ".$pixelpost_db_prefix."comments WHERE id='$delid'");
	    echo "<div class='jcaption'>$admin_lang_cmnt_deleted </div>";
	    }
 // edit a comment
 		if($_GET['action'] == "edit") {
 			$editid = $_GET['editid'];
 			$message = $_POST['message'.$editid];
 			// added by schonhose to escape characters
 			$message = nl2br(clean_comment($message));
 			$query = "update ".$pixelpost_db_prefix."comments set message='$message' where id='$editid'";
 			$query  = sql_query($query);
 			echo "<div class='jcaption'>$admin_lang_cmnt_edited </div>";
		}

	 // Mass delete comments
 		if($_GET['action'] == "massdelete") {
 		$idz= $_POST['moderate_commnts_boxes'];

 		$query = "DELETE FROM ".$pixelpost_db_prefix."comments ";
 		$where = "WHERE";
 		for ($i=0; $i < count($idz)-1; $i++)
 		{	$where .= " id = '$idz[$i]' or ";	}
 		$lastid = $idz[count($idz)-1];
 		$where .= " id = '$lastid'  ";
 		$query .= $where;
 		$query  = sql_query($query);
 		$c = count($idz);
 		echo "<div class='jcaption confirm'>$admin_lang_cmnt_delete1  $c $admin_lang_cmnt_delete2</div>";

 		}

	 // Mass SPAM-delete comments
		if($_GET['action'] == "spamdelete" && isset($_POST['moderate_commnts_boxes'])) {
		$idz= $_POST['moderate_commnts_boxes'];

		foreach ($idz as $id){
			$where[] = "id='$id'";
		}
		$where = implode(" OR ",$where);
			$query = "SELECT DISTINCT ip FROM ".$pixelpost_db_prefix."comments WHERE $where";
			// echo $query;
			$query = mysql_query($query);
		$row = mysql_fetch_row($query);

		// update the blaklist	ips
		$blacklist = get_blacklist();
		if (count($blacklist)>2 && $blacklist[count($blacklist)-1]!="n" && $blacklist[count($blacklist)-2]!= "\\");
			$blacklist .= "\n";
		foreach ($row as $bad_ip){
			$blacklist .="$bad_ip\n";
			}

		$banlist = str_replace( "\r\n", "\n", $blacklist);
		$banlist = str_replace( "\r", "\n", $banlist);
		$banlist = str_replace( "\n\n", "\n", $banlist);
		if(version_compare(phpversion(),"4.3.0")=="-1") {
			 $banlist = mysql_escape_string($banlist);
		 } else {
			 $banlist = mysql_real_escape_string($banlist);
		 }// end if
		$query = "UPDATE {$pixelpost_db_prefix}banlist SET blacklist='$banlist' LIMIT 1";
		mysql_query($query) ;
		if ( mysql_error())
			$result .= "$admin_lang_cmnt_error_blacklist".mysql_error()."<br/>";

		// update relist ips
		$ref_banlist = get_ref_ban_list();
		if (count($ref_banlist)>2 && $blacklist(count($ref_banlist)-1)!="n" && $blacklist(count($ref_banlist)-2)!= "\\");
			$ref_banlist .= "\n";
		foreach ($row as $bad_ip){
			$ref_banlist .="$bad_ip\n";
		}
		$banlist = str_replace( "\r\n", "\n", $ref_banlist);
		$banlist = str_replace( "\r", "\n", $banlist);
		if(version_compare(phpversion(),"4.3.0")=="-1") {
			 $banlist = mysql_escape_string($banlist);
		 } else {
			 $banlist = mysql_real_escape_string($banlist);
		 }// end if
		$query = "UPDATE {$pixelpost_db_prefix}banlist SET ref_ban_list='$banlist' LIMIT 1";
		mysql_query($query) ;
		if ( mysql_error())
			$result .= "$admin_lang_cmnt_error_banlist".mysql_error()."<br/>";


		$query = "DELETE FROM ".$pixelpost_db_prefix."comments ";
		$where = "WHERE";
		for ($i=0; $i < count($idz)-1; $i++)
		{	$where .= " id = '$idz[$i]' or ";	}
		$lastid = $idz[count($idz)-1];
		$where .= " id = '$lastid'  ";
		$query .= $where;
		$query  = sql_query($query);
		$c = count($idz);
		echo "<div class='jcaption'>$admin_lang_cmnt_delete1  $c $admin_lang_cmnt_delete2</div>";

 		}

	 // Mass publish comments
			if($_GET['action'] == "masspublish") {
			$idz= $_POST['moderate_commnts_boxes'];

			$query = "update ".$pixelpost_db_prefix."comments set publish='yes' ";
			$where = "WHERE";
			for ($i=0; $i < count($idz)-1; $i++)
			{	$where .= " id = '$idz[$i]' or ";	}
			$lastid = $idz[count($idz)-1];
			$where .= " id = '$lastid'  ";
			$query .= $where;
			$query  = sql_query($query);
			$c = count($idz);
			echo "<div class='jcaption confirm'>$admin_lang_cmnt_published  $c $admin_lang_cmnt_unpublished_cmnts</div>";
		}

	 // Mass publish comments
			if($_GET['action'] == "massunpublish") {
			$idz= $_POST['moderate_commnts_boxes'];

			$query = "update ".$pixelpost_db_prefix."comments set publish='no' ";
			$where = "WHERE";
			for ($i=0; $i < count($idz)-1; $i++)
			{	$where .= " id = '$idz[$i]' or ";	}
			$lastid = $idz[count($idz)-1];
			$where .= " id = '$lastid'  ";
			$query .= $where;
			$query  = sql_query($query);
			$c = count($idz);
			echo "<div class='jcaption confirm'>$admin_lang_cmnt_unpublished  $c $admin_lang_cmnt_published_cmnts</div>";
	}

 echo "<div id='caption'>$admin_lang_$admin_lang_comments</div>";
 
 // list of comments
    if($_GET['id'] == "") {
         $pagec = 0;
        if($_GET['page'] == "") { $page = "0"; } else { $page = $_GET['page']; }
// added for showing correct page number for masked comments				
				// default setting
				$moderate_where = " and publish='yes' ";
				$moderate_where2 = " WHERE publish='yes' ";	
				if ($_GET['show']=='masked') {   
				 	$moderate_where = " and publish='no' ";
				 	$moderate_where2 = " WHERE publish='no' ";
				}
				if ($_GET['show']=='published') {
					$moderate_where = " and publish='yes' ";	
					$moderate_where2 = " WHERE publish='yes' ";	
				}
				$order_by = " ORDER BY id DESC ";
				// the $moderate_where and $order_by statements can now be overridden by using an addon and the following workspace:
				// new workspace added! For correct page number with other buttons
				eval_addon_admin_workspace_menu('pages_commentbuttons');
				
				// count comments!
				$commentnumb = sql_array("select count(*) as count from ".$pixelpost_db_prefix."comments".$moderate_where2);
				$pixelpost_commentnumb = $commentnumb['count'];
				// get the number of comments in moderation
 				$commentnumb_moderation = sql_array("select count(*) as count from ".$pixelpost_db_prefix."comments  WHERE publish='no' ");

				// display submenu
				echo "<div id='submenu'>";
				$submenucssclass = 'notselected';
				if (!isset($_GET['show']) || $_GET['show']=='published')	$submenucssclass = 'selectedsubmenu';
				if (isset($_GET['commentsview'])) $submenucssclass = 'notselected';
				echo "<a href='index.php?view=comments&show=published' class='".$submenucssclass."'>".$admin_lang_cmnt_submenu1."</a>\n";
				$submenucssclass = 'notselected';
				echo "|";
				if (isset($_GET['show']) && $_GET['show']=='masked')	$submenucssclass = 'selectedsubmenu';
				echo "<a href='index.php?view=comments&show=masked' class='".$submenucssclass."'>".$admin_lang_cmnt_submenu2." (".$commentnumb_moderation['count'].")</a>\n";
				$submenucssclass = 'notselected';
				echo_addon_admin_menus($addon_admin_functions,"comments");
				echo"</div>";
				$_SESSION['numimg_pp'] = (int) $_SESSION['numimg_pp'];

				if ($_SESSION['numimg_pp'] == 0)
				{
					$_SESSION['numimg_pp'] = 10;
				}
				elseif (isset($_POST['numimg_pp']) && $_POST['numimg_pp'] > 0)
				{
					$_SESSION['numimg_pp'] = ($pixelpost_commentnumb < $_POST['numimg_pp'] && $pixelpost_commentnumb > 0)?$pixelpost_commentnumb:$_POST['numimg_pp'];
				}

        $currntpg = ceil($page/$_SESSION['numimg_pp'])+1;
       	// calculate the number of pages
				$num_cmt_pages = ceil($pixelpost_commentnumb/$_SESSION['numimg_pp']);
				$num_cmt_pages = ($num_cmt_pages > 0)	? $num_cmt_pages : 1;
				
				// styles for highlighting the actual link
				$allstyle = ($_GET['show'] == ''?' style="border-color:#ff6d6d;"':'');	
				$pubstyle = ($_GET['show']=='published'?' style="border-color:#ff6d6d;"':'');
				$modstyle = ($_GET['show']=='masked'?' style="border-color:#ff6d6d;"':'');
	
				echo "<div class=\"jcaption\">$admin_lang_cmnt_commentlist ".$_SESSION['numimg_pp'].", $admin_lang_page $currntpg $admin_lang_of $num_cmt_pages<br />
				<span id=\"smaller\">$admin_lang_cmnt_massdelete_text</span></div>
				<div class=\"content\">

				<form method=\"post\" name=\"managecomments\" id=\"managecomments\" action=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."\" accept-charset=\"UTF-8\">

				<!-- Moderation Buttons! -->
				<!-- all boxes -->
				<input class=\"cmnt-buttons\" type=\"button\" onclick=\"checkAll(document.getElementById('managecomments')); return false; \" value=\"$admin_lang_cmnt_check_all\" name=\"chechallbox\" />
				<!-- invert checkbox -->
        <input class=\"cmnt-buttons\" type=\"button\" onclick=\"invertselection(document.getElementById('managecomments')); return false; \" value=\"$admin_lang_cmnt_invert_checks\" name=\"invcheckbox\" />
				<!-- delete selected -->
				<input class=\"cmnt-buttons\" type=\"submit\" name=\"submitdelete\" value=\"$admin_lang_cmnt_del_selected\" onclick=\"
				document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=massdelete'
				return confirm('Delete all selected comments? \\n  \'Cancel\' to stop, \'OK\' to delete.')
				\"/>
				<!-- report as spam -->
				<input class=\"cmnt-buttons\" type=\"submit\" name=\"submitdelete\" value=\"$admin_lang_cmnt_rep_spam\" onclick=\"
				document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=spamdelete' \"/>";
				
			  if ($_GET['show']=='masked'){ 
				echo "<br /><br /><!-- publish selected comments -->
				<input class=\"cmnt-buttons\"type=\"submit\" name=\"submitpublish\" value=\"$admin_lang_cmnt_publish_sel\" onclick=\"
							document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=masspublish' \" />";
				}
				if ($moderate_where == " and publish='yes' "){
				echo "<br /><br /><!-- unpublish selected comments -->
				<input class=\"cmnt-buttons\" type=\"submit\" name=\"submitunpublish\" value=\"$admin_lang_cmnt_unpublish_sel\" onclick=\"
				document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=massunpublish' \" />";
				}
				

				// New Workspace added! Place for new Buttons on Comment page				
				eval_addon_admin_workspace_menu('show_commentbuttons_top');				

				echo "<hr/>
				<ul>";

        $query = "SELECT comments.*, image,headline  FROM ".$pixelpost_db_prefix."comments AS comments, ".$pixelpost_db_prefix."pixelpost AS post WHERE post.id=parent_id ".$moderate_where.$order_by." limit ".$page.",".$_SESSION['numimg_pp'];
        $images = mysql_query($query);

  while( $row = mysql_fetch_assoc($images)) {
        $message = pullout($row['message']);

       	$name = pullout($row['name']);
        $url = pullout($row['url']);
        if(strpos($url,'http://')===FALSE)	$url = 'http://' . $url;
				$image = $row['image'];
				$id = $row['id'];
				$parent_id = $row['parent_id'];
				$ip = $row['ip'];
				$email = $row['email'];
				$datetime = $row['datetime'];
        $imagename = pullout($row['headline']);
        $publish_permission = $row['publish'];
        if ($publish_permission=='yes')
        	$comment_row_class = "published-comment";
        else
        	$comment_row_class = "unpublished-comment";
				eval_addon_admin_workspace_menu('single_comment_list');
				$edit_message= str_replace("<br />", "", $message);
				echo "
				<li class='$comment_row_class' ><a href='../index.php?showimage=".$parent_id."'>
				<img src='".$cfgrow['thumbnailpath']."thumb_$image' alt='$image' /></a>

				$admin_lang_cmnt_name <a target=\"_blank\" href=\"$url\">$name</a>
				$admin_lang_cmnt_email $email <br />$admin_lang_cmnt_comment
				<b>$message</b><br />
				$admin_lang_cmnt_image: \"$imagename\"<br />";
		    if (isset($comment_meta_information)){
		     // this variable can be used to overide display of the meta information for a comment
		     // is used for the defensio addon.
				 echo $comment_meta_information;
				} else {
				 //show default
				 echo "<i>$admin_lang_cmnt_commenter $datetime. $admin_lang_cmnt_ip  $ip.<br /></i>";
				}				
				echo"<input type='checkbox' name='moderate_commnts_boxes[]' value='$id' />
				<a onclick=\"return  confirmDeleteComment()\" href=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=delete&amp;delid=$id\">
				[$admin_lang_cmnt_delete]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<!-- To add edit ability to admin/comments page -->
				<a href='' onclick=\"flip('editme$id'); return false;\">[$admin_lang_cmnt_edit]</a>
				<div id='editme$id' class='editcmtarea'>
				<script language='javascript' type='text/javascript'>flip('editme$id');</script>
				<textarea name='message$id' rows='4' cols='70' >$edit_message</textarea><br/>
				<input type='submit' class='cmnt-buttons' value='$admin_lang_cmnt_save'
				onclick=\" document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=edit&amp;editid=$id' \"
				/>
				<!-- </form> -->
				</div></li>";
				$pagec++;
	    }
        echo "</ul>";
  	    
   	  // logical place for the buttons.
 			  if ($_GET['show']=='masked'){ 
					echo "<!-- publish selected comments -->
					<input class=\"cmnt-buttons\"type=\"submit\" name=\"submitpublish\" value=\"$admin_lang_cmnt_publish_sel\" onclick=\"
								document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=masspublish' \" />";
				}
				if ($moderate_where == " and publish='yes' "){
				echo "<!-- unpublish selected comments -->
				<input class=\"cmnt-buttons\" type=\"submit\" name=\"submitunpublish\" value=\"$admin_lang_cmnt_unpublish_sel\" onclick=\"
				document.getElementById('managecomments').action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;action=massunpublish' \" />";
				}
				eval_addon_admin_workspace_menu('show_commentbuttons_bottom');
   	    echo "</form><br />";
   	    
	  // to show page number and link to next and previous pages
    if($pixelpost_commentnumb > $_SESSION['numimg_pp'])
    {
	    	$pagecounter = 0;
	    	$pcntr = 0;
	    	$image_page_Links = "";

				while ($pcntr < $num_cmt_pages)
				{
					$pcntr++;
					$image_page_Links .= "<a href='".$_SERVER['PHP_SELF']."?".pagenumber($pagecounter)."'>".($_GET['page']==$pagecounter?'<b>'.$pcntr.'</b>':$pcntr)."</a>\n";

					$pagecounter=$pagecounter+$_SESSION['numimg_pp'];
				}// end while

	      if ($page < (($num_cmt_pages-1)*$_SESSION['numimg_pp']))
	      {
		    	$newpage = $page+$_SESSION['numimg_pp'];
		      $image_page_Links .= "<a href='".$_SERVER['PHP_SELF']."?".pagenumber($newpage)."'>$admin_lang_next</a>\n";
		    }

				if ($page >= $_SESSION['numimg_pp'])
	      {
	      	$newpage = $page - $_SESSION['numimg_pp'];
	      	$image_page_Links  = "<a href='".$_SERVER['PHP_SELF']."?".pagenumber($newpage)."'>$admin_lang_prev</a>\n" .$image_page_Links;
	      }
	       echo "\n".$image_page_Links."<br/>";

	      }

				echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.pagenumber($_GET['page']).'" accept-charset="UTF-8">';

				echo $admin_lang_show.' ';
				echo '<input type="text" name="numimg_pp" size="3" value="'.$_SESSION['numimg_pp'].'" /> '.$admin_lang_cmnt_page
				    .' <input class="cmnt-buttons" type="submit" value="'.$admin_lang_go.'"/></form>';

		    echo "\n</div><p />\n";
	    } // end list
}

function pagenumber($num) {
	if (isset($_GET['page']) && $_GET['page'] != '') {
		$qstring = preg_replace('/page=\d+/', 'page='.$num, $_SERVER['QUERY_STRING']);
	}
	else $qstring = $_SERVER['QUERY_STRING'].'&amp;page='.$num;
	return $qstring;
}
?>