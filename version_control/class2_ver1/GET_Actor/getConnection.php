<?php
// This function returns a connection to the database using PDO
// The function returns the connection object (or exits on error)
function getConnection() {
 
    // This assumes the database is in a folder called "db"
    $dbName = "db/films.sqlite";
 
    // A try ... catch block will try something and catch any
    // exception messages if something goes wrong.
    try {          
        // build1: Use PDO, built-in PHP extension, to create a connection to the database 
        $connection = new PDO('sqlite:'.$dbName);
        // build2: Set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        // return a database connection
        return $connection;
 
    } catch( PDOException $e ) {
        // build3: If there is an exception, return the error message
        echo "Database Connection Error: ";
        echo $e->getMessage(); //Object Operator injecting parameter inside "built-in method"!
        
        // This would cause an error because getMessage() is NOT a standalone function
        // echo getMessage($e); // ❌ Incorrect - This will cause a Fatal Error

        // Halt execution of the program
        exit();
    }
}