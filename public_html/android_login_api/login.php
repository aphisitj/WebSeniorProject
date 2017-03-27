<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
 
    // receiving the post params
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
 
    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($email, $password);
 
    if ($user != false) {
        // use is found
            $response["error"] = FALSE;
            $response["uid"] = $user["unique_id"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["password"] = $user["password"];
            $response["user"]["fname"] = $user["fname"];
            $response["user"]["lname"] = $user["lname"];
            $response["user"]["address"] = $user["address"];
            $response["user"]["phoneno"] = $user["phoneno"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>