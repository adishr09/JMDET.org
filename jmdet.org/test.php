<?php
// Setting a timezone, mail() uses this.
date_default_timezone_set('America/New_York');
// recipients
$to  = "priyanshsingh@outlook.com" . ", " ; // note the comma 
$to .= "adi.shr09@gmail.com"; 

// subject
$subject = "Test for Attachement"; 

// Create a boundary string.  It needs to be unique
$sep = sha1(date('r', time()));

// Add in our content boundary, 
// and mime type specification: 
$headers .=
    "\r\nContent-Type: multipart/alternative; 
boundary=\"PHP-alt-{$sep}\"";

// Read in our file attachment
$attachment = file_get_contents('email.php');
$encoded = base64_encode($attachment);
$attached = chunk_split($encoded);

// additional headers
$headers .= "To: You <you@phpeveryday.com>, 
We <we@phpeveryday.com>\r\n"; 
$headers .= "From: Me <me@phpeveryday.com>\r\n"; 
$headers .= "Cc: he@phpeveryday.com\r\n"; 
$headers .= "Bcc: she@phpeveryday.com\r\n";

// Your message here:
$body =<<<EOBODY
--PHP-alt-{$sep}
Content-Type: text/plain

Hai, It's me!

--PHP-alt-{$sep}
Content-Type: text/html

<html>
<head>
<title>Test HTML Mail</title>
</head>
<body>
<font color='red'>Hai, it is me!</font>
</body>
</html>

--PHP-alt-{$sep}--

--PHP-mixed-{$sep}
Content-Type: application/zip; name="attachment.zip"
Content-Transfer-Encoding: base64
Content-Disposition: attachment

{$attached}

--PHP-mixed-{$sep}--
EOBODY;

// Finally, send the email
mail($to, $subject, $body, $headers);
?>
</me@phpeveryday.com>