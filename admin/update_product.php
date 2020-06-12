<?php
session_start();
if (empty($_SESSION['user']))
 {
	header("location:login.php");
}

 
 include 'config.php';
  
   $row;
   $result;
   $result1;
  	if (isset($_POST['submit'])) 
  	{
  		$sku = $_POST['product_sku'];
  		$name = $_POST['product_name'];
  		$brand = $_POST['product_brand'];
  		$quantity = $_POST['product_quantity'];
  		$saleprice = $_POST['sale_price'];
  		$size = $_POST['product_size'];
  		$color = $_POST['product_color'];
  		$orgprice = $_POST['original_price'];
  		$category = $_POST['category'];
  		$image = $_POST['product_image'];

  		$sql = "INSERT INTO products (`sku`,`name`,`sale_price`,`brand`,`size`,`color`,`quantity`,`original_price`,`category`,`image`) VALUES ('".$sku."','".$name."','".$saleprice."','".$brand."','".$size."','".$color."','".$quantity."','".$orgprice."','".$category."','".$image."')";
  		$result = mysqli_query($conn,$sql);

  		
  		}
  		
  		
  		if (isset($_POST['update']))
  		 {
  			$sku = $_POST['product_sku'];
  		$name = $_POST['product_name'];
  		$brand = $_POST['product_brand'];
  		$saleprice = $_POST['sale_price'];
  		$size = $_POST['product_size'];
  		$color = $_POST['product_color'];
  		$quantity = $_POST['product_quantity'];
  		$orgprice = $_POST['original_price'];
  		$category = $_POST['category'];
  		$pname = $_FILES['image']['name'];
  		// if (isset($_FILES['image'])) 
  		// {
  		// 	$tname = $_FILES['image']['tmp_name'];
  		// 	//print_r($tname);
  		// 	$pname = $_FILES['image']['name'];
  		// 	$dir = "uploads/";
  		// 	move_uploaded_file($tname,$dir.$pname);

  		// }

  		$update_sql = "UPDATE products SET `name` ='".$name."',`brand` ='".$brand."',`size`='".$size."',`color`='".$color."',`quantity` ='".$quantity."',`sale_price` ='".$saleprice."',`original_price`= '".$orgprice."',`category`='".$category."',`image` ='".$pname."' WHERE `sku`= '".$sku."' ";
  		$result1 = mysqli_query($conn,$update_sql);
  		header("location:manage_product.php");
  		}
		include "sidebar.php";
  ?>


				<div id="main-content"> <!-- Main Content Section with everything -->
					<h2>Welcome John</h2>
				<div class="content-box-header">
					
					<h3>Update Product</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

				<div class="tab-content" id="tab2">
					
						<form action="" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<?php //if (isset($_GET['id'])) {
									if (isset($_GET['id']))
							  		 {
							  		   if ($_GET['action']=='edit')
							  		  
							  		  {
							  		 
							  		  	$pid=$_GET['id'];
							  		 	$query = "SELECT * FROM products WHERE `sku`='".$pid."'";
							  		 	$result1 = mysqli_query($conn,$query);
							  		 
								
								 if (mysqli_num_rows($result1) > 0) { 

								while ($row=mysqli_fetch_assoc($result1)) {
									
								 ?>
								<p>
									<label>Product SKU</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_sku" value="<?php if(isset($_GET['id'])) { echo $row['sku']; } ?>" <?php if($_GET['id']) {echo "readonly"; } ?> /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Product Id</small>
								</p>
								<p>
									<label>Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_name" value="<?php if(isset($_GET['id'])) { echo $row['name']; } ?>" /> 
								</p>
								<p>
									<label>Sale Price</label>
										<input class="text-input small-input" type="text" id="small-input" name="sale_price" value="<?php if(isset($_GET['id'])) { echo $row['sale_price']; } ?>" /> 
								</p>
								<p>
									<label>Original Price</label>
										<input class="text-input small-input" type="text" id="small-input" name="original_price" value="<?php if(isset($_GET['id'])) { echo $row['original_price']; } ?>" />
								</p>
								<p>
									<label>Brand</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_brand" value="<?php if(isset($_GET['id'])) { echo $row['brand']; } ?>" />
								</p>
								<p>
									<label>Quantity</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_quantity" value="<?php if(isset($_GET['id'])) { echo $row['quantity']; } ?>" /> 
								</p>
								<p>
									<label>Size</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_size" value="<?php if(isset($_GET['id'])) { echo $row['size']; } ?>" />
								</p>
								<p>
									<label>Color</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_color" value="<?php if(isset($_GET['id'])) { echo $row['color']; } ?>" /> 
								</p>
								<p>
									<label>category</label>
										<input class="text-input small-input" type="text" id="small-input" name="category" value="<?php if(isset($_GET['id'])) { echo $row['category']; } ?>" />
								</p>
								<p>
									<label>Image</label>
										<input class="text-input small-input" type="file" id="small-input" name="image" value="<?php $_FILES['image']['name']= $row['image']; echo $_FILES['image']['name']; ?>" />
										<span><?php echo $_FILES['image']['name']; ?></span>
								</p>

								 
							<?php  } } }
							  		   		 
							  		} ?>
								
								<!-- usef for showing error in field

								 <p>
									<label>Medium form input</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
								</p>
								
								 -->
								
								<!-- <p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p> -->
								<!-- 
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p> -->
								<!-- 
								<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								 -->
								<!-- <p>
									<label>Product Description</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="10" rows="8"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="<?php if(isset($_GET['id'])) {
										echo 'Update'; }else{ echo 'Submit'; }  ?>" name="<?php if(isset($_GET['id'])) {
										echo 'update'; }else{ echo 'submit'; }  ?>" /><span> 
											<?php if (isset($_POST['submit'])) 
											{
											 if ($result) { echo "Product Added Successfully "; } else { echo "Some Error Occurred".mysqli_error($conn);} ?> </span>
											<?php } ?>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->      
					</div> <!-- End .content-box-content -->
				</div>


</body>
</html>