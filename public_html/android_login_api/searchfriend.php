<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['email']) ) {
 
    $email = $_REQUEST['email'];
 
    $result = $db->searchfriendrequest($email);
 
    if ($result){
		$response["error"] = FALSE;
    	$response["error_msg"] = "Request OK";
    	echo json_encode($response);
    }else{
    	$response["error"] = TRUE;
    	$response["error_msg"] = "Request not OK";
    	echo json_encode($response);
    }
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters request id is missing!";
    echo json_encode($response);
}
?>