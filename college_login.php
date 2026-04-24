<?php
session_start();
if(isset($_POST['submit']))
{
 
 $username= $_POST['username'];
 $password= $_POST['password'];

 echo $username;
 $link = mysqli_connect("localhost:3306","root","","intern") or die("failed to connect database");
 $result=mysqli_query($link,"select * from collage where instituecode='$username' and password='$password'") or die("failed to query database".mysqli_error($link));
	
	if(mysqli_num_rows($result)>0)
	{
		session_start();
	
    $row = mysqli_fetch_assoc($result);
    $_SESSION["clgname"] = $row['instituecode'];
		if(!isset($_SESSION['clgname']))
		{	
		echo "<script>alert('Invalid ID or Password. You are in admin page if you are not admin then go to employee Login.')</script>";
		}
		else
		{
			 //echo "<script>alert('Login Successful.')</script>";
			 echo "<script>location.href='clgwelcome.php'</script>";
		}
	}
	else
	{
		echo "<script>alert('Invalid ID or Password. You are Employee login page if you are not employee then go to employee Login.')</script>";
		echo "<script>location.href='empreg.php'</script>";
	}
		
}
?>