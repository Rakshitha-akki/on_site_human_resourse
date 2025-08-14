<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?><?php
session_start();
//all labours of selected project
$alllabourid_array = $_POST["alllabourid"];
$allallotid_array = $_POST["allallotid"];
//only ticked labourid
//    $labourid_array=$_POST["ckb"];
$workdate = $_SESSION["workdate"];
$checkedallotid_array = $_POST["ckb"];
$projectid = $_SESSION["projectid"];
$status = "A";
$msg = "";
$c = 0;
$d = 0;

//echo $checkedallotid_array[0]." ".$checkedallotid_array[1];
$len = count($checkedallotid_array);
$amount_array = [];
$conn = new PDO("mysql:host=localhost;dbname=oshr", "root", null);
//fetch amount of each attended labour and keept them in array
for ($i = 0; $i < $len; $i++) {
     $stmt = $conn->prepare("select amount from allot where allotid=?");
     $stmt->bindparam(1, $checkedallotid_array[$i]);
     $stmt->execute();
     while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
          array_push($amount_array, $row["amount"]);
}

$len = count($alllabourid_array);
for ($i = 0; $i < $len; $i++) {


    /* $stmt = $conn->prepare("insert into attendence(allotid,workdate,labourid,status,projectid) values (?,?,?,?,?)");
     $stmt->bindparam(1, $allallotid_array[$i]);
     $stmt->bindparam(2, $workdate);
     $stmt->bindparam(3, $alllabourid_array[$i]);
     $stmt->bindparam(4, $status);
     $stmt->bindparam(5, $projectid);

     $stmt->execute();
*/
     $stmtupdate = $conn->prepare("update labour set balance=balance+? where labourid in(select labourid from allot where allotid=?)");
     $stmtupdate->bindParam(1, $amount_array[$i]);
     $stmtupdate->bindParam(2, $checkedallotid_array[$i]);
     $c = $stmtupdate->execute();
}


$len1 = count($checkedallotid_array);
for ($i = 0; $i < $len1; $i++) {
     $stmtupdate1 = $conn->prepare("update allotdates set attendence='P' where  allotid=? and alloteddate=?");
     $stmtupdate1->bindParam(1, $checkedallotid_array[$i]);
     $stmtupdate1->bindParam(2, $workdate);
    
     $d = $stmtupdate1->execute();
}
if ($d > 0) {
     $msg = "Attendance updated";
     header("location:manageroutput.php?msg=$msg");

} else {
     $msg = "Update attendance failed";
     header("location:manageroutput.php?msg=$msg");

}
?>
<?php
            include'footer.php';
?>


