<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
// $response = array("error" => FALSE);
 
if (isset($_REQUEST['email'])) {
 
    $email = $_REQUEST['email'];
 
    $result = $db->getInformation($email);
 	if ($result){
 		while($row = $result->fetch_assoc()){
       		$response[]=$row;
    	}
    	echo json_encode($response);
 	}else {
	    $response["error"] = TRUE;
	    $response["error_msg"] = "getLocationFriend error";
	    echo json_encode($response); 		
 	}
    
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters login id is missing!";
    echo json_encode($response);
}
?>