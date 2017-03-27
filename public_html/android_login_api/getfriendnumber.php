<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array

 
if (isset($_REQUEST['friendemail']) && isset($_REQUEST['uid'])  ) {
 
    // receiving the post params
     $friendemail = $_REQUEST['friendemail'] ;
     $uid = $_REQUEST['uid'];
     
     
    // check if user is already existed with the same email
    if ($db->getUniqueId($uid)) {
              $result = $db->getFriendNumber($friendemail);
        if ($result){
            while($row = $result->fetch_assoc()){
                $response[]=$row;
            }
            echo json_encode($response);
        }else {
            $response["error"] = TRUE;
            $response["error_msg"] = "getNumberFriend error";
            echo json_encode($response);        
        }
    } else {
        $response["error"] = TRUE;
            $response["error_msg"] = "getLocationFriend error";
            echo json_encode($response);   
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (email or password) is missing!";
    echo json_encode($response);
}
?>