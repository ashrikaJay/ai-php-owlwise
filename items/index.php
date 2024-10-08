<?php
//notes index page!
session_start();
if(!isset($_SESSION['userloggedin'])){
  header('Location: ../login.php');
  exit();

}

if (isset($_GET['taskname']) && isset($_GET['cdate'])) {
    $lname = $_GET['taskname']; //lname
    $cdate = $_GET['cdate'];//cdate
   
} else {
    if (isset($_GET['editid'])) {
        $editid = $_GET['editid'];
        $edittaskname = $_GET['edittaskname'];
        $description = urldecode($_GET['description']);
        ?>

<?php
    }else{
    header('Location: ../tasks/index.php');
    exit;
    }
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

    <title>Todo Items</title>

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


    <!-- Note input form -->
    <div class="container-md mt-5" style="max-width: 700px;">
        <br>
        <div class="custom-shadow">
            <div class="card-type-2">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../img/working.png" height="420px" width="420px"
                            style="border-radius: 50%;margin-left: 40px;">
                    </div>
                    <div class="col-md-6">
                        <h1 class="hero-text" style="font-family: Poetsen One ,sans-serif; color:#1f3b59; margin-left:10px;">
                            <div><?php echo ($lname); ?><br></div>
                            <div><span
                                    class="text-secondary fs-4"><?php echo ($cdate); //cdate should be deadline?></span>
                            </div>

                        </h1>
                    </div>
                    <br><br>


                </div>

                <!-- Item finder -->
                <div class="container-md" style="background-color: #568ec9;">
                    <form action="dbitems.php?taskname=<?php echo ($lname); ?>&cdate=<?php echo ($cdate); ?>"
                        method="POST">

                        <div class="row">
                            <!-- Input element and Add/Search button -->

                            <div class="row col-md-8 p-4">
                                <input onclick="hideAlertBox()" type="text" class="form-control" id="description"
                                    name="description" placeholder="Description" required>
                            </div>
                            <div class="row col-md-2 p-4" style="margin-left: 5px;">
                                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"
                                        style="font-size: 18px;"></i></button>
                            </div>
                            <div class="row col-md-2 p-4">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#searchModal">
                                    <i class="bi bi-search" style="font-size: 18px;"></i>
                                </button>
                            </div>

                            <!-- Alert box -->
                            <?php if (isset($_GET['success'])): ?>
                            <div id="alertbox" class="alert alert-success mt-1" role="alert"
                                style="max-width: 400px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                                Task item added!
                            </div>
                            <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>

                            <?php if (isset($_GET['deleted'])): ?>
                            <div id="alertbox" class="alert alert-danger mt-1" role="alert"
                                style="max-width: 400px;  position: relative; left: 50%; transform: translateX(-50%); border-radius: 15px;">
                                Task item deleted!
                            </div>
                            <?php endif; ?>
                        </div>

                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog"
                        aria-labelledby="searchModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <form action="index.php" method="GET">
                                        <div class="form-group">
                                            <input type="hidden" name="taskname" value="<?php echo ($lname); ?>">
                                            <input type="hidden" name="cdate" value="<?php echo ($cdate); ?>">
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
        </div>
        <!-- Table for task info -->
        <table class="table table-info table-hover" style="max-width: 600px; margin: auto;">
            <tbody>
                <?php
         
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aiphp";
                $email=$_SESSION['userloggedin'];

                $conn = new mysqli($servername, $username, $password, $dbname);

                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT ItemId, Description, Status FROM Item WHERE TaskName = '$lname';";

                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    if($search == ""){
                    $sql = "SELECT ItemId, Description, Status FROM Item WHERE TaskName = '$lname'";

                    }
                    $sql = "SELECT ItemId, Description, Status FROM Item WHERE TaskName = '$lname' AND Description LIKE '%$search%'";//has email instead of TaskName
                }else{
                    $sql = "SELECT ItemId, Description, Status FROM Item WHERE TaskName = '$lname'";
                }


                $result = $conn->query($sql);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='p-3'><input class='form-check-input me-1' type='checkbox' name='deadline' value='' id='firstCheckboxStretched'/></td>";
                        echo "<td class='p-3'>" . $row["Description"] . "</td>";
                        echo "<td class='p-3'>
                         <a class='btn btn-primary editBtn' 
                            data-id='" . $row["ItemId"] . "' 
                            data-description='" . htmlspecialchars($row["Description"]) . "' 
                            data-taskname='" . htmlspecialchars($lname) . "' 
                            data-cdate='" . htmlspecialchars($cdate) . "' 
                            data-bs-toggle='modal' 
                            data-bs-target='#editModal'>
                            <i class='bi bi-pencil-square'></i></a>

                        <a class='btn btn-danger' href=" . "dbitems.php?delid=" . $row["ItemId"] . "&deltaskname=" . urlencode($lname) . "&cdate=" . urlencode($cdate) . "' class='btn btn-danger btn-sm float-end ms-1'>
                        <i class" . "='bi bi-trash'></i></a> </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

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
                    <h5 class="modal-title" id="editModalLabel">Edit Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" action="dbitems.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="editDescription" name="description" required>
                            <input type="hidden" id="editId" name="editid">
                            <input type="hidden" id="editTaskName" name="edittaskname">
                            <input type="hidden" id="editCdate" name="cdate">
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


    <br><br>

    <!-- Footer -->
    <?php include_once("../footer.php"); ?>

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

    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var itemId = button.getAttribute('data-id');
            var description = button.getAttribute('data-description');
            var taskName = button.getAttribute('data-taskname');
            var cdate = button.getAttribute('data-cdate');

            var modal = editModal.querySelector('.modal-body #editDescription');
            var idField = editModal.querySelector('#editId');
            var taskNameField = editModal.querySelector('#editTaskName');
            var cdateField = editModal.querySelector('#editCdate');

            modal.value = description;
            idField.value = itemId;
            taskNameField.value = taskName;
            cdateField.value = cdate;
        });
    });
    </script>


</body>

</html>