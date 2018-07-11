<?php 
  require('connect.php');


?>



<html>
    <head></head>

    <body>
        <?php
            $id = $_GET['id'];
            $update = new mysql_database('localhost','root','','dvd_shop');
            $result = $update->fetch("SELECT * FROM customer WHERE id='$id'");
            while ($row = $result->fetch_assoc()) {
         ?>


        <form method="post">

            <label>Name</label>
            <input name="fname" type="text" value=<?php echo $row['fname']; ?> required><br>

            <label>Surname</label>
            <input  name="surname" type="text" value=<?php echo $row['surname']; ?> required><br>
            
            <label>Contact number:</label>
            <input  name="contact_number" type="text" value=<?php echo $row['contact_number']; ?> required><br>
            
            <label>Email</label>
            <input  name="email" type="text" value=<?php echo $row['email']; ?> required><br>

            <label>SA ID number:</label>
            <input  name="sa_id_number" type="text" value=<?php echo $row['sa_id_number']; ?> required><br>

            <label>Address</label>
            <input   name="address" type="text" value=<?php echo $row['saddress']; ?> required><br>

            <input type="submit">

       <?php
        }
        ?>

        </form>

        <?php 
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // The request is using the POST method
            $name = $_POST["fname"];
            $surname = $_POST["surname"];
            $contact_no = $_POST["contact_number"];
            $email = $_POST["email"];
            $id_no = $_POST["sa_id_number"];
            $address = $_POST["address"];

             $sql2 = "UPDATE customer  SET fname='$name', surname='$surname', contact_number='$contact_no', email='$email', sa_id_number='$id_no', saddress='$address'  WHERE id='$id'";

             $update->update($sql2);
             header("Location: index.php?message=success");
             exit;
           }

        ?>
    </body>





</html>