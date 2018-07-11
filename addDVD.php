
<?php 
  require_once('connect.php');
?>



<?php
         $addDvd = new mysql_database('localhost','root','','dvd_shop');
         $sql = "SELECT category_name FROM category";        
         $result = $addDvd-> fetch($sql);
?>


<html>
    

    <body>


        <form method="post">

            <label>Name</label>
            <input name="name" type="text"  required><br>

            <label>Description</label>
            <input  name="desc" type="text"  required><br>
            
            <label>Release Date</label>
            <input  name="rel_date" type="date" required><br>
            
            <label>Category</label>
            <select name="category"><br>
               <?php
                     while ($row = $result->fetch_assoc()) {
                         ?>
               
                 <option> <?php echo $row['category_name']?></option>";

                        <?php } ?>
            </select>         


            <input type="submit">

       
        </form>

        <?php 
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // The request is using the POST method
            $name = $_POST["name"];
            $desc = $_POST["desc"];
            $rel_date = $_POST["rel_date"];
            $category = $_POST["category"];
    
            $sql = "INSERT INTO  dvd (name, description, release_date, category_id) SELECT '$name', '$desc', '$rel_date', id FROM category WHERE category_name = '$category'";
            $addDvd->update($sql);
            header("Location: dvd.php?inserted=success");
            exit;
           }

        ?>
    </body>





</html>