<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['loginid']) ) {
 
    $loginId = $_REQUEST['loginid'];
 
    $result = $db->checkrequest($loginId);
 
    if ($result){
        $returnrow = [];
        while($row = $result->fetch_assoc()){
            array_push($returnrow, $row);
        }
        $response["requestusers"]=$returnrow;
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