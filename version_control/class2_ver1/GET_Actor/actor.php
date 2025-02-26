<?php

require "getConnection.php";          // import getConnection.php file

// Check if the 'search' parameter is set in the URL query string
if (isset($_GET['search']) ) {        // Parameters can be anything, not just 'search' (e.g., id, page)
    $search = $_GET['search'];
 } else {
    $search = "";                     // prevent error if no search parameter is provided
 }
 
// SQL query to search for actors by first or last name
$sqlQuery = "SELECT * FROM actor WHERE first_name LIKE :first_name OR last_name LIKE :last_name";
 
try {
    $dbConnection = getConnection();  // PDO from getConnection.php file

    // use1: Prepare the SQL query [using PDO as a built-in PHP extension]
    $result = $dbConnection->prepare($sqlQuery);
 
    // Bind parameters to the SQL query
    $param['first_name'] = "%" . $search . "%";
    $param['last_name'] = "%" . $search . "%";
 
    // Execute the query with the bound parameters
    $result->execute($param);
    // Fetch all results as an associative array
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
 
} catch( PDOException $e ) {
    // If there is an exception, display the error message
    echo "Database Query Error ";
    echo $e->getMessage();
}
 
// Set the content type to JSON
header('Content-Type: application/json');
// Encode the data as JSON and output it
echo json_encode($data);