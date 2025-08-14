<?php
require_once '../config.php';

$name = $_POST["name"];
$phone = $_POST["phone"];
$msg = "";
$conn = getDatabaseConnection();
$stmt=$conn->prepare("insert into labour(name,phone) values (?,?)");
$stmt->bindparam(1,$name);
$stmt->bindparam(2,$phone);
$stmt->execute();
$c=$stmt->rowCount();
if($c>0)
    {
        $msg="labour added successful";
        header("location:manageroutput.php?msg=$msg");

    }
else
    {
        $msg=" failed to add labour";
        header("location:manageroutput.php?msg=$msg");

    }
//cho $msg;
//echo " labour added sucessufull";
?>