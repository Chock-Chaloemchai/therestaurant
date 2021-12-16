<?php
//connect database
include 'config/connect.php';

//query
$query = "SELECT * FROM tbl_table ORDER BY id ASC"; 
$result = mysqli_query($conn, $query); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>แสดงรายชื่อโต๊ะ</title>
    <style type="text/css">
    .devbanban{
    background-color: #ffffff;
    }
    </style>
  </head>
  <li><a href="regis_table.php">Back</a></li>
  <body style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <div class="col-sm-2 col-md-2"></div>
      <div class="col-12 col-sm-11 col-md-7 devbanban" style="margin-top: 50px;">
      	<br>
        <h4 align="center" style="color: red;">แสดงรายชื่อโต๊ะ</h4>
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="alert alert-warning" role="alert">
              <center>Tables</center>
            </div>
            <hr>
            
            <form action="action.php" method="post" id="placeOrder" enctype="multipart/form-data" class="form-horizontal">
            
            <div class="row" style="margin-bottom: 20px;">
            <?php foreach ($result as  $row) { 
            	if($row['table_status']==1){
                    
            		echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                 echo '<button type="button" id="table_status" name="table_status[]" class="btn btn-success">'.$row['table_name'].'</button></div>';
            	}else{
            		echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                 echo '<button type="button" id="table_status" name="table_status[]" class="btn btn-secondary">'.$row['table_name'].'</button></div>';
            	}
           } ?>


            </div>
			<p>*เขียว = ว่าง, เทา = ไม่ว่าง</p>
         
          
      <br>
     
    </form>
  </div>
</div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>


<script type="text/javascript">
$(document).ready(function() {

// Sending Form data to the server
$("#placeOrder").submit(function(e) {
  e.preventDefault();
  $.ajax({
    url: 'action.php',
    method: 'post',
    data: $('form').serialize() + "&action=order",
    success: function(response) {
      $("#order").html(response);
    }
  });
});


</script>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
</body>
</html>