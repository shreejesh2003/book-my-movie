<?php
    require('connection.php');
    $id=$_GET['id'];
   
    $sql="select * from booking where Movie_id='$id'";
    $res=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($res)>0){
      // echo "<script>alert('Cannot delete!!')</script>";
      $_SESSION['mov_deleted']=-1;
      header('location:admin.php');
      die();
    }
    else{
      $sql="delete from movies where M_id = '$id' and M_id not in(select Movie_id from booking)";
      $res=mysqli_query($con,$sql);
      $_SESSION['mov_deleted']=1;
      header('location:admin.php');
      die();
    }

?>