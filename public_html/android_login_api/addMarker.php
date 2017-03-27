<?php
 
require_once 'include/DB_Functions.php';
header("content-type:text/javascript;charset=utf-8");
$db = new DB_Functions();
 
// json response array

 
if (isset($_REQUEST['acc_id']) &&isset($_REQUEST['acc_title']) 
    &&isset($_REQUEST['acc_description']) &&isset($_REQUEST['acc_lat']) 
    &&isset($_REQUEST['acc_long']) &&isset($_REQUEST['date']) 
    &&isset($_REQUEST['rate_id']) && isset($_REQUEST['email']) ) {
 
    // receiving the post params
    $acc_id =  $_REQUEST['acc_id'] ;
    $acc_title =  $_REQUEST['acc_title'] ;
    $acc_description =  $_REQUEST['acc_description'] ;
    $acc_lat =  $_REQUEST['acc_lat'] ;
    $acc_long =  $_REQUEST['acc_long'] ;
    $date =  $_REQUEST['date'] ;
    $rate_id =  $_REQUEST['rate_id'] ;
    $email =  $_REQUEST['email'] ;
     
     
    // check if user is already existed with the same email
   
        // create a new user
    $db->addMarker($acc_id, $acc_title, $acc_description, $acc_lat, $acc_long, $date, $rate_id, $email);
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters request id is missing!";
    echo json_encode($response);
}
   
?>