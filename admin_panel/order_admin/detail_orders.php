<?php
require (__DIR__ ."/../../libs/App.php");
require (__DIR__ ."/../layout/header.php");
require (__DIR__ ."/../../config/config.php");

$app = new App;

$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($order_id <= 0) {
    echo "<script>alert('Không tìm thấy đơn hàng!');window.location.href='orders_admin.php'</script>";
    exit;
}

// Lấy thông tin đơn hàng
$order = $app->selectOne("SELECT * FROM orders WHERE id = :id", [':id' => $order_id]);
if (!$order) {
    echo "<script>alert('Không tìm thấy đơn hàng!');window.location.href='orders_admin.php'</script>";
    exit;
}

// Lấy chi tiết các món trong đơn hàng
$order_items = $app->selectAll("SELECT * FROM orders_detail WHERE order_id = :order_id", [':order_id' => $order_id]);
?>



<div class="container mt-5">
    <h3>Chi tiết đơn hàng #<?php echo $order->id; ?></h3>
    <p><strong>Khách hàng:</strong> <?php echo htmlspecialchars($order->name); ?></p>
    <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order->phone_number); ?></p>
    <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order->address); ?></p>
    <p><strong>Thời gian đặt:</strong> <?php echo htmlspecialchars($order->created_at); ?></p>
    <hr>
    <h5>Danh sách món đã đặt:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên món</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if ($order_items) {
                foreach ($order_items as $item) {
                    $item_total = $item->price * $item->quantity;
                    $total += $item_total;
                    echo "<tr>
                        <td>".htmlspecialchars($item->food_name)."</td>
                        <td>{$item->quantity}</td>
                        <td>".number_format($item->price)." VNĐ</td>
                        <td>".number_format($item_total)." VNĐ</td>
                    </tr>";
                }
            } else {
                echo '<tr><td colspan="4" class="text-center">Không có món nào</td></tr>';
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Tổng cộng:</th>
                <th><?php echo number_format($total); ?> VNĐ</th>
            </tr>
        </tfoot>
    </table>
    <a href="orders_admin.php" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
</div>