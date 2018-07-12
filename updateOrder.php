<?php 
  require('connect.php');


?>

<html>
    
    <body>
        <?php
            $id = $_GET['id'];
            $update = new mysql_database('localhost','root','','dvd_shop');
            $result = $update->fetch("SELECT customer.id, orders.*
            from orders
            inner join customer 
            on orders.customer_id = customer.id 
            where orders.id = $id
            ");
            $result2 =  $update->fetch("SELECT * from customer");

            while ($row = $result->fetch_assoc()) {
         ?>


        <form method="post">
            
            <label>Customer ID:</label>
            <select name="cust_id">
            <option><?= $row['customer_id'];?></option>
            <?php
            
            while ($row2 = $result2->fetch_assoc()) {
                if($row2['id']!=$row["customer_id"]){
            ?>
            

            <option name="c_id"><?php echo $row2['id'];?></option>
            
           <?php
                }
            }  
        

          ?>

           </select></br>

            <label>DVDs rented:</label>
           

        
               <?php $result = $update->fetch("SELECT *
                                                from dvd_order 
                                                join dvd on dvd_order.dvd_id = dvd.id
                                                where order_id = $id"); 
                          
                
                        

                     $array = array();
                     $array2= array();
                     $arrayId =array();
                     $idCount = 0;
                     $i=0;
                     $i2 = 0;
                     $num=0;
                     $result5 = $update-> fetch("SELECT * from dvd");

                
                     while ($row4 = $result5->fetch_assoc() ){
                          $array[$i]=$row4["name"];
                          $arrayId[$i]=$row4["id"];
                          $i++;
                     }

                     while ($row3 = $result->fetch_assoc() ){
                        $array2[$i2]=$row3["name"];
                        $i2++;
                       }

                      
                    foreach($array as $x){
                    
                            if($num<count($array2)){
                                    if($x==$array2[$num]){
                                         $num++;
                                    ?>
                                    <input type="checkbox" name="check[]" value="<?= $arrayId[$idCount] ?>" checked ><?= $x ?><br>
                                   
                                <?php
                                    }
                                    else{
                                        ?>
                                    <input type="checkbox" name="check[]"   value="<?= $arrayId[$idCount]  ?>" ><?= $x ?><br>
                                    
                                        <?php
                                    }
                                }       
                            else{
                                    ?>
                                <input type="checkbox" name="check[]"   value="<?= $arrayId[$idCount]  ?>" ><?= $x ?><br>
                                
                                    <?php
                                }
                            
                       $idCount++;
                    }  

                  
            ?>  
            </select>  
                    
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

        
            $update->update("UPDATE orders  SET customer_id='$customerId', rent_date='$rent_date', due_date='$due_date', actual_return_date='$actual_return_date'  WHERE id='$id'");
            
          
            $update->update("DELETE FROM dvd_order WHERE order_id ='$id'");
            

            foreach($_POST['check'] as $dvd_id){
                $dvd_order =  $update->update("INSERT INTO dvd_order(order_id, dvd_id) VALUES ('$id','$dvd_id');");
            }


             header("Location: order.php?message=success");
             exit;
           }
        ?>

    </body>


       
</html>