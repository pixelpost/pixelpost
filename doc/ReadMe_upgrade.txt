Pixelpost version 1.5

SVN file version:
$Rev: 24 $
$LastChangedBy: Administrator $
$LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $

Welcome as User of PixelPost!

This file provides you with the necessary steps to upgrade from
your existing PixelPost Version 1.3 or above to PixelPost 1.5

You find as well information how to upgrade from former versions

Contents:

0- UPGRADE from any version to the actual version
1- UPGRADE from Version 1.1 or Version 1.2 
2- UPGRADE from Version 1.3 to PixelPost 1.5
3- UPGRADE from Version 1.4 to PixelPost 1.5
4- UPGRADE from Version 1.5.x  to PixelPost 1.5RC 

-------------------------------------------------------------------------
Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
Copyright  2006 Pixelpost.org <http://www.pixelpost.org>
License: http://www.gnu.org/copyleft/gpl.html

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	    http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

---------------------------------------------------------------------------
0- UPGRADE from any version to the actual version
---------------------------------------------------------------------------
These points are recommendations. 
We ask you to run backups more often. 
You also find information about backing up Pixelpost data at
http://wiki.pixelpost.org/index.php/Special:Search?search=backup&go=Go

Do a backup of your files before you upload the new files to your webspace!
Do a backup of your database files

Take care that you have an actual backup of all the files, which you 

- hacked or
- modified

yourself!

Especially take care that you have the actual version of the language files if you 
had modified them! 


-------------------------------------------------------------------------
1- UPGRADE from Version 1.1 or Version 1.2  
-------------------------------------------------------------------------


This update is not supported anymore as the download is not available 
anymore as well as the old forum topic is not existent anymore


-------------------------------------------------------------------------
2- UPGRADE from Version 1.3 to PixelPost 1.5
-------------------------------------------------------------------------

Please note, that the file "pixelpost.php" which contains the database-
access-informations is located now in the /includes/-folder!
Please do not copy the file "pixelpost.php version 1.3" to this folder, as
this will overwrite the version-information.


1)
make a backup of your DB please!

2)
move the old files except images/thumbnails/templates/addons folders to a directory named e.g. old_files

3)
open the pixelpost.php of your PixelPost 1.3 - installation,
take the database-information from there
and enter it into the \includes\pixelpost.php

Be sure to enter the same "table-prefix" which you used for your 1.3-installation !!!!

for example:
"$pixelpost_db_prefix = "pixelpost_"; // table prefix, leave as is unless you want to install multiple blogs on the same database"


4)
copy all the files of the zip file into your directory.

- Default templates are changed to be CSS valid and a new UTF-right-to-left template is added.
- Decide whether you want to use these when you upload the v1.4 files
- The addon's in the v1.4 addon folder are updated and compatible with v1.4.
  Other addons you have may or may not work for v1.4 right now.
  If not, ask the author of that addon to change it.

5)
browse to http://www.yourwebsite.com/admin

6)
it should prompt you to an upgrade page with a button: "upgrade"
If not refresh your browser page. (CTRL+F5 in IE)

7)
upgrade and then login with your old username and pass

8)
if everything's OK, delete the old_files folder.

If not, write down the errors and problems you faced.
Use the backup of DB to revert the DB tables and then delete the new files and copy back the old files

Go back to the forum and report the errors

9)
Check the language-file and compare it with the new ones, or better update these as well!

10)  CSS:

Note, that the CSS-definitions are changed, no CSS-definition contains "_" anymore in the name
so check your templates and correct there, especially the calendar-definitions are changed!
So please check the templates, which you use and change all underscores "_" to "-"
otherwise your calendar will look crumbled and other areas of your photoblog as well

Note that we now provide separate CSS-files for the templates

Note that there are far more TAGs now which you can use in your templates.
Check the file doc/pixelpost-tags.txt

11) Codepage and Character Encoding:

as it is our aim to acchieve a photoblog which supports all special characters, codepages etc.,
we made big efforts to change all input and output to  UTF-8-format
so please check that your templates use the right codepage-directive in the header:

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

otherwise you might get strange characters still!


12) read the changelog.txt please
Good luck!

-------------------------------------------------------------------------
3- UPGRADE from Version 1.4 to PixelPost 1.5 BETA
-------------------------------------------------------------------------

1) If you modified something in the scripts please make a backup of your modifications.
   (including modified language files or templates)

2) save your /includes/pixelpost.php

3) Open the file /includes/pixelpost.php from the UPGRADE-files and edit it:

   enter your database-data into the following lines:

   $pixelpost_db_host      = "localhost"; // database host, often "localhost"
   $pixelpost_db_user      = "replace_me"; // database user
   $pixelpost_db_pass      = "replace_me"; // database user password
   $pixelpost_db_pixelpost = "replace_me"; // database

   take care that the tablename-prefix is correct, if your tablename-prefix differs
   from "pixelpost_", you must enter your prefix here!

   $pixelpost_db_prefix = "pixelpost_"; // table prefix, leave as is unless you want to
   install multiple blogs on the same database

3) Copy the new files from your local folder "PixelPost 1.5 BETA" to your site using an FTP program.

4) go to your site and open /admin/install.php
   install.php will add one more table to the database

4) That's it! Your PixelPost Version is upgraded and it will show the correct version
   in the admin panel

5) If you run into the following message box in the admin-section:
   	"the layer does not exist (cropdiv).
	If you are using Netscape, please check the nesting of your tags."
   
   just empty the browser-cache and everything will be ok.
   
   Notice, when you are using InternetExplorer: it is not enough to empty the browsercache from
   within the browser, you must manually delete all files in the cache-directory of Internet Explorer.

   After doing so, everything will be ok.

--------------------------------------------------------------------------------------
4- UPGRADE from Version 1.5.x  to PixelPost 1.5RCx
--------------------------------------------------------------------------------------
1.5 RC = "RC" means release candidate, the nearly final versions before final release of 
         Pixelpost 1.5

the first 2 points are advices, suggestions, you should do them more than once!

1) it is always good to make a backup of your databases
2) backup your complete Pixelpost folder from your webspace

3) unzip the Pixelpost 1.5 zip into a directory on your harddisk 

4) upload these files to your webspace, using the same directory structure as before!
   which means: just overwrite the existing files with the new files!

5) you do not need any install-routine, it's just enough to upload them

6) if you did not use the standard-language files, but personally modified files, 
   compare the new language files with your language-files 
   because there are some new language-variables 

7) check if everything is working

8) like before: 
	If you run into the following message box in the admin-section:
   	"the layer does not exist (cropdiv).
	If you are using Netscape, please check the nesting of your tags."
   
   	just empty the browser-cache and everything will be ok.
   
   	Notice, when you are using InternetExplorer: it is not enough to empty the browsercache from
	within the browser, you must manually delete all files in the cache-directory of Internet Explorer.

And you are done!


