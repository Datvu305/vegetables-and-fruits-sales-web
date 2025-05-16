<?php
session_start();
include("connect.php");
include("control.php");

header('Content-Type: application/json');

$data = new data_user();
$response = ['success' => false, 'message' => ''];

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    $response['message'] = 'Bạn cần đăng nhập để thực hiện thao tác này';
    echo json_encode($response);
    exit;
}

try {
    // Xử lý thêm bình luận
    if (isset($_POST['add_comment'])) {
        $id_pro = (int)$_POST['id_pro'];
        $username = $_SESSION['user'];
        $content = trim($_POST['content']);
        $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : null;
        
        if (empty($content)) {
            throw new Exception('Nội dung bình luận không được để trống');
        }
        
        if ($rating && ($rating < 1 || $rating > 5)) {
            throw new Exception('Đánh giá không hợp lệ');
        }
        
        if ($data->insert_comment($id_pro, $username, $content, $rating)) {
            $response['success'] = true;
            $response['message'] = 'Thêm bình luận thành công';
        } else {
            throw new Exception('Có lỗi xảy ra khi thêm bình luận');
        }
    }
    // Xử lý sửa bình luận
    elseif (isset($_POST['edit_comment'])) {
        $id_comment = (int)$_POST['id_comment'];
        $content = trim($_POST['content']);
        
        if (empty($content)) {
            throw new Exception('Nội dung bình luận không được để trống');
        }
        
        if ($data->update_comment($id_comment, $_SESSION['user'], $content)) {
            $response['success'] = true;
            $response['message'] = 'Cập nhật bình luận thành công';
        } else {
            throw new Exception('Có lỗi xảy ra khi cập nhật bình luận');
        }
    }
    // Xử lý xóa bình luận
    elseif (isset($_POST['delete_comment'])) {
        $id_comment = (int)$_POST['id_comment'];
        
        if ($data->delete_comment($id_comment, $_SESSION['user'])) {
            $response['success'] = true;
            $response['message'] = 'Xóa bình luận thành công';
        } else {
            throw new Exception('Có lỗi xảy ra khi xóa bình luận');
        }
    } else {
        throw new Exception('Yêu cầu không hợp lệ');
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
exit;
?>