1) Copy the .htaccess, index.php, and root_config.php into your website's root directory.
	*** You may copy the contents of these files to your own if necesarry
		(except index.php, that may be modified but not usually added to)

2) Go into the root_config.php and point Config::$path['app'] to your app's root directory

3) Copy the "config" folder into your app's root
	***You may put this folder in another location, but be sure to update the pointers for uuwat_config.php and app_config.php
		to the new location in the root_config.php

4) Now edit the two files in your [your-app-folder]/config folder named "sysDBconn.php" and "userDBconn.php". 
		Set your login credentials for a master database user and normal database user in each file respectively by modifying the line:
		"DataObject::connect('127.0.0.1', 'username', 'password', 'data_base_name');"
		*** You are required to have both files. Try to setup your database permissions for these users so the userDBconn can't drop tables and make system changes and such

5) Copy the app_init.php and DOM.php file into your webapp's root path.
	***If your project previously had an index.php, rename it to app_init.php and copy the provided file's contents to it

6) Look through the uuwat, root, and app configs to see what other values you can set...and, Go crazy!