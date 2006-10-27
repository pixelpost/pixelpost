<?php

/**************************
SVN file version:
$Id$
**************************/

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"]) {
	die ("Try another day!!");
}

// categories
if($_GET['view'] == "categories") {
echo "<div id='caption'>$admin_lang_categories</div>";

    if($_GET['action'] == "delete") {
    $query = sql_query("delete from ".$pixelpost_db_prefix."categories where id='".$_POST['id']."'");
	 echo "<div class='jcaption'>$admin_lang_cats_delete_cat2</div><div class='content confirm'>$admin_lang_done $admin_lang_cats_deleted</div><p />";
        }
    if($_GET['action'] == "add") {
        $category = clean($_POST['category']);
		    $query = sql_query("insert into ".$pixelpost_db_prefix."categories(id,name) VALUES(NULL,'$category')");
  		   echo "<div class='content confirm'>$admin_lang_done $admin_lang_cats_added<p /></div>
	    ";
        }
    if($_GET['action'] == "edit") {
	$query = sql_array("select * from ".$pixelpost_db_prefix."categories where id='".$_POST['id']."'");
        $name = pullout($query['name']);
        echo "<div class='jcaption'>$admin_lang_cats_edit_cat_txt</div>
        <div class='content'>$admin_lang_cats_edit_tip<p />

	<form method='post' action='$PHP_SELF?view=categories&amp;action=update&amp;id=".$query['id']."' accept-charset='UTF-8'>
        <input type='text' name='category' value='$name' style='width:300px;'/>
        <input type='submit' value='$admin_lang_cats_update_cat_button' />
        </form>
        </div>
        ";
        }
    if($_GET['action'] == "update") {
        $category = clean($_POST['category']);
        $getid = $_GET['id'];
        $upquery = sql_query("update ".$pixelpost_db_prefix."categories set name='$category' where id='$getid'");
        // echo "<div class='jcaption'>$admin_lang_update</div>
        echo "<div class='content confirm'>$admin_lang_done $admin_lang_cats_updated<p /></div>";
        }
    echo "
    <div class='jcaption'>$admin_lang_cats_add_cat</div>
    <div class='content'>$admin_lang_cats_add_cat_txt<p />
    <form method='post' action='$PHP_SELF?view=categories&amp;action=add' accept-charset='UTF-8'>
    <input type='text' name='category' style='width:300px;' /><p />
    <input type='submit' value='$admin_lang_cats_add_cat' />
    </form>
    </div>
    <div class='jcaption'>$admin_lang_cats_edit_cat</div>
    <div class='content'>
    <form method='post' action='$PHP_SELF?view=categories&amp;action=edit' accept-charset='UTF-8'>
    <select name='id'>
    <option value=''>$admin_lang_cats_edit_cat_txt</option>
    <option value=''>----------</option>
    ";
    $query = mysql_query("select * from ".$pixelpost_db_prefix."categories order by name");
    while(list($id,$name) = mysql_fetch_row($query)) {
        $name = pullout($name);
        echo "<option value='$id'>$name</option>\n";
        }
    echo "
    </select><p />
    <input type='submit' value='$admin_lang_cats_edit_cat_button' />
    </form>
    </div>

    <div class='jcaption'>$admin_lang_cats_delete_cat</div>
    <div class='content'>
    <form method='post' action='$PHP_SELF?view=categories&amp;action=delete' accept-charset='UTF-8'>
    <select name='id'>
    <option value=''>$admin_lang_cats_delete_cat_txt</option>
    <option value=''>----------</option>
    ";
    $query = mysql_query("select * from ".$pixelpost_db_prefix."categories order by name");
    while(list($id,$name) = mysql_fetch_row($query)) {
    	if ($id!=1){
			$name = pullout($name);
			echo "<option value='$id'>$name</option>\n";
        	}
        }
    echo "
    </select><p />
    <input type='submit' value='$admin_lang_cats_delete_cats_button' />
    </form>
    </div>
    ";
 }

 ?>