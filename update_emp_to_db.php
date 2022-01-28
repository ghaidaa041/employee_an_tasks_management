<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);

$id = $_POST['edit_id'];
$edit_emp_name=$_POST['edit_emp_name'];
$edit_emp_user_name=$_POST['edit_emp_user_name'];
$edit_emp_password=$_POST['edit_emp_password'];




if(isset($_POST['update-emp'])){

    $qury = "UPDATE `employee` SET `emp_name`='$edit_emp_name',`emp_user_name`='$edit_emp_user_name',`emp_password`='$edit_emp_password' WHERE `id`='$id'";
    
   
    $qury_run = mysqli_query($contect,$qury);

    if ($qury_run) {
        header("location:./all_emp.php");
    }
 }

?>