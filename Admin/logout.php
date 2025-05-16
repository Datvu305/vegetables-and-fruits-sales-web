
<?php
session_start();
unset($_SESSION['user']); // Xóa session user
session_destroy(); // Hủy toàn bộ session
echo "<script>alert('Đăng xuất thành công');
window.location = 'login.php';</script>";
?>