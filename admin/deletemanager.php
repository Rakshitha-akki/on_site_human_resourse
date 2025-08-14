<?php
    $email=$_REQUEST["email"];
    $name=$_REQUEST["name"];
    $phone=$_REQUEST["phone"];
    $conn=new PDO("mysql:host=localhost;dbname=oshr","root", null);
    $stmt=$conn->prepare("delete from manager where email=?");
    $stmt->bindparam(1,$email);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
        {
            $msg="deletedsuccessful";
            header("location:adminoutput.php?msg=$msg");
    
        }
    else
        {
            $msg="deletion failed";
            header("location:adminoutput.php?msg=$msg");
    
        }
?>