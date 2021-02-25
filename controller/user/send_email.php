<?php 
	// $to = "doconghoa1098@gmail.com"; //đc người nhận
	// $subject = 'Lấy lại mật khẩu';  //tiêu đề
	// $message = "truy cập vào <a href='http://localhost:8007/cv/mail/send.php'>link</a> để lấy lại mật khẩu";  //nội dung


	
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include_once "../PHPMailer/src/PHPMailer.php";
    include_once "../PHPMailer/src/Exception.php";
    include_once "../PHPMailer/src/SMTP.php";

// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
	try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hoateo1098@gmail.com';                     // SMTP username
    $mail->Password   = '????';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 ,587,..
    //Recipients
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('hoateo1098@gmail.com', 'Secure_Web_Lab');
    $mail->addAddress($to);               // Name is optional
    // Content
    $mail->isHTML(true);                // Set email format to HTML
    $mail->Subject = $subject;  //tiêu đề mail
    $mail->Body    = $message;  //nội dụng mail
    $mail->send();
        
        if (isset($_SESSION['type_mail']) && $_SESSION['type_mail'] = "forgot_pass") {
            $_SESSION['success']= "Link lấy lại mật khẩu đã được gửi đến email của bạn !!! Hãy kiểm tra mail !!! " ;
        }
            // if (!isset($_SESSION['code'])) {
        //     echo "<script> alert('Link lấy lại mật khẩu đã được gửi đến email của bạn!!!')</script>" ;
        // }
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}


 ?> 

