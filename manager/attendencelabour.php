<?php
session_start();
$projectid=$_REQUEST["projectid"];
$projectname=urldecode($_REQUEST["projectname"]);
$_SESSION["projectname"]=$projectname;
$_SESSION["projectid"]=$projectid;


$workdate=$_SESSION["workdate"];
$labour_array=array();
$msg="";
//connect to db
$conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
//stmt is prepared statement object
//$stmt=$conn->prepare("select allotid,allot.labourid,name,projectid,fromdate,todate from allot inner join labour on allot.labourid=labour.labourid where ? between fromdate and todate and projectid=?");
$stmt=$conn->prepare("select allotdates.allotid,allotdates.labourid,name,allotdates.projectid from allotdates inner join labour on allotdates.labourid=labour.labourid where alloteddate=?  and projectid=? and attendence='A'");

$stmt->bindparam(1,$workdate);
$stmt->bindparam(2,$projectid);

$stmt->execute();
//check the number of rows and cols and return the value 
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($labour_array,$row);
        }
    }
    else
    {
        $msg="rows not found";
        header("location:manageroutput.php?msg=$msg");

    }

?>
<html>
    <head>
        <title> alloted labour</title>
    </head>
    <?php
            include'header_link.php';
         ?>
    <body>
    <?php
            include'header.php';
         ?>
        <h3>alloted labour details</h3>
        <?php
        //find the length of array
        $len=count($labour_array);
        if($len>0)
        {
            echo "<form method='POST' action='insertattendence.php'>";
            
            echo "<table border=1>";
            echo "<tr>";
            echo "<td> allot id</td>";
            echo "<td> labour id</td>";
            echo "<td> name</td>";
            echo "<td> project id</td>";
            echo "<td>Mark Attendence</td>";
            
             
            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$labour_array[$i]["allotid"];
                $b=$labour_array[$i]["labourid"];
                $c=$labour_array[$i]["name"];
                $d=$labour_array[$i]["projectid"];
                 echo "<tr>";
                //echo "<td><a href=editlabour.php?labourid=$a&name=$b&phone=$c&balance=$d>$a</a></td>";
                echo "<td><input readonly name=allallotid[] type=text value=".$labour_array[$i]["allotid"]."></td>";
                echo "<td><input readonly name=alllabourid[] type=text value=".$labour_array[$i]["labourid"]."></td>";
                echo "<td><input readonly name=name[] type=text value=".$labour_array[$i]["name"]."></td>";
                echo "<td><input readonly name=projectid[] type=text value=".$labour_array[$i]["projectid"]."></td>";
                
                $lid=$labour_array[$i]["labourid"];
                echo "<td> <input type=checkbox name=ckb[] value=".$labour_array[$i]["allotid"]."></td>";
               // echo "<td><input type=text name=balance[] value=".$labour_array[$i]["balance"]."></td>";

                echo "</tr>";
            }
            echo"</table>";
            echo "<input type=submit value=submit />";
            echo "</form>";

        }
        //echo $msg;
    ?>
        <?php
            include'footer.php';
         ?>
    </body>
</html> 


