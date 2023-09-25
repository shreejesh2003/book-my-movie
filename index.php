<?php

require("php/connection.php");

if(isset($_POST['signup'])){
   $username=mysqli_real_escape_string($con,$_POST['email']);
   $name=mysqli_real_escape_string($con,$_POST['name']);
   $age=mysqli_real_escape_string($con,$_POST['age']);
   $gender=mysqli_real_escape_string($con,$_POST['gender']);
   $password=mysqli_real_escape_string($con,$_POST['password']);

   $res=mysqli_query($con,"select max(c_id) from login");
   $row=mysqli_fetch_assoc($res);

   $id=$row['max(c_id)'];
   $id=$id+1;

   $res=mysqli_query($con,"select * from login where `username`='$username';");
   $row=mysqli_fetch_assoc($res);
   if($row){
      echo "<script>alert('Username exists!')</script>";
     
   }

   else{
         $res=mysqli_query($con,"INSERT INTO `login` (`C_id`, `username`, `password`) VALUES ('$id', '$username', '$password');");
      
      $res=mysqli_query($con,"INSERT INTO `customer` (`C_id`, `Name`, `Gender`, `Age`, `Email`) VALUES ('$id', ' $name', '$gender', '$age', '$username');");


      if($res){
         echo "<script>alert('User added!')</script>";
      }
      else{
         echo "<script>alert('User could not be added!')</script>";
      }
   }

}

if(isset($_POST['login'])){
   
   $username=mysqli_real_escape_string($con,$_POST['username']);
   $password=mysqli_real_escape_string($con,$_POST['password']);



   $res=mysqli_query($con,"select * from login where `username`='$username' and `password`='$password';");

   $row=mysqli_fetch_assoc($res);
   if($row){
      $_SESSION['is_login']="yes";
      $_SESSION['C_id']=$row['C_id'];
      header('location:php/main.php');
      die();
   }
   else{
      echo "<script>alert('Enter valid details!')</script>";
   }
}

if(isset($_SESSION['is_login'])){
   unset($_SESSION['is_login']);
}
?>
<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form </title>
      <link rel="stylesheet" href="css/index.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <nav >
         <div class="logo">
            <p>Book MY Movies</p>
         </div>
         <ul>
            <!-- <li><a href="/" >home</a></li> -->
            <li><a href="" class="active">Login/Register</a></li>
            <li><a href="php/adminlogin.php">Admin login</a></li>
            <!-- <li><a href="">contact</a></li> -->
         </ul>
      </nav>
      


      
      <div class="wrapper"> 
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               
             <form method="POST" class="login" >
                  <div class="field">
                     <input type="text" name="username" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  
                  <!-- forgot password -->
                   <!-- <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div> -->

                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <a href="/main.html">
                     <input type="submit" name="login" value="Login" id="submitBtn" >
                    </a>
                  </div>
               


                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
              
              
               <!-- signup -->
               <form method="POST" onsubmit="return validate()"  class="signup">

                    <div class="field">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>

                  <div class="field">
                     <input type="email" name="email" placeholder="Email Address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,3}" required>
                  </div>


                  <div class="field">
                     <input type="number" name="age" placeholder="Your age" id="age" required>
                  </div>


                  
                    <!-- <div class="field form-inner input hello">
                        <label class="input"for="Gender">Choose your Gender </label>
                        <select class="hello2" name="Gender" id="Gender">
                            <option value="Male">M</option>
                            <option value="Female">F</option>
                            <option value="other">Other</option>
                        </select>
                      </div> -->

                      
                        <!-- <label class="input"for="Gender"> </label> -->
                        
                        <select class="hello field form-inne " name="gender" id="Gender" required>
                            <option class="y" selected="true" value="" disabled="disabled">Select your gender</option> 
                             <!-- <option  value="">Select your gender</option> -->
                          <!-- <option disabled seleted hidden>Select your gender</option>  -->
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="other">Other</option>
                        </select>
                     
                  

                  <div class="field">
                     <input type="password" name="password" placeholder="Password" id="pass" required>
                  </div>
                  <div class="field">
                     <input type="password" id="cpass" placeholder="Confirm password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="signup" value="Signup">
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
      //  function myFunction() {
      //    window.location.href="main.html";
      </script>
      <script src="js/signup.js"></script>
   </body>
</html>