<?php
    require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
    $msg  = 'Hello World';
    $subj = 'test mail message';
    $to   = 'priyanshsingh@outlook.com';
    $from = 'priyansh.singh.delhi@gmail.com';
    $name = 'My Name';

    
    function smtpmailer($to, $from, $from_name = 'Example.com', $subject, $body, $is_gmail = true)
    {
        global $error;
        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
        $mail->Username = 'priyansh.singh.delhi@gmail.com';  
        $mail->Password = '9971486416';   
        
        
        $mail->IsHTML(true);
        $mail->From="priyansh.singh.delhi@gmail.com";
        $mail->FromName="priyansh.singh.delhi@gmail.com";
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
    smtpmailer($to, $from,$name, $subj,$msg,true);
    
    
?>