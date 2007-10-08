<?php
if(!defined('PP_INSTALL')) { die(header("Location: ../index.php")); }

switch($installed_version) {
  
	case 0:			// Not installed
	
		Show_username_password();
		$ins_data[] = Create13Tables($prefix);
		$ins_data[] = Set_Configuration($prefix);
		
		
	case 1.3:		// Installed 1.3 or earlier
	
		 $ins_data[] = UpgradeTo14($prefix);
		 
		 if($installed_version == 1.3) {
			 ConvertPassword($prefix);
		 }
		
		
	case 1.4:		// Already upgraded
		 $ins_data[] = UpgradeTo141($prefix);
		 

	case 1.41:		// Fall to the next

	case 1.42:

	case 1.499:

	case 1.4993:

	case 1.49931:	// UpgradeTo1501($prefix);
	

	case 1.4994:	// UpgradeTo15011($prefix);
	

	case 1.4995:	// UpgradeTo15012($prefix);
		 $ins_data[] = UpgradeTo15beta($prefix,'1.49995');
	
	
	case 1.49995:	// Upgrade from beta to final 1.5
		 $ins_data[] = UpgradeTo15final($prefix,'1.5');


	case 1.5:		// Upgrade from final to 1.6Beta
		 $ins_data[] = UpgradeTo16beta($prefix,'1.59');


	case 1.59:		// Upgrade from 1.6Beta to 1.6Final
		 $ins_data[] = UpgradeTo16final($prefix,'1.6');


	case 1.6:		//upgrade from 1.6Final to 1.6.5
		 $ins_data[] = UpgradeTo165($prefix,'1.65');
		
	break;

	case 1.65:
		 $ins_data[] = UpgradeTo1651($prefix,'1.651');
	
	case 1.651:
		 $ins_data[] = UpgradeTo1652($prefix,'1.652');	

	break;

	/* Add the upgrade to 1.7 here
	
	IMPORTANT !!! - Remember to define the new pixelpost version on line 13 of /admin/install.php
	
	case 1.7:
		 $ins_data[] = UpgradeTo1.7($prefix,'1.7');
	*/
	default:
 		 echo "<b>$lang_database_error</b><br/><br/>$lang_version_error</div>
		 </body>
		 </html>";
		 exit();
		
	break;
}
?>