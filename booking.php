<?php
include 'connect.php';
include("phpmailer/class.phpmailer.php");
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$dest=$_POST['dest'];
$ticket=$_POST['ticket'];
$age=$_POST['age'];
$package=$_POST['package'];
$date=$_POST['date'];

$sql_users = "INSERT INTO booking(name,mobile,email,destination,tickets,age,package,Date) VALUES ('$name','$mobile','$email','$dest','$ticket','$age','$package','$date')";
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
    $mail->Body = 'You have successfully booked your vacation with GlobeTrot, Thankyou!';
    $mail->addAddress($email);
        if(!$mail->send()){
     echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
     echo "E-Mail has been sent";
    }
echo "</script>";
header('Location:Payment.html');
}
else
{
echo "<script language='javascript'>";
echo "alert('Registration unsuccessfull, Please try again!')";
echo "</script>";
header('Location:Book.html');
}
?>