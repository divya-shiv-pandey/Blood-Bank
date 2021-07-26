<?php
include_once dirname(__FILE__).'/DBController.php';
session_start();
$DBController = new DBController();
$conn = $DBController->connectDB();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $userid = $_SESSION["member_id"];
    $blood = $conn->real_escape_string($_GET['id']);
    
    
    $query = "DELETE FROM blood WHERE b_id='$blood' and h_id='$userid'";
    $conn->query($query);

    $query = "DELETE FROM requests WHERE b_id='$blood' and h_id='$userid'";
    $conn->query($query);
     
    echo "<script type='text/javascript'>window.location.href='indexHospital.php'</script>";
    exit();
        
} else {
    echo "Request failed";
}

?>
