<?php


include_once dirname(__FILE__)."/Auth.php";
include_once dirname(__FILE__)."/Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

include_once dirname(__FILE__)."/authCookieSessionValidate.php";

if ($isLoggedIn) {
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}

if (!empty($_POST["login"])) {
    $isAuthenticated = false;
    
    $username = $_POST["member_name"];
    $password = $_POST["member_password"];

    $table = "reciever";
    $user = $auth->getMemberByUsername($table,$username);
    if (password_verify($password, $user[0]["pass"])) {
        $isAuthenticated = true;
    }
    
    if ($isAuthenticated) {
        $_SESSION["member_id"] = $user[0]["r_id"];
        $_SESSION["member_type"] = "";
        
        
        // Set Auth Cookies if 'Remember Me' checked
            setcookie("member_login", $username, $cookie_expiration_time);
            
            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);
            
            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            
            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
            
            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
            
            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username, 0);
            if (! empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            $type = 0;
            // Insert new token
            $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date, $type);
            //$msg = $username."  ".$random_password_hash."  ".$random_selector_hash." ".$expiry_date;
            $msg="Success";
            $color = 'color:green;';
           
        
        
        echo "<script type='text/javascript'>window.location.href='index.php'</script>";
        exit();
        
    } else {
        $msg = "Incorrect username or password";
        $color = 'color:red;';
    }
}
?>