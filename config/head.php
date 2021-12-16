<?php
session_start();
error_reporting(0);
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
$meQty = 0;
foreach($_SESSION['qty'] as $meItem){
$meQty = $meQty + $meItem;
}
}else{
$meQty=0;
}

$userid = $_SESSION['id'];
$role = $_SESSION['role_id'];

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ระบบร้านอาหาร</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/therestaurant/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/nice-select.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/flaticon.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/animate.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/slicknav.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/style.css">
    <link rel="stylesheet" href="/therestaurant/assets/css/responsive.css">
</head>

<body>

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul class="mein_menu_list" id="navigation">
                                        <li><a href="/therestaurant/">หน้าแรก</a></li>
                                        <li><a href="regis_table">จองโต๊ะ</a></li>
                                        <li><a href="/therestaurant/carts/category">เลือกเมนู</a></li>
                                        <li><a href="/therestaurant/carts/cart">ออเดอร์ <?php echo $meQty; ?></a></li>
                                        <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                                        <li class="active"><a href="/therestaurant/config/logout"><i class="bx bx-log-out-circle"></i> ออกจากระบบ</a></li>
                                        <?php endif; ?> 

                                        <?php if(empty($_SESSION['id'])) : ?>
                                        <li class="active"><a href="/therestaurant/config/signin"><i class="bx bx-log-out-circle"></i> เข้าสู่ระบบ</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php if($role==1) : ?>
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <div class="custom_order">
                            <a class="boxed_btn_white" href="/therestaurant/dbadmin/dashboard">จัดการข้อมูล</a>
                            </div>
                        </div>
                        <?php endif; ?> 
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                        <div class="logo-img-small d-sm-block d-md-block d-lg-none">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->