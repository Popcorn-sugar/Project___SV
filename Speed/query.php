<?php 
    // Some mySQL query function
    require_once('define.php');
    function query($sql)
    {
        // Connect to server and select databse.
        $mysqli = new mysqli(host, my_user, my_pass, my_db);
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }
        $result = $mysqli -> query($sql);
        $mysqli -> close();
    }

    function query_value($sql)
    {
        // Connect to server and select databse.
        $mysqli = new mysqli(host, my_user, my_pass, my_db);
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }
        $result = $mysqli -> query($sql);
        return $result;
        $mysqli -> close();
    }