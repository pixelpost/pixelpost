Pixelpost version 1.5

SVN file version:
$Rev: 24 $
$LastChangedBy: Administrator $
$LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $

Welcome as a new user of PixelPost!

You will find the Program-Requirements further down
As well as the Install instructions

-------------------------------------------------------------------------
Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org


License: http://www.gnu.org/copyleft/gpl.html
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

-------------------------------------------------------------------------
PROGRAM REQUIREMENTS
-------------------------------------------------------------------------

These are the requirements for PixelPost:

- sufficient Webspace: not for PixelPost (around 400 KB), but for your images ;=)
- Apache Webserver or Windows IIS
- PHP, version 4.3.0 or higher
- PHP with GD-lib (compiled with JPG-support), required for thumbnailing
- MySQL version 3.24.58 or higher
- a MySQL database already working. If you have no MySQL Database running, create
  a database first (or ask your hoster to do it for you)

To install PixelPost, it is necessary to check whether your webspace supports
these requirements and to have the following MySQL-database-informations
at hand  before you start to install:

- name of the database-host, often "localhost"
- database username
- database user password
- database name

If you don't have these informations, ask your hoster to provide you with these
informations

If you do not know how to set the file-permissions for the folder, check the
help-file of the ftp-program which you use to upload files or
read here in this very good tutorial

http://www.nucleuscms.org/documentation/tips.html#filepermissions



-------------------------------------------------------------------------
INSTALL
-------------------------------------------------------------------------

Directory structure of Pixelpost:

/* 				<= that is the "root-directory" of Pixelpost
/addons/*			<= directory for addons
/admin/*			<= the "heart of PixelPost", administration
/doc/*				<= documentation
/includes/*			<= necessary files
/language/*           		<= language files go here
/templates/*     <= templates go here
/templates/pixelpost-light/*
/templates/pixelpost-dark/*
/templates/simple/*
/templates/pixelpost-light-archivepaged/*
/templates/utf-rtl/*
/images/*			<= create this directory, CHMOD to 777
/thumbnails/*			<= create this directory, CHMOD to 777
-------------------------------------------------------------------------

1. Edit the pixelpost.php file (located in /includes/), enter the
   database information there:

   these are the fields, where you must enter the necessary data:

	$pixelpost_db_host      = "localhost"; // database host, often "localhost"
	$pixelpost_db_user      = "replace_me"; // database user
	$pixelpost_db_pass      = "replace_me"; // database user password
	$pixelpost_db_pixelpost = "replace_me"; // database

   If you choose another name for your PixelPost-Tables, change it here,
   replace "pixelpost_" by the table-name-prefix of your choice:

	$pixelpost_db_prefix = "pixelpost_"; // table prefix, leave as is unless you want
	to install multiple blogs on the same database

2. Upload the files into some directory of your liking, but keep
   the directory structure as it is
   it is not necessary to upload the directory "doc" to your webspace

3. Create a folder 'images'  !!!!!!

4. Create a folder 'thumbnails' !!!!!!

5. Set the permissions to the folder 'images' and to the folder 'thumbnails' (chmod 777)

6. Connect to your site and the admin section, for example
   www.yoursite.com/where_you_installed_pixelpost/admin/install.php
   and follow the online instructions.


-------------------------------------------------------------------------
UPGRADE
-------------------------------------------------------------------------

if you are running PixelPost earlier than PixelPost 1.5, you might run
an UPGRADE to the new Version.

In that case, you find all necessary information in the file

ReadMe_upgrade.txt

in this directory.



-------------------------------------------------------------------------
FAQ
-------------------------------------------------------------------------

In case you run into trouble or you look for more information first,
you can

visit the forum at http://www.pixelpost.org/forum

We plan to re-activate the FAQ but in the moment the FAQ is not updated
and available

-------------------------------------------------------------------------
Extended Functionality, Templates
-------------------------------------------------------------------------

As the flexibility and the versatility of PixelPost is without doubt, you
will find a lot of ADDONs and templates in our download section at
http://www.pixelpost.org/v1/index.php?x=downloads

please keep in mind that the ADDONs, which you might want to include, MUST
FIT TO THE INSTALLED VERSION OF PIXELPOST

