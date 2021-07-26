<?php
require_once "Auth.php";
include dirname(__FILE__) . "/authCookieSessionValidate.php";
include_once dirname(__FILE__) . '/DBController.php';
     



if ($isLoggedIn) {
    if (!$isHospital) {

        $auth = new Auth();
        $DBController = new DBController();
        $conn = $DBController->connectDB();
        session_start();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            //initalize required vars
            $bloodid = $_GET["id"];
            $userid = $_SESSION["member_id"];
            $count = 0;
            //check for pre existing requests
            if ($result = $conn->query("SELECT * FROM requests where b_id = '$bloodid' and r_id = '$userid' ")) {
                $count = $result->num_rows;
            }
            //check for same blood group
            $reciever = $auth->getRecieverByid($userid);
            $bloodGroup = $auth->getHospitalByblood($bloodid);
            //if same blood group
            if ($reciever[0]["blood"] == $bloodGroup[0]["bgroup"]) {
            //if already exists
                if ($count == 0) {

                    $result = $auth->getHospitalByblood($bloodid);
                    $hospitalid = $result[0]["h_id"];
                    $query = "INSERT INTO requests (b_id, r_id, h_id) values (?, ?, ?)";
                    $DBController->insert($query, 'sss', array($bloodid, $userid, $hospitalid));
                    $msg = "<div style='text-align:center; color:Green;'>Blood Requested Successfully!</div>";
                }else{
                    $msg = "<div style='text-align:center; color:red;'>You have already requested this Blood </div>";
                }
            }else{
                $msg = "<div style='text-align:center; color:red;'>You can only place requests for ".$reciever[0]["blood"]." blood group.</div>";
                
            }
        }else{
            $msg = "<div style='text-align:center; color:red;'>Bad Request Id </div>";
        }
    } else {
        $onclick=' "type='."'".'text/javascript'."'".'>window.location.href ='."'".'index.php'."'".'  " ';
        $msg = "<div style='text-align:center; color:red;'>Hospitals cannot request blood, Sign in as reciever</div>
        <div style='margin-top: 35px;'>
        <button id='signin' type='button' class='button' onclick=".$onclick.">Logout</button>
        <script type='text/javascript'>
           document.getElementById('signin').onclick = function () {
          location.href = 'Logout.php';
        };
</script>  
      </div>";
       
    }
} else {
    echo "<script type='text/javascript'>window.location.href='SigninReciever.php'</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request Blood</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet" />
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="css/styleIndex.css" rel="stylesheet" />

    <link rel="icon" href="favicon.png">
</head>

<body>

    <div style=" max-width: 990px;  margin-left: auto; margin-right: auto;">
        <div class="tm-text-white tm-page-header-container">
            <h1 class="tm-page-header">Internshala-Blood-Bank</h1>
        </div>
        <div class="tm-main-content">

            <?php
            if (!$isLoggedIn) {
                echo "<script type='text/javascript'>window.location.href='SigninReciever.php'</script>";
            } else {
            ?>
                <div class="topnav">
                    <a  href="index.php">Home</a>
                    <a href="Logout.php">Logout</a>
                </div>
            <?php
            }
            ?>
            <section class="tm-section">
                <h2 class="tm-section-header"></h2>
                <div class="tm-responsive-table">               

                            <?php
                            if (isset($msg)) {  // Check if $msg is not empty
                                echo $msg; // Display our message and wrap it with a div with the class "statusmsg".
                            }
                            ?>               


            </section>

            <!-- About our cafe -->
            <section class="tm-section tm-section-small">
                <a class="tm-section-header margin-left: auto; margin-right: auto;" href="https://en.wikipedia.org/wiki/Blood_bank">About Blood Bank</a>
                <p>
                    A blood bank is a center where blood gathered as a result of blood donation is stored and preserved for later use in blood transfusion.
                    The term blood bank typically refers to a division of a hospital where the storage of blood product occurs and where proper testing is performed.
                </p>
                <p class="tm-mb-0">
                    However, it sometimes refers to a collection center, and some hospitals also perform collection.
                    Blood banking includes tasks related to blood collection, processing, testing, separation, and storage.
                </p>
            </section>
            <hr />
            <!-- Talk to us -->
        </div>
        <footer>
            <p class="tm-text-white tm-footer-text">
                <a href="https://internshala.com/" class="tm-footer-link">Developed for Internshala</a>
            </p>
        </footer>
    </div>
</body>

</html>