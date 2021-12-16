<?php 

include_once('../../../config/functions.php'); 

    if (isset($_GET['user_id'])) {
        $userid = $_GET['user_id'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletecategory($userid);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='../view/category'</script>";
        }
    }

?>