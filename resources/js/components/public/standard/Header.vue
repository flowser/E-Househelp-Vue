<template>
  <div >
      <header id="header"><!--header-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="header_top"><!--header_top-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 20px; padding-right: 20px;">
                                <div class="contactinfo">
                                    <ul class=" nav nav-pills pull-left" style="padding-left: 5px">
                                        <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                        <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                                    </ul>
                                </div>                           
                                <div class="social-icons">
                                    <ul class="nav nav-pills pull-right">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header_top-->
                <div class="header-middle"><!--header-middle-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 clearfix" style="padding-left: 20px; padding-right: 20px;">
                                <div class=" col ">      
                                 <a href="index.html" class="logo pull-left active" style="padding: 1px;">
                                         <img src="front_theme2/images/home/logo.png" alt="" />                                                  
                                 </a>                             
                                    <ul class="nav navbar-nav collapse navbar-collapse mainmenu">  
                                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                                <ul role="menu" class="sub-menu">
                                                    <li><a href="shop.html">Products</a></li>
                                                    <li><a href="product-details.html">Product Details</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                                <ul role="menu" class="sub-menu">
                                                    <li><a href="blog.html">Blog List</a></li>
                                                    <li><a href="blog-single.html">Blog Single</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="contact-us.html">Contact</a></li>
                                       </ul>   
                                </div>                                
                            </div>
                            <div class="col-md-6 clearfix" style="padding-left: 20px; padding-right: 20px;">
                                <div class="shop-menu clearfix pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="" style="background: #ffffff00;"><i class="fa fa-user"></i> Account</a></li>
                                        <li><a href="" style="background: #ffffff00;"><i class="fa fa-star"></i> Wishlist</a></li>
                                        <li><a href="checkout.html" style="background: #ffffff00;"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                        <li><a href="cart.html" style="background: #ffffff00;"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                        <li><a href="login.html" style="background: #ffffff00;"><i class="fa fa-lock"></i> Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-middle-->  
            </div>
        </nav>
      </header>
  </div>
</template>

<script>
    export default {
        name:"Header",
        mounted() {
            console.log('header')
        }
    }
</script>
 