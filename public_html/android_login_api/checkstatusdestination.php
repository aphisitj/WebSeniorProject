<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array

 
if (isset($_REQUEST['email']) ) {
 
    // receiving the post params
     $email = $_REQUEST['email'] ;
 
     
     
    // check if user is already existed with the same email
    // if ($db->getUniqueId($uid)) {
              $result = $db->checkdestinationstatus($email);

              if($result){
                $response["error"] = FALSE;
    $response["error_msg"] = ":D";
    echo json_encode($response);
              }
              
    // } 
              else {
        $response["error"] = TRUE;
            $response["error_msg"] = "checkdestinationstatus error";
            echo json_encode($response);   
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (email or password) is missing!";
    echo json_encode($response);
}
?>