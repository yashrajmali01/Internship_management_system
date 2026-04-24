<?php
// Start the session
ob_start();
session_start();

// Check if the session variable exists and contains the user ID
if (isset($_SESSION['studid'])) {
    // Session variable exists, fetch user data from the database
    // Replace the database connection details with your own
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "intern";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $studid = $_SESSION['studid'];
    $sql = "SELECT sname,mobile,email,image,experiance FROM student WHERE sid = $studid";
    $result = $conn->query($sql);

    // Check if user data was found
    if ($result->num_rows > 0) {
        // User data found, fetch and display it
        $row = $result->fetch_assoc();
        $name = $row['sname'];
        $mobileNumber = $row['mobile'];
        $email = $row['email'];
        $imagePath = $row['image'];
        $experiance = $row['experiance'];
    } else {
        // User data not found
        $name = "Unknown";
        $mobileNumber = "Unknown";
    }
} else {
    // Session variable does not exist, redirect to login page
    header("Location: login.php");
    exit(); // Ensure that no further code is executed after redirection
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['formType'])) {
    // Retrieve form data
    $name =  $_POST['name'];
    $mobile = $_POST['mobile'];
    $experience =  $_POST['experiance'];

    // Handle profile image upload
    if (isset($_FILES['profileImage'])) {
        $file_tmp = $_FILES['profileImage']['tmp_name'];
        $file_error = $_FILES['profileImage']['error'];

        if ($file_error === 0) {
            // Read the file content
            $fp = fopen($file_tmp, 'r');
            $content = fread($fp, filesize($file_tmp));
            fclose($fp);

            // Escape special characters
            $content = mysqli_real_escape_string($conn, $content);

            // Update database with new values and image content
            $sql = "UPDATE student SET sname='$name', mobile='$mobile', experiance='$experience', image='$content' WHERE sid='{$_SESSION['studid']}'";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formType']) && $_POST['formType'] === 'addeducation') {
    // Retrieve form data
    $sid = $_SESSION['studid'];
    $collegeName = $_POST['clgname'];
    $degree = $_POST['degree'];
    $percentage = $_POST['percentage'];

    // Validate and sanitize the data (not shown here)

    // Insert the data into the database
    // Replace the database connection details with your own
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "intern";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO education (sid, college_name, degree, percentage) VALUES (?, ?, ?, ?)";

    // Bind parameters to SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $sid, $collegeName, $degree, $percentage);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "<script>alert('Education details added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    // Close database connection
    $stmt->close();
}








if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formType']) && $_POST['formType'] === 'addinternship') {
    // Check if the formType is set to addinternship

    // Retrieve form data
    $sid = $_SESSION['studid'];
    $organizationName = $_POST['orgname'];
    $role = $_POST['role'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $location = $_POST['location'];

    // You can perform further validation and sanitization of the data here

    // Assuming you want to store the internship details in a database
    // Connect to your database (replace with your database credentials)
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "intern";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert internship details into the database
    $sql = "INSERT INTO internships (organization_name, role, start_date, end_date, location,sid) 
                VALUES ('$organizationName', '$role', '$startDate', '$endDate', '$location','$sid')";

    if ($conn->query($sql) === TRUE) {
        echo "Internship details saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection

}






if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formType']) && $_POST['formType'] === 'addproject') {
    // Check if the formType is set to addinternship

    // Retrieve form data
    $sid = $_SESSION['studid'];
    // Retrieve form data
    $projectName = $_POST['pname'];
    $description = $_POST['description'];

    // You can perform further validation and sanitization of the data here

    // Assuming you want to store the project details in a database
    // Connect to your database (replace with your database credentials)
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "intern";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert project details into the database
    $sql = "INSERT INTO projects (project_name, description,sid) 
                VALUES ('$projectName', '$description','$sid')";

    if ($conn->query($sql) === TRUE) {
        echo "Project details saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection

}






if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formType']) && $_POST['formType'] === 'addtraining') {
    // Check if the formType is set to addinternship

    // Retrieve form data
    $sid = $_SESSION['studid'];
    // Retrieve form data
    $trainingProgram = $_POST['trainingProgram'];
    $trainingName = $_POST['trainingName'];
    $organization = $_POST['organization'];
    $location = $_POST['location'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $currentlyWorking = isset($_POST['currentlyWorking']) ? 1 : 0;
    $description = $_POST['description'];


    // You can perform further validation and sanitization of the data here

    // Assuming you want to store the training details in a database
    // Connect to your database (replace with your database credentials)
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "intern";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert training details into the database
    $sql = "INSERT INTO training_programs (training_program, training_name, organization, location, start_date, end_date, currently_working, description,sid) 
                VALUES ('$trainingProgram', '$trainingName', '$organization', '$location', '$startDate', '$endDate', '$currentlyWorking', '$description','$sid')";

    if ($conn->query($sql) === TRUE) {
        echo "Training details saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection

}







if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formType']) && $_POST['formType'] === 'addresume') {
    // Retrieve form data
    $sid = $_SESSION['studid'];
    // Check if file was uploaded without errors
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $resume = $_FILES['resume']['name']; // Get the name of the resume file
        $uploadDir = 'resumes/';
        $uploadPath = $uploadDir . $resume;
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadPath)) {
            // File uploaded successfully, proceed with database insertion
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "intern";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Prepare SQL statement to insert resume details into the database
            $sql = "INSERT INTO resume (sid, resume) VALUES ('$sid', '$resume')";
            if ($conn->query($sql) === TRUE) {
                echo "Resume added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // Close the database connection

        } else {
            // Failed to move the uploaded resume file to the specified directory
            echo "Failed to upload resume.";
        }
    } else {
        // No file was uploaded or an error occurred during file upload
        echo "File upload error code: " . $_FILES['resume']['error'];
    }
}

?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .education-records-container {
            display: flex;
            flex-direction: column;
        }

        .education-record {
            display: block;
            margin-bottom: 10px;
            /* Adjust as needed */
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
            <div class="collapse navbar-collapse" id="navbarNav" style="margin-right:20px">
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


                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Student Dashboard</a>
                            <a class="dropdown-item" href="#" onclick="openResetPasswordModal()"><i class="fas fa-key"></i>Reset Password</a>
                            <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i>Logout</a>



                        </div>
                    </li> -->

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











    <div class="container mt-5">
        <h4 class="mb-4">Fields marked with <strong>*</strong> are mandatory to apply for internships</h4>
        <div class="row">
            <!-- Left section with form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <!-- Left section with profile photo -->
                            <div class="col-md-6 text-center mb-4">
                                <div class="profile-photo-container rounded-circle" onclick="document.getElementById('fileInput').click()">
                                    <!-- Profile photo container with hidden file input -->
                                    <?php
                                    // Check if the blob data is available
                                    if ($imagePath !== null) {
                                        // Convert blob data to base64 encoded string
                                        $base64Image = base64_encode($imagePath);
                                        // Create image source data URI
                                        $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                                    } else {
                                        // Default profile photo image source
                                        $imageSrc = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
                                    }
                                    ?>
                                    <!-- Profile photo image -->
                                    <img id="previewImage" src="<?php echo $imageSrc; ?>" class="profile-photo" alt="Profile Photo">
                                    <!-- Hidden file input -->
                                    <input type="file" id="fileInput" style="display: none;">
                                </div>
                            </div>
                            <!-- Right section with name and mobile number -->
                            <div class="col-md-6">
                                <div>
                                    <h4><?php echo $row['sname']; ?></h4>
                                    <p><?php echo $row['email']; ?></p>
                                    <p><?php echo $row['mobile']; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body text-left">
                        <div class="text-right">
                            <i id="editIcon" class="fas fa-edit edit-icon" data-toggle="modal" data-target="#editFormModal"></i>
                        </div>
                        <p>Experience:<?php echo $row['experiance']; ?></p>
                    </div>
                </div>

            </div>



            <!-- Right section with card view -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Basic Details</h4>

                    </div>
                    <div class="card-body">
                        <div class="form-group">

                            <div class="input-group">

                                <label for="location">*Education:</label>
                                <!-- Right side button within the card body -->
                                <?php
                                $studid = $_SESSION['studid'];
                                $sql1 = "SELECT id, college_name, degree, percentage FROM education WHERE sid = $studid";
                                $result1 = $conn->query($sql1);

                                // Check if user education data was found
                                if ($result1->num_rows > 0) 
                                {
                                    // User education data found, fetch and display it
                                    echo "<div class='education-records-container'>";
                                    while ($row = $result1->fetch_assoc()) {
                                        $id = $row['id'];
                                        $clgname = $row['college_name'];
                                        $degree = $row['degree'];
                                        $percentage = $row['percentage'];

                                        //Display education record with delete button
                                        echo "<div class='education-record'>";
                                        echo "<strong>College Name:</strong> $clgname <br>";
                                        echo "<strong>Degree:</strong> $degree <br>";
                                        echo "<strong>Percentage:</strong> $percentage ";
                                        // Add delete button within the same form
                                        echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
                                        echo "<button type='submit' class='btn btn-danger btn-sm' name='delete'>Delete</button>";
                                        echo "</form>";
                                        echo "</div>";

                                        // Check if the delete button is clicked
                                        if (isset($_POST['delete']) && $_POST['id'] == $id) {
                                            // Perform deletion
                                            $delete_id = $id;
                                            $delete_sql = "DELETE FROM education WHERE id = $delete_id";
                                            if ($conn->query($delete_sql) === TRUE) {
                                                echo "<script>alert('Education record deleted successfully');</script>";
                                                // Redirect to refresh the page after deletion
                                                header("Refresh:0");
                                                exit(); // Ensure no further code execution after redirection
                                            } else {
                                                echo "<script>alert('Error deleting education record');</script>";
                                            }
                                        }
                                    }
                                    echo "</div>"; // Close education records container
                                } else {
                                    // User education data not found
                                    echo "<p>No education records found.</p>";
                                }
                                ?>



                                <div class="card-body d-flex justify-content-end">
                                    <button class="btn btn-primary btn-sm" style="background-color: rgb(46, 58, 151); height:40px;" onclick="addeducation('addeducation')">Add Education</button>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <?php
                        $servername = "localhost:3306";
                        $username = "root";
                        $password = "";
                        $dbname = "intern";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        echo "";
                        ?>
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "intern";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the skil field is set and not empty
if(isset($skil) && !empty($skil)) {
    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO forskil (skil) VALUES (?)");
    
    // Check for errors in preparing the statement
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    // Bind parameter
    $stmt->bind_param("s", $skil_param);

    // Set parameter values and execute
    $skil_param = $skil;
    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        // Handle execution error
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    // Close statement
    // $stmt->close();
} else {
    echo "Skil field is empty or not set";
}

// Close connection
// $conn->close();
?>






                        <!-- Modal for adding skills -->
                        <div class="modal fade" id="addSkillModal" tabindex="-1" role="dialog" aria-labelledby="addSkillModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSkillModalLabel">Add Skill</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="newSkillInput" placeholder="Enter Skill">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="saveNewSkillBtn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Your existing HTML code -->
                        <div class="form-group row">
                            <label for="location" class="col-sm-2 col-form-label">KeySkills:</label>
                            <div class="col-sm-10">
                                <div id="skillsContainer">
                                    <!-- Skill input fields will be dynamically added here -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary btn-sm" style="background-color: rgb(46, 58, 151); height:40px;margin-left:425px" id="openAddSkillModalBtn" data-toggle="modal" data-target="#addSkillModal">Add KeySkills</button>


                                <!-- <button class="btn btn-primary btn-sm"  data-target="#addSkillModal">Add KeySkill</button> -->

                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Event listener for saving new skill in the modal
                                $("#saveNewSkillBtn").click(function() {
                                    var newSkill = $("#newSkillInput").val();
                                    if (newSkill.trim() !== "") {
                                        var newSkillField = '<div class="skill-input form-group row">' +
                                            '<div class="col-sm-9">' +
                                            '<input type="text" class="form-control" name="skill[]" value="' + newSkill + '">' +
                                            '</div>' +
                                            '<div class="col-sm-1">' +
                                            '<button class="btn btn-danger btn-sm deleteSkillBtn">&times;</button>' +
                                            '</div>' +
                                            '</div>';
                                        $("#skillsContainer").append(newSkillField);
                                        $("#addSkillModal").modal("hide");
                                    } else {
                                        alert("Please enter a skill.");
                                    }
                                });

                                // Event listener for dynamically added delete buttons
                                $(document).on('click', '.deleteSkillBtn', function() {
                                    $(this).closest('.skill-input').remove();
                                });

                                $("#saveSkillsBtn").click(function() {
                                    var skills = [];
                                    $("input[name='skill[]']").each(function() {
                                        skills.push($(this).val());
                                    });

                                    // Send the skills data to the server-side script for processing
                                    $.ajax({
                                        url: "save_skills.php", // replace with your server-side script
                                        method: "POST",
                                        data: {
                                            skills: skills
                                        },
                                        success: function(response) {
                                            // Handle success response here
                                            console.log(response);
                                        },
                                        error: function(xhr, status, error) {
                                            // Handle error here
                                            console.error(xhr.responseText);
                                        }
                                    });
                                });
                            });
                        </script>

                        <div class="form-group">

                            <div class="input-group">
                                <label for="location">Resume:</label>


                                <?php
                                $studid = $_SESSION['studid'];
                                $sql1 = "SELECT id,resume FROM resume WHERE sid = $studid";
                                $result1 = $conn->query($sql1);


                                if ($result1->num_rows > 0) {

                                    echo "<div class='education-records-container'>";
                                    while ($row = $result1->fetch_assoc()) {
                                        $id = $row['id'];
                                        $resume = $row['resume'];


                                        echo "<div class='education-record'>";
                                        echo "<strong>resume:</strong> $resume <br>";

                                        echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
                                        echo "<button type='submit' class='btn btn-danger btn-sm' name='delete'>Delete</button>";
                                        echo "</form>";
                                        echo "</div>";


                                        if (isset($_POST['delete']) && $_POST['id'] == $id) {
                                            // Perform deletion
                                            $delete_id = $id;
                                            $delete_sql = "DELETE FROM resume WHERE id = $delete_id";
                                            if ($conn->query($delete_sql) === TRUE) {
                                                echo "<script>alert('resume deleted successfully');</script>";
                                                // Redirect to refresh the page after deletion
                                                header("Refresh:0");
                                                exit(); // Ensure no further code execution after redirection
                                            } else {
                                                echo "<script>alert('Error deleting training record');</script>";
                                            }
                                        }

                                        echo "<br>"; // Add a line break between each education record
                                    }
                                    echo "</div>";
                                } else {
                                    // User education data not found
                                    echo "<p>No resume.</p>";
                                }
                                ?>

                                <div class="card-body d-flex justify-content-end">
                                    <button class="btn btn-primary btn-sm" style="background-color: rgb(46, 58, 151); height:40px; margin-right:12px" onclick="addresume('addresume')">Add Resume</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>





    <div class="modal fade" id="editFormModal" tabindex="-1" aria-labelledby="editFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Edit Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="editForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $row['sname'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" value="<?php echo $row['mobile'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="profileImage">Profile Image:</label>
                            <input type="file" class="form-control-file" id="profileImage" name="profileImage">
                        </div>

                        <div class="form-group">
                            <label for="email">Experience:</label>
                            <input type="number" class="form-control" name="experience" placeholder="Enter your Experience" min ="0" max ="50">
                        </div>
                        <!-- Add more form fields as needed -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="editForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>







    <div class="modal fade" id="addeducation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Add Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for adding education -->
                    <form id="addEducationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="formType" value="addeducation">

                        <div class="form-group">
                            <label for="collegeName">College Name:</label>
                            <input type="text" class="form-control" id="collegeName" name="clgname" placeholder="Enter your College name">
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree:</label>
                            <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter your degree">
                        </div>

                        <div class="form-group">
                            <label for="percentage">Percentage:</label>
                            <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Enter your percentage">
                        </div>
                        <!-- Add more form fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addEducationForm" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal fade" id="addinternship" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Add Internship</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="addInternshipForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <input type="hidden" name="formType" value="addinternship">
                        <div class="form-group">
                            <label for="collegeName">Organization Name:</label>
                            <input type="text" class="form-control" id="collegeName" name="orgname" placeholder="Enter the name of your college">
                        </div>



                        <div class="form-group">
                            <label for="role">Role:</label>
                            <input type="text" class="form-control" id="role" name="role" placeholder="Enter your role in the internship">
                        </div>

                        <div class="form-group">
                            <label for="startDate">Start Date:</label>
                            <input type="date" class="form-control" id="startDate" name="startDate">
                        </div>

                        <div class="form-group">
                            <label for="endDate">End Date:</label>
                            <input type="date" class="form-control" id="endDate" name="endDate">
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter the location of the internship">
                        </div>
                        <!-- Add more form fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addInternshipForm" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal fade" id="addproject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for editing -->


                    <form id="addProjectForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <input type="hidden" name="formType" value="addproject">

                        <div class="form-group">
                            <label for="name">Project Name:</label>
                            <input type="text" class="form-control" id="name" name="pname" placeholder="Enter your Project name">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Description</label>
                            <input type="text" class="form-control" id="mobile" name="description" placeholder="Enter Description">
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addProjectForm" class="btn btn-primary">Save changes</button>

                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addtraining" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Add Training Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="addTrainingForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <input type="hidden" name="formType" value="addtraining">
                        <div class="form-group">
                            <label for="trainingProgram">Training Program:</label>
                            <input type="text" class="form-control" id="trainingProgram" name="trainingProgram" placeholder="Enter the name of the training program">
                        </div>

                        <div class="form-group">
                            <label for="trainingName">Name of Training:</label>
                            <input type="text" class="form-control" id="trainingName" name="trainingName" placeholder="Enter the name of the training">
                        </div>

                        <div class="form-group">
                            <label for="organization">Organization/Institute Name:</label>
                            <input type="text" class="form-control" id="organization" name="organization" placeholder="Enter the organization or institute name">
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter the location of the training">
                        </div>

                        <div class="form-group">
                            <label for="startDate">Start Date:</label>
                            <input type="date" class="form-control" id="startDate" name="startDate">
                        </div>

                        <div class="form-group">
                            <label for="endDate">End Date:</label>
                            <input type="date" class="form-control" id="endDate" name="endDate">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="currentlyWorking" name="currentlyWorking">
                            <label class="form-check-label" for="currentlyWorking">Currently working</label>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter a description of the training"></textarea>
                        </div>
                        <!-- Add more form fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addTrainingForm" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addresume" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for editing -->
                    <form id="addResumeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="formType" value="addresume">
                        <div class="form-group">
                            <label for="resume">Upload Resume:</label>
                            <input type="file" class="form-control-file" id="resume" name="resume">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addResumeForm" class="btn btn-primary">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to trigger file input click
        document.getElementById("uploadResumeBtn").addEventListener("click", function() {
            document.getElementById("resume").click();
        });
    </script>




    <!-- JavaScript to open the second modal -->
    <script>
        function openAnotherModal2() {
            $('#exampleModal2').modal('show');
        }
    </script>





    <script>
        function addeducation(formType) {
            // Use the formType parameter to determine which modal to show
            $('#' + formType).modal('show');
        }
    </script>


    <script>
        function addinternship(formType) {
            $('#' + formType).modal('show');
        }
    </script>
    <script>
        function addproject(formType) {
            $('#' + formType).modal('show');
        }
    </script>
    <script>
        function addtraining(formType) {
            $('#' + formType).modal('show');
        }
    </script>

    <script>
        function addresume(formType) {
            $('#' + formType).modal('show');
        }
    </script>




    <!-- JavaScript code -->
    <script>
        $(document).ready(function() {
            // Handle click event of the edit icon
            $('#editIcon').click(function() {
                // Open the modal
                $('#editFormModal').modal('show');
            });
        });
    </script>

    <script>
        // Add an event listener to the button
        document.getElementById('addeducationButton').addEventListener('click', function() {
            // Open the modal by targeting its ID
            $('#addeducationModal').modal('show');
        });
    </script>



    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('previewImage');
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>


<footer class="footer" style="margin-top: 20px;">
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
    <script>
        // JavaScript function to redirect to student registration page
        function redirectToStudentRegistration() {
            window.location.href = "studentreg.php";
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>