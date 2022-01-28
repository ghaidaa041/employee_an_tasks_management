<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);





$id = $_POST['del_id'];

if(isset($_POST['del_btn'])){


    $qury = "DELETE FROM `tasks` WHERE id ='$id'";


    $qury_run = mysqli_query($contect,$qury);

    if ($qury_run) {

        header("location:./all_tasks.php");
    }
 }

?>