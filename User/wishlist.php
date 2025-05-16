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
    /* Khoảng cách giữa icon, tên và mũi tên */
    position: relative;
    cursor: pointer;
}

.user-info i {
    font-size: 16px;
}

.user-info .arrow_carrot-down {
    font-size: 14px;
    margin-left: 5px;
    /* Dịch sang phải một chút */
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
    /* Bo tròn ảnh */
    overflow: hidden;
    /* Đảm bảo ảnh không bị vỡ khung */
    transition: transform 0.3s ease-in-out;
    background-size: cover;
    background-position: center;
}

.featured__item__pic:hover {
    transform: scale(1.05);
    /* Phóng to nhẹ khi rê chuột vào */
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
    /* Ngăn chữ bị xuống dòng */
}

.header__menu__dropdown {
    display: none;
    /* Ẩn dropdown mặc định */
    position: absolute;
    background: white;
    list-style: none;
    padding: 0;
    margin: 0;
}

.header__menu li:hover .header__menu__dropdown {
    display: block;
    /* Hiện dropdown khi hover */
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
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $count; ?></span></a>
                </li>
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
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="./index.php">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    </section>
    <!-- Product Details Section End -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['del'])) {
                                    $id_pro = $_GET['del'];
                                    $delete = $get_data->delete_wishList($id_pro);
                                }
                                $select_pro = $get_data->select_product();
                                $select = $get_data->selelect_wishList();
                                if (isset($_GET['id_pro'])) {
                                    $select_pro_id = $get_data->select_product_id($_GET['id_pro']);
                                    $found = false;
                                    foreach ($select as $se_w) {
                                        if ($se_w['id_pro'] == $_GET['id_pro']) {
                                            $found = true;
                                            break;
                                        }
                                    }
                                    if (!$found) {
                                        foreach ($select_pro_id as $se) {
                                            $insert = $get_data->insert_wishList($_GET['id_pro'], $se['image'], $se['name_pro'], $se['price']);
                                        }
                                    }
                                }
                                foreach ($select as $se_w) {
                                    foreach ($select_pro as $se) {
                                        if ($se_w['id_pro'] == $se['id_pro']) {
                                            ?>
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <a href="product-single.php?id_pro=<?php echo $se_w['id_pro'] ?>">
                                                        <img src="../Admin/upload/<?php echo $se_w['image'] ?>" alt=""
                                                            style="width: 115px; height: 115px; object-fit: cover;">
                                                        <h5><?php echo $se_w['name_pro'] ?></h5>
                                                    </a>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    <?php
                                                    $price = isset($se['price_sale']) ? $se['price_sale'] : $se['price'];
                                                    echo number_format($price, 0, ',', '.') . ' ₫';
                                                    ?>
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <a href="wishlist.php?del=<?php echo $se['id_pro'] ?>" class="icon_close"></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <br>  <br>  <br> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Các sản phẩm khác</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
    // Lấy ID sản phẩm từ URL (nếu có)
    $current_product_id = isset($_GET['id_pro']) ? (int)$_GET['id_pro'] : 0;
    
    // Lấy tất cả sản phẩm và chuyển thành mảng
    $result = $get_data->select_product();
    $all_products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $all_products[] = $row;
    }
    
    // Loại bỏ sản phẩm hiện tại (nếu đang ở trang chi tiết)
    $filtered_products = array_filter($all_products, function($product) use ($current_product_id) {
        return $product['id_pro'] != $current_product_id;
    });
    
    // Xáo trộn mảng sản phẩm
    shuffle($filtered_products);
    
    // Giới hạn chỉ lấy 4 sản phẩm
    $random_products = array_slice($filtered_products, 0, 4);
    
    foreach ($random_products as $pro) {
    ?>
                <div class="col-lg-3 col-md-4 col-sm-6 ftco-animate">
                    <div class="featured__item">
                        <div class="featured__item__pic"
                            style="background-image: url('../Admin/upload/<?= $pro['image'] ?>');">
                            <?php if (isset($pro['price_sale'])): ?>
                            <div class="product__discount__badge">
                                <?= round((100 * ($pro['price'] - $pro['price_sale'])) / $pro['price']) ?>%
                                <div class="badge__triangle"></div>
                            </div>
                            <?php endif; ?>
                            <ul class="featured__item__pic__hover">
                                <li><a href="wishlist.php?id_pro=<?php echo $pro['id_pro'] ?>"><i
                                            class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id_pro=<?php echo $pro['id_pro'] ?>"><i
                                            class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id_pro=<?= $pro['id_pro'] ?>"><?= $pro['name_pro'] ?></a></h6>
                            <h5>
                                <?php if (isset($pro['price_sale'])): ?>
                                <span class="price__original"><?= number_format($pro['price'], 0, ',', '.') ?>₫</span>
                                <span class="price__sale"><?= number_format($pro['price_sale'], 0, ',', '.') ?>₫</span>
                                <?php else: ?>
                                <span class="price__normal"><?= number_format($pro['price'], 0, ',', '.') ?>₫</span>
                                <?php endif; ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

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
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
</body>

</html>