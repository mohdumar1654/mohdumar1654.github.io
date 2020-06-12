/*  ---------------------------------------------------
    Template Name: Fashi
    Description: Fashi eCommerce HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com/
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

   // defined function and script

   $(document).ready(function()
                    {   
                         /*----------------------
                         Assigning Filter Values
                        -------------------------*/
  
                        var products = [];
                        var filter = [];
                        filter['category'] = "";
                        filter['brand'] = "";
                        filter['size'] = "";
                        filter['minamt'] = "";
                        filter['maxamt'] = "";
                        filter['color'] = "";
                        filter['tags'] = "";
                        filter['sort'] = "";

                         // category filter
                        $(".submit").click(function() 
                        {
                            $(".submit").removeClass('active');
                                                
                            $(this).addClass("active");
                            var a = $(this).text();
                            filter['category'] = a;
                            console.log(filter['category']);
                            get_table(filter);
                        });
                       

                        // Size filter
                        $("label[class='submit1']").click(function()
                        {
                            var size = $(this).text();
                            filter['size']= size;
                            get_table(filter);
                            console.log(filter['size']);
                        });

                        // Brand filter
                        $(".brand").click(function()
                        {
                            var arr=[];
                            $(".brand:checked").each(function()
                            {
                                var value=$(this).val();
                                arr.push(value);
                                

                            });
                            filter['brand'] = arr;
                            console.log(filter['brand']);
                            get_table(filter);

                        });

                        // Price filter
                        $(".filter-btn").click(function()
                        {
                            var min = $("#minamount").val();
                            var max = $("#maxamount").val();
                            var minamt = min.replace("$","");
                            var maxamt = max.replace("$","");
                            filter['minamt']= minamt;
                            filter['maxamt']= maxamt;
                            console.log(filter['minamt']);
                            console.log(filter['maxamt']);
                            get_table(filter);
                        });

                        // Tag filter
                        $(".fw-tags a").click(function()
                        {   
                            var tag = $(this).text();
                            filter['tags'] = tag;
                            console.log(filter['tags']);
                            get_table(filter);

                        });

                        // Color filter
                        $(".submitcolor").click(function()
                        {
                            var color = $(this).val();
                            filter['color'] = color;
                            get_table(filter);

                        });

                        // Sort By filter
                        $(".option").click(function()
                        {
                            var sort = $(this).attr('data-value');
                            console.log(sort);
                            filter['sort']= sort;
                            get_table(filter);
                        });

                        // AJAX Request Function
                        function get_table(datas)
                        {
                            console.log(datas);

                            $.ajax(
                            {

                                     url  : "ajax.php",
                                    type  : "post",
                                    data  :  {  "flag"   : "0",
                                               "category" : datas['category'],
                                               "size"     : datas['size'],
                                               "brand"    : datas['brand'],
                                               "minamt"   : datas['minamt'],
                                               "maxamt"   : datas['maxamt'],
                                               "color"    : datas['color'],
                                               "tag"      : datas['tags'],
                                               "sort"     : datas['sort']
                                             },
                                dataType  : "json",
                                 success  : function(response)
                                 {                            
                                    get_data(response);
                                 }

                            });

                        };
                       
                         /*------------------------
                         Display Filtered products
                        ---------------------------*/
                        function get_data(abc)
                        {
                            var html = "";
                            console.log(abc.length);
                            for (var i = 0; i < abc.length; i++)
                            {
                                                        
                                html += '<div class="col-lg-4 col-sm-6"><div class="product-item"> <div class="pi-pic">\
                                <img src="img/'+abc[i]['image']+'" width="263px" height="350px" alt=""><div class="sale pp-sale">Sale</div><div\ class="icon"><i class="icon_heart_alt"></i></div><ul>\
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li><li\ class="quick-view"><a href="#">+ Quick View</a></li><li class="w-icon"><a href="#"><i class="fa\ fa-random"></i></a></li></ul></div>\
                                <div class="pi-text"><div class="catagory-name"> '+abc[i]['category']+' </div><a href="#"><h5>'+abc[i]['name']+'</h5></a><div class="catagory-name" style="margin-bottom:0px;"> '+abc[i]['brand']+' </div><div class="product-price">'+abc[i]['sale_price']+'<span>'+abc['original_price']+' </span></div></div></div></div>';
                                   
                           }
                            $(".data_enter").html(html);
                           
                        }

                       
                        
                        $(".inc").click(function(){
                            var quant = $(this).prev().val();
                            var pid =  $(this).prev().attr('rel');
                            $.ajax(
                                {
                                    url:"ajax.php",
                                    type:"post",
                                    data:{"quant+":quant,
                                         "pid+":pid},
                                    dataType: "json",
                                    
                                }
                            );
                        });
                        $(".dec").click(function(){
                            var quant = $(this).next().val();
                            var pid =  $(this).next().attr('rel');
                            $.ajax(
                                {
                                    url:"ajax.php",
                                    type:"post",
                                    data:{"quant-":quant,
                                         "pid-":pid},
                                    dataType: "json",
                                    
                                }
                            );
                        });
                        
                        $(".place-btn").click(function()
                        {
                           $.ajax(
                               {
                                    url  : "ajax.php",
                                    type : "post",
                                    data : {"submit" : "submit"},
                                    dataType : "json",
                               }    
                            );  
                        });

                        
                     /*---------------------
                       End of data filter 
                     ----------------------*/ 

                     /*------------------------------
                     Adding products to Cart Hover
                     --------------------------------*/

                        $(".pid").click(function()
                        {
                            var add = $(this).attr('value');
                            add_to_cart(add);

                        });

                         /*--------------------------
                          Add to cart Ajax request
                         --------------------------*/
                        function add_to_cart(y)
                        {
                            $.ajax(
                            {
                                url  : "ajax.php",
                                type : "post",
                                
                                data : {"productid" : y},
                            dataType : "json",
                            success  : function(response)
                            {
                               get_cart(response);
                              //console.log(response)
                              }

                            });
                        }
                        /*---------------------
                         Display Hover Cart
                        ---------------------*/
                        function get_cart(cart)
                        {   
                            var count = 0;
                            var price = 0;
                            var xyz = "";
                            
                            console.log(cart.length);
                            for (var i = 0; i < cart.length; i++)
                            {
                                count = count + 1;
                                price = price + cart[i]['totalprice'];
                                xyz += '<tr><td class="si-pic"><img src="img/'+cart[i]['image']+'" width="100px" height="100px" alt="">\
                                    </td><td class="si-text"><div class="product-selected">\
                                    <p>'+cart[i]["sale_price"]+' x '+cart[i]["quantity"]+' </p><h6>'+cart[i]["name"]+'</h6>\
                                    </div></td><td class="si-close"><i class="ti-close" value="'+cart[i]['sku']+'"></i></td></tr>';
                            }
                            

                            $(".yes").html(xyz);
                            $(".total").text(price);
                            $(".cart-price").text("$"+price);
                            $(".count").text(count);
                        }

                        /*---------------
                         delete button
                        ----------------*/

                         $(".yes").on( "click",".ti-close",function()
                         {
                             
                             var val = $(this).attr("value");
                             alert(val);
                             $.ajax(
                                 {
                                     url:"ajax.php",
                                     data:{deleteval:val},
                                     type:"post",
                                     dataType:"json",
                                     success:function(response)
                                     {
                                         get_cart(response);
                                     }
                                 });
                         });

                         $(".yes1").on( "click",".ti-close",function()
                         {
                             
                             var val = $(this).attr("value");
                             alert(val);
                             $.ajax(
                                 {
                                     url:"ajax.php",
                                     data:{deleteval:val},
                                     type:"post",
                                     dataType:"json",
                                     success:function(response)
                                     {
                                         get_shopcart(response);
                                     }
                                 });
                         });

                         function get_shopcart(cart)
                         {
                            var price = 0;
                            var html = "";
                            for (var i = 0; i < cart.length; i++)
                            {
                                price = price + cart[i]['totalprice'];
                                html += "<tr><td class='cart-pic first-row'><img src='img/"+cart[i]['image']+"' width='200px' height='200px' alt=''></td><td class='cart-title first-row'>\
                                        <h5>"+cart[i]['name']+"</h5></td><td class='p-price first-row'>$"+cart[i]['sale_price']+"</td><td class='qua-col first-row'><div class='quantity'>\
                                        <div class='pro-qty'><span class='dec qtybtn'>-</span><input type='text' class='get' rel='"+cart[i]['sku']+"' value='"+cart[i]['quantity']+"'><span class='inc qtybtn'>+</span></div></div></td>\
                                        <td class='total-price first-row'>$"+cart[i]['sale_price']*cart[i]['quantity']+"</td>\
                                        <td><a href='javascript:void 0;' style='color: black;' class='ti-close' value='"+cart[i]['sku']+"'></a></i></td></tr>";
                            }
                            $(".yes1").html(html);
                            $(".total_cart").text(price);
                         };

                    });

   /*-----------------------
    end of defined scripts
    ------------------------*/
    
    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
   $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    
    
    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    console.log(timerdate);
    

    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

    $("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });

        
    /*----------------------------------------------------
     Language Flag js 
    ----------------------------------------------------*/
    $(document).ready(function(e) {
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
            var val = data.value;
            if(val!="")
                window.location = val;
        }}}).data("dd");

        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);
    } catch(e) {
        // console.log(e);
    }
    $("#ver").html(msBeautify.version.msDropdown);

    //convert
    $(".language_drop").msDropdown({roundedBorder:false});
        $("#tech").data("dd");
    });
    /*-------------------
        Range Slider
    --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');
        rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*-------------------
        Radio Btn
    --------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });
    
    /*-------------------
        Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
        Single Product
    --------------------*/
    $('.product-thumbs-track .pt').on('click', function(){
        $('.product-thumbs-track .pt').removeClass('active');
        $(this).addClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product-big-img').attr('src');
        if(imgurl != bigImg) {
            $('.product-big-img').attr({src: imgurl});
            $('.zoomImg').attr({src: imgurl});
        }
    });

    $('.product-pic-zoom').zoom();
    
    /*-------------------
        Quantity change
    --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

})(jQuery);