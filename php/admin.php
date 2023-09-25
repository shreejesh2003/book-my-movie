<?php
    
    require("connection.php");

    if(isset($_SESSION['admin_login'])){
        if($_SESSION['admin_login']=="no"){
            header('location:../index.php');
            die();
        }
    }
    
   if(isset($_SESSION['mov_deleted'])){
      if($_SESSION['mov_deleted']==1){
         echo "<script>alert('Deleted!')</script>";
      }
      if($_SESSION['mov_deleted']==-1){
         echo "<script>alert('Cannot be Deleted!')</script>";
      }
      unset($_SESSION['mov_deleted']);
   }

   if(isset($_SESSION['th_deleted'])){
      if($_SESSION['th_deleted']==1){
         echo "<script>alert('Deleted!')</script>";
      }
      if($_SESSION['th_deleted']==-1){
         echo "<script>alert('Cannot be Deleted!')</script>";
      }
      unset($_SESSION['th_deleted']);
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
            <li><a href="" class="active">Admin</a></li>
            <li><a href="adminlogout.php">Logout</a></li>
            <li><a href="add_th.php">Add Theatre</a></li>
            <li><a href="add_movie.php">Add Movies</a></li>
            <li><a href="add_show.php">Add Shows</a></li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>
      
      <div class="container-md mt-4 p-2">
         <p class="display-6 fw-bold">Theatres</p>
       
            <table class="table">
               <tr>
                  <th>Theatre id</th>
                  <th>Theatre Name</th>
                  <th>Location</th>
                  <th>Capacity</th>
                  <th></th>
               </tr>

               <?php
                     $theatres=mysqli_query($con,"select * from theatres");

                     while($row=mysqli_fetch_assoc($theatres)){?>

                  <tr>
                     <td> <?php echo $row['T_id']; ?></td>

                     <td> <?php echo $row['Name']; ?></td>

                     <td> <?php echo $row['Location']; ?></td>

                     <td> <?php echo $row['Capacity']; ?></td>
                     
                     <td><a href="del_th.php?id=<?php echo $row['T_id'];?>" class="btn btn-outline-danger btn-sm ">Delete</a></td>

                  </tr>

               <?php }
               ?>
            </table>
        
      </div>


      <div class="container-md mt-4 bg-light p-2">
         <p class="display-6 fw-bold">Movies</p>
         <!-- <form method="post"> -->
            <table class="table">
               <tr>
                  <th>Movie id</th>
                  <th>Movie Name</th>
                  <th>Rating</th>
                  <th>Language</th>
               </tr>

               <?php
                     $movies=mysqli_query($con,"select * from movies");

                     while($row=mysqli_fetch_assoc($movies)){?>

                  <tr>
                     <td> <?php echo $row['M_id']; ?></td>

                     <td> <?php echo $row['Name']; ?></td>

                     <td> <?php echo $row['Rating']; ?></td>

                     <td> <?php echo $row['Language']; ?></td>

                     <!-- <td><input type="submit" class="btn btn-outline-danger btn-sm " value="Delete" name="delete_mov"></td> -->
                     <td><a href="del_mov.php?id=<?php echo $row['M_id'];?>" class="btn btn-outline-danger btn-sm ">Delete</a></td>

                  </tr>

               <?php }
               ?>
            </table>
         <!-- </form> -->
      </div>
      

      <div class="container-md mt-4">
         <p class="display-5 fw-bold">Bookings</p>
         <form method="post">
            <table class="table">
               <tr>
                  <th>Booking id</th>
                  <th>Theatre</th>
                  <th>Movie</th>
                  <th>Customer id</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Seat number</th>

               </tr>

               <?php
                     $res=mysqli_query($con,"select * from booking");

                     while($row=mysqli_fetch_assoc($res)){ 
                         $T_id=$row['Theatre_id'];
                         $M_id=$row['Movie_id'];?>

                  <tr>
                     <td> <?php echo $row['B_id']; ?></td>

                     <td> <?php $th=mysqli_query($con,"select Name from theatres where T_id = $T_id");
                     $theatre=mysqli_fetch_assoc($th);
                  echo $theatre['Name'];     ?></td>

                  <td><?php $mov=mysqli_query($con,"select Name from movies where M_id = $M_id");
                  $movname=mysqli_fetch_assoc($mov);
                  echo $movname['Name'];     ?>
               </td>


               <td> <?php echo $row['Cust_id']; ?></td>

               
                     <td> <?php echo $row['Date']; ?></td>

                        
                     <td> <?php echo $row['Time']; ?></td>

                     <td> <?php echo $row['Seat_no']; ?></td>

                    
                  </tr>

               <?php }
               ?>
            </table>
         </form>
      </div>

      
   </body>
</html>