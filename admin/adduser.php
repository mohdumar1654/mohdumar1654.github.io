<?php 
	include 'sidebar.php';
	include 'config.php';
	if (isset($_POST['submit']))
	 {
		$user = $_POST['new_username'];
		$pass = $_POST['new_password'];
		$role = $_POST['radio'];
		$email = $_POST['new_email'];
		$query = "INSERT INTO users (`username`, `password`, `role`, `email`) VALUES ('$user','$pass','$role','$email')";
		$result = mysqli_query($conn,$query);
	}

		
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<div id="main-content"> <!--- start of main content   ---->
 			

 			<div class="content-box-header">
					
					<h3>Add User</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
 		<div class="content-box-content">

				<div class="tab-content" id="tab2">
					
						<form action="adduser.php" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Username</label>
										<input class="text-input small-input" type="text" id="small-input" name="new_username" placeholder="Enter Username" /> 
								</p>
								<p>
									<label>Password</label>
										<input class="text-input small-input" type="text" id="small-input" name="new_password" placeholder="Enter Password" /> 
								</p>
								<p>
									<label>Email</label>
										<input class="text-input small-input" type="text" id="small-input" name="new_email" placeholder="Enter Email" /> 
								</p>
								<p>
									<label>User Role</label>
									<input type="radio" name="radio" value="Admin" />Admin
									<input type="radio" name="radio" value="User" /> User
								</p>
								<p>
									<input class="button" type="submit" name="submit" value="Add" /><span> 
											<?php if (isset($_POST['submit'])) 
											{
											 if ($result) { echo "User Added Successfully "; } else { echo "Some Error Occurred".mysqli_error($conn);} ?> </span>
											<?php } ?>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->      
					</div> <!-- End .content-box-content -->



 	 </div> <!--- End of main content   ---->
 
 </body>
 </html>