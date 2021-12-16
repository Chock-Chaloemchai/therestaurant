<?php
	
	session_start();
	require 'config/connect.php';

     

	// Checkout and save customer info in the orders table
    $sqlUpdate = "UPDATE expert SET table_status=1 ";
    if (isset($_POST['table_status']) && isset($_POST['table_status']) == 'Order') {
        {
        $success = $_POST['table_status'];
        if(sizeof($success)<1)
        {
        foreach($success as $s)
        {
            $sqlUpdate = "UPDATE expert SET 'table_status'= where id = '$s' ";
	   mysql_query($sqlUpdate);
		
		
		
		
	  
				 }}}}
        
?>