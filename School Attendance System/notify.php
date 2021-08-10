
<?php 
 

include_once 'db.php';
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php';

global $db;
//SELECT * FROM `att_student` WHERE DateUpdated = DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
$sql = "SELECT * FROM `att_student` WHERE DateUpdated = { DATE_SUB(CURDATE(), INTERVAL 3 MONTH) }" ;//{$ClassID}
$result = $db->query($sql)->fetchAll();
echo (json_encode($result));
$db->close();

$mail = new PHPMailer; 
 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'user@gmail.com';   // SMTP username 
$mail->Password = 'gmail_password';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
 
// Sender info 
$mail->setFrom('sender@codexworld.com', 'CodexWorld'); 
$mail->addReplyTo('reply@codexworld.com', 'CodexWorld'); 
 //zahiruddinjamal@gmail.com
// Add a recipient 
$mail->addAddress('recipient@example.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Localhost by CodexWorld'; 
 
// Mail body content 
$bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>'; 
$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
} 
 
?>