<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Registration</title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      text-align: center;

    }

    .form-group label {
      color: red;
      font-weight: bold;
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
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a href="index.html" class="navigation-bar__logo navbar-brand ">
      <img src="img/logo.png" alt="sanikalogo" class="auto-style1" height="60" width="170" />
    </a>
    <div class="container">
      <!-- <a class="navbar-brand" href="#intro">New Company Registration</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Registration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="empreg.php">Company </a>
              <a class="dropdown-item" href="clgreg.php">College </a>
              <a class="dropdown-item" href="studentreg.php">Student </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="#" id="studentRegistrationLink" class="nav-link" data-toggle="modal" data-target="#exampleModal">
              Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>

  <div class="container mt-5">
    <div>
      <h3 style="text-align:center;">Hire Next Interns at <mark>Internship</mark></h3>
      <h4 style="text-align:center;">Post jobs for free now</h4>
    </div>



    <div class="container mt-5">

      <div class="row mt-4">
        <div class="col-md-6">
          <!-- Left Section Content Goes Here -->
          <div class="card-body text-center">
            <img src="https://internshipgate.com/static/media/employer-registration.99a84327c283de29084e.png" class="img-fluid" alt="Image">
          </div>

        </div>
        <div class="col-md-6">
          <!-- Right Section Content Goes Here -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Create an account to continue</h4>
              <form action="" method="POST">


                <div class="form-group">

                  <input type="text" class="form-control" id="eid" name="eid" placeholder="Enter Company ID" required>
                </div>
                <div class="form-group">

                  <input type="text" class="form-control" id="ename" name="ename" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">

                  <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Company Name" required>
                </div>
                <div class="form-group">

                  <input type="text" class="form-control" id="pos" name="pos" placeholder="Enter Job Position" required>
                </div>
                <div class="form-group">

                  <input list="country_list" name="city" id="city" class="form-control" placeholder="Enter City name" required>
                  <datalist id="country_list">
                    <?php include("city_list.php"); ?>
                  </datalist>
                </div>
                <div class="form-group">

                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                  <button type="submit" class=" btn-lg btn-block" name="submit" style="background-color:rgb(46, 58, 151); color:white; ">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>



      </div>
    </div>
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

              <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
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

  <!-- JavaScript to open the second modal -->
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

  <?php
  if (isset($_POST['submit'])) {
    $eid = $_POST['eid'];
    $ename = $_POST['ename'];
    $cname = $_POST['cname'];
    $pos = $_POST['pos'];
    $city = $_POST['city'];
    $pass = $_POST['pass'];
    $scu = 'ghjklcvbnm';
    $su = 'qwertyuiopedfvbnpojhg';
    $pd = $su . sha1($_POST['pass']) . $scu;

    $conn = mysqli_connect("localhost:3306", "root", "", "intern") or die("failed to connect database");
    $eid = mysqli_real_escape_string($conn, $eid);
    $ename = mysqli_real_escape_string($conn, $ename);
    $cname = mysqli_real_escape_string($conn, $cname);
    $pos = mysqli_real_escape_string($conn, $pos);
    $city = mysqli_real_escape_string($conn, $city);


    $result = mysqli_query($conn, "insert into employee values ('$eid','$ename','$cname','$pos','$city','$pd')") or die("Query Failed" . mysqli_error($conn));
    echo "<script>alert('Registration Successful')</script>";
    echo "<script>location.href='empreg.php'</script>";
  }
  ?>
</body>

</html>