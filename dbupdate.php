<?php

    /*
        When run, this file updates WP's wp_options table's site and home url with the path to the file. This was created to replace the tedious steps of logging into phpmyadmin and editing the two lines each time a developer clones a live website and imports an existing database.

        Usage:

            1) Drag this file until the root directory of the WordPress project.
            2) Edit lines 14-16 with the respective information as per wp-config.
            3) Open the file in a browser.
    */
    
    //Database connection information as per wp-config.
    $DB_NAME = "databasename";
    $DB_PASSWORD = "root";
    $DB_USER = "root";
	$DB_HOST = "localhost";
    $link = @mysql_connect($DB_HOST
, $DB_USER, $DB_PASSWORD);

    
    if (is_resource($link)) {

        //Connect to the database.
        mysql_select_db($DB_NAME);

        //Retrieve path to this file.
        $directory = explode("/",dirname(__FILE__));
        $url = "http://localhost/" . end($directory);

        //Updating the "siteurl" row in wp_options.
        $query = "UPDATE wp_options 
        SET option_value='$url'
        WHERE option_name='siteurl'";
        $result = mysql_query($query, $link);
        if ($result) {
            echo "option_name:siteurl updated with " . $url . "<br>";    } else {
            echo "Error updating site url to " . $url . ": " . mysql_error();
        }

        //Updating the "home" row in wp_options.
        $query2 = "UPDATE wp_options 
        SET option_value='$url'
        WHERE option_name='home'";
        $result2 = mysql_query($query2, $link);
        if ($result2) {
            echo "option_name:home updated with " . $url;
        } else {
            echo "Error updating home url to " . $url . ": " . mysql_error();
        }
    } else {
        echo "Error establishing connection to the database.";
    }
?>