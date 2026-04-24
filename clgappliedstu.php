<?php
session_start();
if (!isset($_SESSION['clgname'])) {
    header("location:clglogin.php");
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Student list</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link href="img/job.png" rel="icon">
    <link href="img/job.png" rel="apple-touch-icon">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <link href="css/style.css" rel="stylesheet">

    <style>
         body {
        background-color: #ffffff;
    }
    table{
        padding: 4px;
    }
    table td{
        background-color: beige;
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




    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 3px;">
        <a href="index.html" class="navigation-bar__logo navbar-brand">
            <img src="img/logo.png" alt="sanikalogo" class="auto-style1" height="60" width="170" />
        </a>
        <div class="container">
            <!-- <a class="navbar-brand" href="#intro">New Company Registration</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="font-size: 20px; font-weight:bold">
                        <a class="nav-link" href="clgwelcome.php">College Home</a>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight:bold">
                        <a class="nav-link" href="companylistapprove.php">company list</a>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight:bold">
                        <a class="nav-link" href="clgstulist.php">Student List</a>
                    </li>


                    <li class="nav-item" style="font-size: 20px; font-weight:bold">
                        <a class="nav-link" href="clgappliedstu.php">Applied Student List</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i>College Dashboard</a>
                            <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i> Reset Password</a>
                            <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="background-color: blanchedalmond; margin-top:20px; margin-bottom:30px; padding:1px;">
        <h1>
            <center><b>List of students who applied for company:</b></center>
        </h1>
        <table class="table table-striped">
            <thead style="background-color: darkgrey;">
                <tr>
                    <th scope="col">Internship id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Institue Code</th>
                    <th scope="col">Company</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost:3306";
                $username = "root";
                $password = "";
                $dbname = "intern";
                $clgcode = $_SESSION["clgname"];
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $user = $_SESSION["clgname"];
                $sql = "SELECT * FROM jobapplied where clgcode='$clgcode'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>



                        <tr>
                            <td scope="row"><?php echo $row["jid"]; ?></td>
                            <td><a href="profile.php?u=<?php echo $row["stuname"]; ?>"><?php echo $row["stuname"]; ?></a> </td>
                            <td><?php echo $row["clgcode"]; ?></td>
                            <td><?php echo $row["cname"]; ?></td>
                        </tr>

                <?php
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </tbody>
        </table>
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
<style>
    .main {
        margin-top: 100px;
        width: 100vw;
        height: 100%;
        display: flex;
        justify-content: center;
    }

    table {
        margin-top: 40px;
    }

    h1 {
        margin-top: 100px;
        color: black;
    }
</style>