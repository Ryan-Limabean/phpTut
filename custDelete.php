
<?php 
  require('connect.php');

?>

<?php
           $id = $_GET['id'];
           $remove = new mysql_database('localhost','root','','dvd_shop');
           $sql = "DELETE FROM customer WHERE id='$id' ";
           $remove->update($sql);
           header("Location: index.php?deleted=success");
           exit;
           
         
?>