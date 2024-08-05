<?php
session_start();
if(!isset($_SESSION['userloggedin'])){
  header('Location: login.php');
  exit();
}
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

      .dash-card:hover{
        box-shadow: 0 0 10px rgba(44, 56, 150, 0.5);
        transform: scale(1.02);
      }

      .dash-card{
        font-family: 'Courier New', Courier, monospace;
        text-decoration: none;
        transition: all 0.5s;
      }

      .app{
        margin: 40px;
      }

      #logout{
        color: #851609;
      }

  

    </style>
  </head>
  <body style="background-color:#568ec9">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include_once 'nav-logged.php';?>

    <!-- Intro-->
    <div class="container-md text-center mt-5" style="max-width: 800px;">
      <div class="custom-shadow" >
        <div class="card-type-2">
            <h1 class="hero-text" style="font-family: Poetsen One ,sans-serif; color:antiquewhite;">Welcome OwlWiser!</h1>
            <!--<button onclick="logout()" class="btn btn-primary">Logout</button>-->

        </div>

        <div class="row">
          <div class="app col-4">
          <a class="dash-card card p3 rounded-5" href="notes/index.php"style="width: 18rem; height: 22rem;">
            <img src="img/dash/notes.webp" class="card-img-top" alt="..." style="margin-bottom: 18px;">
              <h3 class="dash-text">Notes</h3>
          </a>
          </div>

          <div class="app col-4">
          <a class="dash-card card p3 rounded-5" href="tasks/index.php"style="width: 18rem; padding-top: 40px; height: 22rem;">
            <img src="img/dash/tasks.webp" class="card-img-top" alt="..."><br><br>
              <h3 class="dash-text">Tasks</h3>
          </a>
          </div>


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