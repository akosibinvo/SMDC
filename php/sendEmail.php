<?php

// Include database connection
require_once 'connection.php';

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email-forgot-pass'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    if ($count > 0) {
        // Generate a random 6-digit OTP code
        $otpCode = sprintf("%06d", mt_rand(0, 999999));

        $subject = "Forgot Password Code";
        $message = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                                padding: 20px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                background-color: #f9f9f9;
                            }
                            h1 {
                                color: #007bff;
                            }
                            h2 {
                                color: #007bff;
                            }
                            p {
                                color: #666;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h1>SMDC - Team JQB</h1>
                            <p>Your One-Time Password (OTP) for verification is:</p>
                            <h2>' . $otpCode . '</h2>
                            <p>Please use this code to change your password.</p>
                            <p>If you did not request this OTP, please ignore this email.</p>
                            <p>Regards,<br>SMDC - Team JQB</p>
                        </div>
                    </body>
                    </html>
                ';
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'blockchainbased.evs@gmail.com';
            $mail->Password = 'xnvxfrxgmcirirjm';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
        
            $mail->setFrom('blockchainbased.evs@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            // Send the email
            $mail->send();
            echo 'Message has been sent successfully!';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    } else {
        echo 'Email does not exist';
        // $_SESSION['notification'] = array(
        //     'title' => 'Invalid Email',
        //     'status' => 'error',
        //     'description' => 'Email does not exist'
        // );
        // // Redirect to login page
        // header('Location: ../pages/pages-forgot-password.php');
        // exit;
    }
}


