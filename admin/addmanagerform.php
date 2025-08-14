<html>
    <head>
        <title>manager registration form</title>
        <script>
            function validate()
            {
                var phonepattern=/^[0-9]{10}$/;
                var p=document.forms["addmanager"]["phone"].value;
                if (p.search(phonepattern)==-1)   
                {
                     document.getElementById("phoneresult").innerHTML="phone number should contain only digits minimum 10";
                     return false;
                }      


                var namepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
                var n=document.forms["addmanager"]["name"].value;
                if (n.search(namepattern)==-1)   
                {
                     document.getElementById("nameresult").innerHTML="Name should contain only alphabets and space between words";
                     return false;
                }      
            }
        </script>
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
                    margin-right:300px;'>manager registration form </h2>
    <div>
        <br>
    <form method="POST" action="addmanager.php" name="addmanager" onsubmit="return validate();">
        <table border=2 style='margin-left:auto; margin-right:auto;'>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">name</td>
                <td style="text-align:center"><input type="text" name="name" id="name" maxlength="20" minlength="3" required autofocus></td>
                <p id="nameresult" style="color:tomato;"></p>

            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">enter email</td>
                <td style="text-align:center"><input type="email" name="email" id="email"  required></td>
            </tr>
            
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">new password</td>
                <td style="text-align:center"><input type="password" name="newpassword" id="newpassword" maxlength="10" minlength="6" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">confirm password</td>
                <td style="text-align:center"><input type="password" name="confirmpassword" id="confirmpassword" maxlength="10" minlength="6" required></td>
            </tr>
            <tr style="text-align:center;background-color:lavender;padding:200px;">
                <td style="text-align:center">phone</td>
                <td style="text-align:center"><input type="text" name="phone" id="phone" maxlength="10" minlength="10" required></td>
                <p id="phoneresult" style="color:tomato;"></p>
            </tr>
            <tr style="text-align:center;;">
                <td colspan="2"><input type="submit" value="submit" name="btn" id="btn" disabled></td>
            </tr>
        </table>
        <div id="result">

        </div>
        </div>
    </form>
    <?php
            include'footer.php';
         ?>
         <script>
            document.getElementById("confirmpassword").addEventListener("blur",function(){
                var npassword=document.getElementById("newpassword").value;
                var cpassword=document.getElementById("confirmpassword").value;
                if(npassword!=cpassword)
                {
                    var msg="New password and confirm password do not match";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                }
                else{
                
                
                    document.getElementById("btn").disabled=false;
                    
                    
                }

            });
                     </script>
    </body>
</html>