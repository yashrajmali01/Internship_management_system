<?php
	
	session_start();
if(isset($_SESSION['empname']))
{
	header("location:empwelcome.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Registration</title>
    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
           
        }

        .container {
            text-align: center;
          
        }

        .form-group label {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
<a href="index.html" class="navigation-bar__logo navbar-brand">
          <img src="img/logo.png" alt="sanikalogo" class="auto-style1" height="60" width="170" />
        </a>
    <div class="container">
        <!-- <a class="navbar-brand" href="#intro">New College Registration</a> -->
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
        <h3 style="text-align:center;">Register your College at InternSpark</h3>
        <p style="text-align:center;">Get started by registering for free.</p>
    </div>



    <div class="container mt-5">
  
    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Left Section Content Goes Here -->
            <div class="card-body text-center">
        <img src="https://internshipgate.com/static/media/college_student.d1deeaecdd8894f2cf28.png" class="img-fluid" alt="Image">
    </div>

        </div>
        <div class="col-md-6">
    <!-- Right Section Content Goes Here -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create an account to continue</h4>
            <form action="" method="POST">

            
                <div class="form-group">
                   
                    <input type="text" class="form-control" id="eid" name="name" placeholder="College name" required>
                </div>
                <div class="form-group">
                   
                    <input type="text" class="form-control" id="ename" name="inscode" placeholder="Institute Code" required>
                </div>
                <div class="form-group">
                  
                    <input type="text" class="form-control" id="cname" name="address" placeholder="Address" required>
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




<footer class="footer" style="background-color: rgb(46, 58, 151); color: rgb(255, 255, 255);">
    <div class="container">
        <div class="row">



        <div class="col-md-3 mt-5">
    <h5>CATEGORIES</h5>

    <div class="social-icons mt-3">
        <!-- Add your social media icons here -->
        <a href="#"><i class="fab fa-instagram" style="color: white;"></i></a>
        <a href="#"><i class="fab fa-facebook-f" style="color: white;"></i></a>
        <a href="#"><i class="fab fa-whatsapp" style="color: white;"></i></a>
        <a href="#"><i class="fab fa-youtube" style="color: white;"></i></a>
        <a href="#"><i class="fab fa-linkedin" style="color: white;"></i></a>
    </div>
</div>


            <div class="col-md-3 mt-5">
                <h5>INTERNSHIPGATE</h5>
                <ul class="list-unstyled mb-4">
                    <li><a href="#" style="color: white;">About Us</a></li>
                    <li><a href="#" style="color: white;">Virtual Internship</a></li>
                    <li><a href="#" style="color: white;">Online Training</a></li>
                    <li><a href="#" style="color: white;">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 mt-5">
                <h5>CATEGORIES</h5>
                <ul class="list-unstyled  mb-4">
                    <li><a href="#" style="color: white;">Design Internship</a></li>
                    <li><a href="#" style="color: white;">Coding Internship</a></li>
                    <li><a href="#" style="color: white;">Business Analytics Internship</a></li>
                    <li><a href="#" style="color: white;">Digital Marketing Internship</a></li>
                    <li><a href="#" style="color: white;">Finance Internship</a></li>
                    <li><a href="#" style="color: white;">Content Writing Internship</a></li>
                    <li><a href="#" style="color: white;">Marketing Internship</a></li>
                </ul>
            </div>
            <div class="col-md-3 mt-5">
                <h5>LOCATIONS</h5>
                <ul class="list-unstyled  mb-4">
                    <li><a href="#" style="color: white;">Internship in Bangalore</a></li>
                    <li><a href="#" style="color: white;">Internship in Pune</a></li>
                    <li><a href="#" style="color: white;">Internship in Mumbai</a></li>
                    <li><a href="#" style="color: white;">Internship in Delhi NCR</a></li>
                    <li><a href="#" style="color: white;">Internship in Kolkata</a></li>
                    <li><a href="#" style="color: white;">Internship in Hyderabad</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>@Copyright 2024 - INTERNSHIPGATE, A Unit of ISAN DATA SYSTEMS</p>
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
if(isset($_POST['submit']))
{
    // Validation for name
    if(empty($_POST['name'])) {
        echo "<script>alert('Name is required')</script>";
        echo "<script>window.history.back()</script>";
        exit(); // Stop further execution
    }
    $name = $_POST['name'];
   
    // Validation for institution code
    if(empty($_POST['inscode'])) {
        echo "<script>alert('Institution Code is required')</script>";
        echo "<script>window.history.back()</script>";
        exit(); // Stop further execution
    }
    $code = $_POST['inscode'];
    
    // Validation for address
    if(empty($_POST['address'])) {
        echo "<script>alert('Address is required')</script>";
        echo "<script>window.history.back()</script>";
        exit(); // Stop further execution
    }
    $address = $_POST['address'];
    
    // Validation for password
    if(empty($_POST['pass'])) {
        echo "<script>alert('Password is required')</script>";
        echo "<script>window.history.back()</script>";
        exit(); // Stop further execution
    } elseif(strlen($_POST['pass']) < 8) {
        echo "<script>alert('Password must be at least 8 characters long')</script>";
        echo "<script>window.history.back()</script>";
        exit(); // Stop further execution
    }
    $password = $_POST['pass'];
    
    // Database connection
    $conn = mysqli_connect("localhost:3306","root","","intern") or die("failed to connect database");

    // Insert into database
    $result = mysqli_query($conn,"insert into collage values ('$name','$code','$password','$address')") or die("Query Failed".mysqli_error($conn));
    echo "<script>alert('Registration Successfull')</script>";
    echo "<script>location.href='clgreg.php'</script>";
}

?>


</body>
</html>




