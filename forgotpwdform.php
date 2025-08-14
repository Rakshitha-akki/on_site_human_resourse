<html>
    <head>
        <title>Forgot Password</title>
        <?php
            include'header_link.php';
         ?>
    <body>
    </head>
 <?php
            include'h.php';
         ?>
         <style>
            tr:hover{background-color:lavender;}
            
        </style>
    <body>

    <form method="POST" action="forgotpwd.php">
        <h3 style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:400px;
                    margin-right:400px;'>Forgot Password</h3>
                    <br>
        <table border=2 style='margin-left:auto; margin-right:auto;'>
            <tr style='text-align:center;background-color:lightblue;padding:200px;'>
                <td style='text-align:center'>Emailid</td>
                <td style='text-align:center'><input type="email" name="email"></td>
            </tr>
            <tr style='text-align:center;background-color:lightblue;padding:200px;'>
                <td colspan="2" style='text-align:center'><input type="submit" name="btn" value="submit"></td>
            </tr>
        </table>  
    </form> 
    <?php
            include'f.php';
         ?>
    <body>
</body>
</html>