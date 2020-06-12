<?php 
session_start();
 	include 'config.php';
		$sql = "SELECT * FROM users ";
		$result = mysqli_query($conn,$sql);
		if (isset($_GET['id']) && $_GET['action']=='delete')
		{
			$uid = $_GET['id'];
			$delete = "DELETE FROM `users` WHERE `id` = '".$uid."'";
			$query = mysqli_query($conn,$delete);
			//header("location:manageuser.php");	
		}

		
		// if (isset($_GET['id']) && $_GET['action']== 'delete')
		//  {	
		//  	$id = $_GET['id'];
		// 	$sql = "DELETE FROM `products` WHERE `sku`='".$id."'";
		// 	$result1 = mysqli_query($conn,$sql);
		// 	header("location:manage_product.php");
		//  }
		
		include 'sidebar.php'; 
		?>
		<div id="main-content"> <!-- Main Content Section with everything -->
			<h2>Welcome <?php echo $_SESSION['user']; ?></h2>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Manage User</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>
								<tr>
								   <th>
								    <th>Username</th>
								    <th>Email</th>
								   <th>Password</th>
								   <th>Role</th>
								   <th>Action</th>
								   <!-- <th>Quantity</th>
								   <th>Price</th>
								   <th>Action</th> -->
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<!-- <div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div> -->
										
										<div class="pagination">
											<a href="manage_product.php?page=<?php $page = 1; echo $page; ?>" title="First Page">&laquo; First</a>
											<a href="manage_product.php?page=<?php $page--; echo $page; ?>" title="Previous Page">&laquo; Previous</a>
											<a href="manage_product.php?page=<?php $page = 1; echo $page; ?>" class="number" title="1">1</a>
											<a href="manage_product.php?page=<?php $page = 2; echo $page; ?>" class="number" title="2">2</a>
											<a href="manage_product.php?page=<?php $page = 3; echo $page; ?>" class="number current" title="3">3</a>
											<a href="manage_product.php?page=<?php $page = 4; echo $page; ?>" class="number" title="4">4</a>
											<a href="manage_product.php?page=4" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<?php if (mysqli_num_rows($result) > 0) { 

								while ($row=mysqli_fetch_assoc($result)) {
								  
								    ?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['password']; ?></td>
									<td><?php echo $row['role']; ?></td>
									<td>
										<!-- Icons -->
										 <a href="updateuser.php?id=<?php echo $row['id'];?>&action=edit" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="manageuser.php?id=<?php echo $row['id'];?>&action=delete" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 
									</td>
								</tr><?php  }   } ?>
								
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					</div> <!-- End .content-box-content -->