<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?>
<?php
session_start();
$labourid_array = $_POST["ckb"];


//$_SESSION["labourid_array"]=$labourid_array;
$msg = "";
$len = count($labourid_array);
//echo "$labourid_array[0]<br>";

echo "<form method=POST action=insertpayment.php>";
echo "<table border=2 style='margin-left:auto; margin-right:auto;' >";
echo "<tr style='align:center;background-color:lightblue;padding:200px;'><td style='text-align:center'>Labourid</td>";
echo "<td style='text-align:center'>name</td>";
echo "<td style='text-align:center'>balance</td>";

echo "<td style='text-align:center'>paidamount</td>";
echo "</tr>";


//echo $checkedallotid_array[0]." ".$checkedallotid_array[1];
$len = count($labourid_array);
$name_array = [];
$balance_array = [];

$conn = new PDO("mysql:host=localhost;dbname=oshr", "root", null);
//fetch amount of each attended labour and keept them in array
for ($i = 0; $i < $len; $i++) {
    $stmt = $conn->prepare("select * from labour where labourid=?");
    $stmt->bindparam(1, $labourid_array[$i]);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($name_array, $row["name"]);
        array_push($balance_array, $row["balance"]);
    }
    // }
    //for($i=0;$i<$len;$i++)
    // { 
    echo "<tr style='align:center;background-color:lightblue;padding:200px;'>";
    echo "<td style='text-align:center'><input type=text value=$labourid_array[$i] name=labourid[] readonly></td>";
    echo "<td style='text-align:center'><input type=text value=$name_array[$i] name=name[] readonly></td>";

    echo "<td style='text-align:center'><input type=text value=$balance_array[$i] name=balance[] readonly></td>";

    echo "<td style='text-align:center'><input type=text name=paidamount[] required></td>";
    echo "</tr>";
}
echo "<tr style='align:center;background-color:lightblue;padding:200px;'>";
echo "<td style='text-align:center'><input type=submit name=next value=next></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
?>
<?php
            include'footer.php';
         ?>
