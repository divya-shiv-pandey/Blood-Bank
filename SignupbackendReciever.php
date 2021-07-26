<?php
include_once dirname(__FILE__).'/DBController.php';
include_once dirname(__FILE__).'/Util.php';
$util = new Util();
$DBController = new DBController();
$conn = $DBController->connectDB();
if (isset($_POST['name']) && !empty($_POST['name']) and isset($_POST['email']) && !empty($_POST['email']) and isset($_POST['blood']) && !empty($_POST['blood']) and isset($_POST['password']) && !empty($_POST['password']) and isset($_POST['repassword']) && !empty($_POST['repassword'])) {
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $pass = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
            $repass = password_hash($conn->real_escape_string($_POST['repassword']), PASSWORD_DEFAULT);
    
            $blood = $conn->real_escape_string($_POST['blood']);
            $c_hash = md5(rand(0, 1000));

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg = 'The email you have entered is invalid, please try again.';
                $color = 'color:red;';
            } elseif($pass==$repass){
                $msg = 'Passwords do not match';
                $color = 'color:red;';
            }else{
               // if (){
                if ($result = $conn->query("SELECT * FROM reciever WHERE email = '$email'")) {
                    $count = $result->num_rows;
                }
                if ($count == 0) {
                    $query = "INSERT INTO reciever (name, email, blood, pass) values (?, ?, ?, ?)";
                    $DBController->insert($query, 'ssss', array($name, $email, $blood, $pass));    

                   echo "<script type='text/javascript'>window.location.href='SigninReciever.php'</script>";
                    exit();
                   
                   // $util->redirect("SignIN.php");
                   
                }else{
                    $msg = 'Email already registered! Please Sign In';
                    $color = 'color:red;';
                }            
            }

}

?>