<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);


$company_name=$_POST['company_name'];
$admin_name=$_POST['admin_name'];
$email=$_POST['email'];
$user_name=$_POST['user_name'];
$password=$_POST['password'];

$reslt = mysqli_query($contect,"select * from `admin` where user_name = '$user_name'");
$num =mysqli_num_rows($reslt);

if ($num == 0) {
    if (isset($_POST['add'])) {
        $register = "insert into `admin` value ('$company_name' , '$admin_name' , '$email' , '$user_name' , '$password')";
    mysqli_query($contect,$register);
    header("location:./auth.php");
    }
}else{
    echo "user name is token";

}

?>