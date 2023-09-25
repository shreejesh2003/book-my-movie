<?php
    require('connection.php');
    
   //  $_SESSION['admin_login']=="no";
   if(isset($_SESSION['admin_login'])){
     $_SESSION['admin_login']=="no";
  }
  
    if(isset($_POST['alogin'])){
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $password=mysqli_real_escape_string($con,$_POST['password']);
      if($email == 'admin' && $password=='admin'){
         $_SESSION['admin_login']='yes';
         header('location:admin.php');
         die();
      }
      else{
         echo "<script>alert('Enter valid details')</script>";
      }
    }
   
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Admin login </title>
   <link rel="stylesheet" href="../css/adminlogin.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   <nav>
      <div class="logo">
         <p>Book MY Movies</p>
      </div>
      <ul>
         <!-- <li><a href="/" >home</a></li> -->
         <li><a href="" class="active"> Admin Login</a></li>
         <li><a href="../index.php">Login</a></li>
         <!-- <li><a href="">contact</a></li> -->
      </ul>
   </nav>
   <div class="wrapper">
      <div class="title-text">
         <!-- <div class="title login">
               Login Form
            </div> -->
         <div class="title signup">
            Admin login
         </div>
      </div>
      <div class="form-container">
         <!-- <div class="slide-controls">
               
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div> -->
         <div class="form-inner">

            <!-- <form method="POST" class="login" >
                  <div class="field">
                     <input type="text" name="username" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div> -->

            <!-- forgot password -->
            <!-- <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div> -->

            <!-- <div class="field btn">
                     <div class="btn-layer"></div>
                     <a href="/main.html">
                     <input type="submit" name="login" value="Login" id="submitBtn" >
                    </a>
                  </div>
                -->


            <!-- <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form> -->


            <!-- signup -->
            <form method="POST" class="signup">


               <div class="field">
                  <input type="text" name="email" placeholder="Email Address" required>
               </div>

               <!-- 
                  <div class="field">
                     <input type="number" name="age" placeholder="Your age" required>
                  </div> -->



               <!-- <div class="field form-inner input hello">
                        <label class="input"for="Gender">Choose your Gender </label>
                        <select class="hello2" name="Gender" id="Gender">
                            <option value="Male">M</option>
                            <option value="Female">F</option>
                            <option value="other">Other</option>
                        </select>
                      </div> -->


               <!-- <label class="input"for="Gender"> </label> -->
               <!--                         
                        <select class="hello field form-inne " name="gender" id="Gender">
                            <option class="y" selected="true" disabled="disabled">Select your gender</option>  -->
               <!-- <option  value="">Select your gender</option> -->
               <!-- <option disabled seleted hidden>Select your gender</option>  -->
               <!-- <option value="Male">M</option>
                            <option value="Female">F</option>
                            <option value="other">Other</option>
                        </select>
                      -->


               <div class="field">
                  <input type="password" name="password" placeholder="Password" required>
               </div>
               <!-- <div class="field">
                     <input type="password" placeholder="Confirm password" required>
                  </div> -->
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" name="alogin" value="Login">
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
      signupBtn.onclick = (() => {
         loginForm.style.marginLeft = "-50%";
         loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (() => {
         loginForm.style.marginLeft = "0%";
         loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (() => {
         signupBtn.click();
         return false;
      });
      //    document.getElementById("submitBtn").addEventListener("click", myFunction);
      //  function myFunction() {
      //    window.location.href="main.html";
   </script>
</body>

</html>