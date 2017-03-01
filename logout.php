<?php
echo "<script language='javascript'>";
echo "alert('Logged Out')";
echo "</script>";
session_start();
session_destroy();
header('Location:GTB.html');

?>