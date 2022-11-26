<?php
require('conn.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$cat_res=mysqli_query($conn,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
if(isset($_SESSION['USER_LOGIN'])){
    $uid=$_SESSION['USER_ID'];
    if(isset($_GET['wishlist_id'])){
        $wid=$_GET['wishlist_id'];
    mysqli_query($conn,"delete from wishlist where id='$wid' and user_id='$uid'");
    }
    
    $wishlist_count=mysqli_num_rows(mysqli_query($conn,"select product.name,product.image,product.image,product.price,product.mrp,wishlist.id from
    product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Address Book</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
        .htc__shopping__cart a span.htc__wishlist {
    background: #c43b68;
    border-radius: 100%;
    color: #fff;
    font-size: 9px;
    height: 17px;
    line-height: 19px;
    position: absolute;
    right: 26px;
    text-align: center;
    top: -4px;
    width: 17px;
}
    </style>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li ><a href="index.php">Home</a></li>
                                        <?php
                                            //print_r($cat_arr);
                                            foreach($cat_arr as $list)
                                            {

                                                echo '<li><a href="categories.php?id='.$list['id'].'">'. $list['categories'].'</a></li>';
                                            }
                                        ?>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <?php
                                            foreach($cat_arr as $list)
                                            {
                                                ?>
                                                <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <!-- <div class="header__account"> -->
                                        <?php if(isset($_SESSION['USER_LOGIN']))
                                        {
                                            echo '<div class="header__account"><a href="logout.php">Logout</a></div><div class="header__account"><a href="my_order.php">My Order</a></div>';
                                            
                                        }
                                        else
                                        {
                                            echo '<div class="header__account"><a href="login.php">Login/Register</a></div>';
                                        }
                                        ?>
                                    <!-- </div> -->
                                    <div class="htc__shopping__cart">
                                        <?php
                                        if(isset($_SESSION['USER_ID'])){
                                        ?>
                                        <a class="cart__menu" href="wishlist.php"><i class="icon-heart icons"></i></a>
                                        <a href="wishlist.php"><span class="htc__qua"><?php echo $wishlist_count?></span></a>
                                        
                                        <?php }?>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="htc__shopping__cart">
                                        
                                        <a class="cart__menu" href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </header>
        <!-- <div class="body__overlay"></div> -->
        <!-- Start Search Popap -->
        <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
    </div>
   
