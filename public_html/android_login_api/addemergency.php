<?php
 
require_once 'include/DB_Functions.php';
header("content-type:text/javascript;charset=utf-8");
$db = new DB_Functions();
 
// json response array

 
if (isset($_REQUEST['email'])&&isset($_REQUEST['status_emergency'])&&isset($_REQUEST['url_emergency'])
    &&isset($_REQUEST['date_emergency'])&&isset($_REQUEST['uid'])) {
 
    // receiving the post params
    $email =  $_REQUEST['email'] ;
    $status_emergency =  $_REQUEST['status_emergency'] ;
    $url_emergency =  $_REQUEST['url_emergency'] ;
    $date_emergency =  $_REQUEST['date_emergency'] ;
    $uid =  $_REQUEST['uid'] ;
     
    if ($db->getUniqueId($uid)) { 
    // check if user is already existed with the same email
   $db->addemergencysms($email,$status_emergency,$url_emergency,$date_emergency);
    $response["error"] = FALSE;
            $response["error_msg"] = "add emergency";
            echo json_encode($response);   
        // create a new user
   } else {
            $response["error"] = TRUE;
            $response["error_msg"] = "getLocationFriend error";
            echo json_encode($response);   
    }
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "ทำอะไรครับ!";
    echo json_encode($response);
}
   
?>