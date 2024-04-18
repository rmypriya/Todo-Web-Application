<?php
include 'connect.php';
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $id=encryptor('decrypt',$id);
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