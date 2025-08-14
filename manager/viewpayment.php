<?php
    session_start();
    $paiddate=$_POST["paiddate"];
    $payment_array=array();
    $_SESSION["paiddate"]=$paiddate;
    $msg="";
 
    //connect to db
    $conn=new PDO("mysql:host=localhost;dbname=oshr","root",null);
    //stmt is prepared statement object
    $stmt=$conn->prepare("select * from payment where paiddate=?");
    $stmt->bindparam(1,$paiddate);

    //excecute 
    $status=$stmt->execute();
    //check the number of rows and cols and return the value 
    $c=$stmt->rowCount();
    

?>


<html>
    <head>
        <title> payment details</title>
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
        <h3>payment details</h3>
        <?php
         $c=$stmt->rowCount();
         if($c>0)
         {
             while($row=$stmt->fetch(PDO::FETCH_ASSOC))
             {
                 array_push($payment_array,$row);
             }
         }
         else
         {
             $msg="rows not found";
             header("location:manageroutput.php?msg=$msg");

         }
     
     
             //find the length of array
             $len=count($payment_array);
             if($len>0)
             {
                echo "<br>";
                 echo "<table border=2 style='margin-left:auto; margin-right:auto;'>";
                 echo "<tr style='align:center;'>";

                 echo "<tr style='background-color:lightblue;padding:200px;'>";
                 echo "<td style='text-align:center'>pay id</td>";
                 echo "<td style='text-align:center'>paid date</td>";
                 echo "<td style='text-align:center'>labour id</td>";
                 echo "<td style='text-align:center'>paid amount</td>";
     
     
                 echo "</tr>";
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td style='text-align:center'>".$payment_array[$i]["payid"]."</td>";
                     echo "<td style='text-align:center'>".$payment_array[$i]["paiddate"]."</td>";
                     echo "<td style='text-align:center'>".$payment_array[$i]["labourid"]."</td>";
                     echo "<td style='text-align:center'>".$payment_array[$i]["paidamount"]."</td>";
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
     
        