<?php

// Include database connection
require_once 'connection.php';

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmailWithOTP($email, $otpCode) {
    $subject = "OTP Verification Code";
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
        $mail->Username = 'smdcteamjqb@gmail.com';
        $mail->Password = 'xobscbavxspyfuuw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        $mail->setFrom('smdcteamjqb@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // Send the email
        $mail->send();
    
        $_SESSION['notification'] = array(
            'title' => 'OTP Code successfully sent',
            'status' => 'success',
            'description' => 'Plaese check the email address you provide'
        );
        return true;
    } 
    catch (Exception $e) {
        $_SESSION['notification'] = array(
            'title' => 'Error sending OTP',
            'status' => 'error',
            'description' => 'Error in sending OTP code please click resend otp'
        );
        return false;
    }
}

// Function to verify OTP
function verifyOTP($userOTP) {
    // Check if OTP is stored in session or database (replace this with your implementation)
    $storedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : null;

    if ($storedOTP === $userOTP) {
        return true;
    } else {
        return false;
    }
}