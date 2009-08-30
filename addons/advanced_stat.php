<?php

// SVN file version:
// $Id: advanced_stat.php 344 2007-08-24 13:20:31Z schonhose $

/*
Pixelpost version 1.7

Pixelpost www: http://www.pixelpost.org/

Version 1.7:
Development Team:
Ramin Mehran, Will Duncan, Joseph Spurling,
Piotr "GeoS" Galas, Dennis Mooibroek, Karin Uhlig, Jay Williams, David Kozikowski

Former members of the Development Team:
Connie Mueller-Goedecke
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
*/

$addon_name = "Advanced stats";
$addon_description = 'This adddon manages the pixelpost stats and works in coherence
with visitors table.<br />New tag: &lt;ADVNCD_SITE_VISITORNUMBER&gt; instead of &lt;SITE_VISITORNUMBER&gt;<br />  '
."
<form method='post' action='index.php?&amp;view=addons&amp;advncstat=domonth'>
Summarize records of the current month untill today into the stats table?
<input type='submit' value='Do it!'/>
</form> ";

$addon_version = "1.0";


if( isset( $_GET['view']) && $_GET['view']=='addons')
{
	global $cfgrow;
	if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])  die ("Try another day!!");

	// Check to see if the ban table exists, if not, create it
	$query = "SELECT id FROM {$pixelpost_db_prefix}stats LIMIT 1";
	if( !mysql_query($query))	create_stat_table($pixelpost_db_prefix);
	else
	{
		$query = "select count(*) as count from ".$pixelpost_db_prefix."visitors";
		$countall = mysql_query($query);
		$countall = mysql_fetch_array($countall);
		$countall = $countall['count'];
		$somestates .= '<br /> number of visits '.$countall;
		
		$query = "SELECT count(*) AS count, referer, ip FROM ".$pixelpost_db_prefix."visitors GROUP BY referer ORDER BY count DESC LIMIT 0 , 5";
		$mostvisitors = mysql_query($query);
		while(list($count,$referer,$ip) = mysql_fetch_row($mostvisitors))
		{
			$somestates .= $count .',' .$referer .',' .$ip .'<hr />';
		}// end while
		// update stats table
		$tz = $cfgrow['timezone'];
		$crrntmonth = gmdate("Y-m",gmdate("U")+(3600 * $tz));
		//   $query = "select DATE_FORMAT(datetime, '%Y-%m') as months from {$pixelpost_db_prefix}visitors group by months";

		$query = "select DATE_FORMAT(datetime, '%Y-%m') as months from ".$pixelpost_db_prefix."visitors group by months";
		$query = mysql_query($query);

    while(list($month) = mysql_fetch_row($query))
    {
			if ($_GET['advncstat']!='domonth' && $month==$crrntmonth)	continue;
	
			if ("ok"==stat_update_month($pixelpost_db_prefix,$month))
			{
				// update was successfull now start delete
				if ("ok"!=delete_month_visitors($month))
				{
				// delete Failed!: roll back to previous state!
					$msg = delete_month_stats($month);
					echo "delete failed and rollback: ".$msg;
				} // end if delete was ok
			} // end if update was ok
			// } // end if do month or not currnt month
		} // end while
	} // end else: table exists
} // end if addon page
else
{
// if it is the first day of the month get the last month name
	$tz = $cfgrow['timezone'];
	if (gmdate("d",gmdate("U")+(3600 * $tz))=='1')
	{
		$lastmonth= gmdate("Y-m", gmdate("U")+(3600 * ($tz-24)));

		if ("ok"==stat_update_month($pixelpost_db_prefix,$lastmonth))
		{
			// update was successfull now start delete
			if ("ok"!=delete_month_visitors($lastmonth))
			{
				// delete Failed!: roll back to previous state!!
				$msg = delete_month_stats($lastmonth);
			}// end if delet ok?
		} // end if update ok?
	} // end if it's the first day of month
} // end else


//$addon_description.= $somestates;

// Get visitor count
$visitors = sql_array("SELECT count(*) as count FROM ".$pixelpost_db_prefix."visitors");
$pixelpost_visitors = $visitors['count'];

// Check to see if the ban table exists, if not, create it
$query = "SELECT id FROM ".$pixelpost_db_prefix."stats LIMIT 1";
if( mysql_query($query))
{
	$visitorz = mysql_query("SELECT sum(visitors) as count FROM ".$pixelpost_db_prefix."stats");
	$visitorz = mysql_fetch_array($visitorz);
	$pixelpost_visitors  += $visitorz['count'];
	$str = $pixelpost_visitors .'';
	$tpl = ereg_replace("<ADVNCD_SITE_VISITORNUMBER>",$str,$tpl);
}

$addon_description .= 'Number of all visitors: '.$pixelpost_visitors ." -- Number visitors this month: ".$visitors['count'];


