

<?php require (__DIR__ ."/../libs/App.php"); ?>
<?php require (__DIR__ ."/../config/config.php"); ?>
<?php require (__DIR__ ."/../includes/header.php"); ?>
<?php

    if(!isset($_SERVER['HTTP_REFERER'])) {
        echo "<script>window.location.href='".APPURL."'</script>";
        exit;
    }
?>





<?php 
    $app = new App;


    if(isset($_POST[""])) {
        $name = $_POST["name"];
        $phone_number = $_POST["phone_number"];
        $address = $_POST["address"];
        $detail = $_POST["detail"];
        $total_price = $_SESSION['total_price'];
        $user_id = $_SESSION["user_id"];
    
    
        $query = "INSERT INTO orders (name, phone_number, address, detail, total_price, user_id) VALUES (:name, :phone_number, :address, :detail, :total_price, :user_id)";
        $arr = [
            ":name"=> $name,
            ":phone_number"=> $phone_number,
            ":address"=> $address,
            ":detail"=> $detail,
            ":total_price"=> $total_price,
            ":user_id"=> $user_id
        ];
    
        if ($_POST["submit"] === "qr") {
            $path = "qr.php"; // Chuyển hướng đến QR
        } elseif ($_POST["submit"] === "atm") {
            $path = "atm.php"; // Chuyển hướng đến ATM
        }
        

    
    
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
                    <div class="col-md-12">
                        <div class="form-floading">
                            
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                            <label for="text">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floading">
                            
                            <input type="text" name="address" id="address" class="form-control"></textarea>
                            <label for="message">Địa chỉ</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floading">
                            
                            <textarea type="text" name="detail" id="detail" class="form-control"></textarea>
                            <label for="message">Chi tiết</label>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-3">
                        <form class="col-md-6" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="qr.php">
                            <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Thanh toán qua mã QR</button>
                        </form>
                        <form class="col-md-6" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="atm.php">
                            <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Thanh toán qua ATM</button>
                        </form>
                    </div>
                </div>
            </form>
        
    </div>
</div>




<?php require (__DIR__ ."/../includes/footer.php"); ?>
