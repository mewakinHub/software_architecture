<?php
 
// This function returns a connection to the database using PDO
// The function returns the connection object (or exits on error)
function getConnection() {
 
    // This assumes the database is in a folder called "db"
    $dbName = "db/films.sqlite";
 
    // A try ... catch block will try something and catch any
    // exception messages if something goes wrong.
    try {          
        // Use PDO to create a connection to the database 
        $connection = new PDO('sqlite:'.$dbName);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        // return a database connection
        return $connection;
 
    } catch( PDOException $e ) {
        // If there is an exception, return the error message 
        echo "Database Connection Error: ";
        echo $e->getMessage();
        
        // Halt execution of the program
        exit();
    }
}
