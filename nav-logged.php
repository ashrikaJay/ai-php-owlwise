<!-- Navigation for a logged in user (some elements are dynamic in each)-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <?php
            $currentPage = $_SERVER['REQUEST_URI'];

            if(basename($_SERVER['PHP_SELF']) === 'dashboard.php') {
                echo '<a class="navbar-brand" href="#">
            <img src="img/apple-touch-icon.png" alt="OwlWise Logo" width="30" height="30" class="logo-to-brand">
            OwlWise Inc.</a>';

            }else{
                echo '<a class="navbar-brand" href="#">
            <img src="../img/apple-touch-icon.png" alt="OwlWise Logo" width="30" height="30" class="logo-to-brand">
            OwlWise Inc.</a>';

            }
        ?>
        

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-underline">
                <!-- php code fro dynamic functionalities -->
                <?php
                    if(basename($_SERVER['PHP_SELF']) === 'index.php') {
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>';

                    }



                    if(basename($_SERVER['PHP_SELF']) === 'dashboard.php') {
                        echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../dashboard.php">Dashboard</a>

                        </li>';
                    }//removed the icon, display issues

                
                    if (strpos($currentPage, 'tasks/index.php') !== false) {
                        echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Tasks</a>
                        </li>';
                    } elseif (strpos($currentPage, 'notes/index.php') !== false) {
                        echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Notes</a>
                        </li>';
                    }elseif (strpos($currentPage, 'items/index.php') !== false) {
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Tasks</a>
                        </li>';
                        echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Task Todos</a>
                        </li>';
                    }elseif (strpos($currentPage, 'books/index.php') !== false) {
                        echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Books</a>
                        </li>';
                    }elseif (strpos($currentPage, 'authors/index.php') !== false) {
                        echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Authors</a>
                        </li>';
                    }

                    if(basename($_SERVER['PHP_SELF']) === 'dashboard.php') {
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../logout.php">Logout</a>

                        </li>';
                    }
            
                ?>
                <!-- <li class="nav-item">
                    <a id="logout" class="nav-link" href="logout.php">Logout</a>
                </li> -->
                

            </ul>
        </div>
    </div>
</nav>