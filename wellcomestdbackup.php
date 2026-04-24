<h4>Other Details</h4>

      <div class="form-group">
          
          <div class="input-group">
          <label for="location">*internship:</label>
             <!-- Right side button within the card body -->

             <?php
$studid = $_SESSION['studid'];
$sql1 = "SELECT id, organization_name, role, location FROM internships WHERE sid = $studid";
$result1 = $conn->query($sql1);

// Check if user education data was found
if ($result1->num_rows > 0) {
    // User education data found, fetch and display it
    echo "<div class='education-records-container'>";
    while ($row = $result1->fetch_assoc()) {
        $id = $row['id'];
        $clgname = $row['organization_name'];
        $degree = $row['role'];
        $percentage = $row['location'];

        // Display education record with delete button
        echo "<div class='education-record'>";
        echo "<strong>organization Name:</strong> $clgname <br>";
        echo "<strong>role:</strong> $degree <br>";
        echo "<strong>location:</strong> $percentage ";
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
            $delete_sql = "DELETE FROM internships WHERE id = $delete_id";
            if ($conn->query($delete_sql) === TRUE) {
                echo "<script>alert('internship record deleted successfully');</script>";
                // Redirect to refresh the page after deletion
                header("Refresh:0");
                exit(); // Ensure no further code execution after redirection
            } else {
                echo "<script>alert('Error deleting internship record');</script>";
            }
        }

        echo "<br>"; // Add a line break between each education record
    }
    echo "</div>";
} else {
    // User education data not found
    echo "<p>No internship records found.</p>";
}
?>




<div class="card-body d-flex justify-content-end">
<button class="btn btn-primary btn-sm" style="background-color: rgb(46, 58, 151); height:40px;"  onclick="addinternship('addinternship')">Add internship</button>
</div>




          </div>
      </div>
      <hr>
      <div class="form-group">
          
          <div class="input-group">
          <label for="location">*Projects:</label>
             <!-- Right side button within the card body -->

<?php
$studid = $_SESSION['studid'];
$sql1 = "SELECT id, project_name, description FROM projects WHERE sid = $studid";
$result1 = $conn->query($sql1);

// Check if user education data was found
if ($result1->num_rows > 0) {
    // User education data found, fetch and display it
    echo "<div class='education-records-container'>";
    while ($row = $result1->fetch_assoc()) {
        $id = $row['id'];
        $clgname = $row['project_name'];
        $degree = $row['description'];
      

        // Display education record with delete button
        echo "<div class='education-record'>";
        echo "<strong>project_name:</strong> $clgname <br>";
        echo "<strong>description:</strong> $degree <br>";
    
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
            $delete_sql = "DELETE FROM projects WHERE id = $delete_id";
            if ($conn->query($delete_sql) === TRUE) {
                echo "<script>alert('projects record deleted successfully');</script>";
                // Redirect to refresh the page after deletion
                header("Refresh:0");
                exit(); // Ensure no further code execution after redirection
            } else {
                echo "<script>alert('Error deleting projects record');</script>";
            }
        }

        echo "<br>"; // Add a line break between each education record
    }
    echo "</div>";
} else {
    // User education data not found
    echo "<p>No projects records found.</p>";
}
?>





<div class="card-body d-flex justify-content-end">
<button class="btn btn-primary btn-sm" style="background-color: rgb(46, 58, 151); height:40px;" onclick="addproject('addproject')">Add Projects</button>
</div>





          </div>
      </div>
      <hr>
      <div class="form-group">
          
          <div class="input-group">
          <label for="location">*Trainings:</label>
             <!-- Right side button within the card body -->

             <?php
$studid = $_SESSION['studid'];
$sql1 = "SELECT id, training_name, organization,location FROM training_programs WHERE sid = $studid";
$result1 = $conn->query($sql1);

// Check if user education data was found
if ($result1->num_rows > 0) {
    // User education data found, fetch and display it
    echo "<div class='education-records-container'>";
    while ($row = $result1->fetch_assoc()) {
        $id = $row['id'];
        $training_name = $row['training_name'];
        $organization = $row['organization'];
        $location = $row['location'];
      

        // Display education record with delete button
        echo "<div class='education-record'>";
        echo "<strong>training_name:</strong> $training_name <br>";
        echo "<strong>organization:</strong> $organization <br>";
        echo "<strong>location:</strong> $location <br>";
    
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
            $delete_sql = "DELETE FROM training_programs WHERE id = $delete_id";
            if ($conn->query($delete_sql) === TRUE) {
                echo "<script>alert('training record deleted successfully');</script>";
     
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
    echo "<p>No training records found.</p>";
}
?>




<div class="card-body d-flex justify-content-end">
<button class="btn btn-primary btn-sm" style="background-color: rgb(46, 58, 151); height:40px;" onclick="addtraining('addtraining')">Add Training</button>
</div>





          </div>
      </div>

      <hr>


