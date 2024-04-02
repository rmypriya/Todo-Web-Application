<?php
session_start();
if(!isset($_SESSION['Username'])){
    header('location:login.php');
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

    <title>Home page</title>
  </head>
  <body>
    <?php
    include 'navbar.php';
    ?>
  <div class="p-3 mb-2 bg-secondary text-white">
    <h5 class="text-left mt-5">You are successfully logined as <?php echo $_SESSION['Username'];?></h5>

    <h1 class="text-center mt-5">Welcome <?php echo $_SESSION['Username'];?>
</h1><br>
<h3 class="text-center">Thanks for choosing our ToDo Web Application.<br>Have a nice day</h3><br><br>
<h3 class="text-center">Want to view your todo list?<br>Then click the below view button 
</h3><br>
 <div class="container">
  <div class="text-center">
  <a href="display.php" class="btn btn-primary">View</a>
</div>
</div>
</body>
</html>