<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connect.php";
    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $sql="Select * from users where Username='$username' and Password='$password'";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $user_id = $row["id"];
    }
  
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['Username']=$username;
            $_SESSION['id']=$user_id;
          

            header('location:home.php');

        }
        else{
            $invalid=1;
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

    <title>login page</title>
  </head>
  <body>
  <?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success</strong> you are successfully logged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  
  </div>';
  }
  ?>
      <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>error</strong> invalid user credentials.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

    <h1 class="text-center"> WELCOME TO LOGIN PAGE</h1>
    <div class="container mt-5">
    <form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="name" class="form-control" placeholder="Enter your username here" name="Username" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password here" name="Password">
  </div>
  <button type="submit" class="btn btn-primary w-100">login</button>
</form>
</body>
</html>