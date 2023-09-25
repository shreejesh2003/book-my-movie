<?php
  require('connection.php');

  if(isset($_SESSION['is_login'])){
      if($_SESSION['is_login']=="no"){
          header('location:../index.php');
          die();
      }
  }

  $C_id=mysqli_real_escape_string($con,$_SESSION['C_id']);

  if(isset($_POST['Update'])){
		$name=mysqli_real_escape_string($con,$_POST['name']);
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $age=mysqli_real_escape_string($con,$_POST['age']);
      $gender=mysqli_real_escape_string($con,$_POST['gender']);

	

		$sql="UPDATE `customer` SET `Name` = '$name', `Gender` = '$gender', `Age` = '$age', `Email` = '$email' WHERE `customer`.`C_id` = $C_id";
		echo $sql;
		$res=mysqli_query($con,$sql);

		if($res){
			// // echo "<script>alert('Ticket booked')</script>";
			// $_SESSION['booked']=1;
			// header('location:main.php');
			// die();
         echo "<script>alert('Profile updated')</script>";
		}
		unset($_POST['Update']);
	}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Update profile </title>
      <link rel="stylesheet" href="../css/update.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <nav>
         <div class="logo">
            <p>Book MY Show</p>
         </div>
         <ul>
            <!-- <li><a href="/" >home</a></li> -->
            <li><a href="" class="active"> Update the profile</a></li>
            <li><a href="main.php">Book Now</a></li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>
      <div class="wrapper"> 
         <div class="title-text">
            <!-- <div class="title login">
               Login Form
            </div> -->
            <div class="title signup">
               Update profile
            </div>
         </div>

         <?php
           $res=mysqli_query($con,"select * from customer where C_id='$C_id'");
         //   echo $C_id;
         //   $res=mysqli_query($con,"select M_id,Name from movies");
           $row=mysqli_fetch_assoc($res);
         ?>
         <div class="form-container">
          
            <div class="form-inner">
           
               <form method="POST"  class="signup">

                    <div class="field">
                     <!-- <label for="name" class="label">Name</label>     -->
                     Name <input type="text" name="name" value="<?php echo $row['Name']?>" id="name" required>
                    </div><br>

                  <div class="field">
                  <!-- <label for="email" class="label">Email</label>        -->
                  Email<input type="email" id="email" name="email" value="<?php echo $row['Email']?>" required>
                  </div><br>


                  <div class="field">
                  <label for="age" class="label">Age</label>       
                  <input type="number" id="age" name="age" value="<?php echo $row['Age']?>" required>
                  </div><br><br>


                
                       Gender<select class="hello field form-inne " name="gender" id="Gender" required>
                            <option class="y" selected="true" value="" disabled="disabled">Select your gender</option> 
                             <!-- <option  value="">Select your gender</option> -->
                          <!-- <option disabled seleted hidden>Select your gender</option>  -->
                            <option value="Male">M</option>
                            <option value="Female">F</option>
                            <option value="other">Other</option>
                        </select>
                     
                  

                  <!-- <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" required>
                  </div> -->
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="Update" value="Update">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      //    document.getElementById("submitBtn").addEventListener("click", myFunction);
      //    function myFunction() {
      //    window.location.href="main.html";
      </script>
   </body>
</html>