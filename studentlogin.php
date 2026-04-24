<?php
	
    session_start();
if(isset($_SESSION['username']))
{
	header("location:welcomestudent.php");
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  
   <link href="img/job.png" rel="icon">
   <link href="img/job.png" rel="apple-touch-icon">
	
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/bootstrap-v3/css/bootstrap.css">
  <link rel="stylesheet" href="assets/bootstrap-v3/css/bootstrap.css">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons" />

  
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
	
	
  <link href="css/style.css" rel="stylesheet">
	
	<style>

    
body{
  background-color:#edece8;
}


		
		h1,h2,h3,h4{
   		font-family: "Montserrat", sans-serif;
  		font-weight: 400;
  		margin: 0 0 20px 0;
 	    padding: 0;
	    text-align: center;
		color: crimson;
}
.login-box {
            width: 400px;
            height: 420px;
            background: #ffffff;
            color: #fff;
            top: 480%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 70px 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
        }
		
	


.avatar{
    width: 185px;
    height: 150px;
    border-radius: 50%;
    position: absolute;
    top:-28%;
    left: calc(50% - 91px);
}
		
		
	.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
	font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
	color: black;;
}

.login-box input{
    width: 100%;
    margin-bottom: 20px;
}

.login-box input[type="text"],
.login-box input[type="password"] {
    background: transparent;
    height: 40px;
    color: black;
    font-size: 16px;
    border: 2px solid grey; 
    border-radius: 5px;
   }

.login-box input[type="text"]:focus,
.login-box input[type="password"]:focus {
    border: 2px solid  #ddd;
    outline: none;
}

.login-box input[type="submit"]
{
    border:none;
    outline: none;
    height: 40px;
    background: #48adfa; 
    color:#fff;
    font-size: 18px;
   
	top: 30px;
}



.login-box a
{
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}

.login-box h3
{
   color:black;
}


.login-box a:hover
{
    color:#1c8adb;
}

.modal
{
 	top: 180px;
}		

.password-container {
      position: relative;
      width: 100%;
    
    }

#pass {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
    }  

    .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      color: black;
    }
   

	</style>

</head>	
<body>
	
	
	
	
	<header id="header" style="background-color: white;">
    
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto" style="color:black;">Student Login</a></h1>
        
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu" >
          <li><a href="home.php" style="color:black;">Home</a></li>
			<li> <a href="emplogin.php" style="color:black;">Company Login</a> </li>
      
			<li ><a href="clglogin.php" style="color:black;">College Login</a></li>
			<li class="menu-active" style="color:black;"><a href="#intro">Student Login</a></li>
			<li><a href="jobs.php" style="color:black;">Find Internships</a></li>
		 </ul>
      </nav>
    </div>
  
			<div class="login-box">
	    <h3><b>Student</b></h3>
        <form action="#" method="POST">

            <p> Username  </p> 
            <input type="text" name="user" id="user" placeholder="Enter Username" autocomplete="off">
			<br>
            <p> Password </p>
            <div class="password-container">
  <input type="password" placeholder="Enter Password" name="pass" id="pass">
  <span class="toggle-password" onclick="togglePassword()">Show</span>
</div>
					<br><br>
            <input type="submit" id="btn" name="submit" value="Login">
			
			
			
			
			<script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap-v3/js/bootstrap.js"></script>
  <script src="bootstrap-show-password.js"></script>
  
       
				</form>      
			</div>	

		
  </header>

	<script>
  function togglePassword() {
    var passwordInput = document.getElementById("pass");
    var toggleIcon = document.querySelector(".toggle-password");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.textContent = "Hide";
    } else {
      passwordInput.type = "password";
      toggleIcon.textContent = "Show";
    }
  }
</script>

<script>
  function togglePassword() {
    var passwordInput = document.getElementById("pass");
    var toggleIcon = document.querySelector(".toggle-password");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.textContent = "Hide";
    } else {
      passwordInput.type = "password";
      toggleIcon.textContent = "Show";
    }
  }
</script>

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
	
</body>
</html>


<?php


if(isset($_POST['submit']))
{
 
 $username= $_POST['user'];
 $password= $_POST['pass'];
 $scu='ghjklcvbnm';
 $su='qwertyuiopedfvbnpojhg';
 $pd=$su.sha1($_POST['pass']).$scu;
 

 $link=mysqli_connect("localhost:3306","root","","intern") or die($link); 
  $username =mysqli_real_escape_string($link,$username);
  $password =mysqli_real_escape_string($link,$password);

$result=mysqli_query($link,"select * from student where username='$username' and pass='$pd'") or die("failed to query database".mysqli_error($link));
	
	if(mysqli_num_rows($result)>0)
	{
		session_start();

    $row = mysqli_fetch_assoc($result);
    $_SESSION["clgname1"] = $row['clgcode'];
    $_SESSION["studid"] = $row['sid'];
    $_SESSION["user"] = $row['username'];
		$_SESSION["username"] = $username;
		if(!isset($_SESSION['username']))
		{	
		echo "<script>alert('wrong')</script>";
		}
		else
		{
		  echo "<script>alert('Login Successful. Your college code is: " . $row['clgcode'] . "')</script>";
      echo "<script>alert('Login Successful')</script>";
		    echo"<script>location.href='welcomestudent.php'</script>";
		}
	}
	else
	{
		echo "<script>alert('Invalid ID or Password.')</script>";
	}
	
	mysqli_close($link);
		
}
?>




<?php
/*
	if(isset($_POST['btn']))
	{
		$funame = $_POST['funame'];
		$conn=mysqli_connect("localhost","root","","intern") or die("connection failed".mysqli_connect_error());
		$query = "select * from employee where uname like '$funame'";
		$result = mysqli_query($conn, $query);

			if (mysqli_num_rows($result) > 0)
			{
				if($row = mysqli_fetch_assoc($result))
				{

					$uname=$row['uname'];
					$password=$row['password'];
					$email=$row['email'];
	
	

				if($funame!=$uname)
				{
					echo "<script>alert('Username Does Not Exist');</script>";
				}
	
	 	 	else if($funame==$uname)
								{	
											$mailto=$email;
											$mailsub='Password';
											$mailmsg='Your forgotten Password Request Is Recived. Your Password is here: '.$password.'. Use this password to login. Thank You.';
											error_reporting(E_ALL);
											require("PHPMailer_5.2.4/class.phpmailer.php");

											$mail=new PHPMailer();

											$mail->IsSMTP();
											$mail->SMTPDebug=0;
											$mail->From = "das.shakya007@gmail.com";
											$mail->FromName = "Shakya Das";
											$mail->Host="smtp.gmail.com";
											$mail->SMTPSecure='ssl';
											$mail->Port=465;
											$mail->SMTPAuth=true;

											$mail->Username='das.shakya007@gmail.com';
											$mail->Password='9007525203';
											$mail->From='das.shakya007@gmail.com';
											$mail->FromName='Shakya Das';
											$mail->IsHTML(true);

											$mail->Subject=$mailsub;
											$mail->Body=$mailmsg;
											$mail ->AddAddress($mailto);

		
				if($mail ->Send())

						{
							echo "<script>alert('Mail Sent Successfully')</script>";
							echo "<script>location.href='employeelogin.php'</script>";
						}

						else
						{
						echo "<script>alert('Failed To Sent Mail, Verify Your mail Address.')</script>";
						}	
			}
		}
	}
		
				else
				{
					echo "<script>alert('Username Does Not Exist, Enter Your Valid Username.');</script>";
				}
		mysqli_close($conn);
	
}
*/	
?>


