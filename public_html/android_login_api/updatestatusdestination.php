<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['email']) && isset($_REQUEST['uid']) ) {
 
    $email = $_REQUEST['email'];
    $uid = $_REQUEST['uid'];
 if ($db->getUniqueId($uid)) {
            $result = $db->updatedestinationstatus($email);
         
            if ($result){
                $response["error"] = FALSE;
                $response["error_msg"] = "update completed";
                echo json_encode($response);
            }else{
                $response["error"] = TRUE;
                $response["error_msg"] = "update incompleted";
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