<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['email'])&&isset($_REQUEST['password']) ) {
 
    $email = $_REQUEST['email'];
 $password = $_REQUEST['password'];
    $result = $db->checkpassword($email,$password);
 
    if ($result){
      $response["error"] = FALSE;
    	$response["error_msg"] = "Password true";
        echo json_encode($response);
    }else{
    	$response["error"] = TRUE;
    	$response["error_msg"] = "No friend request";
    	echo json_encode($response);
    }
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters request id is missing!";
    echo json_encode($response);
}
?>