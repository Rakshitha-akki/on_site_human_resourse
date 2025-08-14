<?php
session_start();
//all labours of selected project
$alllabourid_array = $_POST["labourid"];
$paiddate = $_SESSION["paiddate"];
$msg = "";
$paidamount = $_POST["paidamount"];


$conn = new PDO("mysql:host=localhost;dbname=oshr", "root", null);
$len = count($alllabourid_array);
for ($i = 0; $i < $len; $i++) {
    $stmt = $conn->prepare("insert into payment(paiddate,labourid,paidamount) values (?,?,?)");
    $stmt->bindparam(1, $paiddate);
    $stmt->bindparam(2, $alllabourid_array[$i]);
    $stmt->bindparam(3, $paidamount[$i]);
    $a=$stmt->execute();
     if ($a == 1) {
        $stmtupdate = $conn->prepare("update labour set balance=balance-? where labourid =?");
        $stmtupdate->bindParam(1, $paidamount[$i]);
        $stmtupdate->bindParam(2, $alllabourid_array[$i]);
        $c = $stmtupdate->execute();
        if ($c > 0) {
            $msg = "payment updated successful";
            header("location:manageroutput.php?msg=$msg");

        } else {
            $msg = "payment updation failed ";
            header("location:manageroutput.php?msg=$msg");

        }
    } else {
        $msg = "payment updation failed ";
        header("location:manageroutput.php?msg=$msg");

    }
}
//echo $msg;
