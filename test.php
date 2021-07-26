<html>
<head></head>

<body>

    <table name = "userDetails">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>email</th>
        </tr>
        <?php
      	include_once dirname(__FILE__).'\DBController.php';
        include_once dirname(__FILE__).'\Util.php';
          $util = new Util();
          $DBController = new DBController();
          $conn = $DBController->connectDB();
          
            $sql = "SELECT * FROM hospital";
            $result = mysqli_query($conn, $sql);
           
            if(mysqli_num_rows($result) > 0){
                while($data = mysqli_fetch_array($result))
                    {
        ?>

    <tr>
    <td><?php echo $data['h_id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>    
    <td><a href="edit.php?id=<?php echo $data['h_id']; ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $data['h_id']; ?>">Delete</a></td>
    </tr>	

        <?php
                }
            }
        ?>

    </table>

</body>
</html>
