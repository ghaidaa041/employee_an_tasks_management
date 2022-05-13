<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);



// if (isset($_POST['edit_btn'])) {
//     $id = $_POST['edit_id'];

//     $qury = "select * from tasks where id='$id'";

//     $qury_run =mysqli_query($contect,$qury);

// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المهمه</title>
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
                <form action="./update_task_to_db.php" method='POST'>

                <?php

                if (isset($_POST['edit_btn'])) {
                  $id = $_POST['edit_id'];

                  $qury = "select * from tasks where id='$id'";

                    $qury_run =mysqli_query($contect,$qury);

                    foreach($qury_run as $task){

                ?>
            <br>
            <input type="hidden" name="edit_id" value = "<?php echo $task['id']?>">
        <label for="">عنوان المهمه</label><br>
        <input type="text" name="edit_task_title" value = "<?php echo $task['task_title']?>"><br>
        <label for="">إسناد الى</label><br>

        <select name="edit_goes_to" >
            <option value="<?php echo $task['goes_to']?>" title="<?php echo $task['goes_to']?>"><?php echo $task['goes_to']?></option>
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
        <input type="date" name="edit_time" value="<?php echo $task['time'] ?>" placeholder="ادخل تاريخ الانتهاء" ><br>

        <label for="">حالة المهمه</label><br>
        <select name="edit_state"  >
            <option value="<?php echo $task['state']?>" title = "<?php echo $task['state']?> "><?php echo $task['state']?></option>
            
            <option value="مكتمله">مكتمله</option>
            <option value="جاري العمل عليها">جاري العمل عليها</option>
            <option value="لم يتم البدء بها">لم يتم البدء بها</option>
            <option value="مرفوضه">مرفوضه</option>
        </select> <br> <br>
        <a href="./emp_all_tasks.php" class="btn btn-danger">ألغاء</a>
        <button type="submit" name ="update-task" class="btn2">تعديل</button><br><br>
        <?php
        
    }
}
        ?>
    </form>
           
                </div>
           
            </main>
    </div>
</body>
</html>