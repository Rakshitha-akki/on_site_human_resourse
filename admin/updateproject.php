<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?><?php
$projectid=$_POST["projectid"];
$projectname=$_POST["projectname"];
$place=$_POST["place"];
$engineer=$_POST["engineer"];
$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];
$estimation=$_POST["estimation"];
$msg="";

//update old data with new data
$conn=new PDO("mysql:host=localhost;dbname=oshr","root", null);
$stmt=$conn->prepare("update project set projectname=?,place=?,engineer=?,startdate=?,enddate=?,estimation=? where projectid=?");

$stmt->bindparam(1,$projectname);
$stmt->bindparam(2,$place);
$stmt->bindparam(3,$engineer);
$stmt->bindparam(4,$startdate);
$stmt->bindparam(5,$enddate);
$stmt->bindparam(6,$estimation);
$stmt->bindparam(7, $projectid);
$status=$stmt->execute();
$c=$stmt->rowCount();
if($c>0)
    {
        $msg="updated successful";
        header("location:adminoutput.php?msg=$msg");

    }
else
    {
        $msg="updation failed";
        header("location:adminoutput.php?msg=$msg");

    }
//echo $msg;
?>
<?php
            include'footer.php';
         ?>