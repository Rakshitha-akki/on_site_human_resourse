<?php
session_start();
 $projectid=$_REQUEST["projectid"];
 $projectname=urldecode($_REQUEST["projectname"]);
 $place=urldecode($_REQUEST["place"]);
 $engineer=urldecode($_REQUEST["engineer"]);
 $startdate=$_REQUEST["startdate"];
 $enddate=$_REQUEST["enddate"];
 $estimation=$_REQUEST["estimation"];
 $_SESSION["projectid"]=$projectid;
 $fromdate=$_SESSION["fromdate"];

 $todate=$_SESSION["todate"];
 $labour_array=array();
 $msg="";
//connect to db
$conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
//stmt is prepared statement object
//$stmt=$conn->prepare("select * from labour where labourid not in  (select labourid from allot where fromdate=? and todate=?)");
$stmt=$conn->prepare("select labourid,name,balance,phone from labour where labourid not in (select labourid from allot where labourid not in (select labourid from allotdates where (?  in (alloteddate)) and (?  in (alloteddate))))");
$stmt->bindparam(1,$fromdate);
$stmt->bindparam(2,$todate);
//excecute 
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
        <title> labour details</title>
    </head>
    <?php
            include'header_link.php';
         ?>
         <style>
            tr:hover{background-color:lavender;}
            
        </style>
    <body>
    <?php
            include'header.php';
         ?>
        <h3 style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:300px;
                    margin-right:300px;'>labour details</h3>
        <?php
        //find the length of array
        $len=count($labour_array);
        if($len>0)
        {
            echo "<form method='POST' action='setamount.php'>";
            
            echo "<table border=2 style='margin-left:auto; margin-right:auto;' >";
            echo "<tr  style='align:center;background-color:lightblue;padding:200px;'>";
            echo "<td style='text-align:center'> labour id</td>";
            echo "<td style='text-align:center'> name</td>";
            echo "<td style='text-align:center'> phone</td>";
            echo "<td style='text-align:center'> balance</td>";
            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$labour_array[$i]["labourid"];
                $b=$labour_array[$i]["name"];
                $c=$labour_array[$i]["phone"];
                $d=$labour_array[$i]["balance"];
                echo "<tr>";
                //echo "<td><a href=editlabour.php?labourid=$a&name=$b&phone=$c&balance=$d>$a</a></td>";
                echo "<td style='text-align:center'><input readonly name=labourid[] type=text value=".$labour_array[$i]["labourid"]."></td>";
                echo "<td style='text-align:center'><input readonly name=name[] type=text value=".$labour_array[$i]["name"]."></td>";
                echo "<td style='text-align:center'><input readonly name=phone[] type=text value=".$labour_array[$i]["phone"]."></td>";
                echo "<td style='text-align:center'><input readonly name=balance[] type=text value=".$labour_array[$i]["balance"]."></td>";
                $lid=$labour_array[$i]["labourid"];
                echo "<td style='text-align:center'> <input type=checkbox name=ckb[] value=$lid></td>";

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