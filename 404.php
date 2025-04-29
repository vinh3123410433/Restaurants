<?php require (__DIR__ ."/libs/App.php"); ?>
<?php require (__DIR__ ."/includes/header.php"); ?>
<?php require (__DIR__ ."/config/config.php"); ?>

<div class="container-fluid py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
    <div class="text-center">
        <h1 class="display-1 fw-bold text-white">404</h1>
        <p class="fs-3"><span class="text-danger">Opps!</span>Trang không tìm thấy</p>
        <p class="lead">Xin lỗi, trang bạn đang tìm kiếm không tồn tại. Có thể nó đã bị xóa hoặc địa chỉ URL không chính xác.</p>
        <a href="<?php echo APPURL; ?>" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
    </div>
</div>





<?php require (__DIR__ ."/includes/footer.php"); ?>

