<?php
session_start();
include("connect.php");

header('Content-Type: application/json');

// Hàm chào hỏi người dùng
function getGreeting() {
    $hour = date('H');
    if ($hour < 12) {
        return "Chào buổi sáng! Tôi có thể giúp gì cho bạn?";
    } elseif ($hour < 18) {
        return "Chào buổi chiều! Tôi có thể giúp gì cho bạn?";
    } else {
        return "Chào buổi tối! Tôi có thể giúp gì cho bạn?";
    }
}

// Hàm lấy các câu hỏi gợi ý
function getQuickQuestions() {
    return [
        "Các sản phẩm của Lá Xanh Organic có nguồn gốc từ đâu?",
        "Làm thế nào để biết sản phẩm còn tươi ngon khi nhận hàng?",
        "Có chính sách bảo hành cho sản phẩm không?",
        "Tôi muốn tìm sản phẩm phù hợp để ăn kiêng, có gợi ý nào không?",
        "Làm thế nào để đặt hàng và thanh toán?"
    ];
}
// Xử lý logout
if (isset($_GET['logout'])) {
    global $conn;
    
    // Lấy session_id hiện tại
    $sessionId = $_SESSION['chat_session'] ?? session_id();
    
    // Xóa lịch sử chat trong database
    $stmt = $conn->prepare("DELETE FROM chat_messages WHERE session_id = ?");
    $stmt->bind_param("s", $sessionId);
    $stmt->execute();
    
    // Xóa biến session chat
    unset($_SESSION['chat_session']);
    
    // Phản hồi thành công
    echo json_encode(['status' => 'success', 'message' => 'Đã đăng xuất và xóa lịch sử chat']);
    exit;
}

