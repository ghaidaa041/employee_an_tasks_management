<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحه الرئيسيه</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" 
rel="stylesheet">
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
        <form>
            <aside>
                <div class="div">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <br><br>
                <div class="bar">
                    <label><a class="a1" href="./dipley.php">الصفحة الرئيسية</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./add_emp.php">موظف جديد</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./add_new_task.php">مهمة جديدة</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./all_tasks.php">جميع المهام</a></label>
                </div>
                <div class="bar">
                    <label><a class="a1" href="./history.php">سجل المهمة</a></label>
                </div>
                </div>
            </aside>

            <main>
            <br>
                <h2>مرحبا بك <?php
                $host ='localhost';
                $user = 'root';
                $pass ='';
                $db = 'project1';
                $contect = mysqli_connect($host,$user,$pass,$db);
                
          
                $emp_user_name = $_SESSION['username'];
                 $emp = mysqli_query($contect,"select admin_name from `admin` where user_name = '$emp_user_name'");

                 $row1 = mysqli_fetch_array($emp);
                
                echo $row1[0];
                ?></h2>
                <div class="continar2">
                    <div class="row row-cols-1 row-cols-md-4 g-2">
  
  <div class="col">
    <div class="card h-100">
      <img src="./image/4995.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">عدد الموظفين</h5>
        <?php 
        
        $host ='localhost';
        $user = 'root';
        $pass ='';
        $db = 'project1';
        $contect = mysqli_connect($host,$user,$pass,$db);
        
        
        $reslt = mysqli_query($contect,"select count(*) as count from `employee` where admin = '$emp_user_name'");
        
        while ($row = mysqli_fetch_assoc($reslt)) {
            echo "<h2>".$row['count']."</h2>";
        
        }
                ?>
        <a href="./all_emp.php" class="btn btn-info">قائمة الموظفين</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="./image/tasks.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">إجمالي المهام</h5>
        <?php 
        
        $host ='localhost';
        $user = 'root';
        $pass ='';
        $db = 'project1';
        $contect = mysqli_connect($host,$user,$pass,$db);
        
        $admin = $_SESSION['username'];  
        
        $reslt = mysqli_query($contect,"select count(*) as count from `tasks` where admin = '$admin' ");
        
        while ($row = mysqli_fetch_assoc($reslt)) {
            echo "<h2>".$row['count']."</h2>";
        
        }?>
    
        <a href="./all_tasks.php" class="btn btn-info">قائمة المهام</a>
      </div>
    </div>
  </div>
  
  <div class="col">
    <div class="card">
      <img src="./image/done.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">مهام منتهيه</h5>
        <?php 
        
        $host ='localhost';
        $user = 'root';
        $pass ='';
        $db = 'project1';
        $contect = mysqli_connect($host,$user,$pass,$db);
        
        
        $reslt = mysqli_query($contect,"select count(*) as count from `tasks` where state ='مكتمله' and admin = '$admin'");
        
        while ($row = mysqli_fetch_assoc($reslt)) {
            echo "<h2>".$row['count']."</h2>";
        }
                ?>
        <a href="./done_tasks.php" class="btn btn-info">قائمة المهام المنتهيه</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="./image/working.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">مهام جاري العمل عليها</h5>
        <?php 
        
        $host ='localhost';
        $user = 'root';
        $pass ='';
        $db = 'project1';
        $contect = mysqli_connect($host,$user,$pass,$db);
        
        
        $reslt = mysqli_query($contect,"select count(*) as count from `tasks` where state ='جاري العمل عليها' and admin = '$admin'");
        
        while ($row = mysqli_fetch_assoc($reslt)) {
            echo "<h2>".$row['count']."</h2>";
        }
                ?>
        <a href="./working_tasks.php" class="btn btn-info">قائمة المهام التي يتم العمل عليها </a>
      </div>
    </div>
  </div>
</div>

                </div>
            </main>
        </form>
    </div>
</body>
</html>