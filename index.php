<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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

      .carousel-item img {
        width: 100%;
        height: 650px; /* Set the desired height for the images */
        object-fit: cover; /* Ensure the images maintain aspect ratio and cover the carousel item */
      }

      .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        
      }
      .card {
        width: 18rem;
        transition: transform 0.3s;
        margin-right: 20px;
        margin-bottom: 50px;
       
      }

      .card:last-child {
        margin-right: 0;
      }
      
      .card:hover{
        /*clip-path: circle(100%);*/
        transform: scale(1.05);

      }

      .card-type-2{
        padding: 1rem;
        border-radius: 8px;
        background-color: #568ec9 ;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
      }

      .custom-shadow {
        position: relative;
        padding: 3rem;
        margin-bottom: 2rem;
        border-radius: 0.5rem;
        background-color: #074358;
        box-shadow: 0 4px 20px rgba(8, 8, 9, 0.8);
      }

      .card {
        width: 18rem;
        height: 100%; 
      }
      .card-img-top {
        object-fit: cover; 
      }

      #author-event{
        width: 110px; 
        height: 110px; 
        margin-top: 10px; 
        margin-left: 10px;
        margin-bottom: 30px;
      }


      .row.g-0,
      #services-section {
        opacity: 0;
        transform: translateY(20px);
        animation: none;
      }
      
      .row.g-0.visible,
      #services-section.visible {
        opacity: 1;
        transform: translateY(0);
        animation: fadeIn 5s forwards;
      }
      
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .img-shift-right {
        margin-left: 50px;
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
            <h1 class="hero-text" style="font-family: Poetsen One ,sans-serif">OwlWise Inc.</h1>
            <p style="font-weight: 350; text-align: center;" >Welcome to our global friendly platform consisting of many resources for book lovers, career enthusiasts & anyone simply interested <br>in a variety of topics.</p><br>
          
        </div>
        
      </div>
    </div><br><br>

    <!--Images in carousel-->
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>


      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="1500">
          <img src="img/carousel/hardcover-books.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="1500">
          <img src="img/carousel/reading-ebook.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="1500">
          <img src="img/carousel/give-aways.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="1500">
          <img src="img/carousel/kids-charity.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="1500">
          <img src="img/carousel/working-emp.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!--Why Choose Us-->

    <div class="container-fluid" style="background-color: #842f33; height: 500px; "><br><br>
        <div class="row g-0">
            <div class="col-md-7" style="margin-top: 60px;">
                <div class="text-white p-4">
                    <div class="container-fluid">
                    <h3 class="section-title">Why Choose Us?</h3><br>
                    <p class="section-text">Discover the OwlWise difference with our expertly curated selection, personalized recommendations, and a thriving community of book lovers. Enjoy exclusive discounts, sustainable practices, exceptional customer service, and a seamless shopping experience, both online and in-store, with fast delivery and hassle-free returns. Join OwlWise today and connect with fellow book lovers through exclusive events and discussions. We make sure your gain is worth every penny invested so do check out our services. Happy reading!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center" style="margin-right: 20px;">
                    <img src="img/us.png" class="img-fluid rounded" alt="..." >
                </div>
            </div>
        </div>
    </div>
    <!-- data privacy -->
    <div class="container-fluid" style="background-color: #568ec9; height: 500px;">
      <br><br>
      <div class="row g-0">
        <div class="col-md-4">
          <div class="text-center">
            <img src="img/data2.png" class="img-fluid rounded img-shift-right" alt="Data Privacy" >
          </div>
        </div>
        <div class="col-md-7 offset-md-1" style="margin-top: 60px;">
          <div class="text-white p-4">
            <div class="container-fluid" >
              <h3 class="section-title">Worried about Data Security?</h3><br>
              <p class="section-text">At OwlWise, we value your privacy and take your data security seriously. We understand the importance of protecting your personal information and ensuring its confidentiality. Our data privacy practices are designed to safeguard your sensitive data from unauthorized access, use, or disclosure. We implement industry-standard security measures and comply with relevant data protection regulations to ensure the security of your personal data.</p>
            </div>
          </div>
        </div>
      </div>
      <br><br>
    </div><br><br>

    <!--carousel services-->
    <div id="services-section">
    <div class="text-white p-4" style="margin-left: 10px;">
        <div class="container-fluid">
        <h3>What we offer...</h3>
        </div>
    </div>
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
    <div class="carousel-inner"><br>
      <div class="carousel-item active">

        <div class="card-container">
            <div class="card">
                <img src="img/services/recommended.jpeg" class="card-img-top" alt="..." style="width: 200px; height: 150px;">
                <div class="card-body">
                  <h5 class="card-title">Personalized Recommendations</h5>
                  <p class="card-text">Discover your next favorite book with OwlWise's personalized recommendations. Our AI-powered algorithms analyze your reading preferences to suggest books tailored just for you.</p>
                  <a href="#" class="btn btn-primary">Explore Now</a>
                </div>
              </div>
              <div class="card">
                <img src="img/services/bookstack.webp" class="card-img-top" alt="..." style="width: 200px; height: 150px;">
                <div class="card-body">
                  <h5 class="card-title">Monthly Book Boxes</h5>
                  <p class="card-text">Experience the joy of receiving handpicked books every month with OwlWise's subscription service. Each box is curated based on your interests, ensuring a delightful reading experience.</p>
                  <a href="#" class="btn btn-primary" style="margin-top: 22px;">Subscribe Now</a>
                </div>
              </div>
              <div class="card">
                <img src="img/services/new-tag.png" class="card-img-top" alt="New Arrivals" style="width: 140px; height: 150px; margin-left: 12px;">
                <div class="card-body">
                  <h5 class="card-title">New Arrivals</h5>
                  <p class="card-text">Stay updated with the latest additions to our bookstore. Browse through our new arrivals section to find the freshest titles in various genres.</p>
                  <a href="#" class="btn btn-primary" style="margin-top: 45px;">Browse Now</a>
                </div>
              </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card-container">
            <div class="card">
                <img src="img/services/gift.png" class="card-img-top" alt="Gift Card" style="width: 150px; height: 150px; margin-left: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Gift Cards</h5>
                    <p class="card-text">Looking for the perfect gift? Give the gift of reading with OwlWise's gift cards. Ideal for birthdays, holidays, or any special occasion.</p>
                    <a href="#" class="btn btn-primary" style="margin-top: 73px;">Buy Now</a>
                </div>
                </div>
            <div class="card">
                <img src="img/services/club.jpeg" class="card-img-top" alt="Community Book Club" style="width: 180px; height: 150px;">
                <div class="card-body">
                <h5 class="card-title">Community Book Clubs</h5>
                <p class="card-text">Join our community book clubs to share your reading experiences and discover new books with fellow enthusiasts. It's a great way to meet new people and explore different genres.</p>
                <a href="#" class="btn btn-primary" style="margin-top: 25px;">Join Now</a>
                </div>
            </div>
            
            <div class="card">
                <img src="img/services/author-sign.png" id="author-event" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Author Events</h5>
                    <p class="card-text">Join us for virtual author talks and book signings. Get insights into your favorite authors' works and engage in stimulating discussions with fellow book lovers.</p>
                    <a href="#" class="btn btn-primary" style="margin-top: 49px;">Attend Now</a>
                </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card-container d-flex justify-content-center">
            
            <div class="card">
                <img src="img/services/discount.jpeg" class="card-img-top" alt="Discounts" style="width: 180px; height: 150px;">
                <div class="card-body">
                <h5 class="card-title">Exclusive Discounts</h5>
                <p class="card-text">Save big with OwlWise's exclusive discounts and promotions. Check out our deals section to find amazing discounts on your favorite books.</p>
                <a href="#" class="btn btn-primary" style="margin-top: 55px;">Shop Now</a>
                </div>
            </div>
            <div class="card">
                <img src="img/services/delivery.jpeg" class="card-img-top" alt="Delivery or In-Store Shopping" style="width: 200px; height: 150px;">
                <div class="card-body">
                <h5 class="card-title">Convenient Delivery</h5>
                <p class="card-text">Enjoy the convenience of home delivery or choose our in-store pickup option. OwlWise ensures your books are delivered safely and on time.</p>
                <a href="#" class="btn btn-primary" style="margin-top: 55px;">Learn More</a>
                </div>
            </div>
            <div class="card">
                <img src="img/services/donate.jpeg" class="card-img-top" alt="Donate Books" style="width: 130px; height: 150px; margin-left: 30px;">
                <div class="card-body">
                <h5 class="card-title">Donate Books</h5>
                <p class="card-text">Give back to the community by donating books you no longer need. OwlWise partners with local charities to distribute books to those in need.</p>
                <a href="#" class="btn btn-primary" style="margin-top: 55px;">Donate Now</a>
                </div>
            </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
   </div><br><br>
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



    

    </script>
    
    
  </body>
</html>