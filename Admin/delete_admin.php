<?php
session_start();
include("control.php");
$get_user = new data_user();

if (empty($_SESSION['user'])) {
    echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
    window.location = 'sign-in.php';</script>";
    exit();
}

// Check if the admin is Level 1
$admin_role = $get_user->get_admin_role($_SESSION['user']);
if ($admin_role != 1) {
    echo "<script>alert('Bạn không có quyền thực hiện thao tác này');
    window.location = 'User.php';</script>";
    exit();
}

if (isset($_GET['del'])) {
    $id_admin = $_GET['del'];
    $delete = $get_user->delete_admin($id_admin);
    if ($delete) {
        echo "<script>alert('Xóa Admin thành công');
        window.location = 'User.php';</script>";
    } else {
        echo "<script>alert('Xóa Admin thất bại');
        window.location = 'User.php';</script>";
    }
}
?>