<?php
require_once('config.php');
require_once('connect.php');

if ($_GET['status'] === 'SUCCESS') {
    $orderCode = $_GET['orderCode'];
    $total = $_GET['amount'];

    // Cập nhật trạng thái đơn hàng
    $sql = "UPDATE order_pro SET status='Đã thanh toán' WHERE orderCode='$orderCode'";
    mysqli_query($conn, $sql);

    echo "<script>alert('Thanh toán thành công!'); window.location.href='shop-grid.php';</script>";
} else {
    echo "<script>alert('Thanh toán thất bại!'); window.location.href='checkout.php';</script>";
}
?>