<?php 
    session_start();
    include '../../../config/connect.php';
    error_reporting(0);
?>

<?php 

$sql = "SELECT fullname FROM tblusers where id order by id desc ";
$result = $conn->query($sql);
$row = $result ->fetch_assoc();

$sname = $_POST['sname'];

 $perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
$start = ($page - 1) * $perpage;
$sql3 = "SELECT tblusers.id,username,useremail,userscoin,regdate,fullname , provinces.name_th as pname ,amphures.name_th as aname ,districts.name_th as dname , role_id
from tblusers,amphures,districts,provinces where tblusers.provinces_id=provinces.id and tblusers.amphures_id=amphures.id and tblusers.districts_id=districts.id and fullname 
LIKE '%".$sname."%' limit {$start} , {$perpage}  ";
$result3 = $conn->query($sql3);

$sqlc = "SELECT count(id) as cid FROM tblusers";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();
$role = $_SESSION['role_id'];
if ($role!=1) {
  echo "<script>window.location.href='/therestaurant/index'</script>";
} else {

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
                  <p class="card-category">จำนวนลูกค้า</p>
                  <h3 class="card-title"><?php echo $rowc['cid'];?>
                    <small>คน</small>
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
                  <p class="card-category">ลูกค้าคนล่าสุด</p>
                  <h3 class="card-title">คุณ <?php echo $row['fullname'];?> 
                 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            
           
          </div>
          <div class="row">

          

            
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">รายงานลูกค้า</h4>
                  
                </div>
                <div class="card-body table-responsive">
                <div class="form-group">
                    <form action="" method="post">
                    <div class="form-group row">
                    <div class="col-xs-2">
                    <input class="form-control"  type="text" name="sname">
                    </div>&nbsp; 

                    <div class="col-xs-2">
                    <input class="form-control"  type="submit" name="submit" value="ค้นหาชื่อลูกค้า">
                    </div>
                    &nbsp; 
                    <div class="center">
                    <a class="btn btn-success " href="../insert/customer" role="button">+</a>
                    </div>
                    </div>
                    </form>
                    </div>

                    <table class="table table-bordered"> 
                    <hr>
                    <thead>
                    <tr>
                    <th>รหัสลูกค้า</th>
                    <th>ชื่อลูกค้า</th>
                    <th>Usersname</th>
                    <th>Email</th>
                    <th>ที่อยู่</th>
                    <th>เครดิตคงเหลือ</th>
                    <th>วันที่สมัครสมาชิก</th>
                    <th>สถานะสิทธิ์</th>
                    <th></th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while($row3 = mysqli_fetch_array($result3)) {
                            ?>
                    <tr>
                    <td><?php echo $row3['id'];?></td>
                    <td><?php echo $row3['fullname'];?></td>
                    <td><?php echo $row3['username'];?></td>
                    <td><?php echo $row3['useremail'];?></td>
                    <td><?php echo "<b>จังหวัด</b> ".$row3['pname']."<br> <b>อำเภอ</b> ".$row3['aname']."<br> <b>ตำบล</b> ".$row3['dname'];?></td>
                    <td><?php echo $row3['userscoin']; ?></td>
                    <td><?php echo $row3['regdate']; ?></td>
                    <?php if($row3['role_id']==1) : ?>
                            <td><span style="color:#2E8B57;font-weight:"><i class="material-icons">check</i> Admin</span></td>
                          <?php endif; ?>
                          <?php if($row3['role_id']==0) : ?>
                            <td><span style="color:#FF6347;font-weight:"><i class="material-icons">block</i> Users</span></td>
                          <?php endif; ?>
                          <td> 
                          

                          <a class="btn btn-light"  href="../config/changerole?repair_id=<?php echo $row3['id']; ?>" role="button">
                          แก้ไขสิทธิ์ <i class="material-icons">build</i></a>

                          <a class="btn btn-light"  href="../config/Infomation?id=<?php echo $row3['id']; ?>" role="button">
                          แก้ไขข้อมูลส่วนตัว <i class="material-icons">build</i></a>

                          <a class="btn btn-light"  href="../delete/deleteusers?user_id=<?php echo $row3['id']; ?>" role="button">
                          ลบ <i class="material-icons">block</i></a>
                          </td>
                    
                    </tr>
                    <?php

                    }
                    ?>
                    </tbody>

                    </table>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../signin">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php
 $sql2 = "select * from tblusers ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav aria-label="...">
 <ul class="pagination">
 <li class="page-item disabled">
 <a class="page-link" href="customer?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="page-item"><a class="page-link" href="customer?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li class="page-item">
 <a class="page-link" href="customer?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
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