<?php
include '../config/head.php' ;
session_start();
error_reporting(0);
require '../config/connect.php';
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty']))
{
$meQty = 0;
foreach ($_SESSION['qty'] as $meItem)
{
$meQty = $meQty + $meItem;
}
} else
{
$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0)
{
$itemIds = "";
foreach ($_SESSION['cart'] as $itemId)
{
$itemIds = $itemIds . $itemId . ",";
}
$inputItems = rtrim($itemIds, ",");
$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
$result = $conn->query($meSql); 
$meCount = mysqli_num_rows($result);
} else
{
$meCount = 0;
}
?>

    <!-- breadcam_area_start -->
    <div class="breadcam_area breadcam_bg_1 zigzag_bg_2">
        <div class="breadcam_inner">
            <div class="breadcam_text">
                <h3>รายการสั่งอาหาร</h3>
            </div>
        </div>
    </div>
    <!-- breadcam_area_end -->

    <!-- order_area_start -->
    <div class="order_area">
        <div class="container">
            <?php
            if ($action == 'removed')
            {
            echo "<div class=\"alert alert-warning\">ลบรายการเรียบร้อยแล้ว</div>";
            }

            if ($meCount == 0)
            {
            echo "<div class=\"alert alert-warning\">ไม่มีรายการอาหารอยู่ในลิส</div>";
            } else
            {
            ?>
            <form action="config/updatecart.php" method="post" name="fromupdate">
            <table class="table">
            <thead>
            <tr>
            <th></th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>จำนวนเงิน</th>
            <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_price = 0;
            $num = 0;



            while($meResult = mysqli_fetch_array($result)) 

            {
            $key = array_search($meResult['id'], $_SESSION['cart']);
            $total_price = $total_price + ($meResult['product_price'] * $_SESSION['qty'][$key]);
            ?>
            <tr>
            <td><img height="70" width="70" src="/therestaurant/dbadmin/assets/img/product/<?php echo $meResult['product_img_name']; ?>" border="0"></td>
            <td><?php echo $meResult['product_code']; ?></td>
            <td><?php echo $meResult['product_name']; ?></td>
            <td><?php echo $meResult['product_desc']; ?></td>
            <td>
            <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
            <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
            </td>
            <td><?php echo number_format($meResult['product_price'],2); ?></td>
            <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]),2); ?></td>
            <td>
            <a class="btn btn- " href="config/removecart.php?itemId=<?php echo $meResult['id']; ?>" role="button">
            <i class="fa fa-minus-circle"></i></a>
            </td>
            </tr>
            <?php
            $num++;
            }
            ?>
            <tr>
            <td colspan="8" style="text-align: right;">
            <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price,2); ?> บาท</h4>
            </td>
            </tr>
            <tr>
            <td colspan="8" style="text-align: right;">

            <a href="category" type="button" class="btn btn-light ">เลือกเมนูอื่น</a>
            <button type="submit" class="btn btn-light ">คำนวณราคาใหม่ <a class="fa fa-repeat"></a></button>
            <a href="order" type="button" class="btn btn-light">สั่งอาหาร</a>
            </td>
            </tr>
            </tbody>
            </table>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>