///----------------------------------------
// functions
function create_stat_table($pixelpost_db_prefix)
{
	global $cfgrow;
	$tz = $cfgrow['timezone'];
	$thismonth = gmdate("Y-m",gmdate("U")+(3600 * $tz));
	//$thismonth .="-00 00:00:00";

	$query = "CREATE TABLE {$pixelpost_db_prefix}stats (
      id INT(11) NOT NULL auto_increment,

      visitors INTEGER NOT NULL DEFAULT 0,
      month   DATETIME  NOT NULL,

      most_referer_num_1 INTEGER NOT NULL DEFAULT 0,
      most_referer_url_1 VARCHAR(90) NOT NULL,
      most_referer_ip_1  VARCHAR(90) NOT NULL,

      most_referer_num_2 INTEGER NOT NULL DEFAULT 0,
      most_referer_url_2 VARCHAR(90) NOT NULL,
      most_referer_ip_2  VARCHAR(90) NOT NULL,

      most_referer_num_3 INTEGER NOT NULL DEFAULT 0,
      most_referer_url_3 VARCHAR(90) NOT NULL,
      most_referer_ip_3  VARCHAR(90) NOT NULL,

      most_referer_num_4 INTEGER NOT NULL DEFAULT 0,
      most_referer_url_4 VARCHAR(90) NOT NULL,
      most_referer_ip_4  VARCHAR(90) NOT NULL,

      most_referer_num_5 INTEGER NOT NULL DEFAULT 0,
      most_referer_url_5 VARCHAR(90) NOT NULL,
      most_referer_ip_5  VARCHAR(90) NOT NULL,

      most_visited_ip_num_1 INTEGER NOT NULL DEFAULT 0,
      most_visited_ip_1 VARCHAR(90) NOT NULL,
      most_visited_ip_num_2 INTEGER NOT NULL DEFAULT 0,
      most_visited_ip_2 VARCHAR(90) NOT NULL,
      most_visited_ip_num_3 INTEGER NOT NULL DEFAULT 0,
      most_visited_ip_3 VARCHAR(90) NOT NULL,
      most_visited_ip_num_4 INTEGER NOT NULL DEFAULT 0,
      most_visited_ip_4 VARCHAR(90) NOT NULL,
      most_visited_ip_num_5 INTEGER NOT NULL DEFAULT 0,
      most_visited_ip_5 VARCHAR(90) NOT NULL,

      PRIMARY KEY  (id)
   )";

	if (!mysql_query( $query))	$somestates .= "<br/>Error occured in creating table: ".mysql_error();
	
	$where = " where DATE_FORMAT(datetime, '%Y-%m') < '$thismonth' ";
	$insert_query = build_insertquery($pixelpost_db_prefix,$where, $thismonth);
	
	if(!mysql_query($insert_query))
	{
		echo "failed to insert information up to now!".mysql_error();
		mysql_query(" drop TABLE '{$pixelpost_db_prefix}stats' ");
	}
}


///----------------------------------------
function build_insertquery($pixelpost_db_prefix,$where='',$thismonth)
{
	// count all visitors
	$query = "select count(*) as count from ".$pixelpost_db_prefix."visitors".$where;

	$countall = mysql_query($query);
	$countall = mysql_fetch_array($countall);
	$countall = $countall['count'];

	$thismonth .= "-00 00:00:00";
	$insertquery = "INSERT INTO {$pixelpost_db_prefix}stats VALUES ( '', '$countall' , '$thismonth' ";


	// top referers
	$query = "
		SELECT count( *) AS count, referer, ip
		FROM ".$pixelpost_db_prefix."visitors
		".$where."
		GROUP BY referer
		ORDER BY count DESC
		LIMIT 0 , 5";

	$mostvisitors = mysql_query($query);
	$m = 0;

	while(list($count,$referer,$ip) = mysql_fetch_row($mostvisitors))
	{
		$insertquery .= ",'" .$count ."','" .$referer ."','" .$ip ."'";
		$m++;
	}
	
	for ($k = $m ; $k <5 ;$k++)
	{
		$insertquery .= ", '', '' , '' ";
	}// end for
	
	// top visitors ip
	
	$query = "
		SELECT count( *) AS count, ip
		FROM ".$pixelpost_db_prefix."visitors
		".$where."
		GROUP BY ip
		ORDER BY count DESC
		LIMIT 0 , 5";
	
	$mostips = mysql_query($query);
	$m = 0;

	while(list($count,$ip) = mysql_fetch_row($mostips))
	{
		$insertquery .= ",'" .$count ."','" .$ip ."'";
		$m++;
	}

	for ($k = $m ; $k <5 ;$k++)
	{
		$insertquery .= ", '', '' ";
	}// end for
	
	$insertquery .= ")";
	return $insertquery;
}

