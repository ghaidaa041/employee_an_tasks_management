<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام الرقابة الداخلي</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" 
rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    
<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);



if (isset($_POST['user_name'])) {
    $user_name=$_POST['user_name'];
}

if (isset($_POST['password'])) {
    $password=$_POST['password'];
}


if (isset($_POST['submit'])) {

    $_SESSION['username'] = "$user_name" ;

    
$admin = mysqli_query($contect,"select * from `admin` where user_name = '$user_name' && password = '$password'");
$num =mysqli_num_rows($admin);

$emp = mysqli_query($contect,"select * from `employee` where emp_user_name = '$user_name' && emp_password = '$password'");
$num2 =mysqli_num_rows($emp);


if ($num == 1) {
    header("location:./dipley.php");
}else if ($num2 == 1){
        header("location:./emp_page.php");
}else {
    echo "<div class='alert alert-danger' role='alert'>
    اسم المستخدم او كلمة المرور غير صحيحه
  </div>";
}
}

?>

   <div id="mother">
       <div class="form-box">
       <div id="btn"> 
           <button type="button" class="toggle-btn button1" onclick="register()">تسجيل جديد</button>
           <button type="button" class="toggle-btn button2" onclick="log_in()">تسجيل دخول</button>
           </div>
       <form  id="log-in" method='POST'>
       <label for="">اسم المستخدم</label><br>
        <input type="text" name="user_name"><br>
        <label for="">كلمة المرور</label><br>
        <input type="text" name="password"><br><br>
        <button name="submit" class="btn2">تسجيل دخول</button>
    </form>

    <form  action="registeration.php" id="register" method='POST'>
        <label for="">اسم المنظمة</label><br>
        <input type="text" name="company_name"><br>
        <label for="">اسم المدير</label><br>
        <input type="text" name="admin_name"><br>
        <label for="">اسم المستخدم</label><br>
        <input type="text" name="user_name"><br>
        <label for="">البريد الإلكتروني</label><br>
        <input type="text" name="email"><br>
        <label for="">كلمة المرور</label><br>
        <input type="text" name="password"><br><br>
        <button name ="add" class="btn2">تسجيل</button>
    </form>

       </div>
   </div>

   <script>
       var x= document.getElementById("log-in");
var y= document.getElementById("register");
var z= document.getElementById("btn");

function register(){
    x.style.right ="-400px";
    y.style.right = "50px";
    z.style.right = "1100px"
}

function log_in(){
    x.style.right ="50px";
    y.style.right = "500px";
    z.style.right = "0px"
}
   </script>
</body>
</html>