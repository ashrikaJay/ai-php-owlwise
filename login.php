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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">

  </head>
  <body style="background-color:#1f3b59">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Navigation elements-->
    <?php include_once 'nav-common.php'; ?>

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
      </div><br><br><br><br>

      

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
    <?php include_once("footer.php"); ?>
  </body>
</html>