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
                    margin-left:300px;
                    margin-right:300px;'>paid date</h2>
            <form method="POST" action="paymentlabour.php">
                <table border=2 style='margin-left:auto; margin-right:auto;'>
                    
                         <tr style='text-align:center;background-color:lightblue;padding:200px;'>
                            <td style='text-align:center'>paying day</td>
                            <td style='text-align:center'><input type="date" name="paiddate" /></td>
                        </tr>
                        
                        <tr style='text-align:center;background-color:lightblue;padding:200px;'>
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
