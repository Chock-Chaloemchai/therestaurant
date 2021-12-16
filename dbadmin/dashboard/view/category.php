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

    $role = $_SESSION['role_id'];
if ($role!=1) {
  echo "<script>window.location.href='/therestaurant/index'</script>";
} else {

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

            <div class="col-xs-2">
            <a class="btn btn-success" href="../insert/category" role="button">
                เพิ่มหมวดหมู่ <i class="fa fa-plus"></i></a>
            </div>
            </div>

                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      
                        <th class="text-primary">#</th>
                        <th class="text-primary">เลขหมวดหมู่</th>
                        <th class="text-primary">ชื่อหมวดหมู่</th>
                        <th class="text-primary"></th>
                        </thead>
                      <tbody>
                      <?php

                            $sname = $_POST['sname'];
                            $perpage = 4;
                            if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            } else {
                            $page = 1;
                            }
                            $start = ($page - 1) * $perpage;
                            $products = new DB_con();
                            $sql = $products->fetchdatacategory();
                            while($row = mysqli_fetch_array($sql)) 
                            {
                            ?>
                        <tr>
                         
                        <td><img height="100" width="100" src="../../assets/img/category/<?php echo $row['catPic']; ?>" alt=""></td>     
                          <td><?php echo $row['catId'];?></td>
                          <td><?php echo $row['catName'];?></td>
                          <td>
                          <a class="btn btn-light"  href="../delete/deletecategory?user_id=<?php echo $row['catId']; ?>" role="button">
                          ลบ <i class="material-icons">block</i></a>
                          </td>
                          
                        </tr>
                        <?php
                            }
                        ?>
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