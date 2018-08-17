<!DOCTYPE html>

<?php

    if(isset($_POST['sendmail'])) {
        require 'PHPMailerAutoload.php';
        require 'credential.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL ;                 // SMTP username
        $mail->Password = PASS ;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(EMAIL, 'Company Name');
        
        $mail->addAddress($_POST['email']);     // Add a recipient
        
        $mail->addReplyTo(EMAIL);

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $_POST['subject'];
        
        $mail->Body    = $_POST['message'];
        
        $mail->AltBody = $_POST['phone'];

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    
    }

?>

<html>
	
	<head>
	<link rel="stylesheet" href="css/contact.css">	
	<title>Contact page</title>	
		
	</head>
	
	<body>
		
		<h1>Feel free to ask anything we are here to help you</h1>						
		
        <form action="contact.php" method="post">



            <table>
                <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="name" /></td>
                </tr>

                <tr>
                <td><label>Email</label></td>
                <td><input type="email" name="email"></td>
                </tr>
                
                <tr>
                <td><label>Subject</label></td>
                <td><input type="text" name="subject"></td>
                </tr>
                
                <tr>
                <td><label>Phone Number</label></td>
                <td><input type="text" name="phone"></td>
                </tr>

                <tr>
                <td><label>Message</label></td>
                <td><textarea name="message"></textarea></td>
                </tr>

                <tr>
                <td colspan="2"><input type="submit" name="sendmail"></td>
                </tr>


            </table>

        </form>
		
		
		
		
		
	</body>
	
</html>