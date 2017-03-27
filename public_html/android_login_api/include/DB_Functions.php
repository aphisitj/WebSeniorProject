<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {

    }

    /**unique_id
     * Storing new user
     * returns user details
     */
       public function addMarker( $acc_id, $acc_title, $acc_description, $acc_lat, $acc_long, $date, $rate_id, $email) {
  
        $stmt = $this->conn->prepare("INSERT INTO Accident( acc_id, acc_title, acc_description, acc_lat, acc_long, date, rate_id, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss",$acc_id, $acc_title, $acc_description, $acc_lat, $acc_long, $date, $rate_id, $email);
        if ($stmt === FALSE) {
            die($mysqli->error);
        }
        $result = $stmt->execute();
        $stmt->close();

    }
    public function storeUser( $email, $password,$phoneon) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        // $password = $hash["encrypted"]; // encrypted password
        $password = $password; // encrypted password
        $salt = $hash["salt"]; // salt

        // $sql = "INSERT INTO Informationusers(email, password,phoneon) VALUES( ". " \" ".$email. "\"".","."\"".$password."\"".")";
        $stmt = $this->conn->prepare("INSERT INTO Informationusers(email, password,phoneno,salt, unique_id) VALUES(?,?, ?,?,?)");
        $stmt->bind_param("sssss", $email, $password,$phoneon,$salt,$uuid);
        if ($stmt === FALSE) {
            die($mysqli->error);
        }
        $result = $stmt->execute();
        $stmt->close();

        //check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM Informationusers WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM Informationusers WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $passwordDB = $user['password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($password == $passwordDB) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        // $stmt = $this->conn->prepare("SELECT email from informationusers WHERE email = ?");
        // echo $email ;
        // $stmt->bind_param("s", $email);

        $sql = "SELECT * FROM `Informationusers` WHERE email = " . "\"".$email."\"";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // user existed 
            // $this->conn->close();
            return true;
        } else {
            // user not existed
            // $this->conn->close();
            return false;
        }

        // $stmt->execute();

        // $stmt->store_result();

        // if ($stmt->num_rows > 0) {
        //     // user existed 
        //     $stmt->close();
        //     return true;
        // } else {
        //     // user not existed
        //     $stmt->close();
        //     return false;
        // }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

    public function getFriendListByLoginId($loginId){

    	$sql="SELECT email, uid, fname , lname FROM friendlist join Informationusers on fid = unique_id where uid = \"" . $loginId ."\"";

        $result = $this->conn->query($sql);
        	
        if ($result->num_rows > 0) {
			return $result;
        } else {
        	return false;
        }
        
    }

    public function getUniqueId($uid){

        $sql="SELECT email FROM  Informationusers  where unique_id = \"" . $uid ."\"";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    public function getdestination($email){

        $sql="SELECT latdestination,lngdestination FROM  destination  where email = \"" . $email ."\"";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
        

    }

    public function checkpassword($email,$password){

        $sql="SELECT * FROM  Informationusers  where email = \"" . $email ."\" and password = \"" . $password ."\" ";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    public function getFriendNumber($friendemail){
    	$sql="SELECT   email,phoneno FROM Informationusers  where email = \"" . $friendemail ."\"";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }

        
    }

    public function getcheckfriendnumber($email){
        $sql="SELECT   friendnumber FROM friendnumbersms  where email = \"" . $email ."\"";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }

        
    }


    public function getLocationFriend($emailfriend){

        $sql="SELECT  latdestination,lngdestination,latcurrentlocation,lngcurrentlocation FROM destination  where email = \"" . $emailfriend ."\"";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
        
    }

    
  
   

    public function getInformation($email){

        $sql="SELECT    fname,lname,address,phoneno FROM Informationusers  where email = \"" . $email ."\"";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
        
    }

    public function friendrequest($loginId,$email){
    	

    	$sql="SELECT unique_id FROM Informationusers  where email = \"" . $email ."\"";
    	$result = $this->conn->query($sql);
        	
        if ($result->num_rows > 0) {

        	$row = mysqli_fetch_array($result);
        	$fId = $row["unique_id"];

			$stmt = $this->conn->prepare("INSERT INTO request(uid,fid) VALUES(?, ?)");
	        $stmt->bind_param("ss", $loginId, $fId);
	        if ($stmt === FALSE) {
	            die($mysqli->error);
	        }
	        $result = $stmt->execute();
	        $stmt->close();

	        if ($result) {
	            return true;
	        } else {
	            return false;
	        }
        } else {
        	return false;
        }


    }
    public function searchfriendrequest($email){
    	$sql="SELECT email FROM Informationusers  where email = \"" . $email ."\"";
    	$result = $this->conn->query($sql);
    	if ($result->num_rows > 0) {
			return true;
        } else {
        	return false;
        }

    }
    public function searchdestinationrequest($email){
        $statuscheck = 1 ;
        $sqlsearch ="SELECT description FROM destination  where  email = \"" . $email ."\" and status_destination = \"" . $statuscheck ."\" ";
        $result = $this->conn->query($sqlsearch);
     if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }

    }


    public function getAllMarker(){
        $sql="SELECT acc_id, acc_title, acc_description, acc_lat, acc_long, date, rate_id, email FROM Accident";

        $result = $this->conn->query($sql);
            
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
        
    } 
    
     public function checkrequest($loginId){
    	$sql="SELECT uid,email,fname,lname FROM request join Informationusers on request.uid = Informationusers.unique_id where status = 0 and fid = \"" . $loginId ."\"";
    	$result = $this->conn->query($sql);
    	if ($result->num_rows > 0) {
			return $result;
        } else {
        	return false;
        }
    }

    public function removerequest($loginId,$requestId){
    	$sql="DELETE FROM `request` WHERE uid =\"" . $requestId ."\" and status = 0 and fid = \"" . $loginId ."\"";
    	$result = $this->conn->query($sql);
    	if ($result) {
			return true;
        } else {
        	return false;
        }
    }

    public function updatestatus($loginId,$requestId){
    	$sql="UPDATE `request` SET status = 1 WHERE uid = \"" . $requestId ."\" and fid= \"" . $loginId ."\"" ;
    	$result = $this->conn->query($sql);
    	if ($result) {
			$this->insertfriendlist($loginId,$requestId);
			$this->insertfriendlist($requestId,$loginId);
			return true;
        } else {
        	return false;
        }

    }

   

    public function updateprofile($fname,$lname,$address,$phoneno,$email){    	

    	$sql= "UPDATE `Informationusers` SET `fname` = \"" . $fname ."\", 
    	`lname` = \"" . $lname ."\", `address` = \"" . $address ."\", 
    	 `phoneno` = \"" . $phoneno ."\" WHERE `email` = \"" . $email ."\"";
    	$result = $this->conn->query($sql);
    	if ($result) {
			return true;
        } else {
        	return false;
        }

    }

    public function checkdestinationstatus($email){    	

    	$sql="SELECT * FROM destination where status_destination = 1 and `email` = \"" . $email ."\"";
    	   $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

 public function checkemergencyuser($email){        

        $sql="SELECT * FROM emergencysms where status_emergency = 0 and `email` = \"" . $email ."\"";
           $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

 public function updatemergencyuser($email){       

        $sql= "UPDATE `emergencysms` SET `status_emergency` = 1 WHERE `email` = \"" . $email ."\"";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function updatedestinationstatus($email){    	

    	$sql= "UPDATE `destination` SET `status_destination` = 0 WHERE `email` = \"" . $email ."\"";
    	$result = $this->conn->query($sql);
    	if ($result) {
			return true;
        } else {
        	return false;
        }

    }


    public function updatecurdestination($email,$latcur,$lngcur){      

        $sql= "UPDATE `destination` SET `latcurrentlocation` = \"" . $latcur ."\", 
        `lngcurrentlocation` = \"" . $lngcur ."\" WHERE `email` = \"" . $email ."\"";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }


    public function removedestination($email){
    	$sql="DELETE FROM `destination` WHERE email =\"" . $email ."\"";
    	$result = $this->conn->query($sql);
    	if ($result) {
			return true;
        } else {
        	return false;
        }
    }
        public function insertfriendlist($loginId,$requestId){
            $stmt = $this->conn->prepare("INSERT INTO friendlist(uid, fid) VALUES(?, ?)");
            $stmt->bind_param("ss", $loginId, $requestId);
            if ($stmt === FALSE) {
                die($mysqli->error);
            }

            $result = $stmt->execute();
            $stmt->close();
            if ($result) {
                return true;
            } else {
                return false;
            }
    }
 

    public function insertdestination($email,$latdes,$lngdes,$latcur,$lngcur,$date,$description,$status){
			$stmt = $this->conn->prepare("INSERT INTO destination(email,latdestination,lngdestination,
                latcurrentlocation,lngcurrentlocation,latstart,lngstart,datedestination,description,status_destination)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	        $stmt->bind_param("ssssssssss",$email,$latdes,$lngdes,$latcur,$lngcur,$latcur,$lngcur,$date,$description,$status);

	        if ($stmt === FALSE) {
	            die($mysqli->error);
	        }

	        $result = $stmt->execute();
	        $stmt->close();
	        if ($result) {
	            return true;
	        } else {
	            return false;
	        }
    }


public function removefriendnumber($email){
        $sql="DELETE FROM `friendnumbersms` WHERE email =\"" . $email ."\"";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function addfriendnumber($email,$friendnumber,$friendemail){
            $stmt = $this->conn->prepare("INSERT INTO friendnumbersms(email,friendnumber,friendemail)VALUES (?, ?, ?)");

            $stmt->bind_param("sss",$email,$friendnumber,$friendemail);

            if ($stmt === FALSE) {
                die($mysqli->error);
            }

            $result = $stmt->execute();
            $stmt->close();
            if ($result) {
                return true;
            } else {
                return false;
            }
    }

        public function addemergencysms($email,$status_emergency,$url,$date_emergency){
            $stmt = $this->conn->prepare("INSERT INTO emergencysms(email,status_emergency,url,date_emergency)VALUES (?, ?, ?, ?)");

            $stmt->bind_param("ssss",$email,$status_emergency,$url,$date_emergency);

            if ($stmt === FALSE) {
                die($mysqli->error);
            }

            $result = $stmt->execute();
            $stmt->close();
            if ($result) {
                return true;
            } else {
                return false;
            }
    }


}
?>