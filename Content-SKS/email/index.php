<?php
    require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
    $msg  = 'Hello World';
    $subj = 'test mail message';
    $to   = 'youremail@website.com';
    $from = 'you@youremail.com';
    $name = 'My Name';

    echo smtpmailer($to,$from, $name ,$subj, $msg);
    
    function smtpmailer($to, $from, $from_name = 'Example.com', $subject, $body, $is_gmail = true)
    {
        global $error;
        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
        $mail->Username = 'admin@example.com';  
        $mail->Password = '*******';   
        
        
        $mail->IsHTML(true);
        $mail->From="admin@example.com";
        $mail->FromName="Example.com";
        $mail->Sender=$from; // indicates ReturnPath header
        $mail->AddReplyTo($from, $from_name); // indicates ReplyTo headers
//        $mail->AddCC('cc@phpgang.com.com', 'CC: to phpgang.com');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        $mail->AddAttachment("reload.png"); // $path: is your file path which you want to attach like $path = "reload.png";
        if(!$mail->Send())
        {
            $error = 'Mail error: '.$mail->ErrorInfo;
            return $error;
        }
        else
        {
            $error = 'Message sent!';
            return $error;
        }
    }
?>