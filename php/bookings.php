<?php
  require('connection.php');

  if(isset($_SESSION['is_login'])){
   if($_SESSION['is_login']=="no"){
       header('location:../index.php');
       die();
   }
}

else {
 header('location:../index.php');
       die();
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Bookings</title>
      <link rel="stylesheet" href="css/index.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/main.css">
   </head>
   <body>
      <nav>
         <div class="logo">
            <p>Book MY Movies</p>
         </div>
         <ul>
            <!-- <li><a href="/" >home</a></li> -->
            <li><a href="" class="active">Bookings</a></li>
            <li><a href="main.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>
        <br><br><br><br><br>
    
            

                
      
      
   <div class="container-md">
   <table class="table">
      <tr class="table-row">
         <th class="table-head">Theatre</th>
         <th>Movie</th>
         <th>Date</th>
         <th>Seat number</th>
         <th>Time</th>
         <th>Booked Time</th>
         <th></th>

         <?php
         $cust=$_SESSION['C_id'];
        $res=mysqli_query($con,"select * from booking where Cust_id=$cust");
        while($row=mysqli_fetch_assoc($res)){ $M_id=$row['Movie_id'];
         $T_id=$row['Theatre_id']; ?>

         <tr>
               <td>
                  <?php $th=mysqli_query($con,"select Name from theatres where T_id = $T_id");
                     $theatre=mysqli_fetch_assoc($th);
                  echo $theatre['Name'];     ?>
               </td>


               <td><?php $mov=mysqli_query($con,"select Name from movies where M_id = $M_id");
                  // $mov = mysqli_query($con,"CALL movproc($M_id);");
                  $movname=mysqli_fetch_assoc($mov);
                  echo $movname['Name'];     ?>
               </td>

               <td>
                 <?php echo $row['Date']; ?>
               </td>

               <td>
                 <?php echo $row['Seat_no']; ?>
               </td>

               <td>
                 <?php echo $row['Time']; ?>
               </td>
               <td>
                 <?php echo $row['Booked_time']; ?>
               </td>

               <td>
                  <a href="cancel.php?id=<?php echo $row['B_id'];?>"  class="btn btn-sm btn-outline-danger">Cancel</a>
               </td>
         </tr>

         <?php
         }  ?>
      </tr>
      
   </table>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   </body>
</html>