<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?><?php
$name=$_POST["name"];
$email=$_POST["email"];

$phone=$_POST["phone"];

$msg="";
$conn=new PDO("mysql:host=localhost;dbname=oshr","root", null);
$stmt=$conn->prepare("update manager set name=?,phone=? where email=?");
$stmt->bindparam(1, $name);
$stmt->bindparam(2,$phone);
$stmt->bindparam(3,$email);
//$stmt->bindparam(4, $password);
$stmt->execute();
$c=$stmt->rowCount();
if($c>0)
    {
        $msg="updatesuccessful";
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
<?php
            include'footer.php';
         ?>