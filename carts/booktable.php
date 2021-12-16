<?php
include '../config/head.php' ;
session_start();
error_reporting(0);
require '../config/connect.php';

$meSql = "SELECT * FROM tbltable ";
$result = $conn->query($meSql); 

?>

    <!-- breadcam_area_start -->
    <div class="breadcam_area breadcam_bg_1 zigzag_bg_2">
        <div class="breadcam_inner">
            <div class="breadcam_text">
                <h3>จองโต๊ะอาหาร</h3>
            </div>
        </div>
    </div>
    <!-- breadcam_area_end -->

    <!-- order_area_start -->
    <div class="order_area">
        <div class="container">
            
            <form action="config/updatecart.php" method="post" name="fromupdate">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>โต๊ะที่</th>
            <th>สถานะ</th>
            </tr>
            </thead>
            <tbody>
            <?php

            while($meResult = mysqli_fetch_array($result)) 
            {
            ?>
            <tr>
            
            <td><?php echo $meResult['name']; ?></td>
            <?php if($meResult['status_id']==0) : ?>
            <td>ว่าง</td>
            <?php endif; ?> 
            <?php if($meResult['status_id']==1) : ?>
            <td>จองแล้ว</td>
            <?php endif; ?> 
            <?php if($meResult['status_id']==2) : ?>
            <td>ไม่ว่าง</td>
            <?php endif; ?> 
            </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
            </form>
           
        </div>
    </div>
</body>

</html>