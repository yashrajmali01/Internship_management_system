<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['job_id'], $_POST['eid'], $_POST['cname'])) {
  
    $jobId = $_POST["job_id"];   

    $studid = $_SESSION['studid'];
    $user = $_SESSION['username'];
    $job_id = $_POST['job_id'];
    $eid = $_POST['eid'];
    $cname = $_POST['cname'];
    $clgcode = $_SESSION['clgname1'];


       $alertMessage = "College Code: $clgcode\nStudent ID: $studid\nUser: $user\nJob ID: $job_id\nEmployee ID: $eid\nCompany Name: $cname";

    // Output the string as an alert
    echo "<script>alert('$alertMessage');</script>";

    // Database connection
    $link = mysqli_connect("localhost:3306", "root", "", "intern") or die("Failed to connect to database");

    // Retrieve the current users who applied for the job
    $query = "SELECT uname FROM job WHERE jid='$job_id'";
    $result = $link->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $old = $row['uname'];
        }
    }

    // Append the new user to the list of applicants
    $new = $old . ',' . $user;



    echo "<script>alert('$new');</script>";


    // Update the job record with the new list of applicants
    $update_query = "UPDATE job SET uname='$new' WHERE jid='$job_id'";
    $update_result = $link->query($update_query);

    // Check if the update was successful
    if ($update_result) {
        // Insert into jobapplied table
        $insert_query = "INSERT INTO jobapplied (jid, sid, clgcode, stuname, eid, cname) VALUES ('$job_id', '$studid', '$clgcode', '$user', '$eid', '$cname')";
        $insert_result = $link->query($insert_query);

        // Check if the insertion was successful
        if ($insert_result) {
            echo "success";
        } else {
            echo "Insertion failed: " . mysqli_error($link);
        }
    } else {
        echo "Update failed: " . mysqli_error($link);
    }

    // Close database connection
    mysqli_close($link);
} else {
    // Redirect to login page if session data or POST data is missing
    header("Location: studentlogin.php");
    exit();
}
?>
