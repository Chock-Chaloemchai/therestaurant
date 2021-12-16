<?php 
    session_start();
    include_once('../../../config/functions.php');
    include_once('../../../config/connect.php');
    
    error_reporting(0);
    $updatestatus = new DB_con();

    if (isset($_POST['updatestatus'])) {

        $userid = $_SESSION['id'];
        $fname = $_POST['fullname'];
        

        $sql = $updatedata->update($fname, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='Infomation.php'</script>";
        }
    }

    $sql4 = "SELECT count(id) as pid FROM products";
    $result4 = $conn->query($sql4);
    $row4 = $result4 ->fetch_assoc();

    $sql5 = "SELECT sum(order_detail_price) as price FROM order_details";
    $result5 = $conn->query($sql5);
    $row5 = $result5 ->fetch_assoc();

    

    $sql6 = "SELECT count(id) as ord FROM products where MONTH(dateadd) = MONTH(CURRENT_DATE())";
    $result6 = $conn->query($sql6);
    $row6 = $result6 ->fetch_assoc();

    $sqld = "SELECT count(status_id) as drd FROM products where status_id=1";
    $resultd = $conn->query($sqld);
    $rowd = $resultd ->fetch_assoc();

    $sql7 = "SELECT count(id) as cid FROM tblusers";
    $result7 = $conn->query($sql7);
    $row7 = $result7 ->fetch_assoc();




 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }

 $sname = $_POST['sname'];

 $start = ($page - 1) * $perpage;
    $sql8 = "SELECT * FROM products where id and product_name LIKE '%".$sname."%' limit {$start} , {$perpage}  ";
    $result8 = $conn->query($sql8);
    

    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/therestaurant/index'</script>";
    } else {
?>

<?php


$date_start = $_POST["date_start"];
$date_end = $_POST["date_end"];

if(isset($date_start) && isset($date_end))
        { 

        
        $sql_pie = "SELECT product_name, count(product_id) FROM order_details,products,orders WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id and (order_date BETWEEN '$date_start' and '$date_end' ) group by product_id";
        $res_c = $conn->query($sql_pie);
        
        $sql_bar = "SELECT product_name, count(product_id) FROM order_details,products,orders WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id and (order_date BETWEEN '$date_start' and '$date_end' ) group by product_id";
        $res_bar = $conn->query($sql_bar);

        $sql = "SELECT sum(order_detail_price) as total FROM order_details,orders WHERE order_details.order_id=orders.id and (order_date BETWEEN '$date_start' and '$date_end' )";
        $result = $conn->query($sql);
        $row = $result ->fetch_assoc();

        if (!$res_bar) {
            die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
        }

        }
        else {
        $sql_pie = "SELECT product_name, count(product_id) FROM order_details,products,orders WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id group by product_id";
        $res_c = $conn->query($sql_pie);

        $sql_bar = "SELECT product_name, count(product_id) FROM order_details,products,orders WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id group by product_id";
        $res_bar = $conn->query($sql_bar);

        $sql = "SELECT sum(order_detail_price) as total FROM order_details,orders WHERE order_details.order_id=orders.id  ";
        $result = $conn->query($sql);
        $row = $result ->fetch_assoc();
         
        if (!$res_bar) {
            die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
        }
      

    
            }
    
?>


<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin DB
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <?php include '../config/nav.php'; ?>
    </div>
    <div class="main-panel">
      
      <?php include '../config/header.php'; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
           
            
            
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">จำนวนสินค้าทั้งหมด</p>
                  <h3 class="card-title"><?php echo number_format($row4["pid"]); ?>
                    <small>รายการ</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-warning">warning</i>
                    <a href="#pablo" class="warning-link">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">สินค้าที่เพิ่มในเดือนนี้</p>
                  <h3 class="card-title"><?php echo $row6["ord"]; ?> 
                  <small>รายการ</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">จำนวนสินค้าที่เลิกขาย</p>
                  <h3 class="card-title"><?php echo $rowd["drd"]; ?> 
                  <small>รายการ</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <div class="row">

          

            
<div class="card">
<div class="card-header card-header-primary">
<h4 class="card-title">รายงานสินค้า</h4>
                  
</div>
<div class="card-body table-responsive">
<div class="form-group">
<form action="" method="post">
<div class="form-group row">
<div class="col-xs-2">
<input class="form-control"  type="text" name="sname">
</div>
&nbsp; 
<div class="col-xs-2">
<input class="form-control"  type="submit" name="submit" value="ค้นหาชื่อสินค้า">
</div>
&nbsp; 
<div class="center">
<a class="btn btn-success " href="../insert/product" role="button">+</a>
</div>

</form>
</div>
</div>
<div class="row mt-3">

<table class="table table-hover">

 <thead>
 <tr>

 <th>วันที่เพิ่มสินค้า</th>
 <th></th>
 <th>รหัสสินค้า</th>
 <th>ชื่อสินค้า</th>
 <th>รายละเอียด</th>
 <th>ราคาต่อหน่วย</th>
 <th>คงเหลือ</th>
 <th>จัดการข้อมูล</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $total_price = 0;
 $num = 0;
 
 
 
 while($meResult = mysqli_fetch_array($result8)) 
 
 {
  $pid=$meResult['status_id'];
  
 
 ?>
 <tr>
 <td><?php echo $meResult['dateadd']; ?></td>
 <td><img height="70" width="70" src="/therestaurant/dbadmin/assets/img/product/<?php echo $meResult['product_img_name']; ?>" border="0"></td>
 <td><?php echo $meResult['product_code']; ?></td>
 <td><?php echo $meResult['product_name']; ?></td>
 <td><?php echo $meResult['product_desc']; ?></td>
 <td><?php echo number_format($meResult['product_price'],2); ?></td>
 <td><?php echo $meResult['qty']." ชิ้น"; ?></td>
 <td>

 <a class="btn btn-light"  href="../config/addqty?repair_id=<?php echo $meResult['id']; ?>" role="button">
 เพิ่มจำนวนสินค้า <i class="material-icons">build</i></a>

 <a class="btn btn-light"  href="../config/editproduct?repair_id=<?php echo $meResult['id']; ?>" role="button">
 แก้ไขสินค้า <i class="material-icons">build</i></a>

 <?php if($pid==1) : ?>
 <a class="btn btn-danger" name="updatestatus" href="../config/setstatusdisable.php?itemId=<?php echo $meResult['id']; ?>" role="button">
 <i class="fa fa-minus-circle"></i></a>
 <?php endif; ?>  
 <?php if($pid==0) : ?>
 <a class="btn btn-success" name="updatestatus" href="../config/setstatusenable.php?itemId=<?php echo $meResult['id']; ?>" role="button">
 <i class="fa fa-plus-circle"></i></a>
 <?php endif; ?> 
 </td>
 </tr>
 <?php

 }
 ?>
 <tr>
 </tr>
 <tr>
 </tr>
 </tbody>
 </table>
                </div>
              </div>
            
            
          </div>
        </div>
      </div>
      
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="/js/themes/gray.js"></script>

 
</body>
<?php }?>
</html>