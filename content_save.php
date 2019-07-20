<?php
require_once('fp/required/settings.php');
require_once('fp/required/database.php');
$page=$_POST['from'];

if($page == "register_page")
{
        $username= $_POST["username"];
        $password= $_POST["password"];
        $name= $_POST["name"];
        $email= $_POST["email"];
        $mobile= $_POST["mobile"];
        $address= $_POST["address"];
        $access_control= $_POST["access_control"];

        $sql="INSERT INTO blog_admin(access_control,username,password,name,email,mobile,address) VALUES ('$access_control','$username','$password','$name','$email','$mobile','$address')";        
        if( dbQuery($sql) ) echo "correct";
}
else if($page == "addpost_page")
{
        $category= $_POST["category"];
        $pagename= $_POST["pagename"];
        $title= $_POST["title"];
        $publisher= $_POST["publisher"];
        $contents= $_POST["contents"];

        $sql="INSERT INTO blog(Category,Page_Name,Title,Publisher,Contents) VALUES ('$category','$pagename','$title','$publisher','$contents')";        
        if( dbQuery($sql) ) echo "correct";
}
?>