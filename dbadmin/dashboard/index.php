<?php 
    session_start();
    include_once('../../config/functions.php');
    include_once('../../config/connect.php');
    error_reporting(0);
    $updatedata = new DB_con();

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

    $sql44 = "SELECT sum(order_detail_price) as price FROM order_details,orders where order_details.order_id=orders.id and month(order_date) = month(now())";
    $result44 = $conn->query($sql44);
    $row44 = $result44 ->fetch_assoc();

    $sql5 = "SELECT sum(order_detail_price) as price FROM order_details";
    $result5 = $conn->query($sql5);
    $row5 = $result5 ->fetch_assoc();

    $sql6 = "SELECT count(id) as ord FROM orders";
    $result6 = $conn->query($sql6);
    $row6 = $result6 ->fetch_assoc();

    $sql7 = "SELECT count(id) as cid FROM tblusers";
    $result7 = $conn->query($sql7);
    $row7 = $result7 ->fetch_assoc();

    $sql8 = "SELECT product_code, product_price , product_name,count(order_details.product_id) as ccc FROM order_details,products WHERE order_details.id and order_details.product_id=products.id group by order_details.product_id ASC LIMIT 3";
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
    <?php include 'config/nav.php'; ?>
    </div>
    <div class="main-panel">
      
      <?php include 'config/header.php'; ?>

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
                  <p class="card-category">รายได้ต่อเดือน</p>
                  <h3 class="card-title"><?php echo number_format($row44["price"]); ?> 
                    <small>บาท</small>
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
                  <p class="card-category">รายได้ทั้งหมด</p>
                  <h3 class="card-title"><?php echo number_format($row5["price"]); ?> 
                  <small>บาท</small>
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
                  <p class="card-category">จำนวนออเดอร์</p>
                  <h3 class="card-title"><?php echo $row6["ord"]; ?>
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
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category">จำนวนสมาชิก</p>
                  <h3 class="card-title"><?php echo $row7["cid"]; ?>
                  <small>คน</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

          <div class="col-md-6">
              <div style="display:block;width:100%;height:100%;" id="piechwart"></div>
          </div> 
                    
          <div class="col-md-6">
              <div style="display:block;width:100%;height:100%;" id="barchart"></div>
          </div>

            
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">สินค้าขายดี 3 อันดับ !! </h4>
                
                </div>
                <div class="card-body table-responsive">
                <table class="table table-bordered"> 
          
<hr>
<thead>
<tr>
<th>รหัสสินค้า</th>
<th>ชื่อสินค้า</th>
<th align = 'right'>ราคา</th>
<th>จำนวนการขาย</th>

</tr>
</thead>
<tbody>
<?php 
while($row8 = mysqli_fetch_array($result8)) {
        ?>
<tr>
<td><?php echo $row8['product_code']; ?></td>
<td><?php echo $row8['product_name']; ?></td>
<td align = 'right'><?php echo number_format($row8['product_price']).' บาท'; ?></td>
<td><?php echo $row8['ccc'].' รายการ'; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
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
<script type="text/javascript">
    
 $(function () {
    $('#piechwart').highcharts({
        chart: {
            
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            
            text: ' <span class="label2"></span>' //ใส่ชื่อกราฟ
            
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}  ({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:,.0f} (<strong>{point.percentage:.1f} %</strong>)',
                    style: {
                        
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: "Total",
            colorByPoint: true,
            data: [
   <?php
   $c_field = $res_c->field_count-1;
    $c_pie=0; while($row_pie = $res_c->fetch_array(MYSQLI_NUM)){ $c_pie++; ?>
   <?php if($c_pie>1){ ?>,<?php } ?>
    {
     name: "<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_pie[0]))))); ?>",
     y: <?php echo $row_pie[$c_field]; ?>
    }
   <?php } ?>
   ]
        }]
    });
});
</script>
        
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            categories: [
   <?php
   $c_field_bar = $res_bar->field_count-1;
    $c_bar=0; while($row_bar = $res_bar->fetch_array(MYSQLI_NUM)){ $c_bar++; ?>
   <?php if($c_bar>1){ ?>,<?php } 
   $data_bar[] = $row_bar[$c_field_bar]; 
   ?>
                '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar[0]))))); ?>'
   <?php } ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'จำนวน'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: 'จำนวน',
            data: [<?php echo join(',',$data_bar); ?>]
 
        }]
    });
});
</script>
 
</body>
<?php }?>
</html>