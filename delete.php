<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from crud where sno=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       header('location:display.php');
       echo "deleted successfully";
    }
    else{
        die(mysqli_error($con));
    }
}
?>