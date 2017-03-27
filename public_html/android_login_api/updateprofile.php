<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_REQUEST['fname']) && isset($_REQUEST['lname'])&& isset($_REQUEST['address'])
    && isset($_REQUEST['phoneno'])&& isset($_REQUEST['email']) ) {
 
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $address = $_REQUEST['address'];
    $phoneno = $_REQUEST['phoneno'];
    $email = $_REQUEST['email'];
 
    $result = $db->updateprofile($fname,$lname,$address,$phoneno,$email);
    $response["error"] = FALSE;
    $response["error_msg"] = "update complete !!";
    echo json_encode($response);
        
    
}else {
    $response["error"] = TRUE;
    $response["error_msg"] = "update fail !!";
    echo json_encode($response);
}
?>