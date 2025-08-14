<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'config.php'; // Include configuration file

 
    $to=$_POST["email"];
    $conn=getDatabaseConnection();
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("select password from manager where email=?");
        $stmt->bindParam(1,$to);
        $stmt->execute();
        $r=$stmt->rowCount();

        if($r==1)
        {
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $password=$row["password"];
            $mail=new PHPMailer(true);
            $mail->isSMTP();
            
            // Get email configuration
            $emailConfig = getEmailConfig();
            $mail->Host = $emailConfig['host'];
            $mail->Port = $emailConfig['port'];
            $mail->Username = $emailConfig['username'];
            $mail->Password = $emailConfig['password'];
            $mail->SMTPSecure = $emailConfig['encryption'];
            $mail->SMTPAuth = true;
        
        //sender info
        $mail->setFrom($emailConfig['username']);

        //Add a recipent
        $mail->addAddress($to);

        //Set email format to HTML
        $mail->isHTML(true);
        
        //Mail subject
        $mail->Subject='Password Recovery - OSHR';

        //Mail body content
        $bodyContent='<h1>Forgot password</h1>';
        $bodyContent.='<p>Your password is' .$password.'</p>';
        $mail->Body=$bodyContent;

        //send email
        if(!$mail->send())
        {
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
            
            
        }
        else{
            echo 'Message has been sent.';
           
        }
    }
    else
    {
        echo "No such emailid";
        
    }
?>
