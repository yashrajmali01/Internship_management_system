
<?php

session_start();

if(isset($_POST['submit']))
{
 
 $username= $_POST['username'];
 $password= $_POST['password'];
 $scu='ghjklcvbnm';
 $su='qwertyuiopedfvbnpojhg';
 $pd=$su.sha1($_POST['password']).$scu;
 

 $link=mysqli_connect("localhost:3306","root","","intern") or die($link); 
  $username =mysqli_real_escape_string($link,$username);
  $pd =mysqli_real_escape_string($link,$pd);

$result=mysqli_query($link,"select * from employee where eid='$username' and pass='$pd'") or die("failed to query database".mysqli_error($link));
	
	if(mysqli_num_rows($result)>0)
	{
		session_start();
		$_SESSION["empname"] = $username;
		$_SESSION["eid"] = $row['eid']; 
		if(!isset($_SESSION['empname']))
		{	
		echo "<script>alert('Invalid ID or Password. You are in admin page if you are not admin then go to employee Login.')</script>";
		echo "<script>location.href='empprofile.php'</script>";
		
	}
		else
		{
			 //echo "<script>alert('Login Successful.')</script>";
			 echo "<script>location.href='empprofile.php'</script>";
		}
	}
	else
	{
		echo "<script>alert('Invalid ID or Password. You are Employee login page if you are not employee then go to employee Login.')</script>";
		echo "<script>location.href='empreg.php'</script>";
	}
		
}
?>
