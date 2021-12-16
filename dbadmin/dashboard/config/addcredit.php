<?php
    session_start();
    include("../../../config/connect.php");
    include("../../../config/functions.php");

//    $id = $_GET['id'];
    $rid = $_GET['repair_id'];

    $sql = "SELECT * FROM tblusers  where id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $updatedata2 = new DB_con();

    if (isset($_POST['update'])) {

        $uid = $_POST['uid'];
        $ucredit = $_POST['ucredit'];
        
        $sqll = $updatedata2->updatecredit($ucredit,$uid);
        if ($sqll) {
            $sqlcoin = "SELECT * FROM tblusers WHERE id='$rid'";
        $resultcoin = $conn->query($sqlcoin);
        $rowcoin = $resultcoin ->fetch_assoc();

        $rowcoin['userscoin'] = $rowcoin['userscoin'];
            echo "<script>alert('เพิ่มรายการเรียบร้อย');</script>";
             echo "<script>window.location.href='../view/customer'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='changerole?repair_id=$rid'</script>";
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
              <h4 class="card-title">เพิ่มเครดิต</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">
		
                    
        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">ชื่อผู้ใช้ :</label>
					<?php echo $mem['fullname'] ;?>
            </div>
        </div>

        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">เครดิตคงเหลือ :</label>

                <?php echo $mem['userscoin'] ;?>
					
            </div>
        </div>
   
       <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">
        <div class="col-sm">

            <div class="mb-2">
                <label for="qty" class="form-label">Users Id</label>
                <input type="text" class="form-control" id="uid" name="uid" value="<?php echo $mem['id'] ;?>">
               
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">เพิ่มเครดิต</label>
                <input type="text" class="form-control" id="ucredit" name="ucredit" value="">
                
            </div>
            <button type="submit" name="update" class="btn btn-primary btn-block mt-4" onclick="showNotification2('top','right')">
                เพิ่มข้อมูล
            </button>

     
    </form>
</div>
</div>
<div class="row mt-3">


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

  <script src="assets/script.js"></script>
</body>

</html>