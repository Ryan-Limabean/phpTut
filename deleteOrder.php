
<?php 
  require('connect.php');

?>

<?php
           $id = $_GET['id'];
           $remove = new mysql_database('localhost','root','','dvd_shop');
           $sql = "DELETE FROM orders WHERE id='$id'";
           $remove->update($sql);
           header("Location: order.php?deleted=success");
           exit;
           
         
?>`