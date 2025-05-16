<?php
require_once 'payos_config.php';
require_once 'connect.php'; // Kết nối database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderCode = time(); // Tạo mã đơn hàng duy nhất
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    
    // Tạo chữ ký
    $data = $orderCode . '|' . $amount . '|' . PAYOS_CLIENT_SECRET;
    $signature = hash('sha256', $data);
    
    $data = [
        'orderCode' => (int)$orderCode,
        'amount' => (int)$amount,
        'description' => $description,
        'cancelUrl' => PAYOS_RETURN_URL,
        'returnUrl' => PAYOS_RETURN_URL,
        'signature' => $signature,
        'items' => [
            [
                'name' => 'Đơn hàng #' . $orderCode,
                'quantity' => 1,
                'price' => (int)$amount
            ]
        ]
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, PAYOS_CHECKOUT_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'x-client-id: ' . PAYOS_CLIENT_ID,
        'x-api-key: ' . PAYOS_API_KEY,
        'Content-Type: application/json'
    ]);
    
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpcode == 200) {
        $result = json_decode($response, true);
        echo json_encode(['success' => true, 'checkoutUrl' => $result['data']['checkoutUrl']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi khi tạo yêu cầu thanh toán']);
    }
}