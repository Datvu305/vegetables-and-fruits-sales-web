<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Trang đăng nhập quản trị">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    <title>Trang quản trị - Đăng nhập</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="post" onsubmit="return validateLoginForm()">
                <div class="social-icons">
                    <a href="#"><img src="assets/img/logo1.png" alt="Logo"></a>
                </div>
                <h1>Đăng Nhập</h1>
                <input type="text" name="username" id="login_username" placeholder="Tài khoản" required>
                <input type="password" name="password" id="login_password" placeholder="Mật khẩu" required>
                <button name="submit" type="submit">Đăng Nhập</button>
            </form>
            <?php
                                    include("control.php");
                                    $get_Data = new data_user();
                                    if (isset($_POST['submit'])) {
                                        $select = $get_Data->login($_POST['username'], $_POST['password']);
                                        if (mysqli_num_rows($select) > 0) {
                                            echo "<script>alert('Đăng nhập thành công'); window.location=('index.php')</script>";
                                            $_SESSION['user'] = $_POST['username'];
                                        } else {
                                            echo "<script>alert('Đăng nhập thất bại')</script>";
                                        }
                                    }
                                ?>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Chào Mừng!<br>Admin quay trở lại.</h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>