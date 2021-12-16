<?php 
    session_start();
    include_once('../../../config/functions.php');
    include_once('../../../config/connect.php');
    if ($_SESSION['id'] == "") {
      header("location: ../signin.php");
  } else 
    
    $updatedata = new DB_con();
    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/therestaurant/index'</script>";
    } else {
?>

<?php

 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;
 $sql = "SELECT product_id , product_name ,productdata.qty,price,pdate FROM productdata , products
 where products.id=productdata.product_id and  productdata.id order by productdata.id DESC limit {$start} , {$perpage}  ";
 $query = mysqli_query($conn, $sql);


        $sql43 = "SELECT sum(order_detail_price) as price FROM order_details,orders where order_details.order_id=orders.id and month(order_date) = month(now())";
        $result43 = $conn->query($sql43);
        $row43 = $result43 ->fetch_assoc();
    
        $sql5 = "SELECT sum(order_detail_price) as price FROM order_details";
        $result5 = $conn->query($sql5);
        $row5 = $result5 ->fetch_assoc();

        $sql55 = "SELECT sum(price)*(qty) as payment FROM productdata";
        $result55 = $conn->query($sql55);
        $row55 = $result55->fetch_assoc();

        
    
        $sql6 = "SELECT count(id) as ord FROM orders";
        $result6 = $conn->query($sql6);
        $row6 = $result6 ->fetch_assoc();
    
        $sql7 = "SELECT count(id) as cid FROM tblusers";
        $result7 = $conn->query($sql7);
        $row7 = $result7 ->fetch_assoc();

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
                  <p class="card-category">รายได้ต่อเดือน</p>
                  <h3 class="card-title"><?php echo number_format($row43["price"]); ?> 
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
                  <h3 class="card-title"><?php echo number_format($row5["price"]-$row55["payment"]); ?> 
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
          <div class="card">
        <div class="card-header card-header-primary">
        <h4 class="card-title">รายงานการสั่งซื้อสินค้าเข้าร้าน</h4>
                          
        </div>
        

<table class="table table-hover">
<thead>
<tr>
<th>ชื่อสินค้า</th>
<th>จำนวนที่สั่งซื้อ</th>
<th>ราคาต่อชิ้น</th>
<th>รวมเป็นเงิน</th>
<th>วันที่สั่งซื้อ</th>

</tr>
</thead>
<tbody>

<?php 

$userid = $_SESSION['role_id'];
$updateuser = new DB_con();


                                 
if($userid==1)  
{ 
    $sql = $updateuser->fetchdata_order_detail_admin($userid);
    while($row = mysqli_fetch_assoc($query)){  ?>
<tr>
<td><?php echo $row['product_name']; ?></td>
<td><?php echo $row['qty']; ?></td>
<td><?php echo $row['price']; ?> บาท</td>
<td><?php echo $row['price']*$row['qty']; ?> บาท</td>
<td><?php echo $row['pdate']; ?></td>
<td>
</td>
</tr>
<?php }}
      
else
{
    $sql = $updateuser->fetchdata_order_detail($userid);
    while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

<tr>
<td> <a href="order_detail_1?order_id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
<td><?php echo $row['order_date']; ?></td>
<td><?php echo $_SESSION['fname']; ?></td> 
<td><?php echo $row['status_name']; ?></td>
<td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
<td>
<a class="btn btn-success" href="../orderbill?order_id=<?php echo $row['id']; ?>" role="button">
ใบเสร็จ <i class="fa fa-file"></i></a>
</td>

<?php if($status_id==0) : ?>
<td>
<a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
ชำระเงิน <i class="fa fa-credit-card"></i></a>
</td>
<?php endif; ?> 
<td>
<a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
ชำระเงิน <i class="fa fa-credit-card"></i></a>
</td>

</tr>

<?php }
}?>
       
   </table>

 <?php
 $sql2 = "select * from productdata ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav aria-label="...">
 <ul class="pagination">
 <li class="page-item disabled">
 <a class="page-link" href="reportpayment?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="page-item"><a class="page-link" href="reportpayment?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li class="page-item">
 <a class="page-link" href="reportpayment?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
      
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