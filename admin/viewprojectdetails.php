<?php
    $project_array=array();
    $msg="";
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
                    margin-left:400px;
                    margin-right:400px;'>project details</h3>
        <?php
        //find the length of array
        $len=count($project_array);
        if($len>0)
        {
            echo  "<br>";
            echo "<table border=2 style='margin-left:auto; margin-right:auto;'>";
            echo "<tr  style='align:center;'>";
            echo "<tr style='background-color:lightblue;padding:200px;'>";
            echo "<td  style='text-align:center'>project id</td>";
            echo "<td  style='text-align:center'> project name</td>";
            echo "<td  style='text-align:center'> place</td>";
            echo "<td  style='text-align:center'> engineer</td>";
            echo "<td  style='text-align:center'> start date</td>";
            echo "<td  style='text-align:center'> end date</td>";
            echo "<td  style='text-align:center'> estimation</td>";
            echo "<td></td>";



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
                //echo "<td><a href=editproject.php?projectid=$a&projectname=$b&place=$c&engineer=$d&startdate=$e&enddate=$f&estimation=$g>$a</a></td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["projectid"]."</td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["projectname"]."</td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["place"]."</td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["engineer"]."</td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["startdate"]."</td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["enddate"]."</td>";
                echo "<td  style='text-align:center'>".$project_array[$i]["estimation"]."</td>";
                //echo "<td><input type='submit' value='edit'</td>";

                echo "<td  style='text-align:center'><a href=editproject.php?projectid=$a&projectname=$b&place=$c&engineer=$d&startdate=$e&enddate=$f&estimation=$g> <input type='submit' value='edit'> </a></td>";
                echo "</tr>";
            }
           // echo "<input type='submit' value='edit'>";
            echo"</table>";

        }
        //echo $msg;
        ?>
        <?php
            include'footer.php';
         ?>
    </body>
</html>
