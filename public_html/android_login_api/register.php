<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['phoneno']) ) {
 
    // receiving the post params
     $email = $_REQUEST['email'] ;
     $password = $_REQUEST['password'];
      $phoneno = $_REQUEST['phoneno'];
     
    // check if user is already existed with the same email
    if ($db->isUserExisted($email)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $email;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($email, $password,$phoneno);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $user["unique_id"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["password"] = $user["password"];

            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (email or password) is missing!";
    echo json_encode($response);
}
?>