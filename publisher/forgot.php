<?php
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $token)
{
    require('phpMailer/Exception.php');
    require('phpMailer/PHPMailer.php');
    require('phpMailer/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "prajapatijaimin2404@gmail.com";                     //SMTP username
        $mail->Password   = 'bdavjfzdaibsgbpp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('prajapatijaimin2404@gmail.com');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset link from ENEWS';
        $mail->Body    = "We got a request from you to change the password.<br>
                            Click below to chnage the password<br>
                            <a href='http://localhost/PHP/third_year_project/enews/publisher/update-password.php?email=$email&token=$token'>Reset Password</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }
}


if (isset($_POST['submit'])) {
    $query = "SELECT * FROM `publisher` WHERE 'emailId'='$_POST[email]'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $token = bin2hex(random_bytes(16));
        $date = date("Y-m-d");
        $query = "UPDATE `publisher` SET `token`='$token',`forgotExpiry`='$date' WHERE `emailId`='$_POST[email]'";
        if (mysqli_query($conn, $query) && sendMail($_POST['email'], $token)) {
            echo "
            <script>
                alert('Link send on mail');
                window.location.href='forgot-password.php';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Query failed');
                window.location.href='forgot-password.php';
            </script>
        ";
        }
    } else {
        echo "
            <script>
                alert('Query failed');
                window.location.href='forgot-password.php';
            </script>
        ";
    }
}
