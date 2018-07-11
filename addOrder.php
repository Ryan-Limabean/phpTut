<?php 
  require_once('connect.php');
  
?>


<?php
    $order = new mysql_database('localhost','root','','dvd_shop');


?>

<html>
 <head>  
    <link rel="stylesheet" href="style.css">
    <h1>Order Dvds:</h1>
 </head>

 <body>

        <form method="post">
       
           <label>Customer Id</label><br>
           <select name="cust_id">
              <?php  
                $result = $order->fetch("SELECT id FROM customer"); 
                while ($row = $result->fetch_assoc()) {
             ?> 
            <!-- fetching all dvd available from DB -->
                
                 <option name="<?php echo $row['id'] ?>" ><?php echo $row['id'] ?></option><br>
             

           <?php }  ?>
           </select><br>
              
            <label>Which Dvds would you like to order?</label><br> 

             <?php  
                $result = $order->fetch("SELECT * FROM dvd"); 
                while ($row = $result->fetch_assoc()) {
             ?> 
            <!-- fetching all dvd available from DB -->

            <input type="checkbox" name="dvd[]" value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?><br>

           <?php }  ?>
    
           <label>Due Date</label>
            <input  name="due" type="date"  required><br>

            
            <label>Rent Date</label>
            <input  name="rent_date" type="date" required><br>

            <label>Actual return date</label>
            <input  name="actualR_date" type="date" required><br>
          
        
            <input type="submit">
            <!-- playing with git -->

        </form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// The request is using the POST method
  

    $customer_id = $_POST["cust_id"];
    $due = $_POST["due"];
    $rent = $_POST["rent_date"];
    $actDue = $_POST["actualR_date"];


    $sql =  "INSERT INTO orders(customer_id, due_date, rent_date, actual_return_date) VALUES('$customer_id','$due','$rent','$actDue')";
    $order->update($sql); 

    

    foreach($_POST['dvd'] as $dvd){
        $dvd_order = $order->update("INSERT INTO dvd_order (dvd_id, order_id) VALUES ('$dvd', (SELECT MAX(id) FROM orders WHERE customer_id=$customer_id))");
    }
    header("Location: order.php");
    exit;
}





?>

     




 </body>







</html>