<?php
include 'connect.php';
include 'config.php';
session_start();
//$user_id=$_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body>
<?php
    include 'navbar.php';
    ?>
   <div class="container mt-5">
    <div class="text-center">
        <a href="list.php" class="btn btn-primary">Add task</a><br><br>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Todo</th>
      <th scope="col">Status</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    
    
    $user_id = $_SESSION['id'];

    $sql1="select * from crud where user_id = $user_id ";
    $result1=mysqli_query($con,$sql1);
    if($result1){
        while($row=mysqli_fetch_assoc($result1)){
          //$id1=encryptor('encrypt',$id);
        
            $id=$row['sno'];
            $task=$row['Todo'];
            $status=$row['Status'];
            $id1=encryptor('encrypt',$id);
            echo '<tr>
            <th scope="row">'.$task.'</th>
            <td>'.$status.'</td>
            
            <td>
            <button class="btn btn-primary"><a href="update.php?updateid='.$id1.'" class="text-light">update</a></button>
            <button class="btn btn-danger"><a href="delete.php?deleteid='.$id1.'" class="text-light">delete</a></button>
             </td>
          </tr>';
            
        }
    }
    ?>

  </tbody>
</table>
    
    </div>
</body>
</html>