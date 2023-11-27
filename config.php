<?php
    // Configuration for database connection
    // PDO needs 4 paramters
    // data source name type of database, host name in our case its local
    // and database name, which is optional
    // some additional options
    $host       = "localhost";
    $username   = "root";
    $password   = "";

    // to establish a conection you dont need a db name, but eventuall you do need dbname
    // in order to add to query exact database
    $dbname     = "test"; // will use later
    $dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
    $options    = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
?>