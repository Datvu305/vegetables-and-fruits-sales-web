<?php
require_once 'payos_config.php';
require_once 'connect.php';

$input = file_get_contents('php://input');
$webhookData = json_decode($input, true);

// Xác minh chữ ký
$data = $webhookData['orderCode'] . '|' . $webhookData['amount'] . '|' . $webhookData['description'] . '|' . PAYOS_CLIENT_SECRET;
$signature = hash('sha256', $data);

if ($signature === $webhookData['signature']) {
    $orderCode = $webhookData['orderCode'];
    $status = $webhookData['status'];
    
    // Cập nhật trạng thái đơn hàng trong database
    if ($status === 'PAID') {
        // Thanh toán thành công
        $sql = "UPDATE order_pro SET status = 'Đã thanh toán' WHERE id_order = '$orderCode'";
        mysqli_query($conn, $sql);
    } else {
        // Thanh toán thất bại
        $sql = "UPDATE order_pro SET status = 'Thanh toán thất bại' WHERE id_order = '$orderCode'";
        mysqli_query($conn, $sql);
    }
    
    http_response_code(200);
    echo json_encode(['error' => 0, 'message' => 'Success']);
} else {
    http_response_code(400);
    echo json_encode(['error' => 1, 'message' => 'Invalid signature']);
}