Pixelpost version 1.5

SVN file version:
$Id$

Welcome to the PixelPost Version 1.5!

-------------------------------------------------------------------------
Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Robert Prouse, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

-------------------------------------------------------------------------
License: http://www.gnu.org/copyleft/gpl.html

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
-------------------------------------------------------------------------
INFORMATION
-------------------------------------------------------------------------
To find information about PixelPost, the installation and
configuration, read the files in the directory: /doc !!!!!!

There you will find all information:

- Readme-File:
  for installation: ./doc/ReadMe_install.txt
  for upgrading:    ./doc/ReadMe_upgrade.txt
- A changelog
- A list of all PixelPost-Tags
- An instruction for upgrading from existing versions to Version 1.5
- in formation how to write admin-addons!
- the GNU license information

Do read the ReadMe-Files!!  

You may also find information here: 

Pixelpost wiki: 	http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

-------------------------------------------------------------------------
PROGRAM REQUIREMENTS
-------------------------------------------------------------------------

These are the requirements for PixelPost:
- sufficient Webspace: not for PixelPost (around 400 KB), but for your images ;=)
- Apache Webserver or Windows IIS
- PHP, version 4.3.0 or higher
- PHP with GD-lib (with JPG-support), required for thumbnailing
- MySQL version 3.24.58 or higher
- a MySQL database already working. If you have no MySQL Database running, create
  a database first (or ask your hoster to do it for you)

To install PixelPost, you will need  the following MySQL-database-informations
before you start to install:

- name of the database-host, often "localhost"
- database username
- database user password
- database name

If you don't have these informations, ask your hoster to provide you with these
informations

-------------------------------------------------------------------------
FIRST INSTALL
-------------------------------------------------------------------------

Please read the file "ReadMe_install.txt" in the directory /doc

-------------------------------------------------------------------------
UPGRADE
-------------------------------------------------------------------------

Please read the file "ReadMe_upgrade.txt" in the directory /doc

Please note that PixelPost now does not use anymore CSS-classes with "_",
so check your templates and change "_" to "-"
more information on that is found in the ReadMe_upgrade.txt

Please note as well that PixelPost is fully UTF-compliant, so you might change
your CSS-codepage-meta information as well.
More information on that is found in the ReadMe_upgrade.txt