<?php
	session_start();
	if(!isset($_SESSION['empname'])){
		header("location:emplogin.php");
	}
?>
<!DOCTYPE html>
<html>
	
<head>
	
 
	<meta charset="utf-8">
  <title>New Intership</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  
  <link href="img/job.png" rel="icon">
   <link href="img/job.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  


  





    <style>
 .footer {
            background-color: rgb(46, 58, 151);
            color: #fff;

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
   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	


<script>
        function showDateFields() {
            var dateFields = document.getElementById('dateFields');
            var startDateField = document.getElementById('startDateField');
            var endDateField = document.getElementById('endDateField');

            dateFields.style.display = 'block';
            endDateField.style.display = 'block';
    
        }

        function showInstituteCodeField() {
            var instituteCodeField = document.getElementById('instituteCodeField');
            var label = document.getElementById('instituteCodeLabel');

            instituteCodeField.style.display = 'block';
            label.style.display = 'block';
        }


        function usernamecheck() {
    $("#loaderIcon").show();
    $.ajax({
        url: "check3.php",
        data: { username: $("#jid").val() },
        type: "POST",
        success: function (data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
            
            showOtherFields();
        },
        error: function () {}
    });
}

       
    </script>


	
    
</head>
<body> 
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#intro">New Company Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            
                <li class="nav-item">
                    <a class="nav-link" href="empprofile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jobpost.php">Post Internship</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Employee Dashboard</a>
                        <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
                        <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>	 -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="index.html" class="navigation-bar__logo navbar-brand">
                <img src="img/logo.png" alt="sanikalogo" class="auto-style1" height="60" width="170" />
            </a>
    <div class="container">
        <!-- <a class="navbar-brand" href="#intro">New Company Registration</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="font: size 20px; font-weight:bold;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="empprofile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jobpost.php">Post Internship</a>
                </li>


                <li class="nav-item"><a href="uploadlectures.php" class="nav-link">Upload Lectures</a></li>
          <li class="nav-item"><a href="empjobstatus.php" class="nav-link"> Application Status</a></li>
          <li class="nav-item"><a href="jobappliedlist.php" class="nav-link">Applied List</a></li>
          <li class="nav-item"><a href="stuqueryes.php" class="nav-link">Querys</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Employee  Dashboard</a>
                        <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
                        <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
	
	<br><br>
	
	
    

    
    <div style="text-align:center">
    <h3 class="page-header">Internship Post Form</h3>
    </div>
    <br><br>
    
    <div class="container add_employee_form" style="background-color: blanchedalmond; padding:20px; margin-bottom:20px;">
    <form action="" method="POST">
        <h4 class="page-header" align="center">Fill The Form</h4>
        <div class="box">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2"><label id="ljid" style="margin-left: 58px;">Internship ID</label></div>
                    <div class="col-md-3"><input type="text" class="form-control" id="jid" placeholder="Ex: j1" name="jid" onBlur="usernamecheck()" required>
                        <span id='user-availability-status'></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="right"></span>
                    </div>
                    <div class="col-md-3 text-right"><label id="ljname">&nbsp;&nbsp;Company&nbsp;Name</label></div>
                    <div class="col-md-3"><input type="text" class="form-control" id="jname" placeholder="Enter Your name" name="jname" pattern="{2,30}" title="Only alphabet" required></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-right"><label id="ljdesc">&nbsp;&nbsp;Internship Description</label></div>
                    <div class="col-md-3"><textarea class="form-control" id="jdesc" placeholder="Write About This Internship" name="jdesc" required></textarea> </div>
                    <div class="col-md-3 text-right">
                        <label id="lcity">City Name</label>
                    </div>
                    <div class="col-md-3">
                        <input list="country_list" name="city" id="city" class="form-control" placeholder="Enter City name" pattern="[A-Za-z]{2,30}" required>
                        <datalist id="country_list">
                            <?php include("city_list.php"); ?>
                        </datalist>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-right"><label id="lpost">&nbsp;&nbsp;Course</label></div>
                    <div class="col-md-3">
                        <select name="post" id="post" class="form-control" placeholder="Enter The Post" required>
                            <option value="">Courses...</option>
                            <option value="Network engineering">Network engineering</option>
                            <option value="Game development ">Game development </option>
                            <option value="Artificial intelligence/machine learning">Artificial intelligence/machine learning</option>
                            <option value="Web development ">Web development </option>
                            <option value="Mobile application development">Mobile application development</option>
                            <option value="Cybersecurity">Cybersecurity</option>
                            <option value="Software Development">Software Development</option>
                        </select>
                    </div>
                    <div class="col-md-3 text-right">
                        <label id="lsal">Duration</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="sal" id="sal" class="form-control" placeholder="Enter Duration in Month" pattern="[\d]+" required>
                    </div>
                </div>
            </div>

            <div class="form-group" id="dateFields">
                <div class="row">
                    <div class="col-md-2 text-right"><label for="startDate">Start Date</label></div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="col-md-2 text-right" style="margin-left: 95px;"><label for="endDate" >End Date</label></div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                </div>
            </div>

            <div class="form-group" id="instituteCodeField">
                <div class="row">
                    <div class="col-md-2 text-right"><label for="instituteCode">Institute Code</label></div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="instituteCode" name="instituteCode" placeholder="Enter Institute Code" required>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button class="btn btn-success btn-lg btn-outline-* btn-block" id="submit" style="background-color:#2e5090;" name="submit">Post Internship</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </form>
</div>







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


  <script src="js/main.js"></script>
  <script src="js/main.js"></script>





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

  

</body>
</html>



<?php

if(isset($_POST['submit']))
{
    $jid = $_POST['jid'];
    $jname = $_POST['jname'];
   
    $jdesc = $_POST['jdesc'];
    
    $post = $_POST['post']; 
   
    $city = $_POST['city'];
    
    $sal = $_POST['sal'];

    $eid = $_SESSION["empname"];

    $instituteCode= $_POST['instituteCode'];
    $startDate= $_POST['startDate'];
    $endDate= $_POST['endDate'];
    
    $conn = mysqli_connect("localhost:3306","root","","intern") or die("failed to connect database");

    $jid = mysqli_real_escape_string($conn,$jid);
    
	$jname = mysqli_real_escape_string($conn,$jname);
	
	$jdesc = mysqli_real_escape_string($conn,$jdesc);
	
	$post = mysqli_real_escape_string($conn,$post);
	
	$city = mysqli_real_escape_string($conn,$city);
	
	$sal = mysqli_real_escape_string($conn,$sal);
	
	$eid = mysqli_real_escape_string($conn,$eid);


    $result = mysqli_query($conn, "INSERT INTO job (jid, cname, jdesc, loc, jpost, sal, uname, eid, instituteCode, startDate, endDate,status) VALUES ('$jid', '$jname', '$jdesc', '$city', '$post', '$sal', '0', '$eid', '$instituteCode', '$startDate', '$endDate','not approved')") or die("Query Failed" . mysqli_error($conn));


    // $result = mysqli_query($conn,"insert into job values ('$jid','$jname','$jdesc','$city','$post','$sal','0','$eid','$instituteCode','$startDate','$endDate')") or die("Query Failed".mysqli_error($conn));
	echo "<script>alert('Job Posted Successfully')</script>";
}
else
{

}

?>
