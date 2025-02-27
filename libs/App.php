<?php require "../config/config.php"; ?>

<?php
    class App {
        public $host = HOST;
        public $dbname = DBNAME;
        public $user = USER;
        public $pass = PASS;
        

        public $link;


        //create a construct

        public function __construct() {
            $this->connect();
        }


        public function connect() {
            $this->link = new PDO("mysql:host=$this->host; mdbname=$this->dbname", $this->user, $this->pass);

            if($this->link) {
                echo "Connected";
            } else {
                echo "Not Connected";
            }
        }

        //selecta all

        public function selectAll($query) {
            $rows = $this->link->query($query);
            $rows->execute();

            $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

            if ($allRows) {
                return $allRows;
            } else {
                return false;
            }
        }

        public function selectOne($query) {
            $rows = $this->link->query($query);
            $rows->execute();

            $singleRows = $rows->fetch(PDO::FETCH_OBJ);

            if ($singleRows) {
                return $singleRows;
            } else {
                return false;
            }
        }


        //insert query
        public function insert($query, $arr, $path) {
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more inputs are empty')</script>";
            }else{
                $insest_record = $this->link->prepare($query);
                $insest_record->execute($arr);

                header("location: ".$path."");
            }
        }


        //update query
        public function update($query, $arr, $path) {
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more inputs are empty')</script>";
            }else{
                $update_record = $this->link->prepare($query);
                $update_record->execute($arr);

                header("location: ".$path."");
            }
        }


        //delete query
        public function delete($query, $path) {
            $delete_record = $this->link->prepare($query);
            $delete_record->execute();

            header("location: ".$path."");
            
        }

        public function validate($arr){
            if(in_array("",haystack: $arr)){
                echo "empty";
            }
        }



        public function register($query, $arr, $path) {
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more inputs are empty')</script>";
            }else{
                $register_user = $this->link->prepare($query);
                $register_user->execute($arr);

                header("location: ".$path."");
            }
        }

        public function login($query, $data, $path) {
            //email

            $login_user = $this->link->query($query);
            $login_user->execute();

            $fetch = $login_user->fetch(PDO::FETCH_OBJ);

            if($login_user->rowCount() > 0){
                if(password_verify($data['password'], $fetch['password'])){
                    //start session variables
                    header("location: ".$path."");
                }
            }
        }

        //starting session
        public function starttingSession() {
            session_start();
        }

        //validating sessions
        public function valiateSession($path) {
            if(isset($_SESSION["id"])) {
                header("location:".$path."");
            } 
        }
    }


