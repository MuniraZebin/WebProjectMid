<?php 
session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
    header("location: /Project/View/login.php");
}
else {
    header("location: /Project/View/login.php");
}

 ?>