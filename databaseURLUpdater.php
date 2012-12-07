<?php

    $DB_NAME = "wordpress_c";
    $DB_PASSWORD = "";
    $DB_USER = "root";
	$DB_HOST = "localhost";
    $link = @mysql_connect($DB_HOST
, $DB_USER, $DB_PASSWORD);

    if (is_resource($link)) {
        mysql_select_db($DB_NAME);
    }
    $directory = explode("/",dirname(__FILE__));
    $url = "http://localhost/" . end($directory);
    $query = "UPDATE wp_options 
    SET option_value='$url'
    WHERE option_id=1";
    $result = mysql_query($query, $link);
    if ($result) {
    	echo "Row 1 updated with " . $url . "<br>";
    } else {
        echo "Error updating row 1: " . mysql_error();
    }

    $query2 = "UPDATE wp_options 
    SET option_value='$url'
    WHERE option_id=37";
    $result2 = mysql_query($query2, $link);
    if ($result2) {
  		echo "Row 37 updated with " . $url;
    } else {
        echo "Error updating row 2: " . mysql_error();
    }
?>