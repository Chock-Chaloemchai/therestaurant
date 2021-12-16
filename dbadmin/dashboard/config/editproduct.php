<?php
    session_start();
    include("../../../config/connect.php");
    include("../../../config/functions.php");
    include("file-upload3.php"); 

//  $id = $_GET['id'];
    $rid = $_GET['repair_id'];

    $sql = "SELECT * FROM products,categories  where products.catId=categories.catId and id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $sqlcat = "SELECT * FROM categories";
    $resultcat2 = $conn->query($sqlcat);

    $updatedata2 = new DB_con();
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
              <h4 class="card-title">แก้ไขสินค้า</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">
		
                    
  <form action="" method="post" enctype="multipart/form-data" class="mb-3">
     
      <div class="mb-3">
         <label for="product_code" class="form-label">เลขที่สินค้า</label>
         <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $mem['id'] ;?>" disable >
     </div>  
     <div class="mb-3">
         <label for="product_code" class="form-label">รหัสสินค้า</label>
         <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $mem['product_code'] ;?>" disable >
     </div>
     <div class="mb-3">
         <label for="product_name" class="form-label">ชื่อสินค้า</label>
         <input type="text" class="form-control" id="product_name" name="product_name" onblur="checkusername(this.value)"value="<?php echo $mem['product_name'] ;?>">
         <span id="usernameavailable"></span>
     </div>
     <div class="mb-3">
     <label for="product_desc" class="form-label">รายละเอียดสินค้า</label>
         <input type="text" class="form-control" id="product_desc" name="product_desc" value="<?php echo $mem['product_desc'] ;?>">
     </div>

     <div class="mb-3">
     <label for="product_desc" class="form-label">หมวดหมู่สินค้า</label></label>
     <select name="catId" id="catId" class="form-control">
                            <option value="<?php echo $mem['catId'] ;?>"><?php echo $mem['catName'] ;?></option>
                            <?php while($resultcat = mysqli_fetch_assoc($resultcat2)): ?>
                                <option value="<?=$resultcat['catId']?>"><?=$resultcat['catName']?></option>
                            <?php endwhile; ?>
                        </select>
     </div>

     <div class="mb-3">
         <label for="product_price" class="form-label">ราคา</label>
         <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $mem['product_price'] ;?>">
     </div>
    

<div class="user-image mb-3 text-center">
 <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
   <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
 </div>
</div>

<div class="custom-file">
 <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" value="<?php echo $mem['product_img_name'] ;?>">
 <label class="custom-file-label" for="chooseFile">Select file</label>
</div>

<button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
 Upload File
</button>
</form>
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