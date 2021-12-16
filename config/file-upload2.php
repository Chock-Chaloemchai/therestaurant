<?php 
    // Database connection
    include("connect.php");
    
    if(isset($_POST["submit"])) {
        
        $order_id = basename($_POST['order_id']);
        $status_id = basename($_POST['status_id']);
 

        $sql2 = "UPDATE orders SET status_id='$status_id' WHERE id='$order_id'";
        if ($conn->query($sql2) === TRUE) {
        }
         else {echo "Error:" . $sql . "<br>" . $conn->error;}

        $sql = "UPDATE tbltable SET status_id='$status_id' WHERE id='$order_id'";
        if ($conn->query($sql) === TRUE) {
        }
        else {echo "Error:" . $sql . "<br>" . $conn->error;}
          
    header('location:/therestaurant/dbadmin/dashboard/view/reportorder');
}


?>