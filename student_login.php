<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Salt values
    $scu = 'ghjklcvbnm';
    $su = 'qwertyuiopedfvbnpojhg';
    // Concatenate salt values with hashed password
    $pd = $su . sha1($password) . $scu;

    $link = mysqli_connect("localhost:3306", "root", "", "intern") or die($link);
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);

    $result = mysqli_query($link, "SELECT * FROM student WHERE username='$username' AND pass='$pd'") or die("Failed to query database" . mysqli_error($link));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["clgname1"] = $row['clgcode'];
        $_SESSION["studid"] = $row['sid'];
        $_SESSION["user"] = $row['username'];
        $_SESSION["username"] = $username;
        if (!isset($_SESSION['username'])) {
            echo "<script>alert('Login failed.')</script>";
            header("Location:empreg.php");
        } else {
            echo "<script>alert('Login Successful.')</script>";
            echo "<script>alert('Login Successful')</script>";
            echo "<script>location.href='welcomestudent.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid ID or Password.')</script>";
        echo "<script>location.href='empreg.php'</script>";
    }

    mysqli_close($link);
}
?>
