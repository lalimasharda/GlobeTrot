<?php
include 'connect.php';

$name = $_POST['name'];
$password = $_POST['pass'];
$_SESSION['logged']=false;
$sql_users = "SELECT * FROM register WHERE name = '$name' AND password ='$password' ";
$result_users = mysqli_query($connect,$sql_users);

if(mysqli_num_rows($result_users) <= 0)
{
echo "<script language='javascript'>alert('Unsuccessful')</script>";
header('Location:Login.html');
}
else
{
session_start();
$row_users = mysqli_fetch_array($result_users);
$_SESSION['logged'] = true;
$_SESSION['name'] =  $row_users['name'];
$_SESSION['id'] =  $row_users['id'];
$_SESSION['mobile'] = $row_users['mobile'];
$_SESSION['email'] = $row_users['email'];
header('Location:loggedin.html');
}

?>
