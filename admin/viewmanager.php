<?php
require_once '../config.php';

$manager_array = array();
$msg = "";

//connect to db
$conn = getDatabaseConnection();
    //stmt is prepared statement object
    $stmt=$conn->prepare("select * from manager");
    //excecute 
    $stmt->execute();
    //check the number of rows and cols and return the value 
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($manager_array,$row);
        }
    }
    else
    {
        $msg="rows not found";
        header("location:adminoutput.php?msg=$msg");

    }

?>


<html>
    <head>
        <title> manager details</title>
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
                    margin-right:400px;'>manager details</h3>
        <?php
        //find the length of array
        $len=count($manager_array);
        if($len>0)
        {
            echo "<br>";
            echo "<table border=2 style='margin-left:auto; margin-right:auto;'>";
            echo "<tr style='align:center;'>";
            echo "<tr style='background-color:lightblue;padding:200px;'>";
            echo "<td style='text-align:center'>email</td>";
            echo "<td style='text-align:center'> name</td>";
            echo "<td style='text-align:center'> phone</td>";
            echo "<td style='text-align:center'> </td>";

            echo "<td></td>";
            
            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$manager_array[$i]["email"];
                $b=$manager_array[$i]["name"];
                $c=$manager_array[$i]["phone"];

                echo "<tr>";
                
                echo "<td style='text-align:center'>".$manager_array[$i]["email"]."</td>";
                echo "<td style='text-align:center'>".$manager_array[$i]["name"]."</td>";
                echo "<td style='text-align:center'>".$manager_array[$i]["phone"]."</td>";
                echo "<td style='text-align:center'><a href=editmanager.php?email=$a&name=$b&phone=$c><input type='submit' value='edit'></a></td>";
                echo "<td style='text-align:center'><a href=deletemanagerform.php?email=$a&name=$b&phone=$c><input type='submit' value='delete'></a></td>";

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
