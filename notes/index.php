<?php
//notes index page!
session_start();
if(!isset($_SESSION['userloggedin'])){
  header('Location: ../login.php');
  exit();

}
/*
if (!isset($_SESSION['userloggedin']) || $_SESSION['adminloggedin'] !== true) {
    header('Location: login.php');
    exit();
}*/

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Notes</title>

    <link rel="icon" type="image/png" href="img/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    .btn.btn-primary {
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

    .nav-underline .nav-link.active,
    .nav-underline .nav-link {
        color: #767373;
    }

    .nav-underline .nav-link.active {
        color: #0c617b;
    }
    </style>
</head>

<body style="background-color: #8fbbe9;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Navigation elements-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/apple-touch-icon.png" alt="OwlWise Corp Logo" width="30" height="30"
                    class="logo-to-brand">
                OwlWise Inc.</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../dashboard.php"><i class="fa fa-backward"></i> Dashboard</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="../logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>



    <!-- Note input form -->
    <div class="container-md text-center mt-5" style="max-width: 800px;">
        <div class="custom-shadow">
            <div class="card-type-2">
                <div> 
                <h1 class="hero-text" style="font-family: Poetsen One ,sans-serif; color:#1f3b59;">Your notes...
                
                </h1>

                
                </div>

                <!-- Note adder -->
                <div class="container-md" style="padding: 20px; background-color:#8fbbe9;">
                    <form action="dbnotes.php" method="POST">
                      
                        <div class="row">
                          
                          <div class="row col-md-4 p-4">
                          <input type="text" onclick="hideAlertBox()" class="form-control" id="title" name="title" placeholder="Title" required/><br>
                          </div>
                          <div class="row col-md-6 p-4">
                          <input type="text" class="form-control" id="description" name="description"
                              placeholder="Description" required>
                          </div>
                          <div class="row col-md-2 p-4" style="margin-left: 30px;">
                          <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle" style="font-size: 20px;"></i></button>
                          </div>
                          
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                          <i class="bi bi-search" style="font-size: 20px;"></i>
                          </button>
                           

                          <?php 
                            if (isset($_GET['success'])) { 
                                echo('<div id="alertbox" class="alert alert-success mt-1" role="alert" style="max-width: 350px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                                  Note added to your list!
                                </div>');
                              }
                          ?>
                        </div>
                    </form>
                        <!-- Modal -->
                        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              
                              <div class="modal-body">
                                <form action="" method="GET">
                                  <div class="form-group">
                                    <input type="text" name="search" class="form-control" id="searchInput" placeholder="Spotlight Search..."><br>
                                    
                                  </div>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Search</button>

                                </form>
                              </div>
                              
                              
                            </div>
                          </div>
                        </div>
                        <!-- Modal ended-->

                </div>
            </div>
        </div><br><br>
        <table class="table table-info table-hover">
            <thead>
                <tr>
                    <th>Date Created</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
          // Connect to the MySQL database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "aiphp";
          $email=$_SESSION['userloggedin'];

          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // SQL query to select the desired columns from the "Employee" table
          $sql = "SELECT id,createdDate,title,description FROM Note WHERE email = '$email' ORDER BY createdDate DESC";

          //Check if a search request has been made
          if(isset($_GET['search'])){
            $search = $_GET['search'];
            //returns all
            if($search == ""){
              $sql = "SELECT id,createdDate,title,description FROM Note WHERE email = '$email' ORDER BY createdDate DESC";

            }
            $sql = "SELECT id,createdDate,title,description FROM Note WHERE email = '$email' AND title LIKE '%$search%' ORDER BY createdDate DESC";
          }else{
            $sql = "SELECT id,createdDate,title,description FROM Note WHERE email = '$email' ORDER BY createdDate DESC";
          }


          // Execute the query
          $result = $conn->query($sql);

          // Check if the query was successful
          if ($result) {
              // Fetch the rows
              while ($row = $result->fetch_assoc()) {
                  // Display the data in table rows
                  echo "<tr>";
                  echo "<td class='p-3'>" . $row["createdDate"] . "</td>";
                  echo "<td class='p-3'>" . $row["title"] . "</td>";
                  echo "<td class='p-3'>" . $row["description"] . "</td>";
                  echo "<td class='p-3'> <a class='btn btn-outline-danger' href=" . "dbnotes.php?delid=" . $row["id"] . ">X</a> </td>";
                  echo "</tr>";
              }
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          // Close the connection
          $conn->close();
          ?>
            </tbody>
        </table>
      </div>
        


        <br><br><br><br>
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

        <!--JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>


        <script>
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

        //alertbox disappearance
            function hideAlertBox() {
              //var or const
              var alertBox = document.getElementById("alertbox");
              alertBox.style.display = "none";
            }
            
        </script>


</body>

</html>