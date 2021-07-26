<?php
include_once dirname(__FILE__) . '/SignupbackendReciever.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sign up Reciever</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.png">
</head>

<body>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1><a href="index.php" rel="dofollow">Internshala-Blood-Bank</a></h1>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <span class="padding-bottom--15">Create New Reciever Account</span>
                            <form action="" method="post" id="frmLogin">

                                <div class="field padding-bottom--24">
                                    <input type="Name" name="name" placeholder="Name" required>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="email" name="email" placeholder="Email" required>
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
                                <div class="field padding-bottom--24">
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="password" name="repassword" placeholder="Confirm Password" required>
                                </div>


                                <?php
                                if (isset($msg)) {  // Check if $msg is not empty
                                    echo '<div style=' . $color . '>' . $msg . '</div>'; // Display our message and wrap it with a div with the class "statusmsg".
                                }
                                ?>

                        </div>
                        <div class="field padding-bottom--24">
                            <input type="submit" name="submit" value="Continue">
                        </div>
                        <div class="field field padding-bottom--24">
                                    <a class="ssolink" href="SignupHospital.php">Sign up as Hospital</a>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="footer-link padding-top--24">
                    <span>Already have an account? <a href="SigninReciever.php">Sign In</a></span>
                    <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
                    <span><a href="https://internshala.com/">Developed for Internshala</a></span>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    </div>

</body>

</html>