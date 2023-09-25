<?php
    
    require("connection.php");

    if(isset($_SESSION['admin_login'])){
        if($_SESSION['admin_login']=="no"){
            header('location:../index.php');
            die();
        }
    }

    if(isset($_SESSION['movie_added'])){
      if($_SESSION['movie_added']==1){
          unset($_SESSION['movie_added']);
          echo "<script>alert('Movie added')</script>";
      }
  }

    if(isset($_POST['add'])){
       
      $name=mysqli_real_escape_string($con,$_POST['name']);
      $language=mysqli_real_escape_string($con,$_POST['language']);
      $rating=mysqli_real_escape_string($con,$_POST['rating']);
      $sql="INSERT INTO `movies` (`M_id`, `Name`, `Rating`, `Language`) VALUES (NULL, '$name', '$rating', '$language')";
       $res=mysqli_query($con,$sql);

       if($res){
         //  echo "<script>alert('Movie added')</script>";
         $_SESSION['movie_added']=1;
          header('location:add_movie.php');
          die();
       }

      
      
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
            <li><a href="" class="active">ADD Movies</a></li>
            <li><a href="adminlogout.php">Logout</a></li>
            <li><a href="admin.php">Home</a>
            </li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>
      

     <div class="container-lg bg-light mt-5 p-5">
        <p class="display-6">Add Movie</p>
         <form method="POST" class="form">
            
            <label for="name">Name</label>
             <input type="text" name="name" class="form-control" id="name" required>

             <label for="name">Language</label>
             <input type="text" name="language" class="form-control" id="language" required>

             <label for="name">Rating</label>
             <input type="text" name="rating" class="form-control" id="rating" required>

            <input type="submit" value="Add Movie" name="add" class="btn mt-3 btn-outline-danger">

         </form>
     </div>

   </body>
</html>