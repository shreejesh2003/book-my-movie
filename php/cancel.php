<?php
    require('connection.php');

    if(isset($_SESSION['is_login'])){
        if($_SESSION['is_login']=="no"){
            header('location:../index.php');
            die();
        }
    }
    
    $id=$_GET['id'];
    if(isset($_POST['cancel'])){
            
            $sql="delete from booking where B_id= '$id'";
            $res=mysqli_query($con,$sql);
            if($res){
                header('location:bookings.php');
                die();
            }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel</title>
<!-- 
    <script>
        var confirmation=confirm('Confirm to delete?');
        // console.log(confirmation);
        if(confirmation){
           window
        }
    
    </script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <nav class="navbar fixed mb-5">
         <div class="logo">
            <p>Book MY Movies</p>
         </div>
         <ul>
            <!-- <li><a href="/" >home</a></li> -->
            <li><a href="" class="active">Cancel</a></li>
            <li><a href="main.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>

            
   <div class="container-md mt-3">
    <p class="lead">Are you sure to cancel?</p>
   
     <form method="POST" class="form">
     <table class="table">
      <tr class="table-row">
         <th class="table-head">Theatre</th>
         <th>Movie</th>
         <th>Date</th>
         <th>Seat number</th>
         <th>Time</th>
       

         <?php
      
        $res=mysqli_query($con,"select * from booking where B_id= '$id'");
        while($row=mysqli_fetch_assoc($res)){ $M_id=$row['Movie_id'];
         $T_id=$row['Theatre_id']; ?>

         <tr>
               <td>
                  <?php $th=mysqli_query($con,"select Name from theatres where T_id = $T_id");
                     $theatre=mysqli_fetch_assoc($th);
                  echo $theatre['Name'];     ?>
               </td>


               <td><?php $mov=mysqli_query($con,"select Name from movies where M_id = $M_id");
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
         </tr>

         <?php
         }  ?>
      </tr>
      
   </table>

   <input type="submit" class="btn btn-outline-danger" value="Cancel" name="cancel">
     </form>
   </div>
</body>
</html>