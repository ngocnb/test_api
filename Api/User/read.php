<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and model files
include_once '../../Service/database.php';
include_once '../../Model/User.php';

// get id from query string
if (isset($_GET['id']) && $_GET['id'] != null) {
    $userId = $_GET['id'];
} else {
    echo json_encode([
        "message" => "No user id specified!",
        "result" => false
    ]);
    exit;
}

// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);

// result array
$result = array();
$result["data"] = null;

$user = $user->getUserById($userId);
if ($user) {
    $result = [
        "data" => $user,
        "result" => true
    ];
} else {
    $result = [
        "result" => false
    ];
}
echo json_encode($result);
exit;