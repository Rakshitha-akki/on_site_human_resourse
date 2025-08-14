<?php
    $labour_array=array();
    $msg="";
    //connect to db
    $conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
    //stmt is prepared statement object
    $stmt=$conn->prepare("select * from labour");
    //excecute 
    $status=$stmt->execute();
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
                    margin-left:400px;
                    margin-right:400px;'>labour details</h3>
        <?php
        //find the length of array
        $len=count($labour_array);
        if($len>0)
        {
            echo "<br><br>";
            echo "<table border=2 style='margin-left:auto; margin-right:auto;' >";
            echo "<tr style='align:center;'>";
            echo "<tr style='background-color:lightblue;padding:200px;'>";
            echo "<td style='text-align:center'> labour id</td>";
            echo "<td style='text-align:center'> name</td>";
            echo "<td style='text-align:center'> phone</td>";
            echo "<td style='text-align:center'> balance</td>";
            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                echo "<tr>";
                echo "<td style='text-align:center'>".$labour_array[$i]["labourid"]."</td>";
                echo "<td style='text-align:center'>".$labour_array[$i]["name"]."</td>";
                echo "<td style='text-align:center'>".$labour_array[$i]["phone"]."</td>";
                echo "<td style='text-align:center'>".$labour_array[$i]["balance"]."</td>";
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
?>