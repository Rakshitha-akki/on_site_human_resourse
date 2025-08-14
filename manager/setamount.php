<?php
            include'header_link.php';
         ?>
         <?php
            include'header.php';
         ?><?php

session_start();
$labourid_array=$_POST["ckb"];
//$_SESSION["labourid_array"]=$labourid_array;
$msg="";
$len=count($labourid_array);
  //echo "$labourid_array[0]<br>";

        echo "<form method=POST action=insertallot.php>";
            echo "<table border=2 style='margin-left:auto; margin-right:auto;'>";
             echo "<tr style='align:center;background-color:lightblue;padding:200px;'><td  style='text-align:center'>Labourid</td>";
            echo "<td  style='text-align:center'>amount per day</td>";
            echo "</tr>";
                for($i=0;$i<$len;$i++)
                { 
                    echo "<tr>";
                    echo "<td  style='text-align:center'><input type=text value=$labourid_array[$i] name=labourid[] readonly></td>";
                    echo "<td  style='text-align:center'><input type=text name=amount[] required></td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td  style='text-align:center'><input type=submit name=next value=next></td>";
                echo "</tr>";
            echo "</table>";
        echo "</form>";
?>
<?php
            include'footer.php';
         ?>
                       