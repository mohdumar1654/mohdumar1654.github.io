<?php
session_start();

   if (isset($_SESSION['products']))
    {   
        
        $products = $_SESSION['products'];
    }
    else
    {
        $products = array();
    }
    $url = basename($_SERVER['REQUEST_URI']);    
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    
    
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style type="text/css">
        
    </style>
    <script type="text/javascript" src="../jquery/jquery-3.4.1.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                    <span><?php if(isset($_SESSION['guest'])){ echo "Welcome ".$_SESSION['guest']; } ?></span>
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                <?php if(!isset($_SESSION['guest'])) { ?>
                    <a href="login.php" class="login-panel">
                    <i class="fa fa-user"></i>Login</a>
                <?php }
                else{ ?>
                <a href="sessionclear.php" class="login-panel"><i class="fa fa-user"></i>Logout</a>
                <?php } ?><div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="./img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="./img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="javascript:void 0;">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="shopping-cart.php">
                                    <i class="icon_bag_alt"></i>
                                    <span class="count"><?php 
                                    global $count;
                                    $count = 0;
                                    echo $count; ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div id="print_cart">
                                        <div class="select-items">
                                            <table>
                                                <tbody class="yes">
                                                    <?php 
                                                    $price = 0;
                                                    if(!empty($products)) :
                                                     foreach ($products as $key => $value) {
                                                     $price = $price + $value['totalprice'];
                                                     $count = $count + 1;     
                                                     ?>
                                                    <tr>
                                                        <td class="si-pic"><img src="img/<?php echo $value['image']; ?>" width="100px" height="100px" alt=""></td>
                                                        <td class="si-text">
                                                        <div class="product-selected">
                                                            <p><?php echo "$".$value['sale_price']." X ".$value['quantity']; ?></p>
                                                            <h6><?php echo $value['name']; ?></h6>
                                                        </div>
                                                        </td>
                                                        <td class="si-close"><i class="ti-close" value="<?php echo $value['sku']; ?>" ></i></td>
                                                        
                                                        </td>
                                                    </tr>
                                                    <?php } endif; ?>

                                                    Cart Products
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                                <span>total:</span>
                                                <h5 class="total">$<?php echo $price; ?></h5>
                                        </div>
                                    </div>  <!-- End of hover table data -->
                                    
                                    <div class="select-button">
                                            <a href="shopping-cart.php" class="primary-btn view-card">VIEW CART</a>
                                            <a href="check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                                 </li>
                                 <li class="cart-price">$<?php echo $price;
                                   ?></li>
                        </ul>   
                                    
                    </div>
                           
                </div>
            </div>
        </div>
       </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="<?php if($url == 'index.php'){ echo 'active'; } ?>"><a href="index.php">Home</a></li>
                        <li class="<?php if($url == 'shop.php'){ echo 'active'; } ?>"><a href="./shop.php">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($url == 'blog.php'){ echo 'active'; } ?>"><a href="./blog.php">Blog</a></li>
                        <li class="<?php if($url == 'contact.php'){ echo 'active'; } ?>"><a href="./contact.php">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li class="<?php if($url == 'blog-details.php'){ echo 'active'; } ?>"><a href="./blog-details.php">Blog Details</a></li>
                                <li class="<?php if($url == 'shopping-cart.php'){ echo 'active'; } ?>"><a href="./shopping-cart.php">Shopping Cart</a></li>
                                <li class="<?php if($url == 'check-out.php'){ echo 'active'; } ?>"><a href="./check-out.php">Checkout</a></li>
                                <li class="<?php if($url == 'faq.php'){ echo 'active'; } ?>"><a href="./faq.php">Faq</a></li>
                                <li class="<?php if($url == 'register.php'){ echo 'active'; } ?>"><a href="register.php">Register</a></li>
                                <li class="<?php if($url == 'login.php'){ echo 'active'; } ?>"><a href="./login.php">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->