<?php
session_start();
$fromdate=$_SESSION["fromdate"];
$todate=$_SESSION["todate"];
$projectid=$_REQUEST["projectid"];
//$projectname=urldecode($_REQUEST["projectname"]);
 
$labour_array=array();
$msg="";
//connect to db
$conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
//stmt is prepared statement object
$stmt=$conn->prepare("select alloteddate,allotdates.labourid,attendence,projectid,name from allotdates 
inner join labour on allotdates.labourid=labour.labourid where projectid=? and alloteddate between ? and ?");
//$stmt->bindparam(1,$workdate);
$stmt->bindparam(1,$projectid);
$stmt->bindparam(2,$fromdate);
$stmt->bindparam(3,$todate);

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
          <style>
            tr:hover{background-color:lavender;}
            
        </style>
    <body>
    <?php
            include'header.php';
         ?>
        <h3  style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:400px;
                    margin-right:400px;'>alloted labour details</h3>
        <?php
        //find the length of array
        $len=count($labour_array);
        
        if($len>0)
        {
           // echo "<form method='POST' action='insertattendence.php'>";
            
            echo "<table border=2 style='margin-left:auto; margin-right:auto;'>";
            echo "<tr style='align:center;background-color:lightblue;padding:200px;'>";
            echo "<td style='text-align:center'> work date</td>";
            echo "<td style='text-align:center'> labour id</td>";
            echo "<td style='text-align:center'> status</td>";
            echo "<td style='text-align:center'> project id</td>";
            echo "<td style='text-align:center'> Labour Name</td>";

            echo "<td> </td>";

            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$labour_array[$i]["alloteddate"];
                $b=$labour_array[$i]["labourid"];
                $c=$labour_array[$i]["attendence"];
                $d=$labour_array[$i]["projectid"];
                $d=$labour_array[$i]["name"];

                
              //  $f=$labour_array[$i]["todate"];

                echo "<tr>";
                //echo "<td><a href=editlabour.php?labourid=$a&name=$b&phone=$c&balance=$d>$a</a></td>";
                echo "<td style='text-align:center'><input readonly name=workdate[] type=text value=".$labour_array[$i]["alloteddate"]."></td>";
                echo "<td style='text-align:center'><input readonly name=labourid[] type=text value=".$labour_array[$i]["labourid"]."></td>";
                echo "<td style='text-align:center'><input readonly name=status[] type=text value=".$labour_array[$i]["attendence"]."></td>";
                echo "<td style='text-align:center'><input readonly name=projectid[] type=text value=".$labour_array[$i]["projectid"]."></td>";
                echo "<td style='text-align:center'><input readonly name=name[] type=text value=".$labour_array[$i]["name"]."></td>";
               // echo "<td><input readonly name=todate[] type=text value=".$labour_array[$i]["todate"]."></td>";

               // $lid=$labour_array[$i]["labourid"];
                //echo "<td> <input type=checkbox name=ckb[] value=".$labour_array[$i]["allotid"]."></td>";
               // echo "<td><input type=text name=balance[] value=".$labour_array[$i]["balance"]."></td>";

                echo "</tr>";
            }
            echo"</table>";
           // echo "<input type=submit value=submit />";
            echo "</form>";

        }
        //echo $msg;
    ?>
        <?php
            include'footer.php';
         ?>
    </body>
</html> 


