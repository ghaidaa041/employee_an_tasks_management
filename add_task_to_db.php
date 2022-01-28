<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);


$task_title=$_POST['task_title'];
$goes_to=$_POST['goes_to'];
$time=$_POST['time'];
$state = $_POST['state'];


$reslt = mysqli_query($contect,"select * from `tasks`  where task_title = '$task_title' ");
$reslt2 = mysqli_query($contect,"select * from `history_task3`");

$num =mysqli_num_rows($reslt);

if (isset($_POST['add-task'])) {
    $sql = "insert into `tasks` (task_title,goes_to,time,state) values ('$task_title','$goes_to','$time','$state')";
    $sql2 = "INSERT INTO `history_task`(`task_title`, `edit_goes_to`, `time`, `state`) VALUES ('$task_title','$goes_to','$time','$state')";
  
    $sql3 = "INSERT INTO `history_task3`(`task_title`, `goes_too`, `time`, `state`) VALUES ('$task_title','$goes_to','$time','$state')";

    mysqli_query($contect,$sql);
  mysqli_query($contect,$sql2);
  mysqli_query($contect,$sql3);


header("location:.");
}

?>