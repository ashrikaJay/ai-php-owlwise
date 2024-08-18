<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" type="image/png" href="img/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#1f3b59">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Navigation elements-->
    <?php include_once 'nav-common.php'; ?>

    <!-- intended page structure-->
    <div class="container-md text-center mt-5" style="max-width: 700px;">

        <div class="card" style="width: 40rem; background-color: #568ec9 ;"><br>
            <h2 class="mb-4 fw-light " style="font-family: 'Segoe UI', sans-serif; color:#1f3b59">Let's get you
                registered!</h2>

            <form action="dbregister.php" method="POST">
                <!--email-->
                <div class="container">
                    <div class="input-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" onkeyup="hideAlertBox()" class="form-control text-center"
                                id="InputEmail" name="email" aria-describedby="InfoHelp" placeholder="Email address"
                                required>

                        </div>
                    </div>
                </div>
                <br>




                <!--First & Last names-->
                <div class="container">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control text-center" id="first_name" name="firstName"
                            placeholder="First Name" required>
                    </div>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                        </div>
                        <input type="text" class="form-control text-center" id="last_name" name="lastName"
                            placeholder="Last Name" required>
                    </div>
                </div><br>


                <!--Phone & Birthday-->
                <div class="container">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="tel" class="form-control text-center" id="phone" name="phone"
                            placeholder="Contact number" required>

                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control text-center" id="date" name="birthday"
                            placeholder="Tell us your Birthday" required>

                    </div>
                </div><br>


                <!--Gender & Salary-->
                <div class="container">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-venus-mars"></i></span>
                        </div>
                        <select class="form-select" id="gender" name="gender"
                            style="width: 78%; padding-left: 58px; color: #667379;">
                            <option value="" style="color: #667379;">Select Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Prefer not to say</option>
                        </select>

                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-dollar-sign"
                                    style="margin-right: 8px;"></i></span>
                        </div>
                        <input type="number" class="form-control text-center" step="0.01" id="salary" name="salary"
                            placeholder="Salary" style="margin-right:10px; padding-left: 14px;" required>

                    </div>
                </div><br>

                <!--Password and Confirm Password-->
                <div class="container">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control text-center" id="InputPassword" name="password"
                            placeholder="Password" required>
                    </div>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-text">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-check-circle"></i></span>
                        </div>
                        <input type="password" class="form-control text-center" id="InputConfirmPassword"
                            name="confirmedPassword" placeholder="Confirm Password" required>
                    </div>
                </div><br>

                <!--Form check and Register-->
                <div class="mb-3 form-check text-center">
                    <div class="checkbox-container">
                        <div class="checkbox-centered">
                            <input type="checkbox" class="form-check-input" id="confirmCheck">&nbsp;&nbsp;
                            <label class="form-check-label" for="confirmCheck"
                                style="font-family: 'Segoe UI', sans-serif; color: #1f3b59;">I confirm the details given
                                above</label>

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

    <br><br>
    </div>

    <?php include_once("footer.php"); ?>

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

    // Search placeholder animation -- not activated
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

    //alertbox disappearance
    function hideAlertBox() {
        //var or const
        var alertBox = document.getElementById("alertbox");
        alertBox.style.display = "none";
    }
    </script>

</body>

</html>