<?php
    $labourid=$_REQUEST["labourid"];
    $name=urldecode($_REQUEST["name"]);
    $phone=($_REQUEST["phone"]);
    $balance=($_REQUEST["balance"]);

?>
<html>
    <head>
        <title>edit labour details</title>
        <script>
            function validate()
            {
                var phonepattern=/^[0-9]{10}$/;
                var p=document.forms["editlabour"]["phone"].value;
                 if (p.search(phonepattern)==-1)   
                 {
                     document.getElementById("phoneresult").innerHTML="phone number should contain only digits minimum 10";
                     return false;
                 }      


                var namepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
                var n=document.forms["editlabour"]["name"].value;
                 if (n.search(namepattern)==-1)   
                 {
                     document.getElementById("nameresult").innerHTML="Name should contain only alphabets and space between worlds";
                     return false;
                 }      
          }
        </script>
    </head>
    <?php
            include'header_link.php';
         ?>

<body>
<?php
            include'header.php';
         ?>
    <h2>edit labour details </h2>
    <form method="POST" action="updatelabour.php"  name="editlabour" onsubmit="return validate();">
        <table border="1">
            <tr>
                <td>labourid</td>
                <td><input type="text" name="labourid" value="<?php echo $labourid;?>"readonly></td>
            </tr>
            <tr>
                <td> name</td>
                <td><input type="text" name="name"  id="name" maxlength="20" minlength="3" value="<?php echo $name;?>" autofocus required></td>
                <p id="nameresult" style="color:tomato;"></p>
            </tr>
            <tr>
                <td>phone</td>
                <td><input type="text" name="phone"  id="phone" maxlength="10" minlength="10" value="<?php echo $phone;?>" required></td>
                <p id="phoneresult" style="color:tomato;"></p>
                
            </tr>
            <tr>
                <td>balance</td>
                <td><input type="text" name="balance" value="<?php echo $balance;?>" readonly></td>
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