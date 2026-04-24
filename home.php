<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>The InternSpark</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link href="img/job.png" rel="icon">
  <link href="img/job.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

  <link href="css/style.css" rel="stylesheet">
  <link href="css/style1.css" rel="stylesheet">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <script type="text/javascript" src="js/bootstrap copy.js"></script>



  <style>
    .navbar-custom {
      background-color: white;
    }

    .intro-container img {
      filter: saturate(200%);
    }

    .navbar-custom {
      display: flex;
      /* Make the navbar a flexbox container */
      align-items: center;
      /* Align logo and links vertically */
    }

    .navbar-custom .navbar-brand {
      margin-right: auto;
      /* Push logo to the left edge */
      flex: 0 0 auto;
      /* Prevent logo from shrinking/growing with flexbox */
    }

    .navbar-custom .navbar-nav {
      margin-left: auto;
      /* Push links to the right edge */
    }


    .footer {
      background-color: rgb(46, 58, 151);
      color: #fff;
      padding: 40px 0;
    }

    .footer h5 {
      color: #fff;
    }

    .footer a {
      color: #fff;
    }

    .footer a:hover {
      color: #ccc;
    }

    .social-icons a {
      margin-right: 10px;
    }

    .footer p {
      margin-top: 20px;
      font-size: 14px;
    }

    .navbar-brand {
      display: inline-block;
      /* Ensure the logo appears inline with other navbar elements */
      height: 50px;
      /* Set the height of the logo */
      padding: 10px;
      /* Add padding around the logo */
      margin-right: 15px;
      /* Add some margin to the right of the logo */
    }



    .navbar-custom {
      background-color: white !important;
      /* Override the background color */
    }

    .navigation-bar {
      display: flex;
      align-items: center;
    }

    .navigation-bar__logo {
      margin-right: auto;
      flex: 0 0 auto;
      margin-left: 0px;

    }

    .navigation-bar__links {
      margin-left: auto;
    }
  </style>

</head>

