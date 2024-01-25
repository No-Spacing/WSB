<?php
    $code = rand(999999, 111111);
    $email = "akito.21.exe@gmail.com";
    $subject = "OTP";
    $message = "Here is your One Time Passcode $code";
    $sender = "From: wallstreetbank.99@gmail.com";

    mail($email, $subject, $message, $sender);


    /*
$subject = "Password Reset Code";
                    $message = "Your password reset code is $code";
                    $sender = "From: shahiprem7890@gmail.com";
                    if(mail($email, $subject, $message, $sender)){
                        $info = "We've sent a passwrod reset otp to your email - $email";
                        session_start();
                        $_SESSION['info'] = $info;
                        $_SESSION['email'] = $email;
                        header('location: reset-code.php');
                        exit();
                    }else{
                        $errors['otp-error'] = "Failed while sending code!";
                    }


                    
$code = rand(999999, 111111);



$subject = "Password Reset Code";
                    $message = "Your password reset code is $code";
                    $sender = "From: shahiprem7890@gmail.com";
                    if(mail($email, $subject, $message, $sender)){

                    }else{
                        $errors['otp-error'] = "Failed while sending code!";
                    }
*/
?>
