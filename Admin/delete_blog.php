<?php
include('control.php');
$get_data = new data();

// Xử lý xóa blog
if (isset($_GET['del'])) {
    $delete = $get_data->delete_blog($_GET['del']);
    
    if ($delete) {
        $_SESSION['message'] = "Xóa bài viết thành công";
        header('Location: blog.php');
    } else {
        $_SESSION['error'] = "Xóa bài viết thất bại";
        header('Location: blog.php');
    }
    exit;
}

echo "Yêu cầu không hợp lệ";
?>