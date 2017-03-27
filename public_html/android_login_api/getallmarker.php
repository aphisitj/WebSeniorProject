<?php
require_once 'include/DB_Functions.php';
header("content-type:text/javascript;charset=utf-8");
$db = new DB_Functions();

// json response array
// $response = array("error" => FALSE);

$result = $db->getAllMarker();
if ($result){
	while($row = $result->fetch_assoc()){
		$response[]=$row;
    }
   echo json_encode($response);
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "getAllMarker error";
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
   		
}

?>