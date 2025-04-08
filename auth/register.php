
<?php require (__DIR__ ."/../libs/App.php"); ?>
<?php require (__DIR__ ."/../config/config.php"); ?>
<?php require (__DIR__ ."/../includes/header.php"); ?>

<?php 

    $app = new App;
    $app->validateSession();


    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $arr = [
            ":username" => $username,
            ":email"=> $email,
            ":password"=> $password,
        ];

        $path = "login.php";


        $app->register( query: $query, arr: $arr, path: $path); 
    }

?>


<div class="container-fluid py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Đăng ký</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Đăng ký</li>
            </ol>
        </nav>
    </div>
</div>

<div class="register-container mt-5">
    <h5 class="register-title">Đăng ký</h5>
    <h2>Đăng ký tài khoản mới</h2>
    <form method="POST" action="register.php">
        <div class="mb-3">
            <input name="username" type="text" class="form-control" placeholder="Tài khoản" required>
        </div>
        <div class="mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
        </div>
        <button name="submit" type="submit" class="btn btn-custom w-100">Đăng ký</button>
    </form>
</div>

<?php require (__DIR__ ."/../includes/footer.php"); ?>






