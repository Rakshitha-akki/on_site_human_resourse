<?php
//$projectid=$_POST["projectid"];
$projectname=$_POST["projectname"];
$place=$_POST["place"];
$engineer=$_POST["engineer"];
$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];
$estimation=$_POST["estimation"];
$msg="";
$conn=new PDO("mysql:host=localhost;dbname=oshr","root", null);
$stmt=$conn->prepare("insert into project(projectname,place,engineer,startdate,enddate,estimation) values (?,?,?,?,?,?)");
//$stmt->bindparam(1, $projectid);
$stmt->bindparam(1,$projectname);
$stmt->bindparam(2,$place);
$stmt->bindparam(3,$engineer);
$stmt->bindparam(4,$startdate);
$stmt->bindparam(5,$enddate);
$stmt->bindparam(6,$estimation);
$stmt->execute();
$c=$stmt->rowCount();
if($c>0)
    {
        $msg="project added successful";
        header("location:manageroutput.php?msg=$msg");

    }
else
    {
        $msg="Duplicate registration failed";
        header("location:manageroutput.php?msg=$msg");

    }
//echo $msg;
//echo " project added sucessufull";
?>