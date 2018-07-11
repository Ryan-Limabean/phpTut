<?php 
  require('connect.php');

?>



<html>
    

    <body>


        <form method="post">

            <label>Name</label>
            <input name="fname" type="text"  required><br>

            <label>Surname</label>
            <input  name="surname" type="text"  required><br>
            
            <label>Contact number:</label>
            <input  name="contact_number" type="text" required><br>
            
            <label>Email</label>
            <input  name="email" type="text"  required><br>

            <label>SA ID number:</label>
            <input  name="sa_id_number" type="text"  required><br>

            <label>Address</label>
            <input   name="address" type="text" required><br>

            <input type="submit">

       
        </form>

        <?php 
          $add = new mysql_database('localhost','root','','dvd_shop');
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // The request is using the POST method
            $name = $_POST["fname"];
            $surname = $_POST["surname"];
            $contact_no = $_POST["contact_number"];
            $email = $_POST["email"];
            $id_no = $_POST["sa_id_number"];
            $address = $_POST["address"];

             $sql = "INSERT INTO  customer (fname,surname,contact_number,email,sa_id_number,saddress) VALUES ('$name', '$surname', '$contact_no', '$email','$id_no', '$address')";
             $add->update($sql);
             header("Location: index.php?inserted=success");
             exit;
             
           }

        ?>
    </body>





</html>