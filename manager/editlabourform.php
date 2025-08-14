<?php
    $labour_array=array();
    $msg="";
    //connect to db
    $conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
    //stmt is prepared statement object
    $stmt=$conn->prepare("select * from labour");
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
    <body>
    <?php
            include'header.php';
         ?>
        <h3>labour details</h3>
        <?php
        //find the length of array
        $len=count($labour_array);
        if($len>0)
        {
            echo "<table border=1>";
            echo "<tr>";
            echo "<td> labour id</td>";
            echo "<td> name</td>";
            echo "<td> phone</td>";
            echo "<td> balance</td>";
            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=$labour_array[$i]["labourid"];
                $b=$labour_array[$i]["name"];
                $c=$labour_array[$i]["phone"];
                $d=$labour_array[$i]["balance"];
                echo "<tr>";
                echo "<td><a href=editlabour.php?labourid=$a&name=$b&phone=$c&balance=$d>$a</a></td>";
                //echo "<td>".$labour_array[$i]["labourid"]."</td>";
                echo "<td>".$labour_array[$i]["name"]."</td>";
                echo "<td>".$labour_array[$i]["phone"]."</td>";
                echo "<td>".$labour_array[$i]["balance"]."</td>";
                echo "</tr>";
            }
            echo"</table>";

        }
       // echo $msg;
        ?>
        <?php
            include'footer.php';
         ?>
    </body>
</html>
