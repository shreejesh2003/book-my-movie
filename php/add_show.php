<?php
    
    require("connection.php");

    if(isset($_SESSION['admin_login'])){
        if($_SESSION['admin_login']=="no"){
            header('location:../index.php');
            die();
        }
    }

    if(isset($_SESSION['show_added'])){
      if($_SESSION['show_added']==1){
          echo "<script>alert('Show added')</script>";
        unset($_SESSION['show_added']);
      }
  }

    if(isset($_POST['add'])){
        
        $movie=mysqli_real_escape_string($con,$_POST['movie']);
        $theatre=mysqli_real_escape_string($con,$_POST['theatre']);
        $time=mysqli_real_escape_string($con,$_POST['time']);
        //   $sql="INSERT INTO `movies` (`M_id`, `Name`, `Rating`, `Language`) VALUES (NULL, '$name', '$rating', '$language')";
        $sql="INSERT INTO `shows` (`T_id`, `M_id`, `time`) VALUES ('$theatre', '$movie', '$time')";
        $res=mysqli_query($con,$sql);
        // echo $sql;
        if($res){
            //  echo "<script>alert('Movie added')</script>";
            $_SESSION['show_added']=1;
            header('location:add_show.php');
            die();
        }
        else
            echo "<script>alert('Show not added')</script>"; 
  }
    
    
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Admin</title>
      <link rel="stylesheet" href="css/index.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/main.css">
   </head>
   <body>
      <nav class="navbar fixed"> 
         <div class="logo">
            <p>Book MY Movies</p>
         </div>
         <ul>
            <!-- <li><a href="/" >home</a></li> -->
            <li><a href="" class="active">ADD Show</a></li>
            <li><a href="adminlogout.php">Logout</a></li>
            <li><a href="admin.php">Home</a>
            </li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>
      

     <div class="container-lg bg-light mt-5 p-5">
        <p class="display-6">Add Show</p>
         <form method="POST" class="form">
            
            <!-- <label for="name">Name</label>
             <input type="text" name="name" class="form-control" id="name">

             <label for="name">Language</label>
             <input type="text" name="language" class="form-control" id="language">

             <label for="name">Rating</label>
             <input type="text" name="rating" class="form-control" id="rating"> -->
    
             <!-- search movies and theatres -->
             <select name="movie" class="form-control my-3" required>
             <option disabled selected  value="" hidden>Select Movie</option>
                <?php 
                    $sql="select * from movies";
                    $res_mov=mysqli_query($con,$sql);
                    
                    $sql="select * from theatres";
                    $res_th=mysqli_query($con,$sql);

                    while($row=mysqli_fetch_assoc($res_mov)){

                ?>
                
                    <option value="<?php echo $row['M_id'];?>"> <?php echo $row['Name']; ?></option>
               
                <?php } ?>
            </select>

            <select name="theatre" class="form-control my-3" required>
            <option disabled value="" selected hidden>Select Theatre</option>
                    <?php 
                            while($row=mysqli_fetch_assoc($res_th)){
                    ?>
                    <option value="<?php echo $row['T_id'];?>"> <?php echo $row['Name']; ?></option>
                    <?php } ?>
            </select>
            
            <select name="time" class="form-control my-3" required>
                <option disabled value="" selected hidden>Select Time</option>
                <option value="09:00:00">9 AM</option>
                <option value="13:00:00">1 PM</option>
                <option value="16:00:00">4 PM</option>
                <option value="21:00:00">9 PM</option>
            </select>
            <input type="submit" value="Add show" name="add" class="btn mt-3 btn-outline-danger">

         </form>
     </div>

   </body>
</html>