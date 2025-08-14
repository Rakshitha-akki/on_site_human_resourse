<?php
    session_start();
    //$fromdate=$_POST["fromdate"];
   // $todate=$_POST["todate"];
    //$_SESSION["fromdate"]=$fromdate;
   // $_SESSION["todate"]=$todate;
    $msg="";
    $project_array=array();
    //connect to db
    $conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
    //stmt is prepared statement object
    $stmt=$conn->prepare("select * from project");
    //excecute 
    $stmt->execute();
    //check the number of rows and cols and return the value 
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($project_array,$row);
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
        <title> project details</title>
    </head>
    <?php
            include'header_link.php';
         ?>
   
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
                    margin-right:400px;'>project details</h3>
        <?php
        //find the length of array
        $len=count($project_array);
        if($len>0)
        {
            echo "<br><br>";

            echo "<table border=2 style='margin-left:auto; margin-right:auto;'>";
            echo "<tr style='align:center;'>";
            echo "<tr style='background-color:lightblue;padding:200px;'>";

            echo "<td style='text-align:center'>project id</td>";
            echo "<td style='text-align:center'> project name</td>";
            echo "<td style='text-align:center'> place</td>";
            echo "<td style='text-align:center'> engineer</td>";
            echo "<td style='text-align:center'> start date</td>";
            echo "<td style='text-align:center'> end date</td>";
            echo "<td style='text-align:center'> estimation</td>";


            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$project_array[$i]["projectid"];
                $b=urlencode($project_array[$i]["projectname"]);
                $c=urlencode($project_array[$i]["place"]);
                $d=urlencode($project_array[$i]["engineer"]);
                $e=$project_array[$i]["startdate"];
                $f=$project_array[$i]["enddate"];
                $g=$project_array[$i]["estimation"];

                echo "<tr>";
                echo "<td style='text-align:center'><a href=viewallot.php?projectid=$a&projectname=$b&place=$c&engineer=$d&startdate=$e&enddate=$f&estimation=$g>$a</a></td>";
               // echo "<td>".$project_array[$i]["projectid"]."</td>";
                echo "<td style='text-align:center'>".$project_array[$i]["projectname"]."</td>";
                echo "<td style='text-align:center'>".$project_array[$i]["place"]."</td>";
                echo "<td style='text-align:center'>".$project_array[$i]["engineer"]."</td>";
                echo "<td style='text-align:center'>".$project_array[$i]["startdate"]."</td>";
                echo "<td style='text-align:center'>".$project_array[$i]["enddate"]."</td>";
                echo "<td style='text-align:center'>".$project_array[$i]["estimation"]."</td>";
                echo "</tr>";
            }
            echo"</table>";

        }
        //echo $msg;
        ?>
        <?php
            include'footer.php';
         ?>
        
    </body>
</html>
