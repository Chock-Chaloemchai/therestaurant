<?php 
include '../config/head.php' ;
include_once('../config/functions.php');
include_once('../config/connect.php');
$updatedata = new DB_con();
?>

    <!-- breadcam_area_start -->
    <div class="breadcam_area breadcam_bg_1 zigzag_bg_2">
        <div class="breadcam_inner">
            <div class="breadcam_text">
                <h3>เมนูของทางร้าน</h3>
                <p>inappropriate behavior is often laughed off as “boys will be boys,” women <br> face higher conduct standards especially in the workplace. That’s why it’s <br> crucial that, as women.</p>
            </div>
        </div>
    </div>
    <!-- breadcam_area_end -->

    <!-- order_area_start -->
    <div class="order_area">
        <div class="container">
            <div class="row">
            <?php
            
            $catId = $_GET['catId'];
            $products = new DB_con();
            $sql = $products->fetchdata_product($catId);
            while($row = mysqli_fetch_array($sql)) 
            {
            ?>

                <div class="col-xl-4 col-md-6">
                    <div class="single_order">
                        <div class="order_thumb">
                        <img class="rounded" height="250" width="250" src="/therestaurant/dbadmin/assets/img/product/<?php echo $row['product_img_name']; ?>" >
                        <a style="display: none;"><?php echo $row['id']; ?></a>
                        </div>
                        <center><div class="order_info">
                            <h3><a href="#"><?php echo $row['product_name']; ?></a></h3>
                            <h4><a href="#"><?php echo $row['product_desc']; ?></a></h4>
                            <h3>ราคา <?php echo number_format($row['product_price'],2); ?> บาท</h3>
                            
                            <a href="config/updatecart.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row['id']; ?>" class="boxed_btn">สั่งอาหาร</a>
                        </div></center>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- order_area_end -->

    <?php include '../config/foot.php' ; ?>

</body>

</html>