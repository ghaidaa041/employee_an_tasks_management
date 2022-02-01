<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مهمة جديدة</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" 
rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body dir="rtl">
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">نظام الرقابة الداخلي</a>
    <form class="d-flex" action = "log_out.php" method ="POST">
      <button name ="logout-btn" class="btn btn-outline-danger" type="submit">تسجيل خروج</button>
    </form>
  </div>
</nav>
<div id="mother2">

<aside>
                <div class="div">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <br><br>
                <div class="bar">
                    <label><a class="a1" href="./emp_page.php">الصفحة الرئيسية</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./emp_add_new_task.php">مهمة جديدة</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./emp_all_tasks.php">جميع المهام</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./emp_history.php">سجل المهمة</a></label>
                </div>
                </div>
            </aside>
            
            <main>
                <div class="continar">
                <form action="emp_add_task_to_db.php" method='POST'>
            <br>
        <label for="">عنوان المهمه</label><br>
        <input type="text" name="task_title"><br>
        <label for="">إسناد الى</label><br>

        <select name="goes_to" >
            <option>اختر موظف</option>
               <?php
               $host ='localhost';
               $user = 'root';
               $pass ='';
               $db = 'project1';
               $contect = mysqli_connect($host,$user,$pass,$db);

               $reslt = mysqli_query($contect,"select * from `employee`");
               while ($row = mysqli_fetch_array($reslt)) {
                   echo "<option>";
                   echo "<h2>".$row['emp_name']."</h2>";
                   echo "</option>";
               };
               ?>
        </select> <br>
        <label for="">تاريخ انتهاء المهمه</label><br>
        <input type="date" name="time" ><br>

        <label for="">حالة المهمه</label><br>
        <select name="state"  >
            <option>اختر الحاله</option>
            <option value="مكتمله">مكتمله</option>
            <option value="جاري العمل عليها">جاري العمل عليها</option>
            <option value="لم يتم البدء بها">لم يتم البدء بها</option>
            <option value="مرفوضه">مرفوضه</option>
        </select> <br> <br>
        <button  name ="add-task" class="btn2">أضافة</button>
        <br><br>
    </form>
                </div>
           
            </main>
    </div>
</body>
</html>