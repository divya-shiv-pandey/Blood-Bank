<?php
session_start();
include dirname(__FILE__)."/authCookieSessionValidate.php";
if(!$isHospital){
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
  }
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Requests</title>
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
    }else{
      ?>
      <div class="topnav">
        <a href="indexHospital.php">Home</a>
        <a href="Addblood.php">Add Blood</a>
        <a class="active" href="Hospitalrequests.php">Requests</a>
        <a href="Logout.php">Logout</a>
      </div>
      <?php
    }
    ?>

      

      <section class="tm-section">
        <h2 class="tm-section-header">Request for Blood</h2>
        <div class="tm-responsive-table">
          <table>
            <tr class="tm-tr-header">
            <th>Request ID</th>
            <th>Donor Name</th>
            <th>Reciever Name</th>
            <th>Blood Group</th>
            </tr>

            <?php
            include_once dirname(__FILE__) . '/DBController.php';
            include_once dirname(__FILE__) . '/Util.php';
            $util = new Util();
            $DBController = new DBController();
            $conn = $DBController->connectDB();
            $h_id = $_SESSION["member_id"];
            $result = $conn->query("SELECT requests.req_id, blood.donar ,reciever.name ,blood.bgroup FROM requests JOIN blood ON requests.b_id=blood.b_id JOIN reciever ON requests.r_id=reciever.r_id WHERE requests.h_id ='$h_id' ");
           

            if (mysqli_num_rows($result) > 0) {
              while ($data = mysqli_fetch_array($result)) {
            ?>

                <tr>
                  <td><?php echo $data['req_id']; ?></td>
                  <td><?php echo $data['donar']; ?></td>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['bgroup']; ?></td>
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
        <a class="tm-section-header margin-left: auto; margin-right: auto;"  href="https://en.wikipedia.org/wiki/Blood_bank" >About Blood Bank</a>
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