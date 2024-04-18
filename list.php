
<?php

include 'connect.php';
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token']=bin2hex(random_bytes(32));
}
$token=$_SESSION['csrf_token'];
//print_r($token);
if(isset($_POST['submit'])){
  $token2=$_POST['csrf_token'];
  //print_r($token2);
  $task=$_POST['Todo'];
  $status=$_POST['Status'];
  $task=mysqli_real_escape_string($con,$task);
  $status=mysqli_real_escape_string($con,$status);
  $task=htmlspecialchars($task);
  $status=htmlspecialchars($status);
  $user_id = $_SESSION['id'];
  if($token==$token2)
{
  $sql="insert into crud(user_id,Todo,Status)
  values(?,?,?)";
  $stmt=mysqli_prepare($con,$sql);
  if($stmt){
    mysqli_stmt_bind_param($stmt,"iss",$user_id,$task,$status);
  }
  $result = mysqli_stmt_execute($stmt);
  if($result){
    header('location:display.php');
  }
  else{
    die(mysqli_error($con));
  }
  //exit('success');
}
else{
  exit('invalid csrf token');
}
}
      



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Todolist</title>
  </head>
  <body>
  <?php
    include 'navbar.php';
    ?>
    <h1 class="text-center mt-5">Todo list</h1>
    <div class="container">
        <div class="text-center">
    <form method="post">

      <input type='hidden' name='csrf_token' value=<?php echo $token;?>>
  <div class="form-group">
    <label for="exampleInputEmail1">Task</label>
    <input type="text" placeholder="Enter your task here" name="Todo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <input type="text" placeholder="enter your task status" name="Status" >
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Save</button>
</form>
</div>
  </body>
</html>
