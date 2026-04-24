<?php
session_start();

if (isset($_SESSION['clgname1'])) {
    $instituteCode = $_SESSION['clgname1'];
    $status = "approve";


    $link = mysqli_connect("localhost:3306", "root", "", "intern") or die("failed to connect database");


    $query = "SELECT * FROM job WHERE instituteCode = '$instituteCode' AND status = '$status' AND endDate >= CURDATE()";
    if (isset($_GET['location']) && !empty($_GET['location'])) {
        $location = mysqli_real_escape_string($link, $_GET['location']);
        $query .= " AND loc LIKE '%$location%'";
    }

    if (isset($_GET['role']) && !empty($_GET['role'])) {
        $role = mysqli_real_escape_string($link, $_GET['role']);
        $query .= " AND jpost LIKE '%$role%'";
    }




    $result = mysqli_query($link, $query) or die("failed to query database" . mysqli_error($link));


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Institute Data</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

        <link href="css/style.css" rel="stylesheet">
        <link href="css/style1.css" rel="stylesheet">


        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <script type="text/javascript" src="js/bootstrap copy.js"></script>


        <style>
            body {}

            nav {
                top: 0;
                background-color: white;
                height: 80px;
                color: black;
                position: fixed;
                width: 100%;
                z-index: 1000;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 20px;
            }

            .search-bar {
                display: flex;
                flex-direction: row;
                /* Display search options in a row */
                margin-top: 10px;
                /* Adjust the margin as needed */
            }

            .search-option {
                margin-right: 10px;
                width: 150px;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .btn {
                background-color: #4CAF50;
                color: white;
                padding: 8px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-top: 10px;
                /* Adjust the margin as needed */
            }

            .aj {
                display: flex;
                align-items: center;
                justify-content: center;

                margin: 0;
            }


            .card-container {
                margin-top: 80px;
                text-align: center;
            }

            .card {
                border: 1px solid #ccc;
                width: 500px;
                padding: 10px;
                margin: 10px;
                border-radius: 5px;
                text-align: left;
            }

            h2 {
                color: #333;
            }

            button {
                background-color: #4CAF50;
                color: white;
                padding: 8px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .footer {
                background-color: rgb(46, 58, 151);
                color: #fff;
                padding: 40px 0;
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


            @media (max-width: 600px) {
                .card {
                    width: 100%;
                }
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <div class="collapse navbar-collapse" id="navbarNav"style="margin-right:20px;">
                    <ul class="navbar-nav ml-auto" style="font-size:20px;">
                        <li class="nav-item">
                            <a class="nav-link" href="welcomestudent.php" >Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="studentapplyjob.php">Find A Internship</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="appliedjobs.php">Applied Internships</a>
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





        <div class="aj">
            <div class="card-container">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $eid = $row['eid'];
                        $jpost = $row['jpost'];
                        $jid = $row['jid'];
                        $cname = $row['cname'];
                        $jdesc = $row['jdesc'];
                        $loc = $row['loc'];
                        $sal = $row['sal'];
                        $startDate = $row['startDate'];
                        $endDate = $row['endDate'];

                        $studid = $_SESSION["studid"];

                        // Query to check if the student has applied for this job
                        $check_query = "SELECT * FROM jobapplied WHERE sid = '$studid' AND jid = '$jid'";
                        $check_result = mysqli_query($link, $check_query);

                        // If the student has not applied for this job, display it
                        if (mysqli_num_rows($check_result) == 0) {
                ?>
                            <div class="card" id="job_<?php echo $jid; ?>">
                                <p><strong><?php echo $jpost; ?></strong></p>
                                <p style="margin-top: -15px;"><?php echo $cname; ?></p>
                                <p><i class="fa fa-map-marker" style="padding: 2px;"></i> <?php echo $loc; ?></p>
                                <p><i class="fa fa-money" style="padding: 2px;"></i> <?php echo $sal; ?></p>
                                <p><?php echo $jdesc; ?></p>
                                <p><strong>Post Date:</strong> <?php echo $startDate; ?> <strong>End Date:</strong> <span class="card-end-date"><?php echo $endDate; ?></span></p>
                                <form action='' method='post'>
                                    <input type='hidden' name='job_id' value='<?php echo $jid; ?>'>
                                    <button type='button' name='approve' onclick='approveJob("<?php echo $jid; ?>","<?php echo $cname; ?>","<?php echo $eid; ?>");'>Apply</button>
                                </form>
                            </div>
                <?php
                        }
                    }
                } else {
                    $errorMessage = "No job data found for the institute code: $instituteCode";
                }

                mysqli_close($link);
                ?>
            </div>
        </div>

        <?php if (isset($errorMessage)) : ?>
            <p style="margin-top: 50px; color: red; font-weight: bold; font-size: 20px;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            function approveJob(jobId, cname, eid) {
                // Get the end date value from the card
                var endDateString = $("#job_" + jobId + " .card-end-date").text().trim();

                // Convert the end date string to a Date object
                var endDate = new Date(endDateString);

                // Check if the end date is not expired
                if (isDateNotExpired(endDate)) {
                    // Perform AJAX request to approve job
                    $.ajax({
                        type: "POST",
                        url: "apply_job.php", // Replace with the actual path to your PHP script
                        data: {
                            job_id: jobId,
                            cname: cname,
                            eid: eid
                        },
                        success: function(response) {
                            $("#job_" + jobId).fadeOut(); // Hide the approved job
                        },
                        error: function() {
                            alert("Failed to approve job.");
                        }
                    });
                } else {
                    // Display an alert with the end date when it has already expired
                    alert("Job end date has already expired: " + endDateString);
                }
            }

            // Function to check if a date is not expired
            function isDateNotExpired(endDate) {
                var currentDate = new Date();

                // Adjust the date comparison based on your needs
                return endDate >= currentDate;
            }
        </script>
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



    </body>

    </html>
<?php
} else {
    header("Location: studentreg.php");
    exit();
}
?>