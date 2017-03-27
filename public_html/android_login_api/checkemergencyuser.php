<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array

 
if (isset($_REQUEST['email'])&&isset($_REQUEST['uid']) ) {
 
    // receiving the post params
     $email = $_REQUEST['email'] ;
      $uid = $_REQUEST['uid'] ;
   
     
     if($db->getUniqueId($uid)) {
       $result = $db->checkemergencyuser($email);

                if($result){
                  $response["error"] = FALSE;
      $response["error_msg"] = "checkemergency";
      echo json_encode($response);
                }
              
    // } 
                  else {
            $response["error"] = TRUE;
                $response["error_msg"] = "checkemergency error";
                echo json_encode($response);   
        }
     }else {
        $response["error"] = TRUE;
            $response["error_msg"] = "mm checkemergency error";
            echo json_encode($response);   
    }
    // check if user is already existed with the same email
    // if ($db->getUniqueId($uid)) {
             
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>