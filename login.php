<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/png" href="img/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <style>
    
      body {
        background: linear-gradient(to left, #113651,#1e608f,#113651);

      }

      .logo-to-brand {
        border-radius: 50%;
      }
     
      .btn.btn-primary{
        background-color: #0c617b;
        border-color: #8fbbe9;
        color: white;
      }

      .btn.btn-primary:hover {
        border-color: #0c4b6b;
        color: rgb(5, 5, 5);
         
      }


      #InputLoginPassword, #InputUsername {
        border-radius: 6px;
            
      }

      .input-group {
        background-color: #8fbbe9;
        border: none;
        cursor: pointer;

        border-radius: 10px;
        margin-left: 10px;
        margin-right: 10px;

      }

      .input-group i {
        font-size: 1.25rem;

      }
        
      .input-group input {
        margin-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px; /* Add a gap between the prepend and input field */  
        margin-right: 10px;
      }

      .input-group-text i {
        font-size: 1.25rem;
      }

      .input-group-text {
        background-color: #8fbbe9;
        border: none;
        cursor: pointer;
      }
      
      .container {
        display: flex;
        flex-wrap: wrap;
      }
      
      .forgot-password {
        margin-top: 10px;
        margin-left: 100px;
        color: #0c617b;
        
      }

      .sign-up-option{
        margin-top: 10px;
        margin-left: 10px;
        color: #0c617b;
      
      }

      .card {
        width: 26rem;
        background-color: #568ec9;
        box-shadow: -10px 10px 8px 0 rgba(0, 0, 0, 0.2);
      
      }
      
      /*.bg-rounded {
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }*/
      
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
             <a class="nav-link active" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
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
            <button class="btn btn-primary" type="submit" style="background-color:#0c617b;" >Search</button>
          </form>
          
        </div>
      </div>
    </nav>
    


   <!-- intended page structure-->
   <div class="container-md text-center mt-5" style="max-width: 450px;">
      <!--<div class="shadow-lg p-3 mb-5 bg-rounded">-->
      <div class="card" style="width: 26rem; background-color: #568ec9 ;"><br>
          <h2 class="mb-4 fw-light " style="font-family: 'Segoe UI', sans-serif; color:#1f3b59">Sign In!</h2>
          <form action="dblogin.php" method="POST">

            <!--username login-->
            <div class="container">
                <div class="input-group">
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control text-center" id="InputUsername" placeholder="Username" required>
      
                  </div>
                </div>
            </div><br>

            <!--password login-->
            <div class="container">
                <div class="input-group">
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="pass" class="form-control text-center" id="InputLoginPassword" placeholder="Password" required>

                  </div>
                </div>
            </div><br>

            <!--Remember me & Forgot Password-->
            <div class="container">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember me
                </label>
                <a href="#" class="forgot-password" style="font-style: italic; text-align: right;">Forgot Password?</a>   
              </div>
            </div><br>


            <!--login button-->
            <div class="container">
              <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#0c617b;">Login</button>
            </div><br>

            <!--Sign up link-->
            <div class="container-md">
                <div>
                    <p>Don't have an account?<a href="register.php" class="sign-up-option" style="font-style: italic;">Sign Up</a></p>
                </div>
            </div>


            
            
          </form>
          <?php 
          if (isset($_GET['error'])) { 
              echo('<div id="alertbox" class="alert alert-danger mt-1" role="alert" style="max-width: 350px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                Oops wrong password! Try again...
              </div>');
            }
          
          if (isset($_GET['error-user'])) { 
            echo('<div id="alertbox" class="alert alert-danger mt-1" role="alert" style="max-width: 350px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
              Your username is invalid! Please Try Again or Sign Up...
            </div>');
          }
          
          ?>
        
       </div> 
      </div><br>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
        /*Search placeholder animation*/
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

        
    </script>
    </div>
  </body>
</html>