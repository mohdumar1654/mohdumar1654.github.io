<?php 
session_start();
if (empty($_SESSION['user']))
 {
	header("location:login.php");
}

	include 'config.php';
		$limit = 3;
		if (isset($_GET['page']))
		 {
			$page = $_GET['page'];	
		 }
		 else
		 {
		 	$page =1;
		 }
		$offset = ($page-1)*$limit;
		
		$sql = "SELECT * FROM products LIMIT $offset,$limit ";
		$result = mysqli_query($conn,$sql);
		
		
		
		if (isset($_GET['id']) && $_GET['action']== 'delete')
		 {	
		 	$id = $_GET['id'];
			$sql = "DELETE FROM `products` WHERE `sku`='".$id."'";
			$result1 = mysqli_query($conn,$sql);
			$row =mysqli_fetch_assoc($result1);
			unlink("uploads/".$row['image']."");
			header("location:manage_product.php");
		 }

		include 'sidebar.php'; 
		?>
		<div id="main-content"> <!-- Main Content Section with everything -->
			<h2>Welcome <?php echo $_SESSION['user']; ?> :)</h2>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>MANAGE PRODUCTS</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								    <th>Image</th>
								    <th>Product SKU</th>
								   <th>Name</th>
								    <th>Sale Price</th> 
								    <th>Original Price</th>
								   <th>Brand</th>
								    <th>Size</th>
								     <th>Color</th>
								   <th>Quantity</th>
								   <th>Category</th>								   
								   <th>Action</th>
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
										 		
										 		<?php
										 		$sql1 = "SELECT * FROM products";
										 		$result1 = mysqli_query($conn,$sql1);

												 if (mysqli_num_rows($result1) > 0)

												{
													$total_records = mysqli_num_rows($result1);
													$total_pages = ceil($total_records/$limit);
													echo '<a href="manage_product.php?page=1">First</a>';
													if ($page>1)
													 {
														echo '<a href="manage_product.php?page='.($page-1).'" >Previous</a>';
													}
													
													for ($i=1; $i <=$total_pages ; $i++)
												 		{ 
												 			if ($i == $page) 
												 			{
												 				$active ="current";
												 			}
												 			else
												 			{
												 				$active ="";
												 			}
															echo '<a  href="manage_product.php?page='.$i.'" class="number'.$active.'">'.$i.'</a>';

												 		}
												 		if ($page<$total_pages) {
												 			echo '<a href="manage_product.php?page='.($page+1).'" >Next</a>';
												 		}
												 		echo '<a href="manage_product.php?page='.($total_pages).'" >Last</a>';
												}

											?>
										 
											
										</div> <!--  End .pagination  -->
										
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>


						 <!-- Listing all products from database -->


							<tbody>
								<?php if (mysqli_num_rows($result) > 0) { 

								while ($row=mysqli_fetch_assoc($result)) {
								  
								    ?>
								<tr >
									<td><input type="checkbox" /></td>
									<td><img src="uploads/<?php echo $row['image']; ?> " width = 50px height=40px ></td> <!-- image display -->
									<td><?php echo $row['sku']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo "$ ".$row['sale_price']; ?></td>
									<td><?php echo "$ ".$row['original_price']; ?></td>
									<td><?php echo $row['brand']; ?></td>
									<td><?php echo $row['size']; ?></td>
									<td><?php echo $row['color']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php echo $row['category']; ?></td>									
									<td>
										<!-- Icons -->
										 <a href="update_product.php?id=<?php echo $row['sku'];?>&action=edit" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="manage_product.php?id=<?php echo $row['sku'];?>&action=delete" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										
									</td>
								</tr><?php  }   } ?>
								
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					</div> <!-- End .content-box-content -->