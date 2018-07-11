<?php 
  require('connect.php');


?>

<html>
    
    <body>
        <?php
            $id = $_GET['id'];
            $update = new mysql_database('localhost','root','','dvd_shop');
            $result = $update->fetch("SELECT * FROM orders WHERE id='$id'");
            $result2 = $update->fetch("SELECT id FROM customer");
            while ($row = $result->fetch_assoc()) {
         ?>


        <form method="post">
            
            <label>Customer ID:</label>
            <select name="cust_id">
            <option><?php echo $row['customer_id'];?></option>
            <?php
            
            while ($row2 = $result2->fetch_assoc()) {
            ?>

            <option><?php echo $row2['id'];?></option>
            

           <?php } ?>
           </select><br>
            

            <label>Rent Date:</label>
            <input  name="rent_date" type="date" value="<?= $row['rent_date'];?>" required><br>
            
            <label>Due Date:</label>
            <input  name="due_date" type="date" value="<?= $row['due_date'];?>" required><br>
            
            <label>Actual Return Date:</label>
            <input  name="actual_return_date" type="date" value="<?= $row['actual_return_date']; ?>" required><br>
            <input type="submit">

       <?php
        }
        ?>

        </form>

        <?php 
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // The request is using the POST method
            $customerId = $_POST["cust_id"];
            $rent_date = $_POST["rent_date"];
            $due_date = $_POST["due_date"];
            $actual_return_date= $_POST["actual_return_date"];
             $sql2 = "UPDATE orders  SET customer_id='$customerId', rent_date='$rent_date', due_date='$due_date', actual_return_date='$actual_return_date'  WHERE id='$id'";

             $update->update($sql2);
             header("Location: order.php?message=success");
             exit;
           }

        ?>
    </body>


</html>