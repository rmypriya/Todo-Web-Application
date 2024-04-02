<?php
$success=0;
$user=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connect.php";
    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $sql="Select * from users where Username='$username'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }
        else{
            $sql="insert into users(Username,Password)
            values('$username','$password')";
            $result=mysqli_query($con,$sql);
           
            if($result){
                $success=1;
                
                session_start();
                $_SESSION['Username']=$username;
                

            
                //header('location:login.php');
            }
            else{
                die(mysqli_error($con));
            }
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>signup page</title>
  </head>
  <body>
  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ohh no sorry</strong> user already exist.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>
    <?php
  if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success</strong> you are successfully signed up,Now you can login.<a href="login.php">login</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

    <h1 class="text-center"> WELCOME TO SIGNUP PAGE</h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="name" class="form-control" placeholder="Enter your username here" name="Username" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password here" name="Password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Submit</button><br><br>
  <h5 class="text-center">already a user <a href="login.php">login</a></h5>
</form>
</body>
</html>