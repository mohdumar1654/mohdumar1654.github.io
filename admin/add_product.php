<?php
session_start();
if (empty($_SESSION['user']))
 {
	header("location:login.php");
}

 
// include 'main.php';
  include 'config.php';
  
  	if (isset($_POST['submit'])) 
  	{
  		$sku = $_POST['product_sku'];
  		$name = $_POST['product_name'];
  		$sale_price = $_POST['sale_price'];
  		$brand = $_POST['brand'];
  		$size = $_POST['radio'];
  		$color = $_POST['color'];
  		$quantity = $_POST['product_quantity'];
  		$org_price = $_POST['original_price'];
  		$category = $_POST['category'];
  		if (isset($_FILES['product_image'])) 
  		{
  			$tname = $_FILES['product_image']['tmp_name'];
  			
  			$pname = $_FILES['product_image']['name'];
  			$dir = "uploads/";
  			move_uploaded_file($tname,$dir.$pname);

  		}
  		

  		$sql = "INSERT INTO products (`sku`,`name`,`sale_price`,`brand`,`size`,`color`,`quantity`,`original_price`,`category`,`image`) VALUES ('".$sku."','".$name."','".$sale_price."','".$brand."','".$size."','".$color."','".$quantity."','".$org_price."','".$category."','".$pname."')";
  		$result = mysqli_query($conn,$sql);
  		header("location:manage_product.php");
  		
  		}
  		
  		
  		
		include "sidebar.php";
  ?>


				<div id="main-content"> <!-- Main Content Section with everything -->
					<h2>Welcome <?php echo $_SESSION['user']; ?> :)</h2>
					
				<div class="content-box-header">
					
					<h3>Add Product</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

				<div class="tab-content" id="tab2">
					
						<form action="" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Product SKU</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_sku"  /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Product Id</small>
								</p>
								<p>
									<label>Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_name"  /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Name of the product</small>
								</p>
								<p>
									<label>Sale Price</label>
										<input class="text-input small-input" type="text" id="small-input" name="sale_price"  /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Cost of the item</small>
								</p>
								<p>
									<label>Original Price</label>
										<input class="text-input small-input" type="text" id="small-input" name="original_price"  /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Cost of the item</small>
								</p>
								<p>
									<label>Brand</label>              
									<select name="brand" class="small-input">
										<option value="Calvin Klein">Calvin Klein</option>
										<option value="Tommy Hilfiger">Tommy Hilfiger</option>
										<option value="Puma">Puma</option>
										<option value="Adidas">Adidas</option>
										<option value="Vero Moda">Vero Moda</option>
										<option value="Jack&Jones">Jack&Jones</option>
										<option value="LaCoste">LaCoste</option>
									</select> 
								</p>

								<p>
									<label>Quantity</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_quantity"  /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Brand of the product</small>
								</p>
								<p>
									<label>Size</label>
									<input type="radio" name="radio" value="S" /> S
									<input type="radio" name="radio" value="M" /> M
									<input type="radio" name="radio" value="L" /> L
									<input type="radio" name="radio" value="XL" /> XL
								</p>
								<p>
									<label>Color</label>              
									<select name="color" class="small-input">
										<option value="Red">Red</option>
										<option value="Yellow">Yellow</option>
										<option value="White">White</option>
										<option value="Blue">Blue</option>
									</select> 
								</p>
								
								<p>
									<label>Image</label>
										<input class="text-input small-input" type="file" id="small-input" name="product_image"/> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										
								</p>
								<p>
									<label>Category</label>              
									<select name="category" class="small-input">
										<option value="Shirt">Shirt</option>
										<option value="T-Shirt">T-Shirt</option>
										<option value="Jeans">Jeans</option>
										<option value="Denim">Denim</option>
									</select> 
								</p>
							
								
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
									<input class="button" type="submit" name="submit"/><span> <span><?php if (isset($_FILE['product_image'])) {
										echo $_FILE['product_image']['name']; } ?> </span>
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