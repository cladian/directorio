<?php
/**
 * Created by PhpStorm.
 * User: edison
 * Date: 15/12/14
 * Time: 1:51
 */

class Mail {

    public static function mailsend($to,$from,$subject,$message){
        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'From NAme');
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else {
            echo "Message sent!";
        }
        $mail->ClearAddresses(); //clear addresses for next email sending
    }

} 