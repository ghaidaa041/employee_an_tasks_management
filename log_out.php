<?php
session_start();


if(isset($_POST['logout-btn'])){

    session_destroy();
    unset($_SESSION['username']);
    header("location:./auth.php");
 }

?>