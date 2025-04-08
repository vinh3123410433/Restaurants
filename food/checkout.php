<?php require (__DIR__ ."/../libs/App.php"); ?>
<?php require (__DIR__ ."/../config/config.php"); ?>
<?php require (__DIR__ ."/../includes/header.php"); ?>

<?php 
    $app = new App;


    if(isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $town = $_POST["town"];
        $country = $_POST["country"];
        $zipcode = $_POST["zipcode"];
        $phone_number = $_POST["phone_number"];
        $address = $_POST["address"];
        $total_price = $_SESSION['total_price'];
        $user_id = $_SESSION["user_id"];
    
    
        $query = "INSERT INTO orders (name, email, town, country, zipcode, phone_number, address, total_price, user_id) VALUES (:name, :email, :town, :country, :zipcode, :phone_number, :address, :total_price, :user_id)";
        $arr = [
            ":name"=> $name,
            ":email"=> $email,
            ":town"=> $town,
            ":country"=> $country,
            ":zipcode"=> $zipcode,
            ":phone_number"=> $phone_number,
            ":address"=> $address,
            ":total_price"=> $total_price,
            ":user_id"=> $user_id
        ];
    
        $path = "pay.php";
    
    
        $app->insert($query, $arr, $path); 
    }

?>

<div class="container-fluid py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Thanh toán</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Thanh toán</a></li>
            </ol>
        </nav>
    </div>
</div>


<div class="container">
    <div class="col-md-12 bg-dark wow fadeInUp p-5" data-wow-delay='0.2s'>
        
            <h5 class="sectione-title ff-secondary text-start text-primary fw-normal"></h5>
            <h1 class="text-white mb-4">Thanh toán</h1>
            <form method="POST" action="checkout.php" class="col-md-12">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floading">
                            <input type="text" name="name" id="name" class="form-control">
                            <label for="text">Họ và tên</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floading">
                            <input type="text" name="email" id="email" class="form-control">
                            <label for="text">Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floading">
                            <input type="text" name="town" id="town" class="form-control">
                            <label for="text">Thành phố</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floading">
                            <input type="text" name="country" id="country" class="form-control">
                            <label for="text">Quốc gia</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floading">
                            <input type="text" name="zipcode" id="zipcode" class="form-control">
                            <label for="text">Zipcode</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floading">
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                            <label for="text">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floading">
                            <textarea type="text" name="address" id="address" class="form-control"></textarea>
                            <label for="message">Địa chỉ</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Thanh toán và đặt hàng</button>
                    </div>
                </div>
            </form>
        
    </div>
</div>




<?php require (__DIR__ ."/../includes/footer.php"); ?>
