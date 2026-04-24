<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["job_id"])) {
    $jobId = $_POST["job_id"];

    // Connect to the database
    $link = mysqli_connect("localhost:3306", "root", "", "intern") or die("failed to connect database");

    // Update job status to "approve"
    $updateQuery = "UPDATE job SET status = 'approve' WHERE jid = '$jobId'";
    mysqli_query($link, $updateQuery) or die("failed to update database" . mysqli_error($link));

    mysqli_close($link);
    echo "<script>alert('Job approved successfully!');</script>";

} else {
    echo "Invalid request.";
}
?>

