<?php
	session_start();
	include 'config.php';
	include 'header.php';

	if (isset($_POST['submit'])) 
	{
		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$query = "SELECT * FROM `users` WHERE `username`= '$uname' AND `password` = '$pword' ";
		$result = mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		
		if($row['role']=='admin')
		{
			$_SESSION['user'] = $uname;
			header("location:index.php");
		}
		else
		{
			$error ="<b>INCORRECT USERNAME/PASSWORD </b>";
		}
	}

?>


  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="login.php" method="POST">
				
					<div class="notification information png_bg">
						<div>
							Enter Username and Password.
						</div>
					</div>
					
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" />
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" name="submit" />
					</p>
					<p><?php if (isset($error))
					 {
							echo $error;
					 } 
					 ?>
					 	
					 </p>
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>
