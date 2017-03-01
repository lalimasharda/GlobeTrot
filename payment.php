<?php
include 'connect.php';
 include("phpmailer/class.phpmailer.php");
$paymode=$_POST['paymod'];
$bankname=$_POST['bank'];
$cardname=$_POST['cardname'];
$cardno=$_POST['cno'];
$cvv=$_POST['cvv'];
$expiry=$_POST['expdate'];

$sql_users = "INSERT INTO payment(paymode,bankname,cardname,cardno,cvv,expiry) VALUES ('$paymode','$bankname','$cardname','$cardno','$cvv','$expiry')";
if (mysqli_query($connect,$sql_users))
{
echo "<script language='javascript'>";
echo "alert('Values inserted successful!! Inserted into the database')";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth= true;
    $mail->Port = 465; // Or 587
    $mail->Username= 'pizzeria.thane@gmail.com';
    $mail->Password= 'pizzeria@123';
    $mail->SMTPSecure = 'ssl';
    $mail->From = 'pizzeria.thane@gmail.com';
    $mail->FromName= 'GlobeTrot';
    $mail->isHTML(true);
    $mail->Subject ='confirm';
    $mail->Body = 'You have successfully paid for your booking, Thankyou!';
    $mail->addAddress($email);
        if(!$mail->send()){
     echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
     echo "E-Mail has been sent";
    }
echo "</script>";
header('Location:dest1234.html');
}
else
{
echo "<script language='javascript'>";
echo "alert('Registration unsuccessfull, Please try again!')";
echo "</script>";
header('Location:sign.html');
}
 
?>