<?php
session_start();
include "admin/config.php";
$where = "";
$orderby ="";
global $products;
if(isset($_SESSION['products'])) {
	$products = $_SESSION['products'];
}
else
{
    $products = array();
}

if(isset($_POST['flag']))
{
	$flag = $_POST['flag'];
	$where .= " `flag` = '$flag'";

	
	if (isset($_POST['sort']))
	{
		$sort = $_POST['sort'];
		$orderby ="";
		
		if ($sort==0)
		{
			$orderby .= " ORDER BY `sale_price` ASC "; 
		}
		if ($sort==1)
		{
			$orderby .= " ORDER BY `sale_price` DESC ";
		}
		if ($sort==2)
		{
			$orderby .= " ORDER BY `rating` ASC ";
		}
		if ($sort==3)
		{
			$orderby .= " ORDER BY `rating` DESC ";
		}
	}	
	if(isset($_POST['category']) && ($_POST['category']!= ""))
	{
		 $gender = $_POST['category'];
		 $where .= "AND `category` = '$gender' ";
	}
	if(isset($_POST['brand']) && ($_POST['brand']!= ""))
	{
		 $b = $_POST['brand'];
		 $brand = implode("','",$b);
		 $where .= " AND `brand` IN('".$brand."')   ";	
	}
	if(isset($_POST['color']) && ($_POST['color']!= ""))
	{
        $color = $_POST['color'];
        $where .= " AND `color` = '$color' ";	
	}
	if(isset($_POST['tag']) && ($_POST['tag']!= ""))
	{
		 $tag = $_POST['tag'];
		 $where .= " AND `tags` = '$tag' ";	
	}
	if(isset($_POST['size']) && ($_POST['size']!= ""))
	{
		 $size = $_POST['size'];
		 $where .= "AND `size`= '$size' ";	
	}
	if(isset($_POST['minamt'],$_POST['maxamt']) && ($_POST['minamt']!= "") && ($_POST['maxamt']!= ""))
	{
		 $minprice = $_POST['minamt'];
		 $maxprice = $_POST['maxamt'];
		 $where .= " AND `sale_price` BETWEEN '".$minprice."' AND '".$maxprice."' ";	
	}

	$query = "SELECT * FROM `products` WHERE  ".$where." ".$orderby." ";
	// ' LIMIT 6 OFFSET 3 '  use this for Sort by number of products
	$result = mysqli_query($conn,$query);
	$row =mysqli_fetch_All($result,MYSQLI_ASSOC);
	$data = json_encode($row);
	echo $data;

	
}

if (isset($_POST['productid'])) :
	global $sku;
	$sku = $_POST['productid'];
	global $totalprice;
	$totalprice = 0;
	global $a;
	global $quantity;
	global $saleprice;
	$query = "SELECT * FROM `products` WHERE `sku` = '$sku' ";
	$result = mysqli_query($conn,$query);
	$row =mysqli_fetch_All($result,MYSQLI_ASSOC);
	
	
	if ($products !="")
	{
		foreach ($products as $key => $product)
		{
			if ($product['sku'] == $sku)
			{
				$a = $product['sku'];
				//echo $a; 
			}	
		}
		
	}

	if ($a!="")
	{
		foreach ($products as $key => $product)
		{
			if ($product['sku'] == $a)
			{
			
			$products[$key]['quantity'] +=1 ;
			$quantity = $products[$key]['quantity'];
			$saleprice = $products[$key]['sale_price'];
			
			}	
			
		}
	}
	else
	{
		foreach ($row as $key => $product) :
	
			array_push($products,$product);
	
		endforeach;
	}

	foreach ($products as $key => $product)
	{
		if ($product['sku'] == $sku)
		{	
			$totalprice = $products[$key]['sale_price'] * $products[$key]['quantity'];
			$products[$key]['totalprice'] = $totalprice;
		}	
	}
	
	foreach ($products as $key => $product)
	{
		if ($product['sku'] == $sku)
		{
			$products[$key]['totalprice'] = $totalprice;
		}	
	}
	$_SESSION['products']=$products;
	echo json_encode($_SESSION['products']);
endif;

if(isset($_POST['quant+']))
{
	$quant = $_POST['quant+'];
	$pid = $_POST['pid+'];
	foreach ($products as $key => $value)
	{
		if($value['sku']==$pid)
		{
			$products[$key]['quantity']= $quant + 1;
		}
	}
	$_SESSION['products']=$products;
	echo json_encode($_SESSION['products']);
}

if(isset($_POST['quant-']))
{
	$quant = $_POST['quant-'];
	$pid = $_POST['pid-'];
	foreach ($products as $key => $value)
	{
		if($value['sku']==$pid)
		{
			if($quant>1)
			{
				$products[$key]['quantity']= $quant - 1;
			}
			elseif($quant = 1)
			{
				unset($products[$key]);
			}
			
		}
	}
	$_SESSION['products']=$products;
	echo json_encode($_SESSION['products']);
}

if(isset($_POST['deleteval']))
{
	$deleteid = $_POST['deleteval'];
	foreach ($products as $key => $value)
	{
		if($value['sku']==$deleteid)
		{
			array_splice($products,$key,1);
			//unset($products[$key]);
			
		}
	}
	ksort($products);
	$_SESSION['products']=$products;
	echo json_encode($_SESSION['products']);
}

if(isset($_POST['submit']))
{
	$arr = [];
	global $user_id;
	global $inputtotal;
	global $order_id;
	$user = $_SESSION['guest'];
	//getting user id of logged-in user

	$query = 'SELECT * FROM `users` WHERE `username` = "'.$user.'" ';
	$result = mysqli_query($conn,$query);
	$row =mysqli_fetch_All($result,MYSQLI_ASSOC);
	foreach ($row as $key => $product) :
	
		$user_id = $product['user_id']; // user id of logged in user

	endforeach;
	$arr["user_id"]= $user_id;
	foreach ($products as $key => $product)
	{
		$inputtotal = $inputtotal + $product['totalprice']; // total cart price
					
	}
	$arr["inputtotal"]=$inputtotal;
	$time =  date("Y-m-d,l, h:i:sa"); // timestamp
	$arr['time']= $time;
	// Inserting order in table
	$sql = 'INSERT INTO `orders` (`user_id`, `total`, `date`) VALUES ("'.$user_id.'","'.$inputtotal.'","'.$time.'") ';
	$result2 = mysqli_query($conn,$sql);
	
	$query1 = 'SELECT * FROM `orders` WHERE `user_id` = "'.$user_id.'" ';
	$result1 = mysqli_query($conn,$query1);
	$row2 =mysqli_fetch_All($result1,MYSQLI_ASSOC);
	foreach ($row2 as $key => $product) :
		if($product['user_id']==$user_id)
		{
			$order_id = $product['order_id']; //unique order id of user
		}	
	endforeach;
	$arr['order_id']=$order_id;
	$len = sizeof($products);
	$count = 0; 
	// Inserting order details into table
	for ($i=0; $i < $len ; $i++)
	{ 
		$count = $count + 1;
		$sql1 = "INSERT INTO `order_details`(`order_id`, `product_id`, `product_name`, `product_qty`, `product_price`) VALUES (";
		$sql1 .= "'".$order_id."','";
		$sql1 .= $products[$i]['sku']."' , '";
		$sql1 .= $products[$i]['name']."' , '";
		$sql1 .= $products[$i]['quantity']."','";
		$sql1 .= $products[$i]['totalprice']."')";
		$conn->query($sql1);
		
	}
	$arr['count']=$count;
	echo json_encode($arr);
	
}
?>