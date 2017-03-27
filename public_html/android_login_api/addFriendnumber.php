<?php
 
require_once 'include/DB_Functions.php';
header("content-type:text/javascript;charset=utf-8");
$db = new DB_Functions();
 
// json response array

 
if (isset($_REQUEST['email']) &&isset($_REQUEST['friendnumber']) 
    &&isset($_REQUEST['friendemail'])) {
 
    // receiving the post params
    $email =  $_REQUEST['email'] ;
    $friendnumber =  $_REQUEST['friendnumber'] ;
    $friendemail =  $_REQUEST['friendemail'] ;
    
     
     
    // check if user is already existed with the same email
   $db->removefriendnumber($email);
        // create a new user
    $db->addfriendnumber($email, $friendnumber, $friendemail);
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters request id is missing!";
    echo json_encode($response);
}
   
?>