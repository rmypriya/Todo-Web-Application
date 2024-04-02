<?php
include 'connect.php';
session_start();

$id=$_GET['updateid'];
$sql="select * from crud where sno=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$task=$row['Todo'];
$status=$row['Status'];
if(isset($_POST['submit'])){
    $task=$_POST['Todo'];
    $status=$_POST['Status'];
    $sql="update crud set sno='$id',Todo='$task',Status='$status' where sno=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
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
  <div class="form-group">
    <label for="exampleInputEmail1">Task</label>
    <input type="text" placeholder="Enter your task here" name="Todo" value=<?php echo $task ?>>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <input type="text" placeholder="enter your task status" name="Status" value=<?php echo $status ?> >
  </div>
  <button type="submit" class="btn btn-primary" name="submit">update</button>
</form>
</div>
  </body>
</html>