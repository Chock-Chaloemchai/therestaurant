<?php 

    define('DB_SERVER', 'localhost'); // Your hostname
    define('DB_USER', 'root'); // Database Username
    define('DB_PASS', '123456789'); // Database Password
    define('DB_NAME', 'thecart'); // Database Name

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        public function registration($fname, $uname, $uemail, $password) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail, password) VALUES('$fname', '$uname', '$uemail', '$password')");
            return $reg;
        }

        public function insertmaterial($rockQty, $cementQty, $sandQty, $metalQty, $materialSupplier, $materialPrice) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO material(rockQty, cementQty, sandQty, metalQty,materialSupplier,materialPrice) 
            VALUES('$rockQty', '$cementQty', '$sandQty', '$metalQty', '$materialSupplier', '$materialPrice')");
            return $reg;
        }

        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname FROM tblusers WHERE username = '$uname' AND password = '$password'");
            return $signinquery;
        }

         public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function update($fname, $uname, $email, $password, $date, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                fullname = '$fname',
                username = '$uname',
                useremail = '$email',
                password = '$password',
                regdate = '$date'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

        public function fetchdata_product($catId) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM products where catId=$catId and status_id=0");
            return $result;
        }

        public function fetchdata_ctproduct($catId) {
            $result = mysqli_query($this->dbcon, "SELECT count(id) as cpid FROM `products` WHERE catId=$catId and status_id=0");
            return $result;
        }

        public function fetchdata_order_detail($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM orders,status_cash WHERE status_cash.status_id=orders.status_id and cust_id = '$userid'");
            return $result;
        }

        public function fetchdata_order_detail_admin($userid) {
            $result = mysqli_query($this->dbcon, "SELECT orders.id,order_date,cust_id,status_name FROM orders,tblusers,status_cash where status_cash.status_id=orders.status_id  and tblusers.id=orders.cust_id");
            return $result;
        }

        

        public function fetchorder_detail($order_id) {
            $result = mysqli_query($this->dbcon, "SELECT fullname,product_name,order_detail_price,order_detail_quantity ,custTel,order_id ,useremail FROM order_details,products,tblusers,orders,status_cash 
            WHERE  status_cash.status_id=orders.status_id and order_details.order_id=orders.id and tblusers.id=orders.cust_id and products.id=order_details.product_id and order_id = '$order_id'");
            return $result;

           
        }

        public function uploadPhoto($fields = array()) {

            $photo = $this->_db->insert('userPhotos', array('user_id' => $this->data()->id));
            if(!$photo) {
                throw new Exception('There was a problem creating your account.');
            }
        }
        
        

}

?>