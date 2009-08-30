<html><body>
<?php

// SVN file version:
// $Id: index.php 233 2007-04-08 07:20:51Z blinking8s $

//This page just shows how you would use my library.  
//Look in exif.php for more information
//Enjoy.

include('exif.php');

$path="image.jpg";
$verbose = 0;

$result = read_exif_data_raw($path,$verbose);	
echo "<PRE>"; 
print_r($result); 
echo "</PRE>";
?>

</body></html>