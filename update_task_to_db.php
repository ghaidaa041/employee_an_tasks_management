<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);


$id = $_POST['edit_id'];
$task_title=$_POST['edit_task_title'];
$goes_to=$_POST['edit_goes_to'];
$time=$_POST['edit_time'];
$state = $_POST['edit_state'];


$user_name = $_SESSION['username'];


$admin = mysqli_query($contect,"select * from `admin` where user_name = '$user_name'");
$adm =mysqli_num_rows($admin);

$employee = mysqli_query($contect,"select * from `employee` where emp_user_name = '$user_name'");
$emp =mysqli_num_rows($employee);


if(isset($_POST['update-task'])){

    $qury = "UPDATE `tasks` SET  `task_title`='$task_title',`goes_to`=' $goes_to',`time`='$time',`state`='$state' WHERE id ='$id'";
    
    $qury2 = "INSERT INTO `history_task`(`task_title`, `edit_goes_to`, `time`, `state`)
     VALUES ('$task_title','$goes_to','$time','$state')";


    $qury_run = mysqli_query($contect,$qury);
    $qury_run = mysqli_query($contect,$qury2);


    
if ($adm == 1) {
    header("location:./all_tasks.php");
}else {
    header("location:./emp_all_tasks.php");
}

 }

?>