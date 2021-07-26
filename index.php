<?php
session_start();
include dirname(__FILE__) . "/authCookieSessionValidate.php";
if ($isHospital) {
  echo "<script type='text/javascript'>window.location.href='indexHospital.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Internshala-Blood-Bank</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet" />
  <link href="fontawesome/css/all.min.css" rel="stylesheet" />
  <link href="css/styleIndexReciever.css" rel="stylesheet" />
  <link rel="icon" href="favicon.png">
</head>

<body>

  <div style=" max-width: 990px;  margin-left: auto; margin-right: auto;">
    <div class="tm-text-white tm-page-header-container">
      <h1 class="tm-page-header">Internshala-Blood-Bank</h1>

      <?php
      include_once dirname(__FILE__) . '/DBController.php';
      include_once dirname(__FILE__) . '/Util.php';
      include_once dirname(__FILE__) . '/Auth.php';
      

    
      $util = new Util();
      $DBController = new DBController();
      $conn = $DBController->connectDB();
      $auth = new Auth();

      if (!empty($_SESSION["member_id"])) {
        $userid = $_SESSION["member_id"];

        $reciever = $auth->getRecieverByid($userid);
        $username = $reciever[0]["name"];
      }
      if (isset($username)) {  // Check if $msg is not empty
        echo '<div style="tm-section-header; margin-bottom: 25px;">' . "Welcome " . $username . '</div>'; // Display our message and wrap it with a div with the class "statusmsg".
      }
      ?>

    </div>

    <div class="tm-main-content">
      <?php
      if (!$isLoggedIn) {
      ?>
        <div class="topnav">
          <a class="active" href="index.php">Home</a>
          <a href="SigninReciever.php">Login</a>
          <a href="SigninHospital.php">Hospital</a>
        </div>

      <?php
      } else {
      ?>
        <div class="topnav">
          <a class="active" href="index.php">Home</a>
          <a href="Logout.php">Logout</a>
        </div>
      <?php
      }

      ?>



      <section class="tm-section">
        <h2 class="tm-section-header">Available Blood Samples</h2>
        <div class="tm-responsive-table">
          <table>
            <tr class="tm-tr-header">
              <th>Hospital</th>
              <th>Blood group</th>
              <th>Request</th>
            </tr>

            <?php
            $sql = "SELECT blood.b_id ,hospital.name ,blood.bgroup FROM blood JOIN hospital ON blood.h_id=hospital.h_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($data = mysqli_fetch_array($result)) {
            ?>

                <tr>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['bgroup']; ?></td>
                  <td><button class="button"><a style="color: white;" href="Request.php?id=<?php echo $data['b_id']; ?>">Request</a></button></td>
                </tr>

            <?php
              }
            }
            ?>
          </table>
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