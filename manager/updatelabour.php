<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?><?php
$labourid=$_POST["labourid"];
$name=$_POST["name"];
$phone=$_POST["phone"];
$balance=$_POST["balance"];
$msg="";
$conn=new PDO("mysql:host=localhost;dbname=oshr","root", null);
$stmt=$conn->prepare("update labour set name=?,phone=?,balance=? where labourid=?");
$stmt->bindparam(1,$name);
$stmt->bindparam(2,$phone);
$stmt->bindparam(3,$balance);
$stmt->bindparam(4,$labourid);

$stmt->execute();
$c=$stmt->rowCount();
if($c>0)
    {
        $msg="labour details updated successful";
        header("location:manageroutput.php?msg=$msg");

    }
else
    {
        $msg="failed to update labour details";
        header("location:manageroutput.php?msg=$msg");

    }
//echo $msg;
//echo " labour added sucessufull";
?>
<?php
            include'footer.php';
         ?>