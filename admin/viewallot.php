<?php
session_start();
$projectid=$_REQUEST["projectid"];
$projectname=urldecode($_REQUEST["projectname"]);
 
$labour_array=array();
$msg="";
//connect to db
$conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
//stmt is prepared statement object
$stmt=$conn->prepare("select allotid,allot.labourid,name,projectid,fromdate,todate from allot 
inner join labour on allot.labourid=labour.labourid where  projectid=?");
//$stmt->bindparam(1,$workdate);
$stmt->bindparam(1,$projectid);

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
        <h3 style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:300px;
                    margin-right:300px;'>alloted labour details</h3>
        <?php
        //find the length of array
        $len=count($labour_array);
        
        if($len>0)
        {
           // echo "<form method='POST' action='insertattendence.php'>";
           echo "<br><br>";

            echo "<table border=2 style='margin-left:auto; margin-right:auto;' >";
            echo "<tr style='align:center;background-color:lightblue;padding:200px;'>";

            echo "<td style='text-align:center'> allot id</td>";
            echo "<td style='text-align:center'> labour id</td>";
            echo "<td style='text-align:center'> name</td>";
            echo "<td style='text-align:center'> project id</td>";
            echo "<td style='text-align:center'> fromdate</td>";
            echo "<td style='text-align:center'>todate</td>";

            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$labour_array[$i]["allotid"];
                $b=$labour_array[$i]["labourid"];
                $c=$labour_array[$i]["name"];
                $d=$labour_array[$i]["projectid"];
                $e=$labour_array[$i]["fromdate"];
                $f=$labour_array[$i]["todate"];

                echo "<tr>";
                //echo "<td><a href=editlabour.php?labourid=$a&name=$b&phone=$c&balance=$d>$a</a></td>";
                
                echo "<td style='text-align:center'><input readonly name=allallotid[] type=text value=".$labour_array[$i]["allotid"]."></td>";
                echo "<td style='text-align:center'><input readonly name=alllabourid[] type=text value=".$labour_array[$i]["labourid"]."></td>";
                echo "<td style='text-align:center'><input readonly name=name[] type=text value=".$labour_array[$i]["name"]."></td>";
                echo "<td style='text-align:center'><input readonly name=projectid[] type=text value=".$labour_array[$i]["projectid"]."></td>";
                echo "<td style='text-align:center'><input readonly name=fromdate[] type=text value=".$labour_array[$i]["fromdate"]."></td>";
                echo "<td style='text-align:center'><input readonly name=todate[] type=text value=".$labour_array[$i]["todate"]."></td>";

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