///----------------------------------------
function delete_month_visitors ($month)
{
	global $pixelpost_db_prefix;
	$message = 'ok';
	$query = "delete from {$pixelpost_db_prefix}visitors where DATE_FORMAT(datetime , '%Y-%m')= '$month'";
	
	if(!mysql_query($query))	$message = mysql_error();
	
	return $message;
}

///----------------------------------------
function delete_month_stats ($month)
{
	global $pixelpost_db_prefix;
	$message = 'ok';
	$query = "delete from {$pixelpost_db_prefix}stats where DATE_FORMAT(month , '%Y-%m')= '$month'";

	if(!mysql_query($query))	$message = mysql_error();

	return $message;
}

///----------------------------------------
function stat_update_month($pixelpost_db_prefix,$thismonth)
{
	$query = "select id as id from ".$pixelpost_db_prefix."stats where month = '$thismonth' LIMIT 0,1";
	$query = mysql_query($query);
	$monthexist = mysql_fetch_row($query);

	if ($monthexist['id'])
	{
		//if this month exist it's an error!
		/*
		$row = mysql_fetch_array($query);
		$updatequery = build_update_query_for_month($thismonth,row['id']);
		if(mysql_query($updatequery))
		$message = "ok";//Month ".$thismonth." is updated!";
		else
		$message = "Updating Month ".$thismonth." failed!";
		*/
	}// end if this month exist
	else
	{
		$where = " where DATE_FORMAT(datetime, '%Y-%m') <= '".$thismonth."'";
		$insert_query = build_insertquery($pixelpost_db_prefix,$where,$thismonth);
		if(mysql_query($insert_query))	$message = "ok";//Month ".$thismonth." is added!";
		else	$message = "Inserting Month ".$thismonth." failed!";
	}

	return $message ;
}

///----------------------------------------
function build_update_query_for_month($themonth,$id)
{
	$where = " where DATE_FORMAT(datetime, '%Y-%m') <= '".$themonth."'";
	// count all visitors
	$query = "select count(*) as count from ".$pixelpost_db_prefix."visitors" .$where;
	$countall = mysql_query($query);
	$countall = mysql_fetch_array($countall);
	$countall = $countall['count'];
	
	$updatequery = "update {$pixelpost_db_prefix}stats set
		visitors='$countall' , month='$themonth'";

   // top referers
	$query = "
		SELECT count( *) AS count, referer, ip
		FROM ".$pixelpost_db_prefix."visitors
		.$where
		GROUP BY referer
		ORDER BY count DESC
		LIMIT 0 , 5";

	$mostvisitors = mysql_query($query);
	$m = 0;
	
	while(list($count,$referer,$ip) = mysql_fetch_row($mostvisitors))
	{
		$m++;
		$updatequery .= ", most_referer_num_".$m."='" .$count ."',most_referer_url_".$m."='" .$referer ."',most_referer_ip_".$m."='" .$ip ."'";
	}
	
	for ($k = $m ; $k <5 ;$k++)
	{
		$updatequery .= ", most_referer_num_".$m."='', most_referer_url_".$m."='' , most_referer_ip_".$m."='' ";
	}// end for
	
	// top visitors ip

	$query = "
		SELECT count( *) AS count, ip
		FROM ".$pixelpost_db_prefix."visitors
		.$where
		GROUP BY ip
		ORDER BY count DESC
		LIMIT 0 , 5";


	$mostips = mysql_query($query);
	$m = 0;
	while(list($count,$ip) = mysql_fetch_row($mostips))
	{
		$m++;
		$updatequery .= ",most_visited_ip_num_".$m."='" .$count ."',most_visited_ip_".$m."='" .$ip ."'";
	}
	
	for($k = $m ; $k <5 ;$k++)
	{
		$updatequery .= ", most_visited_ip_num_".$m."='', most_visited_ip_".$m."='' ";
	}// end for
	
	$updatequery .= "where id='".$id."'";
	
	return $updatequery;
}


///----------------------------------------
function add_current_month($pixelpost_db_prefix)
{
	global $cfgrow;
	$tz = $cfgrow['timezone'];
	$thismonth = gmdate("Y-m",gmdate("U")+(3600 * $tz));
	$query = "select * from ".$pixelpost_db_prefix."stats where month = '$thismonth'";

	if (mysql_query($query))
	{
		$row = mysql_fetch_array($query);
		$updatequery = build_update_query_for_month($thismonth,$row['id']);
		
		if(mysql_query($updatequery))	$message = "Month ".$thismonth." is updated!";
		else	$message = "Updating Month ".$thismonth." failed!";
	}// end if this month exist
	else
	{
		$where = " where DATE_FORMAT(datetime, '%Y-%m') <= '".$thismonth."'";
		$insert_query = build_insertquery($pixelpost_db_prefix,$where,$thismonth);
		
		if(mysql_query($insert_query))	$message = "Month ".$thismonth." is added!";
		else	$message = "Inserting Month ".$thismonth." failed!";
	}
	return $message ;
}

?>