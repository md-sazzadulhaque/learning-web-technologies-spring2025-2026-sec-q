<?php

    $host = "127.0.0.1";
    $dbuser = "root";
    $dbname = "webtech";
    $dbpass = "";


    function getConnection(){
        global $host;
        global $dbuser;
        $con = mysqli_connect($host, $dbuser, $GLOBALS['dbpass'], $GLOBALS['dbname']);
        return $con;
    }

?>