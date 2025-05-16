<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <title>Đăng Nhập | Rau Củ Quả Sạch</title>
</head>

<body>

    <div class="container" id="container">

        <div class="form-container sign-up">
            <form method="post" onsubmit="return validateRegisterForm()">

                <div class="social-icons">
                    <a href="#"><img src="img/logo1.png" alt=""></a>
                </div>
                <h1>Đăng ký</h1>

                <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Xác nhận Mật khẩu"
                    required>
                <button name="register_submit">Đăng Ký</button>
            </form>
            <?php
            include("control.php");
            $get_Data = new data_user();
            if (isset($_POST['register_submit'])) {
                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])) {
                    // Server-side password validation
                    if (strlen($_POST['password']) < 8) {
                        echo "<script>alert('Mật khẩu phải có ít nhất 8 ký tự')</script>";
                    } elseif ($_POST['password'] != $_POST['confirm_password']) {
                        echo "<script>alert('Mật khẩu không khớp')</script>";
                    } else {
                        $select = $get_Data->select_user($_POST['username']);
                        $check = 0;
                        foreach ($select as $sel) {
                            $check++;
                        }
                        if ($check >= 1) {
                            echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";
                        } else {
                            $hashed_password = $_POST['password'];

                            // Chèn người dùng mới vào cơ sở dữ liệu
                            $insert = $get_Data->insert_User($_POST['username'], $hashed_password, $_POST['email']);
                            if ($insert) {
                                echo "<script>alert('Đăng ký thành công'); window.location='login.php';</script>";
                            } else {
                                echo "<script>alert('Đăng ký thất bại')</script>";
                            }
                        }
                    }
                } else {
                    echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                }
            }
            ?>
        </div>

        <div class="form-container sign-in">
            <form method="post" onsubmit="return validateLoginForm()">
                <div class="social-icons">
                    <a href="#"><img src="img/logo1.png" alt=""></a>
                </div>

                <h1>Đăng Nhập</h1>



                <input type="text" name="username" id="login_username" placeholder="Tài khoản" required>
                <input type="password" name="password" id="login_password" placeholder="Mật khẩu" required>
     
                <button name="login_submit" type="submit">Đăng Nhập</button>
            </form>
            <?php
            $get_Data = new data_user();
            if (isset($_POST['login_submit'])) {
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    // Server-side password length validation
                    if (strlen($_POST['password']) < 8) {
                        echo "<script>alert('Mật khẩu phải có ít nhất 8 ký tự')</script>";
                    } else {
                        // Gọi hàm login để kiểm tra tên đăng nhập và mật khẩu
                        $select = $get_Data->login($_POST['username'], $_POST['password']);

                        if ($select) {
                            // Đăng nhập thành công
                            echo "<script>alert('Đăng nhập thành công'); window.location='index.php';</script>";
                            $_SESSION['user'] = $_POST['username'];
                        } else {
                            // Đăng nhập thất bại
                            echo "<script>alert('Đăng nhập thất bại');</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                }
            }
            ?>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào Mừng Quay Lại!</h1>
                    <p>Mua sắm rau củ quả sạch dễ dàng và nhanh chóng. Đăng nhập ngay để nhận ưu đãi hấp dẫn!</p>
                    <button class="hidden" id="login">Đăng Nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào Mừng Bạn!</h1>
                    <p>Đăng ký tài khoản ngay hôm nay để trải nghiệm dịch vụ giao hàng rau củ quả sạch tận nhà!</p>
                    <button class="hidden" id="register">Đăng Ký</button>
                </div>
            </div>
        </div>

    </div>

    <script>
    // Client-side validation for registration form
    function validateRegisterForm() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;

        if (!username || !email || !password || !confirmPassword) {
            alert('Vui lòng nhập đủ thông tin');
            return false;
        }

        if (password.length < 8) {
            alert('Mật khẩu phải có ít nhất 8 ký tự');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Mật khẩu không khớp');
            return false;
        }

        return true;
    }

    // Client-side validation for login form
    function validateLoginForm() {
        const username = document.getElementById('login_username').value;
        const password = document.getElementById('login_password').value;

        if (!username || !password) {
            alert('Vui lòng nhập đủ thông tin');
            return false;
        }

        if (password.length < 8) {
            alert('Mật khẩu phải có ít nhất 8 ký tự');
            return false;
        }

        return true;
    }

    // Existing toggle script (assumed from scriptlogin.js)
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
    </script>
</body>

</html>