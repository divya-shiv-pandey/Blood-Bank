<?php
include_once dirname(__FILE__).'/DBController.php';

$DBController = new DBController();
$db_handle = new DBController();
$conn = $DBController->connectDB();

if (isset($_POST['donar']) && !empty($_POST['donar']) and isset($_POST['blood']) && !empty($_POST['blood'])) {
    $userid = $_SESSION["member_id"];
    $name = $conn->real_escape_string($_POST['donar']);
    $blood= $conn->real_escape_string($_POST['blood']);
    
    
    $query = "INSERT INTO blood (h_id, donar, bgroup) values (?, ?, ?)";
    $DBController->insert($query, 'sss', array($userid, $name, $blood));   
   
    $msg="Success";
    $color = 'color:green;';
    echo "<script type='text/javascript'>window.location.href='indexHospital.php'</script>";
    exit();
        
} else {
    
}

?>
