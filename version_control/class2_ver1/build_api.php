<?php
// https://w24057070.nuwebspace.co.uk/version_control/class2_ver1/api.php
header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // 405 Method Not Allowed
    echo json_encode(["error" => "Method not allowed. Only GET requests are supported."]);
    exit; // Stop further execution
}

// start --function declaration
function getData() {
    $data = [
        "name" => "Teetawat Bussabarati(Mew)",
        "id" => "24057070",
        "level" => 5,
        "modules" => [
            [
                "code" => "KV5035",
                "title" => "Software Architecture",
                "credits" => 20
            ],
            [
                "code" => "KV5037",
                "title" => "Consultancy Project",
                "credits" => 20
            ],
            [
                "code" => "KV5054",
                "title" => "AR/VR Development",
                "credits" => 20
            ]
        ],
        "programme" => "BSc (Hons) Computer Science with Flower Arranging"
    ];
    return $data;
}

// https://w24057070.nuwebspace.co.uk/version_control/class2_ver1/api.php?option=name
function getRequestedData($option, $data) {
    switch ($option) {
        case "name":                             // if ($option === "name")
            return $data["name"];
        case "id":                               // else if ($option === "id")
            return $data["id"];
        case "level":
            return $data["level"];
        case "modules":
            return $data["modules"];
        case "programme":
            return $data["programme"];
        default:                                 // else
            http_response_code(400); // 400 Bad Request
            return ["error" => "Invalid option"];
    }
}

//start --logic (mostly GET method only)
// Get the full data first
$data = getData();

// If an option is provided, process it
if (isset($_GET["option"])) {                   // Parameters are accessed via the $_GET array
    $option = $_GET["option"];
    $data = getRequestedData($option, $data);
}

// Final output - `echo` at the very end --
echo json_encode($data, JSON_PRETTY_PRINT);     //convert List/Nested List to JSON String