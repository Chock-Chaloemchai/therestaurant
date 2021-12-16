<?php 
    session_start();
    include("../../../config/connect.php");
    include("../../../config/functions.php");

    $updatedata = new DB_con();

    if (isset($_POST['update'])) {

        $userid = $_SESSION['id'];
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $email = $_POST['useremail'];
        $password = md5($_POST['password']);
        $date = $_POST['regdate'];

        $sql = $updatedata->update($fname, $uname, $email, $password, $date, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='../view/customer'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='Infomation.php'</script>";
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
          <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">แก้ไขข้อมูลลูกค้า</h4>
                  
                </div>
                <div class="card-body table-responsive">
                       <?php 

                        $userid = $_GET['id'];
                        $updateuser = new DB_con();
                        $sql = $updateuser->fetchonerecord($userid);
                        while($row = mysqli_fetch_array($sql)) {
                        ?>

                        <form action="" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label" style="color:">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" name="fullname" 
                                value="<?php echo $row['fullname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label" style="color:">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="username"
                                value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" style="color:">อีเมล</label>
                            <input type="email" class="form-control" name="useremail" 
                                value="<?php echo $row['useremail']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" style="color:">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password"
                                value="<?php echo $row['password']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" style="color:">วันที่สมัครสมาชิก</label>
                            <input type="text" class="form-control" name="regdate"
                                value="<?php echo $row['regdate']; ?>" required>
                        </div>
                        <?php } ?>
                        <button type="submit" name="update" class="btn btn-warning">แก้ไขข้อมูล</button>
                        </form>


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

</html>