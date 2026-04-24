<?php
session_start();

// Check if empname session variable is set
if(isset($_SESSION["empname"])) {
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
    if($result) {
        // Check if any rows were returned
        if(mysqli_num_rows($result) > 0) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);

            // Store user data in variables
            $id = isset($row['eid']) ? $row['eid'] : "";
            $name = isset($row['ename']) ? $row['ename'] : "";
            $email = isset($row['email']) ? $row['email'] : "";
            $post = isset($row['pos']) ? $row['pos'] : "";
            $address = isset($row['city']) ? $row['city'] : "";
            $organizationName = isset($row['cname']) ? $row['cname'] : "";
            $website = isset($row['website']) ? $row['website'] : "";
            $description = isset($row['description']) ? $row['description'] : "";

            // Handle form submission for updating profile
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $organizationName = $_POST['organizationName'];
                $address = $_POST['organizationAddress'];
                $name = $_POST['full-name'];
                $pos = $_POST['mobile-number'];

                // Update user data in the database
                $updateQuery = "UPDATE employee SET cname='$organizationName', city='$address', ename='$name',pos='$pos' WHERE eid='$empname'";
                $updateResult = mysqli_query($link, $updateQuery);

                if($updateResult) {
                    echo "<script>alert('Profile updated successfully.')</script>";
                    
                } else {
                    echo "Failed to update profile: " . mysqli_error($link);
                }
            }
          
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Employee  Dashboard</a>
                        <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
                        <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <!-- Left section with form -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-left">
                    <ul class="list-group">
                        <!-- <li class="list-group-item"><a href="#" style="color: black;">Dashboard</a></li> -->
                        <li class="list-group-item"><a href="empwelcome.php" style="color: black;">Profile</a></li>
                        <li class="list-group-item"><a href="jobpost.php" style="color: black;">Post Internship</a></li>
                        <li class="list-group-item"><a  href="home.php"       style="color: black;" onclick="logout()">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Right section with card view -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <h4>Personal Details</h4>
                    <p>Edit your organization details, address and website etc...</p>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <!-- Full Name Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full-name">Full Name</label>
                                    <input type="text" class="form-control" id="full-name" name="full-name" placeholder="Enter post" value="<?php echo $name ?>">
                                </div>
                            </div>
                            <!-- Mobile Number Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile-number">Post</label>
                                    <input type="text" class="form-control" id="mobile-number" name="mobile-number" placeholder="Enter your mobile number" value="<?php echo $post ?>">
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <h4> Organization Details</h4>
                        <p>Edit your organization details, address and website etc...</p>

                        <div class="form-group">
                            <label for="organizationName">Organization Name:</label>
                            <input type="text" class="form-control" id="organizationName" name="organizationName" placeholder="Enter organization name" value="<?php echo $organizationName ?>">
                        </div>

                        <div class="form-group">
                            <label for="organizationAddress">Address:</label>
                            <input type="text" class="form-control" id="organizationAddress" name="organizationAddress" placeholder="Enter address" value="<?php echo $address ?>">
                        </div>

                        <button type="submit" class="btn btn-primary" style="background-color: rgb(46, 58, 151);">Update Profile</button>
                        <button type="button" class="btn btn-primary" onclick="next()" style="background-color: rgb(255, 255, 255); color: rgb(46, 58, 151); font-weight:bold;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

    function next() {
        // Redirect the user to another page
        window.location.href = 'empprofile.php';
    }
</script>

</body>
</html>
