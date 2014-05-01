<?php 

 if(isset($_POST)&& !empty($_POST))
        {
//define the receiver of the email 
$to = 'priyanshsingh@outlook.com'; 
//define the subject of the email 
$subject = 'Test email with attachment'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash 
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n 
$headers = "From: shyinpar@gmail.com\r\nReply-To: shyinpar@gmail.com"; 
//add boundary string and mime type specification 
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents('hhh.docx'))); 
//define the body of the message. 
ob_start(); //Turn on output buffering 

}
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Hello World!!! 
This is simple text email message. 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<h2>Hello World!</h2> 
<p>This is something with <b>HTML</b> formatting.</p> 

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/zip; name="attachment.zip"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
//copy current buffer contents into $message variable and delete current output buffer 
$message = ob_get_clean(); 
//send the email 
$mail_sent = @mail( $to, $subject, $message, $headers ); 
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent" : "Mail failed"; 
?>




<?php 
    if(isset($_POST)&& !empty($_POST))
        {
            if(!empty($_FILES['attachment']['name']))
            {
                $_FILES['attachment']['name'];
                $_FILES['attachment']['temp_name'];
                $_FILES['attachment']['type'];
                
                $base = basename ($file_name);
                $extension = substr($base, strlen($base)-4, strlen($base));
                $allowed_extensions = array (".doc","docx",".pdf",".zip");
                print ($extension);
                
               /* if(in_array($extension,$allowed_extensions))
                {   
                     $from = $_POST['email'];
                     $to = "priyanshsingh@outlook.com";
                     $subject = "MAUK";
                     $message = "MAIL";  
                     
                     $file = $temp_name;
                     $content = chunk_split(base64_encode(file_get_contents($file)));
                     $uid = md5(uniqid(time()));
                     $header = "From: ".$from."\r\n";
                     $header.= "Reply - To".$replyto."\r\n";
                     $header .= "MIME-Version: 1.0\r\n";
                     $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
                     $header .= "This is a multipart message in the format.\r \n ";
                     
                     // PLAIN TEXT 
                     $header .= "--".$uid."\r\n";
                     $header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                     $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
                     $header .=  $message."\r\n\r\n";
                     // FILE PART 
                     $header .= "--".$uid."\r\n";
                     $header .= "Content-Type: ".$file_type."; name=\"".$file_name."\"\r\n"; 
                     $header .= "Content-Transfer-Encoding: base64\r\n";
                     $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
                     $header .= $content."\r\n\r\n";
                     if(mail($to,$subject,"",$header)){
                        echo "SUCCESS";
                     }
                     else {
                        echo "FAIL";
                     }  
                      exit(); 
                } 
                
                else
                {
                    echo "FILE TYPE NOT ALOWED";
                }                
            }
            else {
                echo "NO FILE UPLOADED" ;
            }*/
         }
    }
      
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    
    </head>
    <body>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/bootstrap.min.js"></script>
                <div class="container">
                <form role="form" method="post" action="new.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" type="text" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile" name="attachment">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                    <input type="submit" class="btn btn-default" value="Send Mail">                  
                </form>
            
            <form >
            
        </div>
    </body>
</html>
