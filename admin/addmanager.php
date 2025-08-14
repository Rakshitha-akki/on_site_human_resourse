<?php
require_once '../config.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$msg = "";

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$conn = getDatabaseConnection();
$stmt = $conn->prepare("insert into manager(name,email,phone,password) values(?,?,?,?)");
$stmt->bindparam(1, $name);
$stmt->bindparam(2, $email);
$stmt->bindparam(3, $phone);
$stmt->bindparam(4, $hashed_password);
$status = $stmt->execute();
if($status==1)
    {
        $msg="registration successful";
        header("location:adminoutput.php?msg=$msg");

    }
else
    {
        $msg="Duplicate registration failed";
        header("location:adminoutput.php?msg=$msg");

    }
//echo $msg;


//echo "sucessufull";
?>