<body>
  <header class="container-fluid bg-primary text-light">
    <div class="container">
      <div class="row">
        <nav class="navigation-bar navbar navbar-expand-lg navbar-light bg-light fixed-top">

          <!-- Logo in the navigation bar -->
          <a href="index.html" class="navigation-bar__logo navbar-brand">
            <img src="img/logo.png" alt="sanikalogo" class="auto-style1" height="60" width="170" />
          </a>

          <!-- Navigation Links -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" style="margin-right:30px; font-size:20px;">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="home.php" style="color:black;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about" style="color:black;">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services" style="color:black;">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact" style="color:black;">Contact Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                  Registration
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="empreg.php">Company</a>
                  <a class="dropdown-item" href="clgreg.php">College</a>
                  <a class="dropdown-item" href="studentreg.php">Student</a>
                </div>
              </li>
              <li class="nav-item">
              <a href="#" id="studentRegistrationLink" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="color:black;">
                Login
              </a>
            </li>
              <!-- <li class="nav-item">
                <a href="#" id="studentRegistrationLink" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  Login
                </a>
              </li> -->
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>



  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button aria-label="Slide 1" class="" data-bs-slide-to="0" data-bs-target="#carouselExampleCaptions" type="button">
      </button>
      <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleCaptions" type="button" class="">
      </button>
      <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleCaptions" type="button" class="active" aria-current="true">
      </button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item" style="background-image: url(&quot;undefined&quot;);">
        <img alt="..." class="d-block w-100" src="img/image1.jpg">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>First slide label</h5>-->
        </div>
      </div>
      <div class="carousel-item" style="background-image: url(&quot;undefined&quot;);">
        <img alt="..." class="d-block w-100" src="img/image5.jpg">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>Second slide label</h5>-->
        </div>
      </div>
      <div class="carousel-item active" style="background-image: url(&quot;undefined&quot;);">
        <img alt="..." class="d-block w-100" src="img/image7.jpg">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>Third slide label</h5>-->
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleCaptions" type="button">
      <span aria-hidden="true" class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Previous</span></button>
    <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleCaptions" type="button">
      <span aria-hidden="true" class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span></button>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <button class="btn btn-primary mr-5" onclick="openAnotherModal2()">
            <i class="fas fa-user-graduate"></i> Student
          </button>
          <button class="btn btn-secondary mr-5" onclick="openAnotherModal3()">
            <i class="fas fa-university"></i> College
          </button>
          <button class="btn btn-info" onclick="openAnotherModal4()">
            <i class="fas fa-building"></i> Company
          </button>




        </div>

      </div>
    </div>
  </div>



  <main id="main">

    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>

            The Internship Management System is a digital platform designed to streamline the process of finding, applying for, and managing internships for students, colleges, and companies. It typically includes features such as user authentication, internship listings, application management, and administrative controls. The system aims to enhance accessibility to internship opportunities, facilitate efficient matching between students and internships, improve communication between stakeholders, and provide valuable insights for decision-making. Overall, it serves as a centralized hub for coordinating internship activities and fostering meaningful learning experiences and professional development for all parties involved. </p>
        </header>
      </div>
    </section>


    <section id="services">
      <div class="container">

        <header class="section-header  wow fadeInUp">
          <h3>Services</h3>
          <p>This Website Will Provide You a lot of services. Those are bellow.</p>
          <table align="center">
            <tr>
              <td align="center"> 1. Providing Efficiency. </td>
            </tr>
            <tr>
              <td align="center"> 2. Providing Interactive User Interface.</td>
            </tr>
            <tr>
              <td align="center"> 3. Company Can Post For an Internship.</td>
            </tr>
            <tr>
              <td align="center"> 4. Student Can Apply For an Internship. </td>
            </tr>

          </table>
        </header>
      </div>
    </section>


    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p> For Any kind of information or any type of help you need, Then Contact Us Below.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address> Rajarambapu Institute of Technology,Rajaramnagar - 415415 </address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+91 8767534566">+91 8767534566</a></p>
              <p><a href="tel:+91 8668221664">+91 8668221664</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="https://www.gmail.com">internspark@gmail.com</a></p>
              <p><a href="https://www.yahoo.co.in">internspark23@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>

    </section>


  </main>










  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Student Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="student_login.php" method="POST">
            <div class="form-group">

              <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
            </div>
            <div class="form-group">

              <input type="password" class="form-control" id="password" name="pass" placeholder="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">College Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="college_login.php" method="POST">
            <div class="form-group">

              <input type="text" class="form-control" id="username" name="username" required placeholder="College ID">
            </div>
            <div class="form-group">

              <input type="password" class="form-control" id="password" name="password" required placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>





  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">Employee Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="employee_login.php" method="POST">
            <div class="form-group">

              <input type="text" class="form-control" id="username" name="username" required placeholder="Employee ID">
            </div>
            <div class="form-group">

              <input type="password" class="form-control" id="password" name="password" required placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    function openAnotherModal2() {
      $('#exampleModal2').modal('show');
    }
  </script>


  <script>
    function openAnotherModal3() {
      $('#exampleModal3').modal('show');
    }
  </script>

  <script>
    function openAnotherModal4() {
      $('#exampleModal4').modal('show');
    }
  </script>




  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mt-5">
          <h5>SOCIAL MEDIA</h5>
          <div class="social-icons mt-3">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
        <div class="col-md-3 mt-5">
          <h5>INTERNSPARK</h5>
          <ul class="list-unstyled mb-4">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Servies</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Register</a></li>
          </ul>
          </ul>
        </div>
        <div class="col-md-3 mt-5">
          <h5>CATEGORIES</h5>
          <ul class="list-unstyled mb-4">
            <li><a href="#">Design Internship</a></li>
            <li><a href="#">Coding Internship</a></li>
            <li><a href="#">Business Analytics Internship</a></li>
            <li><a href="#">Digital Marketing Internship</a></li>
            <li><a href="#">Finance Internship</a></li>
            <!-- <li><a href="#">Content Writing Internship</a></li> -->
            <li><a href="#">Marketing Internship</a></li>
          </ul>
        </div>
        <div class="col-md-3 mt-5">
          <h5>DEVELOPED BY</h5>
          <ul class="list-unstyled mb-4">
                    <li><a href="#">Kausthubh Kadam</a></li>
                    <li><a href="#">Sourabh Vetal</a></li>
                    <li><a href="#">Shubham Patil</a></li>
                    <li><a href="#">Parth Jadhav</a></li>
                    <li><a href="#">Yashraj Mali</a></li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>&copy; 2024 - INTERNSPARK</p>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="contactform/contactform.js"></script>


  <script src="js/main.js"></script>



</body>

</html>

<style>

</style>