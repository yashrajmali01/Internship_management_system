<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the password field is set
    if (isset($_POST['newPassword'])) {
        // Sanitize and validate the new password
        $newPassword = trim($_POST['newPassword']);

        echo "<script>alert(' $newPassword');</script>";
        // You can add more validation/sanitization as per your requirements

        // Define prefix and suffix
        $scu = 'ghjklcvbnm';
        $su = 'qwertyuiopedfvbnpojhg';

        // Concatenate prefix, hashed password, and suffix
        $combinedPassword = $su . sha1($newPassword) . $scu;

        // Get the user's ID from the session
        if(isset($_SESSION['studid'])) {
            $userId = $_SESSION['studid'];

          
            $dbHost = 'localhost:3306';
            $dbUsername = 'root'; 
            $dbPassword = ''; 
            $dbName = 'intern'; 

      
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE student SET pass = ? WHERE sid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $combinedPassword, $userId);

            // Execute SQL statement
            if ($stmt->execute()) {
                echo "Password updated successfully";
            } else {
                echo "Error updating password: " . $stmt->error;
            }

            // Close prepared statement and database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "User ID not found in session.";
        }
    } else {
        // New password field is not set
        echo "New password field is not set.";
    }
}
?>
