<?php
session_start();
if (!isset($_SESSION['clgname'])) {
  header("location:clglogin.php");
}

?>


<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Collage Home</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link href="img/job.png" rel="icon">
  <link href="img/job.png" rel="apple-touch-icon">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <style>


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

    @media (max-width: 600px) {
      .card {
        width: 100%;
      }
    }
  </style>


</head>


<body>





  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 3px;">
    <a href="index.html" class="navigation-bar__logo navbar-brand">
      <img src="img/logo.png" alt="sanikalogo" class="auto-style1" height="60" width="170" />
    </a>
    <div class="container">
      <!-- <a class="navbar-brand" href="#intro">New Company Registration</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" style="font-size: 20px; font-weight:bold">
            <a class="nav-link" href="clgwelcome.php">College Home</a>
          </li>

          <li class="nav-item" style="font-size: 20px; font-weight:bold">
            <a class="nav-link" href="companylistapprove.php">company list</a>
          </li>

          <li class="nav-item" style="font-size: 20px; font-weight:bold">
            <a class="nav-link" href="clgstulist.php">Student List</a>
          </li>


          <li class="nav-item" style="font-size: 20px; font-weight:bold">
            <a class="nav-link" href="clgappliedstu.php">Applied Student List</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"><i class="fas fa-user"></i>College Dashboard</a>
              <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
              <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <?php
  $servername = "localhost:3306";
  $username = "root";
  $password = "";
  $dbname = "intern";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $user = $_SESSION["clgname"];
  $sql = "SELECT * FROM collage where instituecode='$user'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $uname = $row["name"];
      $name = $row["instituecode"];
      $cname =  $row["addresss"];
    }
  } else {
    echo "0 results";
  }

  ?>

  <div class="main">
    <div class="card" style="width: 30rem; padding:40px;">
      <div class="card-body d-flex flex-column justify-content-center">
        <img src="img/college.png" width="50%">
        <h5 class="card-text"><b>College Name: <?php echo $uname; ?></b></h5>
        <p class="card-text" style="font-weight:bold;">Institute Code: <?php echo $name; ?></p>

        <p class="card-text" style="font-weight:bold;">College address: <?php echo $cname; ?></p>

        <a href="#" class="card-link"></a>
        <a href="logout.php" class="card-link" style="font-size:18px; color:black; text-decoration:underline; ">Logout</a>
      </div>
    </div>
  </div>





  <footer class="footer mt-5" style="background-color: rgb(46, 58, 151); color: rgb(255, 255, 255);">
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
  <script>
    // JavaScript function to redirect to student registration page
    function redirectToStudentRegistration() {
      window.location.href = "studentreg.php";
    }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/main.js"></script>
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function openResetPasswordModal() {
      $('#resetPasswordModal').modal('show');
    }

    function resetPassword() {
      var newPassword = $('#newPassword').val();
      var confirmPassword = $('#confirmPassword').val();

      // Check if passwords match
      if (newPassword !== confirmPassword) {
        alert("Passwords do not match");
        return;
      }

      // Submit the form directly
      $('#resetPasswordForm').submit();
    }

    function logout() {
      // Send a request to the logout.php script
      window.location.href = 'logout2.php'; // Redirect the user to the logout script
    }
  </script>

</body>

</html>
<style>
  .main {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 150px;
    /* Adjust margin-top as needed */
  }

  .main .card {
    border-radius: 10px;
    height: 430px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    width: 100px;
  }

  .card-body {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .card-body img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
    margin-bottom: 40px;
  }

  /* body {
  background-color:#skyblue;
  height: 100vh;
} */

  .card-text {
    color: black;
  }
</style>
</style>