<?php 

include "header.php";

?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody class="yes1">
                                <?php
                                $price = 0;
                                 foreach ($products as $key => $value) { 

                                    $price = $price + $value['totalprice']; ?>
                            
                                <tr>
                                    <td class="cart-pic first-row"><img src="img/<?php echo $value['image']; ?>" width="200px" height="200px" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5><?php echo $value['name']; ?></h5>
                                    </td> 
                                    <td class="p-price first-row"><?php echo "$".$value['sale_price']; ?></td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" class="get" rel="<?php echo $value['sku']; ?>" value="<?php echo $value['quantity']; ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">$<?php echo $value['sale_price']*$value['quantity']; ?></td>
                                    <td><a href="javascript:void 0;" style="color: black;" class="ti-close" value="<?php echo $value['sku']; ?>"></a></i></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="javascript:void 0;" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="./shopping-cart.php" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span class="total_cart">$<?php echo $price; ?></span></li>
                                    <li class="cart-total">Total <span class="total_cart">$<?php echo $price; ?></span></li>
                                </ul>
                                <a href="check-out.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

   <?php
   include "footer.php";
   ?>