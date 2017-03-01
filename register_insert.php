<?php
include 'connect.php';
 include("phpmailer/class.phpmailer.php");
$name=$_POST['name'];
$password=$_POST['pass'];
$email=$_POST['email'];
$phone=$_POST['pno'];

$sql_users = "INSERT INTO register(name,password,email,mobile) VALUES ('$name','$password','$email','$phone')";
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
    $mail->Body = 'Thank you for registering with GlobeTrot!';
    $mail->addAddress($email);
        if(!$mail->send()){
     echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
     echo "E-Mail has been sent";
    }
echo "</script>";
header('Location:Login.html');
}
else
{
echo "<script language='javascript'>";
echo "alert('Registration unsuccessfull, Please try again!')";
echo "</script>";
header('Location:sign.html');
}
 
?>