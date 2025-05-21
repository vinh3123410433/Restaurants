<?php 
    $app = new App;
    $app->startingSession();
?>
    <?php define("APPURL", "http://localhost/restaurants"); ?>
    <?php define("APPIMG", "http://localhost/restaurants/admin_panel/foods_admin/foods_images"); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo APPURL; ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo APPURL; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo APPURL; ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo APPURL;?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Mộc Mộc Quán</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?php echo APPURL;?>" class="nav-item nav-link active">Trang chủ</a>
                        <a href="<?php echo APPURL;?>/about.php" class="nav-item nav-link">Về chúng tôi</a>
                        <a href="<?php echo APPURL;?>/service.php" class="nav-item nav-link">Dịch vụ</a>
                        <a href="<?php echo APPURL;?>/menu.php" class="nav-item nav-link">Menu</a>
                        <a href="<?php echo APPURL;?>/contact.php" class="nav-item nav-link">Liên Hệ</a>

                        <?php if(isset($_SESSION['username'])): ?>

                        <a href="<?php echo APPURL; ?>/food/cart.php" class="nav-item nav-link">Giỏ Hàng</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo APPURL;?>/users/bookings.php">Booking</a></li>
                                <li><a class="dropdown-item" href="<?php echo APPURL;?>/users/orders.php">Order</a></li>
                                <li><a class="dropdown-item" href="<?php echo APPURL; ?>/auth/Logout.php">Đăng xuất</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <a href="<?php echo APPURL;?>/auth/register.php" class="nav-item nav-link">Đăng ký</a>
                        <a href="<?php echo APPURL;?>/auth/login.php" class="nav-item nav-link">Đăng nhập</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<body>
