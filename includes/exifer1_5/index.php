<HTML><BODY>
<?php
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


</BODY></HTML>