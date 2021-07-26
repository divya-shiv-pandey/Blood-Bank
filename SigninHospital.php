<?php session_start(); ?>
<?php
include_once dirname(__FILE__) . '/SigninbackendHospital.php';
  $included_files = get_included_files();

     foreach ($included_files as $filename) {
    echo "$filename\n";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Hospital Sign up</title>
    <link rel="stylesheet" href="css/styleHospital.css">
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
                            <span class="padding-bottom--15">Sign in as hospital</span>
                            <form action="" method="post" id="frmLogin">
                                <div class="field padding-bottom--24">
                                    <input type="email" name="member_name" placeholder="Email" value="<?php if (isset($_COOKIE["member_login"])) {
                                                                                                            echo $_COOKIE["member_login"];
                                                                                                        } ?>">
                                </div>
                                <div class="field padding-bottom--24">
                                    <div class="grid--50-50">
                                    </div>
                                    <input type="password" name="member_password" placeholder="Password" value="<?php if (isset($_COOKIE["member_password"])) {
                                                                                                                    echo $_COOKIE["member_password"];
                                                                                                                } ?>">
                                </div>
                                <?php
                                if (isset($msg)) {  // Check if $msg is not empty
                                    echo '<div style=' . $color . '>' . $msg . '</div>'; // Display our message and wrap it with a div with the class "statusmsg".
                                }
                                ?>
                            
                                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                                    <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked<?php } ?>>
                                    <label for="checkbox">Stay signed in for a week</label>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="submit" name="login" value="Login">
                                </div>
                                <div class="field">
                                    <a class="ssolink" href="SigninReciever.php">Sign in as Reciever</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer-link padding-top--24">
                        <span>Don't have an account? <a href="SignupHospital.php">Sign up</a></span>
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