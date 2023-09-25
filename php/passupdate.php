
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
            <li><a href="main.php">home</a></li>
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
         <div class="form-container">
          
            <div class="form-inner">
           
               <form method="POST"  class="signup">

                    <div class="field">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>

                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>


                  <div class="field">
                     <input type="number" name="age" placeholder="Your age" required>
                  </div>


                
                        <select class="hello field form-inne " name="gender" id="Gender" required>
                            <option class="y" selected="true" value="" disabled="disabled">Select your gender</option> 
                             <!-- <option  value="">Select your gender</option> -->
                          <!-- <option disabled seleted hidden>Select your gender</option>  -->
                            <option value="Male">M</option>
                            <option value="Female">F</option>
                            <option value="other">Other</option>
                        </select>
                     
                  

                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" required>
                  </div>
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