<?php
require "DBController.php";
class Auth {
    function getMemberByUsername($table,$username) {
        $db_handle = new DBController();
        $query = "Select * from ".$table." where email = ?";
        $result = $db_handle->runQuery($query, 's', array($username));
        return $result;
    }
    function getHospitalByblood($bloodid) {
        $db_handle = new DBController();
        $query = "Select * from blood where b_id = ?";
        $result = $db_handle->runQuery($query, 's', array($bloodid));
        return $result;
    }


    function getRecieverByid($userid) {
        $db_handle = new DBController();
        $query = "Select * from reciever where r_id = ?";
        $result = $db_handle->runQuery($query, 's', array($userid));
        return $result;
    }

    
	function getTokenByUsername($username,$expired) {
	    $db_handle = new DBController();
	    $query = "Select * from tbl_token_auth where username = ? and is_expired = ?";
	    $result = $db_handle->runQuery($query, 'si', array($username, $expired));
	    return $result;
    }
    
    function markAsExpired($tokenId) {
        $db_handle = new DBController();
        $query = "UPDATE tbl_token_auth SET is_expired = ? WHERE id = ?";
        $expired = 1;
        $result = $db_handle->update($query, 'ii', array($expired, $tokenId));
        return $result;
    }
    
    function insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date, $type) {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_token_auth (username, password_hash, selector_hash, expiry_date, type) values (?, ?, ?, ?, ?)";
        $result = $db_handle->insert($query, 'sssss', array($username, $random_password_hash, $random_selector_hash, $expiry_date, $type));
        if($result){
            return $result;
        }else{
           // $query = "UPDATE tbl_token_auth SET (is_expired, expiry_date) values ( ? , ?)";
          //  $result = $db_handle->update($query, 'ss', array( 0 , $expiry_date));
        }
        
    }
    
    function update($query) {
        mysqli_query($this->conn,$query);
    }
}
?>