<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" type="image/png" href="img/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <style>

      .logo-to-brand {
        border-radius: 50%;
      }
      
      .btn.btn-primary:hover{
        border-color: #0c4b6b;
        color: rgb(5, 5, 5);

      }
      
      .btn.btn-primary{
        background-color: #0c617b;
        border-color: #8fbbe9;
        color: white;
      }

      /*side by side structure*/
      .container {
        display: flex;
        flex-wrap: wrap;
      }

      .input-group-prepend {
        background-color: #8fbbe9;
        border: none;
        cursor: pointer;
    
        /*margin-right: 10px;
        border-radius: 10px;*/
      }

      /* for the longest input element*/
      .input-group {
        background-color: #8fbbe9;
        border: none;
        cursor: pointer;

        border-radius: 10px;
        margin-left: 10px;
        margin-right: 10px;

      }

      .input-group i, .input-group-prepend, .input-group-text i {
        font-size: 1.25rem;
      }

      .input-group input {
        margin-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px; /* Add a gap between the prepend and input field */  
      }

      /*styling around date input element*/
      
      .input-group-text {
        background-color: #8fbbe9;
        border: none;
        cursor: pointer;
      }

      /*side by side elements*/
      .container label,
      .container input {
        flex: 1 0 100px;
        margin-right: 10px;
      }

      #InputEmail{
        border-radius: 6px;
      }

      #confirmCheck {
        margin: auto; /* Center the checkbox horizontally */
        display: block; /*Ensure it takes up the full width */
      }

      .checkbox-container {
        display: flex;
        justify-content: center;
      }

      body {
        background: linear-gradient(to left, #113651,#1e608f,#113651);
          
      } 
      
   
      .card {
        width: 26rem;
        background-color: #568ec9;
        box-shadow: -10px 10px 8px 0 rgba(0, 0, 0, 0.2);
      
      }
     
      .navbar.navbar-expand-lg.bg-body-tertiary{
        margin-bottom: 70px;
      }
      .search-container {
        position: relative;
      }

      .search-input {
        padding-left: 10px;
        width: 350px;
       
      }
      
      .navbar-brand {
        font-family: "Poetsen One", sans-serif;
      }

      .navbar-nav .nav-link.active {
        text-decoration: underline;
        transform: rotateY('180deg');
      }
      .nav-underline .nav-link.active, .nav-underline .nav-link {
        color: #767373;
      }

      .nav-underline .nav-link.active{
        color: #0c617b;
      }

      


      

      
    </style>
  </head>
  <body style="background-color:#1f3b59">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Navigation elements-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
      <div class="container-fluid">
       <a class="navbar-brand" href="#">
        <img src="img/apple-touch-icon.png" alt="OwlWise Corp Logo" width="30" height="30" class="logo-to-brand">
        OwlWise Inc.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="nav nav-underline">
            <li class="nav-item">
             <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="register.php">Register</a>
             </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  About Us
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Our Story</a></li>
                <li><a class="dropdown-item" href="#">Our Team</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Contact Us</a></li>
              </ul>
            </li>
          
          </ul>
          <form class="d-flex align-items-center search-form" role="search">
            <input id="searchBar" class="form-control search-input" type="search" placeholder="Look up something?..." aria-label="Search" onfocus="startAnimation()">
            <button class="btn btn-primary" type="submit" style="background-color:#0c617b;">Search</button>
          </form>
          </ul>
        </div>
      </div>
    </nav>
    


   <!-- intended page structure-->
   <div class="container-md text-center mt-5" style="max-width: 600px;">
   
      <div class="card" style="width: 40rem; background-color: #568ec9 ;"><br>
        <h2 class="mb-4 fw-light " style="font-family: 'Segoe UI', sans-serif; color:#1f3b59">Let's get you registered!</h2>

          <form action="dbregister.php" method="POST">
            <!--email-->
            <div class="container">
              <div class="input-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  <input type="email" onkeyup="hideAlertBox()" class="form-control text-center" id="InputEmail" name="email" aria-describedby="InfoHelp" placeholder="Email address" required>
    
                </div>
              </div>
            </div>
            <br>
            
            <!--Password and Confirm Password-->
            <div class="container">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group-text">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control text-center" id="InputPassword" name="password" placeholder="Password" required>
              </div>
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group-text">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-check-circle"></i></span>
                </div>
                <input type="password" class="form-control text-center" id="InputConfirmPassword" name="confirmedPassword" placeholder="Confirm Password" required>
              </div>
            </div><br>

    
            <!--First & Last names-->
            <div class="container">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group-text">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control text-center" id="first_name" name="firstName" placeholder="First Name" required>
              </div>
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group-text">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                </div>
                <input type="text" class="form-control text-center" id="last_name" name="lastName" placeholder="Last Name" required>
              </div>
            </div><br>


            <!--Phone & Birthday-->
            <div class="container">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group-text">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input type="tel" class="form-control text-center" id="phone" name="phone" placeholder="Contact number" required>

              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group-text">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control text-center" id="date" name="birthday" placeholder="Tell us your Birthday" required>

              </div>
            </div><br>


            <!--Gender & Salary-->
            <div class="row mb-3">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="col-md-5">
                <div class="input-group-text">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-venus-mars"></i></span>
                  </div>
                  <select class="form-select text-center" id="gender" name="gender" >
                    <option value="">Select Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Prefer not to say</option>
                  </select>
                </div>
              </div>
              <div class="col-md-5">
                <div class="mb-3 input-group-text">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                  </div>
                 <input type="number" class="form-control text-center" step="0.01" id="salary" name="salary" placeholder="Salary" required>
                </div>
              </div>
            </div>

            <!--Form check and Register-->
            <div class="mb-3 form-check text-center">
              <div class="checkbox-container">
                <div class="checkbox-centered">
                  <input type="checkbox" class="form-check-input" id="confirmCheck">&nbsp;&nbsp;
                  <label class="form-check-label" for="confirmCheck" style="font-family: 'Segoe UI', sans-serif; color: #1f3b59;">I confirm the details given above</label>

                </div>
              </div>   
              <div id="infoHelp" class="form-text">We'll never share your details with anyone else.</div><br>

              <button type="submit" class="btn btn-primary" style="background-color: #0c617b;">Register</button>
            </div>
            
          </form>
           <!--<div class="alert alert-danger" role="alert">
          <?php //echo isset($errorMessage) ? $errorMessage : ''; ?>
          </div>-->

          <?php 
          if (isset($_GET['error'])) { 
              echo('<div id="alertbox" class="alert alert-danger mt-1" role="alert" style="max-width: 350px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                User already exists with this email!
              </div>');
            }
          
          ?>
       </div> 
      </div><br>
     
      <br><br><br>
     
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      // Date input placeholder
      const dateInput = document.getElementById('date');
    
      dateInput.addEventListener('mouseenter', function() {
        dateInput.setAttribute('placeholder', 'YYYY-MM-DD');
      });
    
      dateInput.addEventListener('mouseleave', function() {
        dateInput.setAttribute('placeholder', 'Tell us your Birthday');
      });

      // Search placeholder animation
      document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('searchBar');
        var placeholderTexts = ["Search for items here...", "Find what you need..."];
        var currentIndex = 0;

        function changePlaceholder() {
          searchInput.setAttribute('placeholder', placeholderTexts[currentIndex]);
          currentIndex = (currentIndex + 1) % placeholderTexts.length;
        }

        setInterval(changePlaceholder, 2000); // Change placeholder text every 2 seconds
      });

      //nav search resizing
      function handleResize() {
        const searchInput = document.querySelector('.search-input');

        if (window.innerWidth <= 1200) {
          searchInput.style.width = '100%';
          searchInput.style.marginLeft = '0';
        }else {
          searchInput.style.width = '350px';
          searchInput.style.marginLeft = '300px';
        }
      }

      window.addEventListener('resize', handleResize);
      
      handleResize();

      //alertbox disappearance
      function hideAlertBox() {
        //var or const
        var alertBox = document.getElementById("alertbox");
        alertBox.style.display = "none";
      }
            
    </script>
    
  </body>
</html>