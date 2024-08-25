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

    <title>Books</title>

    <link rel="icon" type="image/png" href="../img/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="special-background">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Navigation elements-->
    <?php include_once '../nav-logged.php'; ?>

    <!-- Book input form -->
    <div class="container-md text-center mt-5" style="max-width: 800px;">
        <div class="custom-shadow">
            <div class="card-type-2">
                <div>
                    <h1 class="hero-text" style="font-family: Poetsen One ,sans-serif; color:#1f3b59;">
                        Add to collection?
                    </h1>
                </div>

                <!-- Book adder -->
                <div class="container-md" style="padding: 20px; background-color: #568ec9;">
                    <form action="dbbooks.php" method="POST">

                        <div class="row">
                            <div class="row col-md-4 p-4">
                                <input onclick="hideAlertBox()" type="text" class="form-control" id="bookid" name="bookid"
                                    placeholder="Book ID" required>
                            </div>

                            <div class="row col-md-4 p-4">
                                <input type="text" class="form-control" id="author" name="authorname"
                                    placeholder="Author" required>
                            </div>
                            <div class="row col-md-2 p-4" style="margin-left: 30px;">
                                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"
                                        style="font-size: 20px;"></i></button>
                            </div>
                            <div class="row col-md-2 p-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                <i class="bi bi-search" style="font-size: 20px;"></i>
                            </button>
                            </div>
                            <div class="row col-md-12 p-4">
                                <input type="text" onclick="hideAlertBox()" class="form-control" id="title" name="title"
                                    placeholder="Book Title" required /><br>
                            </div>

                            


                            <?php 
                            if (isset($_GET['success'])) { 
                                echo('<div id="alertbox" class="alert alert-success mt-1" role="alert" style="max-width: 350px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                                  Added to collection!
                                </div>');
                              }
                             if (isset($_GET['deleted'])){
                                echo('<div id="alertbox" class="alert alert-danger mt-1" role="alert"
                                    style="max-width: 500px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                                    Book collection deleted!
                                </div>');
                            }
                            ?>
                        </div>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog"
                        aria-labelledby="searchModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <form action="" method="GET">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control" id="searchInput"
                                                placeholder="Spotlight Search..."><br>

                                        </div>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
        <table class="table table-success table-hover">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Stock Count</th>
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

          // SQL query to select the desired columns from the "Book" table
          $sql = "SELECT bookId,Title,Author,Stock_count FROM Book ORDER BY Author ASC";

          //Check if a search request has been made
          if(isset($_GET['search'])){
            $search = $_GET['search'];
            //returns all
            if($search == ""){
              $sql = "SELECT bookId,Title,Author,Stock_count FROM Book ORDER BY Author ASC";

            }
            $sql = "SELECT bookId,Title,Author,Stock_count FROM Book WHERE Title LIKE '%$search%' ORDER BY Author ASC";
          }else{
            $sql = "SELECT bookId,Title,Author,Stock_count FROM Book ORDER BY Author ASC";
          }


          // Execute the query
          $result = $conn->query($sql);

          // Check if the query was successful
          if ($result) {
              // Fetch the rows
              while ($row = $result->fetch_assoc()) {
                  // Display the data in table rows
                  echo "<tr>";
                  echo "<td class='p-3'>" . $row["bookId"] . "</td>";
                  echo "<td class='p-3'>" . $row["Title"] . "</td>";
                  echo "<td class='p-3'>" . $row["Author"] . "</td>";
                  echo "<td class='p-3'>" . $row["Stock_count"] . "</td>";
                  echo "<td class='p-3'>
                         <a class='btn btn-primary editBtn' 
                            data-id='" . $row["bookId"] . "' 
                            data-booktitle='" . htmlspecialchars($row["Title"]) . "' 
                            data-bookauthor='" . htmlspecialchars($row["Author"]) . "' 

                            data-bs-toggle='modal' 
                            data-bs-target='#editModal'>
                            <i class='bi bi-pencil-square'></i></a>
                   <a class='btn btn-danger' href=" . "dbbooks.php?delid=" .urlencode($row["bookId"]) . "><i class='bi bi-trash' style='font-size: 16px;'></i></a> </td>";
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
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" action="dbbooks.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="editDescription" name="description" required>
                            <input type="hidden" id="editbookid" name="bookid">
                            <input type="hidden" id="editauthorname" name="authorname">
                            <input type="hidden" id="edittitle" name="title">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <br><br><br><br>
    <!-- Footer -->
    <?php include_once("../footer.php")?>

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

    //edit modal
    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var bookId = button.getAttribute('data-id');
            var title = button.getAttribute('data-booktitle');
            var authorname = button.getAttribute('data-bookauthor');

            var modal = editModal.querySelector('.modal-body #editDescription');
            var idField = editModal.querySelector('#editbookid');
            var authornameField = editModal.querySelector('#editauthorname');
            var titleField = editModal.querySelector('#edittitle');

            modal.value = title;
            idField.value = bookId;
            authornameField.value = authorname;
            titleField.value = title;
        });
    });

    </script>


</body>

</html>