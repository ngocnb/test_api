<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and model files
include_once '../../Service/database.php';
include_once '../../Model/User.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));

$result = [];

// update user
if ($user->update($data)) {
    $result = [
        "message" => "User updated successfully.",
        "result" => true
    ];
} else { // unable to update user
    $result = [
        "message" => "Unable to update user. Please check it again.",
        "result" => false
    ];
}

echo json_encode($result);