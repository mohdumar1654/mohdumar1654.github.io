<?php
 // Used for Implementing cURL concept
  // { $curl = curl_init();
  // // You can also set the URL you want to communicate with by doing this:
  // // $curl = curl_init('http://localhost/echoservice');
  // // Set the url path we want to call
  // curl_setopt($curl, CURLOPT_URL, "http://192.168.0.240/ajax/curl.php"); 
    
  // // Make it so the data coming back is put into a string
  // curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  //  // Send the request
  // $buffer = curl_exec($curl);
  //  curl_close($curl);
  // $products=json_decode($buffer); }
include "admin/config.php";

$query = "SELECT * FROM `products`";
$result = mysqli_query($conn,$query);
$row =mysqli_fetch_All($result,MYSQLI_ASSOC);
$total_data=mysqli_num_rows($result);
include ('header.php');

 ?>


<!-- Breadcrumb Section Begin -->

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="javascript:void 0;">
                        <i class="fa fa-home"></i> Home
                    </a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        <li>
                            <a class="submit" href="javascript:void 0;" value="Men">Men</a>
                        </li>
                        <li>
                            <a class="submit" href="javascript:void 0;" value="Women">Women</a>
                        </li>
                        <li>
                            <a class="submit" href="javascript:void 0;" value="Kids">Kids</a>
                        </li>
                    </ul>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Brand</h4>
                    <div class="fw-brand-check">
                        <div class="bc-item">
                            <label for="bc-calvin" >
                                    Calvin Klein
                                <input class="brand"type="checkbox" id="bc-calvin" value="Calvin Klein">
                                    <span class="checkmark"></span>
                                </label>
                        </div>
                        <div class="bc-item">
                            <label for="bc-diesel" >
                                    Diesel
                                <input class="brand" type="checkbox" id="bc-diesel" value="Diesel">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="bc-item">
                            <label for="bc-polo" >
                            Polo
                            
                                <input class="brand" type="checkbox" id="bc-polo" value="Polo">
                                    <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                <input class="brand" type="checkbox" id="bc-tommy" value="Tommy Hilfiger">
                                <span class="checkmark"></span>
                                </label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Price</h4>
                    <div class="filter-range-wrap">
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount" >
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                            data-min="0" data-max="3200">
                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                       </div>
                    </div>
                            <a href="javascript:void 0;" class="filter-btn">Filter</a>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Color</h4>
                    <div class="fw-color-choose">
                        <div class="cs-item">
                            <input type="radio" id="cs-black" class="submitcolor" value="Black">
                            <label class="cs-black" for="cs-black">Black</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-violet" class="submitcolor" value="Violet">
                            <label class="cs-violet" for="cs-violet">Violet</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-blue" class="submitcolor" value="Blue">
                            <label class="cs-blue" for="cs-blue">Blue</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-yellow" class="submitcolor" value="Yellow">
                            <label class="cs-yellow" for="cs-yellow">Yellow</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-red" class="submitcolor" value="Red">
                            <label class="cs-red" for="cs-red">Red</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-green" class="submitcolor" value="Green">
                                <label class="cs-green" for="cs-green">Green</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Size</h4>
                    <div class="fw-size-choose">
                        <div class="sc-item">
                            <input type="radio" id="s-size">
                            <label for="s-size" class="submit1">S</label>
                        </div>
                        <div class="sc-item">
                           <input type="radio" id="m-size">
                            <label for="m-size" class="submit1">M</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="l-size">
                            <label for="l-size" class="submit1">L</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="xs-size">
                            <label for="xs-size" class="submit1">XS</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        <a href="javascript:void 0;" name="tags" value="Towel">Towel</a>
                        <a href="javascript:void 0;" name="tags" value="Shoes">Shoes</a>
                        <a href="javascript:void 0;" name="tags" value="Coat">Coat</a>
                        <a href="javascript:void 0;" name="tags" value="Dresses">Dresses</a>
                        <a href="javascript:void 0;" name="tags" value="Trousers">Trousers</a>
                        <a href="javascript:void 0;" name="tags" value="Mens Hat">Mens hats</a>
                        <a href="javascript:void 0;" name="tags" value="Backpack">Backpack</a>
                    </div>
                </div>
            </div>
             <!-----------------------------------------------------Jquery Script section---------------------------------->

            <script type="text/javascript">
                    
                         
  
                
            </script>
 <!---------------------------------------------------Jquery Script End-----------------------------------------------------  -->
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting sortby">
                                    <option  value="0" class= "option">Price Low - High</option>
                                    <option  value="1" class= "option">Price High - Low</option>
                                    <option  value="2" class= "option">Popularity High - Low</option>
                                    <option  value="3" class= "option">Popularity Low - High</option>
                                </select>
                                <select class="p-show showby">
                                    <option value="0">Show:        </option>
                                    <option value="1">Show: 1 - 10 </option>
                                    <option value="2">Show: 11 - 20</option>
                                    <option value="3">Show: 21 - 30</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>Showing 01- 09 Of 
                                <?php echo $total_data; ?> Products
                            </p>
                        </div>
                    </div>
                </div>
                <div class="product-list"->
                    <div class="row data_enter">
                        <?php foreach ($row as $product) :  ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <!----------------------------- Product Listing -------------------------------- -->
                                    <?php echo '
                                    <img src="img/'.$product['image'].'" width="263px" height="350px" alt="">' ?>
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active">
                                                <a href="javascript:void 0;" class="pid" value = "<?php echo $product['sku']; ?>" >
                                                    <i class="icon_bag_alt"></i>
                                                </a>
                                            </li>
                                            <li class="quick-view">
                                                <a href="javascript:void 0;">+ Quick View</a>
                                            </li>
                                            <li class="w-icon">
                                                <a href="javascript:void 0;">
                                                    <i class="fa fa-random"></i>
                                                </a>
                                            </li>
                                        </ul>
                                </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            <?php echo $product['category']; ?>
                                        </div>
                                        <a href="#">
                                            <h5>
                                                <?php echo $product['name']; ?>
                                            </h5>
                                        </a>
                                        <div class="catagory-name" style="margin-bottom: 0px;margin-top: 10px;color: #4d0000">
                                            <?php echo $product['brand']; ?>
                                        </div>
                                        <div class="product-price">
                                            <?php echo $product['sale_price']; ?>
                                            <span>
                                                <?php echo $product['original_price']; ?>
                                            </span>
                                        </div>
                                        <div class="catagory-name" style="margin-bottom: 0px;margin-top: 10px;color: #ffb3b3;">
                                            <?php echo "In Stock:".$product['quantity']; ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <?php endforeach;  ?>
                            <!--------------------------- End Of Product Listing------------------------------ -->
                    </div>
                        <!-- End of class row -->
                </div>
                    <!-- End Of class product-list -->
                <div class="loading-more">
                    <a href="javascript:void 0;">First</a>
                    <a href="javascript:void 0;">Previous</a>
                    <a href="javascript:void 0;">1</a>
                    <a href="javascript:void 0;">2</a>
                    <a href="javascript:void 0;">3</a>
                    <a href="javascript:void 0;">Next</a>
                    <a href="javascript:void 0;">Last</a>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Product Shop Section End -->
<?php 

include "footer.php";

?>