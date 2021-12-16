<?php
include '../config/head.php' ;
require '../config/connect.php';
include_once('../config/functions.php');
error_reporting(0);
  $userdata = new DB_con();
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
if (isset($_SESSION['qty'])) {
$meQty = 0;
foreach ($_SESSION['qty'] as $meItem) {
$meQty = $meQty + $meItem;
}
} else {
$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
$itemIds = "";
foreach ($_SESSION['cart'] as $itemId) {
$itemIds = $itemIds . $itemId . ",";
}
$inputItems = rtrim($itemIds, ",");
$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
$result = $conn->query($meSql); 
$meCount = mysqli_num_rows($result);
} else {
$meCount = 0;
}
?>

<?php
$sql1 = "SELECT MAX(`id`) AS `lastid` FROM `orders`";
$result1 = $conn->query($sql1);
$row1 = $result1 ->fetch_assoc();
$idf = $row1['lastid'];
$date = date('ym-d');
$code = sprintf($date.'-%04d', $idf);
?>

    <!-- breadcam_area_start -->
    <div class="breadcam_area breadcam_bg_1 zigzag_bg_2">
        <div class="breadcam_inner">
            <div class="breadcam_text">
                <h3>บันทึกการสั่งซื้อ</h3>
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
            <form action="config/updateorder.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">
            <div class="row">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>เลขที่รายการ</th>
            <th>เลขที่โต๊ะ</th>
            </tr>
            </thead>
            <tbody>
            
            <tr>
            <input type="text" style="display: none;" class="form-control" id="report_id" placeholder="" style="width: 300px;" name="report_id" value="<?php echo $code; ?>">
            
            <td><?php echo $code; ?></td>
            <td><input type="text" class="form-control" id="order_fullname" placeholder="ใส่หมายเลขโต๊ะ" style="width: 300px;" name="order_fullname" value="" required></td>
            
            </tr>
            </tbody>
            </table>
            </div>
            <table class="table">
            <thead>
            <tr>
            <th>รหัสลูกค้า</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>จำนวนเงิน</th>
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
            <td><?php echo $_SESSION['id']; ?></td>
            <td><?php echo $meResult['product_code']; ?></td>
            <td><?php echo $meResult['product_name']; ?></td>
            <td><?php echo $meResult['product_desc']; ?></td>
            <td>
            <?php echo $_SESSION['qty'][$key]; ?>
            <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
            <input type="hidden" name="product_id[]" value="<?php echo $meResult['id']; ?>" />
            <input type="hidden" name="product_price[]" value="<?php echo $meResult['product_price']; ?>" />
            </td>
            <td><?php echo number_format($meResult['product_price'], 2); ?></td>
            <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]), 2); ?></td>
            </tr>
            <?php
            $num++;
            }
            ?>
            <tr>
            <td colspan="8" style="text-align: right;">
            <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price, 2); ?> บาท</h4>
            </td>
            </tr>
            <tr>
            <td colspan="8" style="text-align: right;">
            <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
            <a href="cart.php" type="button" class="btn btn-light ">ย้อนกลับ</a>
            <button type="submit" class="btn btn-light ">สั่งอาหาร</button>
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