// Hàm tìm kiếm sản phẩm
function searchProducts($keyword) {
    global $conn;
    $keyword = "%$keyword%";
    $stmt = $conn->prepare("SELECT id_pro, name_pro, image, price, price_sale FROM product 
                           WHERE name_pro LIKE ? OR category LIKE ? LIMIT 3");
    $stmt->bind_param("ss", $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}


// Hàm tìm kiếm câu trả lời phù hợp
function findAnswer($question) {
    global $conn;
    
    // Danh sách câu hỏi và câu trả lời cố định
    $faq = [
        "Các sản phẩm của Lá Xanh Organic có nguồn gốc từ đâu?" => "Tất cả sản phẩm của Lá Xanh Organic đều được trồng tại các nông trại hữu cơ đạt chuẩn tại Việt Nam, đảm bảo không sử dụng hóa chất hay thuốc trừ sâu độc hại.",
        "Làm thế nào để biết sản phẩm còn tươi ngon khi nhận hàng?" => "Chúng tôi cam kết giao rau củ tươi ngon nhất, được thu hoạch trong ngày và đóng gói cẩn thận. Nếu sản phẩm không đạt chất lượng, bạn có thể liên hệ ngay qua hotline 083.869.9999 để được hỗ trợ đổi trả.",
        "Có chính sách bảo hành cho sản phẩm không?" => "Rau củ tươi không áp dụng bảo hành, nhưng chúng tôi đảm bảo chất lượng sản phẩm khi giao. Nếu có vấn đề về chất lượng, vui lòng liên hệ trong vòng 24 giờ để được giải quyết.",
        "Tôi muốn tìm sản phẩm phù hợp để ăn kiêng, có gợi ý nào không?" => "Bạn có thể thử các loại rau xanh như cải bó xôi, cải kale hoặc cà chua baby, rất phù hợp cho chế độ ăn kiêng lành mạnh. Ngoài ra, các loại hạt sấy khô như hạnh nhân và hạt điều cũng là lựa chọn tuyệt vời!",
        "Làm thế nào để đặt hàng và thanh toán?" => "Bạn có thể đặt hàng trực tiếp trên website laxanhorganic.com, thêm sản phẩm vào giỏ hàng và thanh toán qua chuyển khoản ngân hàng, ví điện tử hoặc thanh toán khi nhận hàng (COD)."
    ];
    
    // Kiểm tra nếu câu hỏi khớp với FAQ
    foreach ($faq as $q => $answer) {
        if (stripos($question, $q) !== false) {
            return $answer;
        }
    }
    // Kiểm tra nếu là lời chào
    if (preg_match('/^(hi|hello|chào|xin chào)/i', $question)) {
        return getGreeting();
    }
    
    // Kiểm tra câu hỏi về bảo hành
    if (preg_match('/(bh|bảo hành|warranty)/i', $question)) {
        $cleanQuestion = preg_replace('/[^\w\s]/u', '', strtolower($question));
        $keywords = explode(' ', $cleanQuestion);
        
        $sql = "SELECT answer FROM chatbot WHERE ";
        $conditions = [];
        $params = [];
        
        foreach ($keywords as $keyword) {
            if (strlen($keyword) > 2) {
                $conditions[] = "question LIKE ?";
                $params[] = "%$keyword%";
            }
        }
        
        if (empty($conditions)) {
            return "Tất cả sản phẩm đều có bảo hành chính hãng. Vui lòng kiểm tra thông tin chi tiết trên trang sản phẩm.";
        }
        
        $sql .= implode(" OR ", $conditions) . " ORDER BY LENGTH(answer) ASC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['answer'];
        }
        
        return "Tất cả sản phẩm đều có bảo hành chính hãng. Vui lòng kiểm tra thông tin chi tiết trên trang sản phẩm.";
    }
    
    
    // Kiểm tra tìm sản phẩm
    if (preg_match('/(tìm|tìm kiếm|sản phẩm|mua|mua hàng).*(gì|nào|nào không)/i', $question)) {
        $quickQuestions = getQuickQuestions();
        $response = "Chúng tôi có các sản phẩm thuộc nhiều danh mục khác nhau. Bạn có thể hỏi về:<br><br>";
        foreach ($quickQuestions as $q) {
            $response .= "- $q<br>";
        }
        return $response;
    }
    
    // Tìm sản phẩm cụ thể
    if (preg_match('/(tìm|tìm kiếm|mua|sản phẩm|hàng)\s+(.*)/i', $question, $matches)) {
        $searchTerm = trim($matches[2]);
        $products = searchProducts($searchTerm);
        
        if (empty($products)) {
            return "Không tìm thấy sản phẩm phù hợp với '$searchTerm'. Vui lòng thử từ khóa khác.";
        }
        
        $response = "Tìm thấy " . count($products) . " sản phẩm phù hợp:<br><br>";
        foreach ($products as $product) {
            $price = $product['price_sale'] ? "<del>" . number_format($product['price']) . "</del> " . number_format($product['price_sale']) : number_format($product['price']);
            $response .= "<div class='product-item' onclick='window.location=\"shop-details.php?id=" . $product['id_pro'] . "\"'>";
            $response .= "<img data-imgbigurl='../Admin/upload/" . $product['image'] . "' src='../Admin/upload/" . $product['image'] . "' width='50' height='50'>";
            $response .= "<div class='product-info'><strong>" . $product['name_pro'] . "</strong><br>";
            $response .= "<span class='price'>" . $price . " VND</span></div></div>";
        }
        return $response;
    }
    
    // Làm sạch câu hỏi
    $cleanQuestion = preg_replace('/[^\w\s]/u', '', strtolower($question));
    $keywords = explode(' ', $cleanQuestion);
    
    // Tìm câu trả lời phù hợp nhất
    $sql = "SELECT answer FROM chatbot WHERE ";
    $conditions = [];
    $params = [];
    
    foreach ($keywords as $keyword) {
        if(strlen($keyword) > 2) {
            $conditions[] = "question LIKE ?";
            $params[] = "%$keyword%";
        }
    }
    
    if(empty($conditions)) {
        return "Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể thử:<br><br>" . implode("<br>", getQuickQuestions());
    }
    
    $sql .= implode(" OR ", $conditions) . " ORDER BY LENGTH(answer) ASC LIMIT 1";
    $stmt = $conn->prepare($sql);
    
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        return $result->fetch_assoc()['answer'];
    }
    
    // Nếu không tìm thấy, trả về câu trả lời mặc định
    return "Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.";
}

// Xử lý tin nhắn từ người dùng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $message = trim($data['message']);
    
    // Lưu tin nhắn người dùng
    $sessionId = $_SESSION['chat_session'] ?? session_id();
    $_SESSION['chat_session'] = $sessionId;
    
    $stmt = $conn->prepare("INSERT INTO chat_messages (session_id, message, is_bot) VALUES (?, ?, 0)");
    $stmt->bind_param("ss", $sessionId, $message);
    $stmt->execute();
    
    // Tìm câu trả lời
    $answer = findAnswer($message);
    
    // Lưu tin nhắn bot
    $stmt = $conn->prepare("INSERT INTO chat_messages (session_id, message, is_bot) VALUES (?, ?, 1)");
    $stmt->bind_param("ss", $sessionId, $answer);
    $stmt->execute();
    
    echo json_encode(['answer' => $answer]);
    exit;
}

// Lấy lịch sử chat
if (isset($_GET['get_history'])) {
    $sessionId = $_SESSION['chat_session'] ?? session_id();
    $stmt = $conn->prepare("SELECT message, is_bot, created_at FROM chat_messages 
                           WHERE session_id = ? ORDER BY created_at ASC");
    $stmt->bind_param("s", $sessionId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $history = [];
    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }
    
    echo json_encode($history);
    exit;
}

// Lấy câu hỏi gợi ý
if (isset($_GET['get_questions'])) {
    echo json_encode(getQuickQuestions());
    exit;
}
?>