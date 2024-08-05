<!-- Navigation seen for a normal viewer-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="img/apple-touch-icon.png" alt="OwlWise Corp Logo" width="30" height="30" class="logo-to-brand">
      OwlWise Inc.
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav nav-underline">

        <?php
          if(basename($_SERVER['PHP_SELF']) === 'index.php') {
            echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>';
              
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>';

          }

          if(basename($_SERVER['PHP_SELF']) === 'login.php') {
            echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" aria-current="page" href="login.php">Login</a>
            </li>';
          }

          if(basename($_SERVER['PHP_SELF']) === 'register.php') {
            echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="register.php">Register</a>
            </li>';   
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" aria-current="page" href="register.php">Register</a>
            </li>';
          }

        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              About Us
          </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="ourStory.php">Our Story</a></li>
              <li><a class="dropdown-item" href="ourTeam.php">Our Team</a></li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="contactInfo.php">Contact Us</a></li>
          </ul>
        </li>

      </ul>

      <!--<form class="d-flex align-items-center search-form" role="search">
      <input id="searchBar" class="form-control search-input" type="search" placeholder="Look up something?..." aria-label="Search" onfocus="startAnimation()">
      <button class="btn btn-primary" type="submit" style="background-color:#0c617b;" >Search</button>
      </form>-->

      <form class="d-flex search-input" role="search">
        <button class="btn btn-primary" type="button" onclick="redirectToLogin()"
          style="background-color:#0c617b;">Login
        </button>
      </form>

    </div>
  </div>
</nav>

<script>
function redirectToLogin() {
    window.location.href = "login.php";
}
</script>