<?php
session_start();
include("control.php");
$get_data = new data_user();
if (isset($_SESSION['user'])) {
    $count = $get_data->count_Cart($_SESSION['user']);
} else {
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    } else {
        $count = '0';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<style>
/* Style cho form liên hệ */
.contact-form-wrapper {
    max-width: 800px; /* Tăng chiều rộng lên 800px */
    margin: 30px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.contact-form {
    padding: 15px 0; /* Giảm padding top/bottom để ngắn chiều cao */
    background: #f9fafb;
}

.container {
    max-width: 750px; /* Tăng chiều rộng container bên trong */
    margin: 0 auto;
    padding: 0 10px;
}

/* Điều chỉnh input và textarea */
.form-control {
    width: 100%;
    padding: 8px; /* Giảm padding để ngắn chiều cao */
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 13px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background: #fff;
    margin-bottom: 10px; /* Giảm khoảng cách */
}

.form-control:focus {
    border-color: #7fad39;
    box-shadow: 0 0 5px rgba(127, 173, 57, 0.3);
    outline: none;
}

textarea.form-control {
    min-height: 80px; /* Giảm chiều cao textarea */
    resize: vertical;
}

/* Nút Gửi ngay */
.site-btn {
    padding: 8px 30px; /* Tăng chiều ngang nút */
    font-size: 14px;
    border-radius: 4px;
    background: #7fad39;
    color: #fff;
    border: none;
    transition: background 0.3s ease;
}

.site-btn:hover {
    background: #6b8e23;
}

/* Tiêu đề form */
.contact__form__title {
    text-align: center;
    margin-bottom: 15px; /* Giảm khoảng cách để ngắn chiều cao */
}

.contact__form__title h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 5px;
}

.contact__form__title p {
    font-size: 14px;
    color: #666;
}

/* Responsive cho thiết bị di động */
@media (max-width: 768px) {
    .contact-form-wrapper {
        width: 90%;
        padding: 15px;
    }
    .contact-form {
        padding: 10px 0;
    }
    .container {
        max-width: 100%;
    }
    .form-control {
        font-size: 12px;
        padding: 6px;
    }
    .site-btn {
        padding: 6px 20px;
        font-size: 13px;
    }
}

/* Style cho các phần khác (giữ nguyên) */
.product__discount__badge {
    position: absolute;
    top: 10px;
    left: -5px;
    background: linear-gradient(45deg, #ff4a52, #ff6b6b);
    color: white;
    padding: 5px 15px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 3px;
    transform: rotate(-2deg);
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    z-index: 1;
}

.badge__triangle {
    position: absolute;
    left: 0;
    bottom: -8px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid #ff4a52;
    border-top: 8px solid transparent;
}

.tooltip:hover::after {
    content: attr(data-title);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    margin-bottom: 8px;
}

.price__original {
    text-decoration: line-through;
    color: #888;
    font-size: 0.9em;
    margin-right: 5px;
}

.price__sale {
    color: #ff4444;
    font-size: 1.1em;
    font-weight: 600;
}

.price__normal {
    color: #333;
    font-weight: 600;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 5px;
    position: relative;
    cursor: pointer;
}

.user-info i {
    font-size: 16px;
}

.user-info .arrow_carrot-down {
    font-size: 14px;
    margin-left: 5px;
}

.user-info .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    list-style: none;
    padding: 10px 0;
    min-width: 150px;
}

.user-info:hover .dropdown-menu {
    display: block;
}

.dropdown-menu li {
    padding: 5px 15px;
}

.dropdown-menu li a {
    text-decoration: none;
    color: #333;
    display: block;
}

.dropdown-menu li a:hover {
    background: #f5f5f5;
}

.featured__item__pic {
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    background-size: cover;
    background-position: center;
}

.featured__item__pic:hover {
    transform: scale(1.05);
}

.header__menu ul {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.header__menu ul li {
    padding: 5px 10px;
    white-space: nowrap;
}

.header__menu__dropdown {
    display: none;
    position: absolute;
    background: white;
    list-style: none;
    padding: 0;
    margin: 0;
}

.header__menu li:hover .header__menu__dropdown {
    display: block;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo1.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php if (isset($_SESSION["user"])) { ?>
                    <div class="user-info dropdown">
                        <i class="fa fa-user"></i>
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown04">
                            <li><a class="dropdown-item" href="taikhoan.php">Thông tin tài khoản</a></li>
                            <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="user-info dropdown">
                        <i class="fa fa-user"></i>
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                        </a>
                        <span class="arrow_carrot-down"></span>
                        <ul class="dropdown-menu" aria-labelledby="dropdown04">
                            <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./shop-grid.php">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.php">Shop Details</a></li>
                        <li><a href="./shoping-cart.php">Shoping Cart</a></li>
                        <li><a href="./checkout.php">Check Out</a></li>
                        <li><a href="./blog-details.php">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> laxanhsp@gmail.com</li>
                                <li>Uy tín tạo niềm tin</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-9">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">
                                <?php if (isset($_SESSION["user"])) { ?>
                                <div class="user-info dropdown">
                                    <i class="fa fa-user"></i>
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['user']; ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                        <li><a class="dropdown-item" href="taikhoan.php">Thông tin tài khoản</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                                    </ul>
                                </div>
                                <?php } else { ?>
                                <div class="user-info dropdown">
                                    <i class="fa fa-user"></i>
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Tài khoản
                                    </a>
                                    <span class="arrow_carrot-down"></span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                        <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Trang chủ</a></li>
                            <li><a href="./shop-grid.php">Cửa hàng</a></li>
                            <li><a href="./blog.php">Bài viết</a></li>
                            <li><a href="./contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="wishlist.php"><i class="fa fa-heart"></i>
                                    <span><?php echo $count; ?></span></a></li>
                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i>
                                    <span><?php echo $count; ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul>
                            <?php
                            $select_cat = $get_data->select_cat();
                            foreach ($select_cat as $se_cat) {
                            ?>
                            <li><a href="#"><?php echo $se_cat['name_cat'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="" method="post">
                                <input type="text" name="txtName" placeholder="Nhập tên sản phẩm...">
                                <button type="submit" class="site-btn" name="txtS">Tìm kiếm</button>
                            </form>
                        </div>
                        <?php
                        if (isset($_POST['txtS'])) {
                            $productName = $_POST['txtName'];
                            if (!empty($productName)) {
                                echo "<script>window.location=('shop-grid.php?productName=$productName');</script>";
                            }
                        }
                        ?>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>083.869.9999</h5>
                                <span>Hỗ Trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Liên hệ với chúng tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Trang chủ</a>
                            <span>Liên hệ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>083.869.9999</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>86 Minh Khai - Hai Bà Trưng - Hà Nội</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Thời gian</h4>
                        <p>10:00 sáng đến 23:00 tối</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>laxanhsp@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0964841661356!2d105.84446431540238!3d21.02876689315045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8c13178f3d%3A0x4a4b3a1e1a1a1a1a!2zSGFpIELDoCBUcsawbmcsIEhvw6BuIEtp4bq_bSwgSMOgIE7hu5lp!5e0!3m2!1sen!2s!4v1620000000000!5m2!1sen!2s"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Hai Bà Trưng, Hà Nội</h4>
                <ul>
                    <li>Điện thoại: +84 123 456 789</li>
                    <li>Địa chỉ: 124 Bạch Mai, Hai Bà Trưng, Hà Nội</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form-wrapper">
        <div class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h2>Gửi nội dung của bạn</h2>
                            <p>Chúng tôi rất mong nhận được ý kiến từ bạn!</p>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <div class="row g-3">
                        <div class="col-lg-6 col-md-6">
                            <input type="text" name="name" placeholder="Tên của bạn" class="form-control" required>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="email" name="email" placeholder="Email của bạn" class="form-control" required>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                        </div>
                        <div class="col-lg-12">
                            <textarea name="messenger" placeholder="Nội dung" class="form-control" required></textarea>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" name="txtsub" class="site-btn">Gửi ngay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->
    <?php 
    if (isset($_POST['txtsub'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $mes = $_POST['messenger'];
        $insert = $get_data->insert_contact($name, $email, $phone, $mes);
        if ($insert) {
            echo "<script>alert('Cảm ơn bạn đã liên hệ');</script>";
        } else {
            echo "<script>alert('Có lỗi khi xử lý');</script>";
        }
    }
    ?>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.php"><img src="img/logo1.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ cửa hàng: 86 Minh Khai - Hai Bà Trưng - Hà Nội</li>
                            <li>Điện thoại: +84 357139264</li>
                            <li>Email: laxanhsp@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Thông điệp từ chúng tôi</h6>
                        <h5>
                            “Tươi mỗi ngày – Sạch mỗi bữa – Gửi trọn yêu thương <br>từ nông trại đến gian bếp nhà bạn.”
                        </h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay</h6>
                        <p>Nhận cập nhật qua email về cửa hàng và các ưu đãi đặc biệt của chúng tôi.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>