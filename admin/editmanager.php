<?php
    $email=$_REQUEST["email"];
    $name=$_REQUEST["name"];
    $phone=$_REQUEST["phone"];

?>
<html>
    <head>
        <title>edit manager</title>
        <script>
            function validate()
            {
                var phonepattern=/^[0-9]{10}$/;
                var p=document.forms["editmanager"]["phone"].value;
                 if (p.search(phonepattern)==-1)   
                 {
                     document.getElementById("phoneresult").innerHTML="phone number should contain only digits minimum 10";
                     return false;
                 }      


                var namepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
                var n=document.forms["editmanager"]["name"].value;
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

    <h2  style='border-radius:25px;
                    border:2px solid #73AD21;
                    padding:12px;
                    height:60px;
                   
                    background-color:aqua;
                    text-align:center;
                    margin-left:400px;
                    margin-right:400px;'>edit manager </h2>
                    <br>
    <form method="POST" action="updatemanager.php" name="editmanager" onsubmit="return validate();">
        <table border="2" style='margin-left:auto; margin-right:auto;' >
        <tr>
                <td>enter email</td>
                <td><input type="email" name="email" value="<?php echo $email;?>"  readonly></td>
            </tr>
            <tr>
                <td>name</td>
                <td><input type="text" name="name"  id="name" maxlength="20" minlength="3" value="<?php echo $name;?>" required></td>
                <p id="nameresult" style="color:tomato;"></p>
            </tr>
            
            <tr>
                <td>phone</td>
                <td><input type="text" name="phone"  id="phone" maxlength="10" minlength="10" value="<?php echo $phone;?>" required></td>
                <p id="phoneresult" style="color:tomato;"></p>
            </tr>
            
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