<!DOCTYPE html>
<html lang="en">
<?php
session_start();
      if(isset($_SESSION["active_admin"]))
      {
            require_once('fp/required/settings.php');
            require_once('fp/required/database.php');
            include_once("header.php");
            include_once("content.php");
            include_once("footer.php"); 
      }else{ echo"unautharised accces";}
?>
</html>