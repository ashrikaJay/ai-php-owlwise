<?php
session_start();
/*mine
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}*/

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="img/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    
    <style>
    
      body {
        background: linear-gradient(to left, #113651,#1e608f,#113651);

      }

      .logo-to-brand {
        border-radius: 50%;
      }
      

      .btn.btn-primary:hover {
        border-color: #0c4b6b;
        color: rgb(5, 5, 5);
         
      }

      .btn.btn-primary{
        background-color: #0c617b;
        border-color: #8fbbe9;
        color: white;
      }
        
      .container {
        display: flex;
        flex-wrap: wrap;
      }
    
      .hero-text {
        font-size: 3rem;
        font-weight: 300;
        text-align: center;
        margin-top: 5vh;      
        
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
             <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="login.php">Login</a>
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
    


    <!-- Intro-->
    <div class="container-md text-center mt-5" style="max-width: 800px;">
      <div class="custom-shadow" >
        <div class="card-type-2">
            <h1 class="hero-text" style="font-family: Poetsen One ,sans-serif; color:antiquewhite;">Welcome OwlWiser!</h1>
            <button onclick="logout()" class="btn btn-primary">Logout</button>

            <p style="font-weight: 350; text-align: center; color: white;" >Let's check out some books that might catch your interest or even better, get started on a book already in mind... </p><br>
          
        </div>
        
      </div>
    </div><br><br>

    
   

    
   <!-- Footer -->
   <footer class="bg-dark text-white p-4">
     <div class="container">
       <div class="row justify-content-center" style="margin: auto;">
         <div class="col-md-12 text-center">
           <div class="mb-4">
             <a href="#" class="text-white me-4">
               <i class="bi bi-facebook"></i>
             </a>
             <a href="#" class="text-white me-4">
               <i class="bi bi-tiktok"></i>
             </a>
             <a href="#" class="text-white me-4">
               <i class="bi bi-instagram"></i>
             </a>
             <a href="#" class="text-white me-4">
               <i class="fab fa-linkedin-in"></i>
             </a>
           </div>
           <p class="mb-0">&copy; 2024 OwlWise Inc. All rights reserved.</p>
         </div>
       </div>
     </div>
    </footer>

    




    

   <!--JavaScript *** update files-->
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

      //scrolling up animation
      window.addEventListener('scroll', function() {
        var rows = document.querySelectorAll('.row.g-0');
        var servicesSection = document.getElementById('services-section');
        rows.forEach(function(row) {
          var rowPosition = row.getBoundingClientRect();
          if (rowPosition.top < window.innerHeight) {
            row.classList.add('visible');
          }
        });
        if (servicesSection) {
          var servicesSectionPosition = servicesSection.getBoundingClientRect();
          if (servicesSectionPosition.top < window.innerHeight) {
            servicesSection.classList.add('visible');
          }
        }
      });

      //logout when clicked
      function logout() {
          // Clear session data
          sessionStorage.clear();

          // Redirect to the login page
          window.location.href = "login.php";

          // Prevent back button navigation
          history.pushState(null, null, 'login.php');
        }



    

    </script>
    
    
  </body>
</html>