<?php
    //session start
    session_start();
    $msg="";

    //fetch input 
    $currentpassword=$_POST["currentpassword"];
    $newpassword=$_POST["newpassword"];
    $confirmpassword=$_POST["confirmpassword"];


    //compare session password==current password and new passwors==confirm password
    if($currentpassword==$_SESSION["password"])
    {
        if($newpassword==$confirmpassword)
        {
           //if yes
            //connect to db and update new password in admin table 
            $conn=new PDO("mysql:host=localhost;dbname=oshr","root", null);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            try
            {
                $stmt=$conn->prepare("update manager set password=? where email=?");
                $stmt->bindparam(1, $newpassword);
                $stmt->bindparam(2,$_SESSION["email"]);   
                $stmt->execute();
                $c=$stmt->rowCount();
                if($c==1)
                {
                    //update session password to new password
                    $_SESSION["password"]=$newpassword;
                    $msg="password updated successfully";
                    header("location:manageroutput.php?msg=$msg");

                }  
                else
                {
                    $msg="update failed";
                    header("location:manageroutput.php?msg=$msg");

                }
            }
            catch(Exception $e)
            {
                $msg="update failed".$e->getMessage();
                header("location:manageroutput.php?msg=$msg");

            }

        }
        else
        {
            $msg="new and confirm password do not match";
            header("location:manageroutput.php?msg=$msg");

        }
    }
    else
    {
        $msg="current password is invalid";
        header("location:manageroutput.php?msg=$msg");

    }
    
        
    //else 
        //erroe message
?>
<html>
    <head>
        <title>change password</title>
    </head>
    <?php
            include'header_link.php';
         ?>
    <body>
    <?php
            include'header.php';
         ?>
        <?php
           // include_once 'managermenu.php';
            //echo $msg;
         ?>
        <?php
            include'footer.php';
         ?>
    </body>
</html>
