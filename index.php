
<?php 
  require_once('connect.php');
  
?>

<html> 
 <head>  
    <link rel="stylesheet" href="style.css">
 </head>

   <body>
   <h1>Customers</h1>

      <table>
        <tr><th>id</th><th>Name </th><th>Surname </th><th>Contact_number </th><th>email </th><th>sa_id_number </th><th>address</th><th>Actions</th></tr>

           <?php 
              $cust = new mysql_database('localhost','root','','dvd_shop');
              $result = $cust->fetch("SELECT * FROM customer");
              
              while ($row = $result->fetch_assoc()) {
                
             ?> 
                
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["fname"]?></td>
                <td><?php echo $row["surname"]?></td>                             
                <td><?php echo $row["contact_number"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["sa_id_number"]?></td>
                <td><?php echo $row["saddress"]?></td>
                <td><a href="custUpdate.php?id=<?php echo $row['id']?>">edit</a> <a href="custDelete.php?id=<?php echo $row['id']?>">delete</a></td></tr>



          <?php  } ?>
           
              
        
    
        </table>   

        <form action="addCust.php">
          <input  type="submit" value="Add Customer"> 
        </form>
            
                 <?php  
                       if(!empty($_GET['message'])) {
                          $message = $_GET['message'];
                          header( "refresh:2;url=index.php" );
                          echo "<h3>Customer Updated Successfully</h3>";
                       }

                       if(!empty($_GET['inserted'])) {
                        header( "refresh:2;url=index.php" );
                        echo "<h3>Customer Added Successfully</h3>";
                     }

                     if(!empty($_GET['deleted'])) {
                        header( "refresh:2;url=index.php" );
                        echo "<h3>Customer deleted Successfully</h3>";
                     }
                  ?>
    
   </body>

</html>