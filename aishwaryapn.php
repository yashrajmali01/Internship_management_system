









	<?php
	session_start();
	if(!isset($_SESSION['empname'])){
		header("location:emplogin.php");
	}
	
	$username=$_SESSION['empname'];	
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

  
 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  
 
  
	
	

  
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
	
 
</head>
<body >

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#intro">New Company Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li> -->
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
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Employee Dashboard</a>
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
                <form id="resetPasswordForm" action="updatepassemp.php" method="POST">
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
	
	
	
	
	
    <div style="text-align:center; margin-top:60px;">
        <h3 >Here is The Applied List</h3>
        <h3 >Here is The Certificate List - <a href="certificaterequest.php">Show Requests</a></h3>
		 
		<form method="POST">
   
    </div>
	
	<div class="container">
	<table class="table">
  <thead class="thead-dark">
    <tr>
    <tr>
                <th scope="col">Internship Id</th>
				<th scope="col">Student Name</th>
				<th scope="col">Comany Name</th>
                <th scope="col">Action</th>
               
    </tr>
  </thead>
  <tbody>
 
        
        <tbody>
			
			<script>
			
			function cancel(jid)
				{	//alert(jid);
					var ajx=new XMLHttpRequest();
			ajx.onreadystatechange=function()
			{
				if ( this.readyState == 4 && this.status == 200 )
				{
					alert(this.responseText);
				}
			}
			ajx.open( "POST", "cancel2.php", true );
			ajx.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
			ajx.send("jid=" +jid);
				}
	</script>
			
			
            <?php
			
			
                $eid = $_SESSION["empname"];
				$conn=mysqli_connect("localhost:3306","root","","intern") or die("connection failed".mysqli_connect_error());
                $query = "select * from jobapplied where eid='$eid'";
              
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
					
                        echo "<tr><td><form action='' method='POST'>".$row['jid']."<td><a href='profile.php?u=".$row["sid"]."'>".$row['sid']."</a></td><td>".$row["cname"]."</td><td>";
					
						
                    }
                }			
				
				else
				{
					echo "<tr><td colspan='7' class='box-sm'><h4 class='page-header'>No Job Found</h4></td></tr>";
				}
				
			  
	
			   ?>
			
		

        </tbody>
    </table>
    </form>
	</div>	



  <footer class="footer mt-2 fixed-bottom" >
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
            </div>
            <div class="col-md-3 mt-5">
                <h5>CATEGORIES</h5>
                <ul class="list-unstyled mb-4">
                    <li><a href="#">Design Internship</a></li>
                    <li><a href="#">Coding Internship</a></li>
                    <li><a href="#">Business Analytics Internship</a></li>
                    <li><a href="#">Digital Marketing Internship</a></li>
                    <li><a href="#">Finance Internship</a></li>
                    <li><a href="#">Content Writing Internship</a></li>
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

        
        if (newPassword !== confirmPassword) {
            alert("Passwords do not match");
            return;
        }

        
        $('#resetPasswordForm').submit();
    }

    function logout() {
        
        window.location.href = 'logout2.php'; 
    }




</script>

  
	
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
</body>
</html>


<?php








?>
