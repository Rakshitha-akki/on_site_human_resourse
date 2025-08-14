<?php
    session_start();
    $workdate=$_POST["workdate"];
    $_SESSION["workdate"]=$workdate;
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
    
        <h3>project details</h3>
        <?php
        //find the length of array
        $len=count($project_array);
        if($len>0)
        {
            echo "<table border=1>";
            echo "<tr>";
            echo "<td>project id</td>";
            echo "<td> project name</td>";
            echo "<td> place</td>";
            echo "<td> engineer</td>";
            echo "<td> start date</td>";
            echo "<td> end date</td>";
            echo "<td> estimation</td>";


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
                echo "<td><a href=attendencelabour.php?projectid=$a&projectname=$b&place=$c&engineer=$d&startdate=$e&enddate=$f&estimation=$g>$a</a></td>";
               // echo "<td>".$project_array[$i]["projectid"]."</td>";
                echo "<td>".$project_array[$i]["projectname"]."</td>";
                echo "<td>".$project_array[$i]["place"]."</td>";
                echo "<td>".$project_array[$i]["engineer"]."</td>";
                echo "<td>".$project_array[$i]["startdate"]."</td>";
                echo "<td>".$project_array[$i]["enddate"]."</td>";
                echo "<td>".$project_array[$i]["estimation"]."</td>";
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
