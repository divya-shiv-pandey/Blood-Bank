<?php
session_start();
include dirname(__FILE__) . "/authCookieSessionValidate.php";
include_once dirname(__FILE__) . '/Addblooddb.php';
if (!$isHospital) {
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Blood Sample</title>
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
                echo "<script type='text/javascript'>window.location.href='index.php'</script>";
            } else {
            ?>
                <div class="topnav">
                    <a  href="indexHospital.php">Home</a>
                    <a class="active" href="Addblood.php">Add Blood</a>
                    <a href="Hospitalrequests.php">Requests</a>
                    <a href="Logout.php">Logout</a>
                </div>
            <?php
            }
            ?>
            <section class="tm-section">
                <h2 class="tm-section-header">Add Blood Donor</h2>
                <div class="tm-responsive-table">
                    <div class="formbg">
                        <form action="" method="post" id="frmLogin">

                            <div class="field padding-bottom--24">
                                <input type="donar" name="donar" placeholder="Donor Name" required>
                            </div>
                            <div class="field padding-bottom--24">
                                <select style="width:100%; padding:1em;" id="blood" name="blood" aria-labelledby="Blood Group" required>
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>



                            <?php
                            if (isset($msg)) {  // Check if $msg is not empty
                                echo '<div style=' . $color . '>' . $msg . '</div>'; // Display our message and wrap it with a div with the class "statusmsg".
                            }
                            ?>


                            <div class="field padding-bottom--24">
                                <input type="submit" name="submit" value="Add Donor">
                            </div>
                    </div>


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