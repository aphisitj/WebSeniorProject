<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['email']) && isset($_REQUEST['descriptiondestination'])&& isset($_REQUEST['destinationlat'])
&& isset($_REQUEST['destinationlng'])&& isset($_REQUEST['mylocationlat'])&& isset($_REQUEST['mylocationlng'])
&& isset($_REQUEST['date'])&& isset($_REQUEST['uid'])) {
 
    $email = $_REQUEST['email'];
    $destinationlat = $_REQUEST['destinationlat'];
    $destinationlng = $_REQUEST['destinationlng'];
    $mylocationlat = $_REQUEST['mylocationlat'];
    $mylocationlng= $_REQUEST['mylocationlng'];
    $date = $_REQUEST['date'];
    $descriptiondestination = $_REQUEST['descriptiondestination'];
    $uid = $_REQUEST['uid'];
	if ($db->getUniqueId($uid)) { 
	    $result = $db->removedestination($email);
	    $result2 = $db->insertdestination($email,$destinationlat,$destinationlng,$mylocationlat,$mylocationlng,
	        $date,$descriptiondestination,1);
	 
	    if ($result){
			$response["error"] = FALSE;
	    	$response["error_msg"] = "mark destination completed";
	    	echo json_encode($response);
	    }else{
	    	$response["error"] = TRUE;
	    	$response["error_msg"] = "mark destination incompleted";
	    	echo json_encode($response);
	    }
	} else {
        $response["error"] = TRUE;
        $response["error_msg"] = "getLocationFriend error";
        echo json_encode($response);   
    }
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters request id is missing!";
    echo json_encode($response);
}
?>