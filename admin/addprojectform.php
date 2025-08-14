<html>
    <head>
        <title>project registration form</title>
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
    <h2 style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:300px;
                    margin-right:300px;'>project registration form </h2>
                    <br>
    <form method="POST" action="addproject.php">
        <table border="2" style="margin-left:auto; margin-right:auto;">
            <!--<tr>
                <td>project id</td>
                <td><input type="text" name="projectid" required></td>
            </tr>-->
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">project name</td>
                <td style="text-align:center"><input type="text" name="projectname" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">place</td>
                <td style="text-align:center"><input type="text" name="place" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">engineer</td>
                <td style="text-align:center"><input type="text" name="engineer" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">start date</td>
                <td style="text-align:center"><input type="date"name="startdate" min="<?=date('Y-m-d');?>" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">end date</td>
                <td style="text-align:center"><input type="date"name="enddate" min="<?=date('Y-m-d');?>" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">estimation</td>
                <td style="text-align:center"><input type="float"name="estimation" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td colspan="2"><input type="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    <?php
            include'footer.php';
         ?>
    </body>
</html>