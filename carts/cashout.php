<?php
include '../config/head.php' ;
session_start();
    include_once('../config/functions.php');
    include("../config/file-upload2.php"); 
    $updatedata = new DB_con();
    $order_id = $_GET['order_id'];
      $updateuser = new DB_con();
      $sql = $updateuser->fetchorder_detail($order_id);
      $row = mysqli_fetch_array($sql); 
    if (isset($_POST['update'])) {

        $userid = $_SESSION['id'];
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $email = $_POST['useremail'];
        $password = $_POST['password'];
        $date = $_POST['regdate'];

        $sql = $updatedata->update($fname, $uname, $email, $password, $date, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='Infomation.php'</script>";
        }
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
        <form action="" method="post" enctype="multipart/form-data" class="mb-3">
   <div class="mb-3">
   <input type="text" class="form-control" style="width: 300px; display: none;" id="order_id" name="order_id" value="<?php echo $row['order_id']; ?>">

   </div>
      <div class="mb-3">
            
            <select name="status_id" id="status_id" class="form-control" style="width: 300px; display: none;">
              <option value="1">ชำระเงิน</option>
            </select>
            </div>

           
 

      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
      Check Bill
      </button>
    </form>

    <?php if(!empty($resMessage)) {?>
    <div class="alert <?php echo $resMessage['status']?>">
      <?php echo $resMessage['message']?>
    </div>
    <?php }?>
  </div>
    </form>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

 
<table class="table table-dark">
<tr><br>
<th>ลำดับ</th>
<th>ชื่อสินค้า</th>
<th>ราคาสินค้า</th>
<th>จำนวน</th>
<th>ราคาสุทธิ</th>
     
     
    </tr>
    
    <?php 
        $i = 0;
      $total=0;
        
      $order_id = $_GET['order_id'];
      $updateuser = new DB_con();
      $sql = $updateuser->fetchorder_detail($order_id);
      while($row = mysqli_fetch_array($sql)) {$i++;
      $sumqty= $row['order_detail_quantity']*$row['order_detail_price'];
      $total+= $sumqty; ?>
<tr class = "  ">
<td><?=$i;?></td>

<td><?php echo $row['product_name']; ?></td>
<td><?php echo $row['order_detail_price']; ?></td>
<td><?php echo $row['order_detail_quantity']; ?></td>

      <td align = 'right'><?php echo number_format( $sumqty)." บาท.-"; ?></td>
       

      

      <?php } ?></tr></table>
             
    <table class="table table-dark">
    <tr class = ""><td colspan="3" align = 'right'><b><center>จำนวนเงินรวม</center></b></td>
               <td><p align = "right"><?php echo number_format( $total).' บาท.-'; ?></p></td>
    </tr>
    </table>

</div> <!-- /container -->
  
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#chooseFile").change(function () {
      readURL(this);
    });
  </script>
        </div>
    </div>
</body>

</html>