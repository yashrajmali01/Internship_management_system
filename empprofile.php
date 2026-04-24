<?php
session_start();

// Check if empname session variable is set
if (isset($_SESSION["empname"])) {
    // User is logged in
    $empname = $_SESSION["empname"];

    // Establish a database connection
    $link = mysqli_connect("localhost:3306", "root", "", "intern") or die("Connection failed: " . mysqli_connect_error());

    // Escape the user ID
    $empname = mysqli_real_escape_string($link, $empname);

    // Query to fetch user data based on the empname
    $query = "SELECT * FROM employee WHERE eid='$empname'";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);

            // Store user data in variables
            $name = isset($row['ename']) ? $row['ename'] : "";
            $post = isset($row['pos']) ? $row['pos'] : "";

            $address = isset($row['city']) ? $row['city'] : "";
            $organizationName = isset($row['cname']) ? $row['cname'] : "";


            // Display user data

        } else {
            echo "No data found for the user.";
        }
    } else {
        echo "Failed to fetch user data: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
} else {
    // User is not logged in
    header("Location: empreg.php"); // Redirect to the login page
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #333;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #333;
        }

        .nav-item.dropdown .dropdown-menu {
            background-color: #fff;
        }

        .modal-content {
            border-radius: 10px;
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


    <div class="container mt-5" style="margin-bottom:30px; border: #333; background-color:bisque; padding-top: 20px; padding-bottom:20px;">
        <div class="row justify-content-center">
            <!-- Center section with organization details -->

            <div class="col-md-6">
                <div class="text-right">
                    <button class="btn btn-primary" style="background-color: rgb(46, 58, 151);" onclick="openEditProfilePage()">Edit Profile</button>
                </div>
                <div class="text-left">

                    <hr>
                    <h4>Organization Details</h4>
                    <br>
                    <p><strong>Name:</strong><?php echo $name ?></p>
                    <p><strong>Post:</strong><?php echo $post ?> </p>

                    <p><strong>Address:</strong> <?php echo $address ?></p>
                    <p><strong>Organisation Name:</strong> <?php echo $organizationName ?></p>

                </div>
            </div>


        </div>
    </div>






    <!-- Modal for Reset Password -->
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


    <script>
        function openEditProfilePage() {
            // Redirect to the desired page
            window.location.href = "empwelcome.php";
        }
    </script>

</body>

</html>