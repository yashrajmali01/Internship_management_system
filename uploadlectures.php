<?php
session_start();
if (!isset($_SESSION['empname'])) {
    header("location:emplogin.php");
}

$username = $_SESSION['empname'];



if (isset($_POST['submit'])) {
    // Retrieve other lecture details from the form
    $topicname = $_POST['topicname'];
    $topiclink = $_POST['topiclink'];
    $topiccourse = $_POST['topiccourse'];
    $topicdesc = $_POST['topicdesc'];

    // File upload handling
    $video_name = $_FILES['video']['name'];
    $video_tmp_name = $_FILES['video']['tmp_name'];
    $video_location = "videos/" . $video_name; // Path to store the video file

    // Move uploaded video to the destination directory
    if (move_uploaded_file($video_tmp_name, $video_location)) {
        // Database connection
        $conn = mysqli_connect("localhost:3306", "root", "", "intern") or die("failed to connect database");

        // Insert lecture details into the database
        $result = mysqli_query($conn, "INSERT INTO lectures (id, empname, jpost, topicname, topicdesc, topiclink, video) VALUES (NULL, '$username', '$topiccourse', '$topicname', '$topicdesc', '$topiclink', '$video_name')") or die("Query Failed" . mysqli_error($conn));

        if ($result) {
            echo "<script>alert('Lecture uploaded Successfully')</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    } else {
        echo "<script>alert('Failed to upload video')</script>";
    }
}



if (isset($_POST['delete'])) {

    $id = $_POST["id"];
    $conn = mysqli_connect("localhost:3306", "root", "", "intern") or die("connection failed" . mysqli_connect_error());
    $sql = "DELETE FROM lectures WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Lecture Deleted Successfully')</script>";
    } else {
        echo "<script>alert('Lecture Not  Deleted ')</script>";
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">



    <link href="css/style.css" rel="stylesheet">




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
        table td{
            background-color:#ccc;
        }
    </style>


</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#intro">New Company Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul clas="navbar-nav ml-auto">
             
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
	 -->
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

    <div style="text-align:center; margin-top:20px;">
        <div class="container">
            <form method="post" enctype="multipart/form-data" style="background-color: blanchedalmond; padding:30px">
                <h2><b>Upload Lectures</b> </h2>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><b>Topic Name</b> </label>
                    <input type="text" name="topicname" class="form-control" id="exampleFormControlInput1" placeholder=" " required>
                </div>
                <div class="form-group">

                    <label for="exampleFormControlInput1"><b>Topic Link</b></label>
                    <input type="text" name="topiclink" class="form-control" id="exampleFormControlInput1" placeholder=" " required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><b>Course</b></label>
                    <select name="topiccourse" style="height:35px;" class="form-control" id="exampleFormControlSelect1">
                        <option value="Network engineering">Network engineering</option>
                        <option value="Game development ">Game development </option>
                        <option value="Artificial intelligence/machine learning">Artificial intelligence/machine learning</option>
                        <option value="Web development ">Web development </option>
                        <option value="Mobile application development">Mobile application development</option>
                        <option value="Cybersecurity">Cybersecurity</option>
                        <option value="Software Development">Software Development</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>Details about Lectures</b></label>
                    <textarea class="form-control" name="topicdesc" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1"><b>Upload Video</b></label>
                    <input type="file" name="video" class="form-control-file" id="exampleFormControlFile1" required>
                </div>
                <input class="btn btn-primary" name="submit" type="submit" value="Upload">
            </form>

        </div>

        <div class="container"  style="margin-top:48px">
            <h2><b> Recent Uploads </b></h2>




            <table class="table" style="background-color:grey;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Topic Name</th>
                        <th scope="col">Topic Course</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost:3306", "root", "", "intern") or die("connection failed" . mysqli_connect_error());
                    $query = "select * from lectures where empname='$username'";

                    $result = $conn->query($query);
                    $i = 0;
                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $i = $i + 1;
                    ?>
                            <!-- Table Row -->
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["topicname"]; ?></td>
                                <td><?php echo $row["jpost"]; ?></td>

                                <td><a class="btn btn-danger" href="#" role="button" data-toggle="modal" data-target="#deleteModal<?php echo $row["id"]; ?>">Delete</a></td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this record?
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php  }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>




    <footer class="footer mt-2">
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

        function next() {
            // Redirect the user to another page
            window.location.href = 'empprofile.php';
        }
    </script>
</body>

</html>


<?php








?>