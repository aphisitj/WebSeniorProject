<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
// $response = array("error" => FALSE);
 
if (isset($_REQUEST['loginid'])) {
 
    $loginId = $_REQUEST['loginid'];
 
    $result = $db->getFriendListByLoginId($loginId);
 	if ($result){
 		while($row = $result->fetch_assoc()){
       		$response[]=$row;
    	}
    	echo json_encode($response);
 	}else {
	    $response["error"] = TRUE;
	    $response["error_msg"] = "getFriendListByLoginId error";
	    echo json_encode($response); 		
 	}
    
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters login id is missing!";
    echo json_encode($response);
}
?>