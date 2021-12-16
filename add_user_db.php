<?php

$con= mysqli_connect("localhost","root","","therestaurant") or die("Error: " . mysqli_error($con));

mysqli_query($con, "SET NAMES 'utf8' ");
 


	
	
//สร้างตัวแปร
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$tel = $_POST['tel'];
$today= $_POST['today'];
$time= $_POST['time'];
$numpeople = $_POST['numpeople'];
$numtbl = $_POST['numtbl'];




	//เพิ่มข้อมูล
	$sql = " INSERT INTO customer
	(CustomerName, CustomerLastname,Tel)
	VALUES
    ('$Firstname', '$Lastname', '$tel')";
   
	
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
   
   $sql2 = " INSERT INTO bookinghistory
	(TableNumberID, Date_history, Time_history, NumberPeople)
	VALUES
	('$numtbl', '$today', '$time', '$numpeople')";
	
	$result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
			
			
				
				
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		echo"alert('Register Success');";
	    echo"window.location = 'index.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = 'index.php'; ";
				echo"</script>";
	}


?>