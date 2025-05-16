
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
/* Style cho badge giảm giá */
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

/* Tooltip */
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

/* Style giá */
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

/*menu */
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
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
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
                            <li><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.php">Chi tiết cửa hàng</a></li>
                                    <li><a href="./shoping-cart.php">Giỏ hàng</a></li>
                                    <li><a href="./checkout.php">Thanh toán</a></li>
                                    <li><a href="./blog-details.php">Chi tiết bài viết</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Bài viết</a></li>
                            <li><a href="./contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
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
                            <li><a href="#">Thịt tươi</a></li>
                            <li><a href="#">Rau củ</a></li>
                            <li><a href="#">Quà tặng trái cây & hạt</a></li>
                            <li><a href="#">Dâu tươi</a></li>
                            <li><a href="#">Hải sản</a></li>
                            <li><a href="#">Bơ & trứng</a></li>
                            <li><a href="#">Thức ăn nhanh</a></li>
                            <li><a href="#">Hành tươi</a></li>
                            <li><a href="#">Đu đủ & snack</a></li>
                            <li><a href="#">Bột yến mạch</a></li>
                            <li><a href="#">Chuối tươi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="" method="post">
                                <input type="text" name="txtName" id="" placeholder="Nhập tên sản phẩm...">
                                <button type="submit" class="site-btn" name="txtS" id="">Tìm kiếm</button>
                            </form>
                        </div>
                        <?php if (isset($_POST['txtS'])) {
                            $productName = $_POST['txtName'];
                            if (!empty($productName)) {
                                echo "<script>window.location=('shop-grid.php?productName=$productName');</script>";
                            }
                        } ?>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
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
                        <h2>Thanh toán</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Trang chủ</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Chi tiết thanh toán</h4>
                <form action="#" method="post" id-a id="checkoutForm">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__input">
                                <p>Địa chỉ nhận hàng<span>*</span></p>
                                <?php if (isset($_SESSION['user'])) { ?>
                                <select class="form-control" name="diachi" id="diachi">
                                    <?php
                                    $select_add = $get_data->select_address($_SESSION['user']);
                                    foreach ($select_add as $se_add): ?>
                                    <option value="<?php echo $se_add['address']; ?>"
                                        data-name="<?php echo $se_add['name_custommer']; ?>"
                                        data-phone="<?php echo $se_add['phone']; ?>">
                                        <?php echo $se_add['address']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php } else { ?>
                                <input type="text" name="diachi" class="form-control" required>
                                <?php } ?>
                                <br>
                                <br>
                            </div>
                            <div class="checkout__input">
                                <h1></h1>
                            </div>
                            <div class="checkout__input">
                                <p>Người nhận<span>*</span></p>
                                <input type="text" name="txtname" class="form-control" id="nguoiNhan" required
                                    <?php if (isset($_SESSION['user'])) ?>>
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="txtPhone" class="form-control" id="sdtNguoiNhan" required
                                    <?php if (isset($_SESSION['user'])) ?>>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span> Giá </span></div>
                                <ul>
                                    <?php
                                $subTotal = 0;
                                if (isset($_SESSION['user'])) {
                                    $select_cart = $get_data->select_Cart($_SESSION["user"]);
                                } else {
                                    $select_cart = $_SESSION['cart'];
                                }
                                foreach ($select_cart as $se) {
                                    $subTotal += $se['total'];
                                    echo "<li>{$se['name_pro']} <span>" . number_format($se['total'], 0, ',', '.') . " ₫</span></li>";
                                }
                                ?>
                                </ul>
                                <div class="checkout__order__subtotal">Tổng giá tiền sản phẩm
                                    <span><?php echo number_format($subTotal, 0, ',', '.'); ?> ₫</span>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" value="Thanh toán khi nhận hàng" class="mr-2" checked> Thanh toán khi nhận hàng</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" value="Chuyển khoản qua ngân hàng" class="mr-2"> Chuyển khoản qua ngân hàng</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="txtsub" class="site-btn">Thanh Toán Đơn Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php 
if (isset($_POST['txtsub'])) {
    $name = $_POST['txtname'];
    $phone = $_POST['txtPhone'];
    $address = $_POST['diachi'];
    $pay = $_POST['optradio'];
    $status = "Chờ";
    $total = $subTotal;

    if ($pay === "Thanh toán khi nhận hàng") {
        if (isset($_SESSION['user'])) {
            $insert = $get_data->insert_Order($_SESSION['user'], $name, $phone, $address, $total, $pay, $status);
        } else {
            $insert = $get_data->insert_Order(null, $name, $phone, $address, $total, $pay, $status);
        }

        if ($insert) {
            if (isset($_SESSION['user'])) {
                foreach ($select_cart as $se) {
                    $insert_order = $get_data->insert_Order_Detail($insert, $se['id_pro'], $se['name_pro'], $se['quantity_order'], $se['total']);
                }
                if ($insert_order) {
                    $delete = $get_data->delete_All_Cart($_SESSION['user']);
                    echo "<script>alert('Đặt hàng thành công'); window.location='shop-grid.php';</script>";
                }
            } else {
                foreach ($_SESSION['cart'] as $se) {
                    $insert_order = $get_data->insert_Order_Detail($insert, $se['id_pro'], $se['name'], $se['quantity'], $se['total']);
                }
                if ($insert_order) {
                    session_destroy();
                    echo "<script>alert('Đặt hàng thành công'); window.location='shop-grid.php';</script>";
                }
            }
        } else {
            echo "<script>alert('Vui lòng kiểm tra lại đơn đặt hàng');</script>";
        }
    }
}
?>

    <!-- Checkout Section End -->

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
                            <li>Địa chỉ cửa hàng:86 Minh Khai - Hai Bà Trưng - Hà Nội</li>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectDiachi = document.getElementById('diachi');
        var inputNguoiNhan = document.getElementById('nguoiNhan');
        var inputSdtNguoiNhan = document.getElementById('sdtNguoiNhan');

        // Hàm cập nhật giá trị của trường "Người nhận" và "Số điện thoại người nhận"
        function updateFields() {
            var selectedOption = selectDiachi.options[selectDiachi.selectedIndex];
            var name = selectedOption.getAttribute('data-name');
            var phone = selectedOption.getAttribute('data-phone');
            inputNguoiNhan.value = name;
            inputSdtNguoiNhan.value = phone;
        }

        // Cập nhật trường "Người nhận" và "Số điện thoại người nhận" khi trang được tải
        updateFields();

        // Cập nhật trường "Người nhận" và "Số điện thoại người nhận" khi lựa chọn thay đổi
        selectDiachi.addEventListener('change', updateFields);
    });

    document.getElementById('checkoutForm').addEventListener('submit', function(event) {
        const paymentMethod = document.querySelector('input[name="optradio"]:checked').value;
        if (paymentMethod === 'Chuyển khoản qua ngân hàng') {
            event.preventDefault();
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });
            sessionStorage.setItem('checkoutData', JSON.stringify(data));
            window.location.href = 'banking.php';
        }
    });
    </script>
</body>

</html>
