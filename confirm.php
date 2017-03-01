<?php
include 'connect.php';
session_start();
if($_SESSION['logged'] == true){
	header('Location:Book.html');
}
elseif($_SESSION['logged']==false){
	echo 'Login first !';
	header('Location:Login.html');
}


?>