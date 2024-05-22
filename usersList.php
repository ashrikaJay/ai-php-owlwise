<?php
session_start();
if(!isset($_SESSION['adminloggedin'])){
    header('Location:login.php');
    exit();

}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the Employee table
$sql = "SELECT FirstName, LastName, Email, Salary, Phone, DateOfBirth, Gender, Password FROM Employee";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="icon" type="image/png" href="img/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->


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

        .search-container {
            position: relative;
            
        }

        .search-input {
            padding-left: 10px;
            width: 350px;
        }
        
        
        .navbar.navbar-expand-lg.bg-body-tertiary{
            margin-bottom: 70px;
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

        .hero-text {
            font-size: 3rem;
            font-weight: 400;
            text-align: center;
            margin-top: 5vh;      
            
        }

        #table-container {
            display: flex;
            justify-content: center;
            border-radius: 10px;
           
            
        }

        #table-wrapper {
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        #emptable{
            margin: 0;
      
        }
        
        #emptable thead th {
            padding: 20px; 
        }


    

        
    </style>
</head>
<body style="background-color: #1f3b59;">
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
    <div class="container-fluid mb-4" style="background-color:black;">
    
    <h1 class="hero-text text-center p-5" style="color:white;"><i class="fa regular fa-address-card" style="margin-right: 20px"></i>Our Customer List</h1>
        <div id="table-container" style="background-color: black; ">
            <div id="table-wrapper" class="responsive">
            <table  id="emptable" class="table table-striped table-hover table-borderless" style="max-width: 1100px; ">
            <thead>
                <tr class="table-info">
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Salary</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Birthday</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr class="table-secondary">
                        <td class="p-3"><?php echo $row['FirstName']; ?></td>
                        <td class="p-3"><?php echo $row['LastName']; ?></td>
                        <td class="p-3"><?php echo $row['Email']; ?></td>
                        <td class="p-3"><?php echo $row['Salary']; ?></td>
                        <td class="p-3"><?php echo $row['Phone']; ?></td>
                        <td class="p-3"><?php echo $row['DateOfBirth']; ?></td>
                        <td class="p-3"><?php echo $row['Gender']; ?></td>
                        <td class="p-3"><?php echo $row['Password']; ?></td>
                    </tr>
                <?php } ?>
                
            </tbody>
            
        </table>

        </div>
        </div>
        <br>
        <div style="display: flex; justify-content: center;">
          <button onclick="logout()" class="btn btn-danger mt-3">Logout</button>
        </div>
        <br><br>
    </div>
    <br><br>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7O5FbU4pwE6c+7vA4/0z3m5RpO+8s5KfkAF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mpFkKy5qL9z7EazJKYtRa4DOdbJbVOE/wJoJ91P49xyQROFq1hCm6XfoZsmWnE4O" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->


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