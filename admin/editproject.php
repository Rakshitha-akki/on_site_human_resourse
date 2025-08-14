<?php
    //get url parameters
    $projectid=$_REQUEST["projectid"];
    $projectname=$_REQUEST["projectname"];
    $place=urldecode($_REQUEST["place"]);
    $engineer=urldecode($_REQUEST["engineer"]);
    $startdate=$_REQUEST["startdate"];
    $enddate=$_REQUEST["enddate"];
    $estimation=$_REQUEST["estimation"];
?>
<html>
    <head>
        <title>edit project details </title>
    </head>
    <?php
            include'header_link.php';
         ?>
<body>
<?php
            include'header.php';
         ?>
    <h2 style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:300px;
                    margin-right:300px;'> edit project details</h2>
                    <br>
    <form method="POST" action="updateproject.php">
        <table border="2" style='margin-left:auto; margin-right:auto;'>
            <tr>
                <td>project id</td>
                <td><input type="text" name="projectid" value="<?php echo $projectid;?>"readonly></td>
            </tr>
            <tr>
                <td>proect name</td>
                <td><input type="text" name="projectname" value="<?php echo $projectname;?>"required></td>
            </tr>
            <tr>
                <td>place</td>
                <td><input type="text" name="place" value="<?php echo $place;?>"></td>
            </tr>
            <tr>
                <td>engineer</td>
                <td><input type="text" name="engineer" value="<?php echo $engineer;?>"></td>
            </tr>
            <tr>
                <td>start date</td>
                <td><input type="date"name="startdate" value="<?php echo $startdate;?>" min="<?=date('Y-m-d');?>"></td>
            </tr>
            <tr>
                <td>end date</td>
                <td><input type="date"name="enddate" value="<?php echo $enddate;?>" min="<?=date('Y-m-d');?>"></td>
            </tr>
            <tr>
                <td>estimation</td>
                <td><input type="float"name="estimation" value="<?php echo $estimation;?>""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="update"></td>
            </tr>
        </table>
    </form>
    <?php
            include'footer.php';
         ?>
    </body>
</html>