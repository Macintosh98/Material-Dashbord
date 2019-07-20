<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION["active_admin"]))
{
    require_once('fp/required/settings.php');
    require_once('fp/required/database.php');
    require_once("header.php");
    ?><div class="main-panel"><?php
    require_once("content.php");
    require_once("footer.php"); 
    ?></div><?php
}else{ echo"unautharised accces";}
?>
</html>