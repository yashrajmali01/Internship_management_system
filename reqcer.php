<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:studentlogin.php");
	}
	
	$username=$_SESSION['username'];
	
	if(isset($_POST["submit"])){

        $studentname = $_GET["sn"];
        $companyname = $_GET["cn"];
        $jobpost = $_GET["jp"];
      
        $conn = mysqli_connect("localhost:3306","root","","intern") or die("failed to connect database");

        $result = mysqli_query($conn,"insert into certificateRequest values (NULL,'$companyname','$jobpost','$studentname','')") or die("Query Failed".mysqli_error($conn));
       if($result){

           echo "<script>alert('Request For Certificate  Successfully')</script>";
        }else{
           echo "<script>alert('Not  Successfully')</script>";

       }

    }
	
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


	
	
	<div style="text-align:center; margin-top:60px;">
      
<form method="POST">
    <input class="btn btn-primary" type="submit" name="submit" value="Request certificate for  - <?php echo  $_GET["jp"]; ?> ">
</form> 



	</div>

    <div class="container mt-5">
    <table class="table">
  <thead>

 

    <tr>
      <th scope="col">#</th>
      <th scope="col">Course</th>
      <th scope="col">View Certificate</th>
   
    </tr>
  </thead>
  <tbody>
  <?php
   $studentname = $_GET["sn"];
 
  $conn=mysqli_connect("localhost:3306","root","","intern") or die("connection failed".mysqli_connect_error());
                $query = "select * from certificaterequest where sname='$studentname'";
                $i=0;
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                   
                  while($row = $result->fetch_assoc()) {  
                        $i = $i + 1;
                  ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row["jpost"]; ?></td>
      <td><a href="<?php echo $row['certificate']; ?>">Download</a></td>
    
    </tr>

    <?php
                  }
                }
    ?>
 
  </tbody>
</table>
    </div>




    
<footer class="footer " style="background-color: rgb(46, 58, 151); color: rgb(255, 255, 255);">
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
    function logout() {
        // Send a request to the logout.php script
        window.location.href = 'logout2.php'; // Redirect the user to the logout script
    }
</script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php

?>
