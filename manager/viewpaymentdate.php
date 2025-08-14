<html>
    <head>
        <title>paid date</title>
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
                    margin-left:400px;
                    margin-right:400px;'>paid date</h2>
                    <br>
            <form method="POST" action="viewpayment.php">
                <table border=2 style='margin-left:auto; margin-right:auto;'>
                    
                         <tr>
                            <td style='text-align:center'>paid date</td>
                            <td style='text-align:center'><input type="date" name="paiddate" /></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" style='text-align:center'><input type="submit" value="next"></td>
                        </tr>
                    
                </table>
            </form>
        </div>
        <?php
            include'footer.php';
         ?>
    </body>
<html>
