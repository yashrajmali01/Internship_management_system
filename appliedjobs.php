<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:studentlogin.php");
}

$username = $_SESSION['username'];

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




    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">





    <link href="css/style.css" rel="stylesheet">



    <style>
        /* Custom Styles */

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
            <div class="collapse navbar-collapse" id="navbarNav" style="margin-right:20px; ">
                <ul class="navbar-nav ml-auto" style="font-size:20px;">
                    <li class="nav-item">
                        <a class="nav-link" href="welcomestudent.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="studentapplyjob.php">Find A Internship</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="appliedjobs.php">Applied Internships</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="welcomestudent.php"><i class="fas fa-user"></i> Student Dashboard</a>
                            <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
                            <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>



                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>






    <script>
        function logout() {
            // Send a request to the logout.php script
            window.location.href = 'logout2.php'; // Redirect the user to the logout script
        }
    </script>




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


    <div style="text-align:center; margin-top:20px;">
        <h3>Here is The Internship List</h3>

        <form method="POST">

    </div>


    <div class="container">
        <table style="margin-top:10px;" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Internship Id</th>
                    <th>Company Name</th>
                    <th>Internship Description</th>
                    <th>Internship Location</th>
                    <th>Post Internship</th>
                    <th>Internship Duration</th>
                    <th>Certificate</th>
                    <th>Query</th>
                    <th>Action</th>
                    <th>status</th>
                    <th>Lecture</th>

                </tr>
            </thead>
            <tbody>

                <script>
                    function apply(jid) {

                        //alert(jid);
                        var ajx = new XMLHttpRequest();
                        ajx.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert(this.responseText);
                            }
                        }
                        ajx.open("POST", "apply.php", true);
                        ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        ajx.send("jid=" + jid);

                    }


                    function cancel(jid) {
                        var ajx = new XMLHttpRequest();
                        ajx.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert(this.responseText);
                            }
                        }
                        ajx.open("POST", "cancel.php", true);
                        ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        ajx.send("jid=" + jid);
                    }
                </script>




                <?php
                // session_start();
                $username = $_SESSION["username"];

                $conn = mysqli_connect("localhost:3306", "root", "", "intern") or die("Connection failed" . mysqli_connect_error());

                $query = "SELECT job.*, jobapplied.status FROM job LEFT JOIN jobapplied ON job.jid = jobapplied.jid WHERE job.uname LIKE '%$username%'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $jid = $row['jid'];
                        $status = $row['status'] ?: "Waiting"; // If status is null, set it to "Waiting"

                        echo "<tr>
                <td>{$row['jid']}</td>
                <td>{$row['cname']}</td>
                <td>{$row['jdesc']}</td>
                <td>{$row['loc']}</td>
                <td>{$row['jpost']}</td>
                <td>{$row['sal']}</td>
                
                <td><a href='reqcer.php?sn={$_SESSION["username"]}&cn={$row["eid"]}&jp={$row["jpost"]}'>Request For Certificate</a></td>
                <td><a href='cmpquery.php?c={$row["eid"]}'>Send Query</a></td>
                <td>
                    <form action='' method='POST'>
                        <button type='submit' class='btn btn-xs btn-danger' name='_view2' id='_view2' onclick=cancel('{$jid}')>Cancel</button>
                        <input type='hidden' name='_action' id='_action'>
                    </form>
                </td>
                <td>{$status}</td>
                <td>";

                        // Display the "Start" button only if the status is "Approved"
                        if ($status === 'Approved') {
                            echo "<form action='start.php' method='GET'>
                    <input type='hidden' name='c' value='{$row['cname']}'>
                    <input type='hidden' name='p' value='{$row['jpost']}'>
                    <button type='submit' class='btn btn-xs btn-primary'>Start</button>
                  </form>";
                        }

                        echo "</td>
              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No Job Found</td></tr>";
                }

                mysqli_close($conn);
                ?>














            </tbody>
        </table>
        </form>

    </div>



    <footer class="footer " style="background-color: rgb(46, 58, 151); color: rgb(255, 255, 255);">
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
</body>

</html>


<?php








?>