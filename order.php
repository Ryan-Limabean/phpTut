<?php 
  require_once('connect.php');
  
?>

<html> 
 <head>  
    <link rel="stylesheet" href="style.css">
 </head>

   <body>
   <h1>Orders</h1>

      <table>
        <tr><th>id</th><th>Customer ID</th><th>DVDs</th><th>Rent date</th><th>Due date</th><th>Actual return date</th><th>Actions</th></tr>

           <?php 

              $order = new mysql_database('localhost','root','','dvd_shop');
              $result = $order->fetch("
              select * 
              from orders");
             
              while ($row = $result->fetch_assoc()) {
              
             ?> 
                
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["customer_id"]?></td>
                <td>
               
                      
               <?php $result2 = $order->fetch("SELECT * 
                                                from dvd_order 
                                                join dvd on dvd_order.dvd_id = dvd.id
                                                where order_id = ".$row['id'].""); 

                    while($row2 = $result2->fetch_assoc()) {

                 ?>
                      <li><?= $row2["name"] ?></li>

                   <?php } ?>


                </td>
                <td><?php echo $row["rent_date"]?></td>                             
                <td><?php echo $row["due_date"]?></td>
                <td><?php echo $row["actual_return_date"]?></td>
                <td>
                  <a href="updateOrder.php?id=<?= $row['id'] ?>">edit</a>
                  <br>
                  <a href="deleteOrder.php?id=<?php echo $row['id']?>">delete</a>
                </td>
              </tr>



          <?php  } ?>
           
              
        
  
        </table>   
        <form action="addOrder.php">
          <input  type="submit" value="Add Order"> 
        </form>
            
                 <?php  
                       if(!empty($_GET['message'])) {
                          $message = $_GET['message'];
                          header( "refresh:2;url=order.php" );
                          echo "<h3>Order Edited Successfully</h3>";
                       }

                       if(!empty($_GET['inserted'])) {
                        header( "refresh:2;url=order.php" );
                        echo "<h3>Orer Added Successfully</h3>";
                     }

                     if(!empty($_GET['deleted'])) {
                        header( "refresh:2;url=order.php" );
                        echo "<h3>Order deleted Successfully</h3>";
                     }
                  ?>
    
   </body>

</html>