<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['loginid']) && isset($_REQUEST['requestid'])) {
 
    $loginId = $_REQUEST['loginid'];
    $requestId= $_REQUEST['requestid'];
 
    $result = $db->insertfriendlist($loginId,$requestId);
 
    if ($result){
		$response["error"] = FALSE;
    	$response["error_msg"] = "insert complete";
    	echo json_encode($response);
    }else{
    	$response["error"] = TRUE;
    	$response["error_msg"] = "Insert incomplete";
    	echo json_encode($response);
    }
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters request id is missing!";
    echo json_encode($response);
}
?>