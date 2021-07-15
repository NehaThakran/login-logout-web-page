<?php
	include("config.php");
	session_start();
	
	$error = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "select * from admin where username = '$username' and passcode = '$password' ";
		$result = mysqli_query($con,$sql);
		
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		
		//if result matched $username and $password, table row must be 1 row
		if($count == 1)
		{
			$_SESSION['login_user'] = $username;
			header("location: welcome.php"); 
		}
		else
			$error = "Your Login name or Password is Invalid!";
	}
?>
		
	
<html>
	<head>
	<title>Login Page</title>
		<style type = "text/css">
			 body {
				font-family:Arial, Helvetica, sans-serif;
				font-size:14px;
			 }
			 label {
				font-weight:bold;
				width:100px;
				font-size:14px;
			 }
			 .box {
				border:#666666 solid 1px;
			 }
			 .center {
				position:fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				border: 1px solid #ccc;
				background-color: #FFFFFF;
				}
        </style>
	</head>
	<body bgcolor = "#FFFFFF">
		<div class="center" style = "width:300px; border: solid 1 px #333333; " align = "left">
			<div style = "background-color:#C0E532; color:#FFFFFF; padding:5px;"><b>Login</b></div>
			
			<div style = "margin:30px">
				<form action="" method="post">
					<input type="text" name="username" class="box" required placeholder="username" /><br /><br /> 
					<input type="password" name="password" class="box" required placeholder="password" /><br /><br /> 
					<input type = "submit" value = "submit" /><br />
				</form>
				
				<div style ="font-size:11px; color:#cc0000; margin-top:10px">
				<?php echo $error; ?></div>
			</div>
		</div>

	</body>
</html>