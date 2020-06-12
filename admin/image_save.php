<?php

	if(isset($_POST['add'])){
		print_r($_FILES);
		if(move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/file_name.png")){

		}else{
			
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" />
		<input type="submit" name="add" value="Add">
	</form>
</body>
</html>