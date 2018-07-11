<?php 
  require('connect.php');

?>



<html>
    <head></head>

    <body>
        <?php
            $id = $_GET['id'];
            $update = new mysql_database('localhost','root','','dvd_shop');
            $result = $update->fetch("SELECT dvd.name, dvd.description, dvd.release_date, category.category_name  FROM dvd INNER JOIN category ON dvd.category_id=category.id  WHERE dvd.id='$id'");
            while ($row = $result->fetch_assoc()) {
         ?>


        <form method="post">

            <label>Name</label>
            <input name="name" type="text"  value="<?= $row['name'];?>"    required><br>

            <label>Description</label>
            <input  name="desc" type="text"  value="<?= $row['description'];?>"   required><br>
            
            <label>Release Date</label>
            <input  name="rel_date" type="date" value="<?= $row['release_date'];?>"   required><br>
            
            <label>Category</label>
            <select name="category" >                   
               
                <option><?php echo $row['category_name'];?></option>";
                 
                 <?php
                 
                    $sql = "SELECT category_name  FROM category";
                    $result = $update->fetch($sql);
                    while ($r = $result->fetch_assoc()) {
                 ?>
                 <option><?php echo $r['category_name']?></option>
  
            <?php } ?>
            </select>  

            <input type="submit">

        </form>

       <?php
        }
        ?>


        <?php 
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // The request is using the POST method
            $name = $_POST["name"];
            $desc = $_POST["desc"];
            $rel_date = $_POST["rel_date"];
            $category = $_POST["category"];

             $sql2 = "UPDATE dvd SET name='$name', description='$desc', release_date='$rel_date',  category_id = (SELECT id FROM category WHERE category_name = '$category') WHERE id=$id";

             $update->update($sql2);
             header("Location: dvd.php?message=success");
             exit;
           }

        ?>
    </body>





</html>