<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);


$id=$_POST['id'];
$emp_name=$_POST['emp_name'];
$emp_user_name=$_POST['emp_user_name'];
$emp_password=$_POST['emp_password'];

$admin = $_SESSION['username'];



$reslt = mysqli_query($contect,"select * from `employee`  where emp_user_name = '$emp_user_name' ");
$num =mysqli_num_rows($reslt);

if (isset($_POST['add-emp'])) {
    $sql = "INSERT INTO `employee`(`id`, `emp_name`, `emp_user_name`, `emp_password` ,`admin`) 
    VALUES ('$id','$emp_name','$emp_user_name','$emp_password','$admin')";
mysqli_query($contect,$sql);
header("location:all_emp.php");
}

?>