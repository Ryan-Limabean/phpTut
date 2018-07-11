<?php 
  require('connect.php');
?>


<html> 
 <head>  
    <link rel="stylesheet" href="style.css">
 </head>

   <body>
   <h1>DVDs</h1>

      <table>
        <tr><th>Name</th><th>Description</th><th>release_date</th><th>Category</th><th>Actions</th></tr>

           <?php 
              $dvds = new mysql_database('localhost','root','','dvd_shop');
              $result = $dvds->fetch("SELECT dvd.id, dvd.name, dvd.description, dvd.release_date, category.category_name FROM dvd INNER JOIN category ON dvd.category_id=category.id");
              
              while ($row = $result->fetch_assoc()) {
                
             ?> 
                
                </tr><td><?php echo $row["name"]?></td>
                <td><?php echo $row["description"]?></td>
                <td><?php echo $row["release_date"]?></td>                             
                <td><?php echo $row["category_name"]?></td>
                <td><a href="dvdEdit.php?id=<?php echo $row['id']?>">edit</a> <a href="deleteDVD.php?id=<?php echo $row['id']?>">delete</a></td></tr>
                
                


          <?php  } ?>
           
              
    
        </table>   
        <form action="addDVD.php">
          <input  type="submit" value="Add DVD"> 
        </form>
            

    
   </body>

</html>