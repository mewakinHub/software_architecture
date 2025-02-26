<?php
 
require "getConnection.php";
 
$sqlQuery = "SELECT * FROM film WHERE title LIKE :title"; // inside e.g., river will have driver, riverside, etc.
// https://w24057070.nuwebspace.co.uk/version_control/class1_ver1/films.php?title=river

try {
    $dbConnection = getConnection();
    $result = $dbConnection->prepare($sqlQuery);
 
    // Use $_GET to access a value in the URL  
    $param['title'] = "%" . $_GET['title'] . "%";

    // ERROR HANDLING --
    // Use an if statement together with isset() to see if 
    // a value has been set in the URL. This code creates 
    // a variable containing the data or an empty string
    if (isset($_GET['title']) ) {
        $title = $_GET['title'];
    } else {
        $title = "";
    }
 
    $result->execute($param);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
 
} catch( PDOException $e ) {
    echo "Database Query Error ";
    echo $e->getMessage();
}
 
header('Content-Type: application/json');
echo json_encode($data);