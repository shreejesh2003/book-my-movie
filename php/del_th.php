<?php
    require('connection.php');
    $id=$_GET['id'];
    $sql="select * from booking where Theatre_id='$id'";
    $res=mysqli_query($con,$sql);

    if(mysqli_num_rows($res)>0){
      // echo "<script>alert('Cannot delete!!')</script>";
      $_SESSION['th_deleted']=-1;
      header('location:admin.php');
      die();
    }
    else{
      $sql="delete from theatres where T_id = '$id' and T_id not in(select Theatre_id from booking)";
      $res=mysqli_query($con,$sql);
      $_SESSION['th_deleted']=1;
      header('location:admin.php');
      die();
    }
   //  if(!$row){
   //   
   //  }
   //  if(mysqli_num_rows($res)>0){
   //     echo "<script>alert('Cannot delete!!')</script>";
   //  }
   //  else{
   //      
   //    // echo $sql;

      
   //    
   //    if($res){
   //       // echo "<script>alert('Deleted!')</script>";
   //      
   //       echo $res;
   //       //   header('location:admin.php');
   //       //   die();
   //    }
   //    //   else{
   //    //    //  echo "<script>alert('Cannot delete')</script>";
   //    //   
   //    //    //   
   //    //   }
   //  }
    
?>