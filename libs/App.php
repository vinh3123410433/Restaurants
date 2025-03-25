<?php require (__DIR__ ."/../config/config.php"); ?>

<?php
    class App {
        public $host = HOST;
        public $dbname = DBNAME;
        public $user = USER;
        public $pass = PASS;
        

        public $pdo;


        //create a construct

        public function __construct() {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }


        public function connect() {
            $this->link = new PDO("mysql:host=$this->host; mdbname=$this->dbname", $this->user, $this->pass);

            // if($this->link) {
            //     echo "Connected";
            // } else {
            //     echo "Not Connected";
            // }
        }

        //selecta all

        public function selectAll($query) {
            $rows = $this->pdo->query($query);
            $rows->execute();

            $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

            if ($allRows) {
                return $allRows;
            } else {
                return false;
            }
        }

        public function selectOne($query) {
            $rows = $this->pdo->query($query);
            $rows->execute();

            $singleRows = $rows->fetch(PDO::FETCH_OBJ);

            if ($singleRows) {
                return $singleRows;
            } else {
                return false;
            }
        }

        public function validateCart($q) {
            $rows = $this->pdo->query($q);
            $rows->execute();
            $count = $rows->rowCount();
            return $count;
        }


        //insert query
        public function insert($query, $arr, $path) {
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more inputs are empty')</script>";
            }else{
                $insest_record = $this->pdo->prepare($query);
                $insest_record->execute($arr);

                echo "<script>window.location.href='".$path."'</script>";
            }
        }


        //update query
        public function update($query, $arr, $path) {
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more inputs are empty')</script>";
            }else{
                $update_record = $this->pdo->prepare($query);
                $update_record->execute($arr);

                header("location: ".$path."");
            }
        }


        //delete query
        public function delete($query, $path) {
            $delete_record = $this->pdo->prepare($query);
            $delete_record->execute();

            header("location: ".$path."");
            
        }

        public function validate($arr){
            if(in_array("",haystack: $arr)){
                echo "empty";
            }
        }



        public function register($query, $arr, $path) {
            try {
                $stmt = $this->pdo->prepare($query);
                $stmt->execute($arr);
                echo "<script>window.location.href='".$path."'</script>" ;
                exit();
            } catch (PDOException $e) {
                throw new Exception("Database error: " . $e->getMessage());
            }
        }



        public function login($query, $data, $path) {
            try {
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([':email' => $data[':email']]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($user && password_verify($data[':password'], $user['password'])) {
                    // Start session and set session variables

                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['user_id'] = $user['id'];
                    echo "<script>window.location.href='".$path."'</script>" ;
                    exit();
                } else {
                    echo "Invalid email or password";
                }
            } catch (PDOException $e) {
                throw new Exception("Database error: " . $e->getMessage());
            }
        }

        //starting session
        public function startingSession() {
            session_start();
        }

        //validating sessions
        public function validateSession() {
            if(isset($_SESSION["user_id"])) {
                echo "<script>window.location.href='".APPURL."'</script>";
            } 
        }
    }


