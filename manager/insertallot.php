<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?><?php
session_start();
$labourid_array = $_POST["labourid"];
$fromdate = $_SESSION["fromdate"];
$todate = $_SESSION["todate"];
$projectid = $_SESSION["projectid"];
$msg = "";
$amount = $_POST["amount"];
//echo "$labourid_array[0]<br>";
// echo "$fromdate<br>";
//echo "$todate<br>";
//echo "$projectid";
$f=new DateTime($fromdate);
     $t=new DateTime($todate);
     $difference=$t->diff($f);
     $days=$difference->d;
     
$conn = new PDO("mysql:host=localhost;dbname=oshr", "root", null);
$len = count($labourid_array);
for ($i = 0; $i < $len; $i++) {
     $stmt = $conn->prepare("insert into allot(projectid,labourid,fromdate,todate,amount) values (?,?,?,?,?)");
     $stmt->bindparam(1, $projectid);
     $stmt->bindparam(2, $labourid_array[$i]);
     $stmt->bindparam(3, $fromdate);
     $stmt->bindparam(4, $todate);
     $stmt->bindparam(5, $amount[$i]);
     $stmt->execute();
     $allotid=$conn->lastInsertId();
     $x=$fromdate;
     $attendence="A";
     //use loop to insert for each labour into allotddates table
     for($j=1;$j<=$days+1; $j++)
     {
          $stmt1=$conn->prepare("insert into allotdates (labourid,alloteddate,projectid,attendence,allotid) values(?,?,?,?,?)");
          $stmt1->bindParam(1,$labourid_array[$i]);
          $stmt1->bindParam(2,$x);
          $stmt1->bindParam(3,$projectid);
          $stmt1->bindParam(4,$attendence);
          $stmt1->bindParam(5,$allotid);
          $stmt1->execute();
          $x=date('Y-m-d',strtotime($x. ' + 1 days'));

     }
     $c = $stmt->rowCount();
}
if ($c > 0) {
     $msg = "alloted successful";
     header("location:manageroutput.php?msg=$msg");

} else {
     $msg = "allocation failed";
     header("location:manageroutput.php?msg=$msg");

}
//echo $msg;
?>
<?php
            include'footer.php';
         ?>
