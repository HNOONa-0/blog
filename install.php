<?php
    /**
    * Open a connection via PDO to create a
    * new database and table with structure.
    *
    */
    require "config.php";
    // passed in this order
    // dsn username password options
    $sql="";
    try{
        // we cant use dsn as our database has not been yet given a name
        $connection = new PDO("mysql:host=$host",$username,$password,$options);
    
        // get the query from our file to execute on php
        $sql = file_get_contents("data/init.sql");
        // use connection to execute query
        $connection->exec($sql);
        echo "db created succesfully";
    }
    catch(PDOException $error){
        echo $sql . "<br>" . $error->getMessage();
    }
?>