<?php
require_once 'connect.php';

if (isset($_GET['orderCode']) && isset($_GET['status'])) {
    $orderCode = $_GET['orderCode'];
    $status = $_GET['status'];
    
    if ($status === 'PAID') {
        echo '<h1>Thanh toán thành công</h1>';
        echo '<p>Cảm ơn bạn đã thanh toán đơn hàng #' . $orderCode . '</p>';
        
        // Cập nhật trạng thái đơn hàng
        $sql = "UPDATE order_pro SET status = 'Đã thanh toán' WHERE id_order = '$orderCode'";
        mysqli_query($conn, $sql);
        
        // Xóa giỏ hàng
        if (isset($_SESSION['user'])) {
            $get_data->delete_All_Cart($_SESSION['user']);
        } else {
            unset($_SESSION['cart']);
        }
    } else {
        echo '<h1>Thanh toán không thành công</h1>';
        echo '<p>Đơn hàng #' . $orderCode . ' chưa được thanh toán.</p>';
    }
} else {
    header('Location: /');
    exit;
}