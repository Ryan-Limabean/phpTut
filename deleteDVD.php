
<?php 
  require('connect.php');

?>

<?php
           $id = $_GET['id'];
           $remove = new mysql_database('localhost','root','','dvd_shop');
           $sql = "DELETE FROM dvd WHERE id='$id' ";
           $remove->update($sql);
           header("Location: dvd.php?deleted=success");
           exit;
           
         
?>`