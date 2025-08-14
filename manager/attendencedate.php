<html>
    <head>
        <title> todays date</title>
    </head>
    <?php
            include'header_link.php';
         ?>
    <body>
    <?php
            include'header.php';
         ?>
        <div>
            <h2>todays date</h2>
            <form method="POST" action="attendenceproject.php">
                <table corder="1">
                    
                         <tr>
                            <td>workdate</td>
                            <td><input type="date" name="workdate" /></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"><input type="submit" value="next"></td>
                        </tr>
                    
                </table>
            </form>
        </div>
        <?php
            include'footer.php';
         ?>
    </body>
<html>
