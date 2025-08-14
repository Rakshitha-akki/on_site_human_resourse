<html>
    <head>
        <title>manager change password form</title>
        
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
    <div>
    <h2 style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:290px;
                    margin-right:290px;'>manager change password  </h2>
                    <br>
    <form method="POST" action="managerchangepassword.php">
        <table border=2 style='margin-left:auto; margin-right:auto;'>
        
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">current password</td>
                <td style="text-align:center"><input type="password" name="currentpassword" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">new password</td>
                <td style="text-align:center"><input type="password"name="newpassword" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">confirm password</td>
                <td style="text-align:center"><input type="password"name="confirmpassword" required></td>
            </tr>
           
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td colspan="2" style="text-align:center"><input type="submit" value="update" name="btn" id="btn"></td>
            </tr>
        </table>
    </form>
    <?php
            include'footer.php';
         ?>
</div>
    </body>
</html>