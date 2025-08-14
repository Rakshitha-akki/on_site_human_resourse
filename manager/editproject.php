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
    <h2> edit project details</h2>
    <form method="POST" action="updateproject.php">
        <table border="1">
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
                <td><input type="date"name="startdate" value="<?php echo $startdate;?>"></td>
            </tr>
            <tr>
                <td>end date</td>
                <td><input type="date"name="enddate" value="<?php echo $enddate;?>"></td>
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