<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:studentlogin.php");
	}
	
	$username=$_SESSION['username'];
	
	
?>

<!DOCTYPE html>
<html>
<head>
	
	
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  
   <link href="img/job.png" rel="icon">
   <link href="img/job.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  
  

  
 
  
	
	<link href="css/style.css" rel="stylesheet">


  
	
	<link href="css/style.css" rel="stylesheet">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

   
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>

.education-records-container {
display: flex;
flex-direction: column;
}

.education-record {
display: block;
margin-bottom: 10px; /* Adjust as needed */
}
    .container {
        text-align: center;
      
    }

    .form-group label {
        color: red;
        font-weight: bold;
    }

    .profile-photo-container {
width: 100px; 
height: 100px;
border-radius: 50%; 
overflow: hidden;
}

.profile-photo {
width: 100%;
height: 100%;
object-fit: cover;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.footer {
    margin-top: auto;
    background-color: rgb(46, 58, 151);
    color: #fff;
    padding: 40px 0;
}
</style>
	
   
</head>
<body >

<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <div class="container">
        <a class="navbar-brand" href="#intro">New Company Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="studentapplyjob.php" >Find A Internship</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="appliedjobs.php" >Applied Internships</a>
                </li>


              

                
               
             


    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        
    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Student Dashboard</a>
<a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
<a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>

               

    </div>
</li>

            </ul>
        </div>
    </div>
</nav>


	
	
	
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for resetting password -->
                <form id="resetPasswordForm" action="process.php" method="POST">
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="resetPassword()">Reset Password</button>
            </div>
        </div>
    </div>
</div>


<script>
    function logout() {
        // Send a request to the logout.php script
        window.location.href = 'logout2.php'; // Redirect the user to the logout script
    }
</script>
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

</script>
	
	

	<div class="container mt-5">


    <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" pattern="[A-Za-z ]+" required>
 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile No</label>
    <input type="text" name="mobile"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile" pattern="\b\d{10}" required>
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Entery your query</label>
    <textarea class="form-control" name="query" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit Query</button>
</form>



	
	</div>




  <footer class="footer mt-5" style="background-color: rgb(46, 58, 151); color: rgb(255, 255, 255);">
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
</body>
</html>


<?php


    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $query = $_POST["query"];
        $cname = $_GET["c"];


        echo $name;
        echo $mobile;
        echo $query;
        echo $cname;

        $conn = mysqli_connect("localhost:3306","root","","intern") or die("failed to connect database");
        
    $result = mysqli_query($conn,"insert into querys values ('$name','$mobile','$query','$cname')") or die("Someting went wrong Failed".mysqli_error($conn));
	echo "<script>alert('Query Submited Successfull')</script>";
	echo "<script>location.href='studentlogin.php'</script>";

    }





?>
