<HTML><BODY>
<?php
//This page just shows how you would use my library.  
//Look in exif.php for more information
//Enjoy.
//
// SVN file version:
// $Rev: 24 $
// $LastChangedBy: Administrator $
// $LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $


include('exif.php');

$path="image.jpg";
$verbose = 0;

$result = read_exif_data_raw($path,$verbose);	
echo "<PRE>"; 
print_r($result); 
echo "</PRE>";
?>


</BODY></HTML>