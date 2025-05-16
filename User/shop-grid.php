<?php
session_start();
include("control.php");
$get_data = new data_user();

// Xử lý tham số category, productName, sort và page
$category = isset($_GET['category']) ? urldecode($_GET['category']) : null;
$productName = isset($_GET['productName']) ? trim($_GET['productName']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 9; // Số sản phẩm trên mỗi trang
$start = ($current_page - 1) * $limit;

// Đếm số sản phẩm trong giỏ hàng
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
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Lá Xanh Organic - Cửa hàng thực phẩm hữu cơ">
    <meta name="keywords" content="Lá Xanh, Organic, Thực phẩm, Rau củ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lá Xanh Organic | Cửa hàng</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style>
    /* Badge giảm giá */
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

    /* Giá */
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

    /* User info */
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

    /* Ảnh sản phẩm */
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

    /* Menu */
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

    /* Sidebar danh mục */
    .shop__sidebar__categories ul li.active a {
        color: #28a745;
        font-weight: bold;
    }

    /* Latest product */
    .latest-product__item__pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Menu -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="./index.php"><img src="img/logo1.png" alt="Lá Xanh Organic"></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="wishlist.php"><i class="fa fa-heart"></i> <span><?php echo $count; ?></span></a></li>
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $count; ?></span></a>
                </li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <?php if (isset($_SESSION["user"])) { ?>
                <div class="user-info dropdown">
                    <i class="fa fa-user"></i>
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo htmlspecialchars($_SESSION['user']); ?>
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
                <li><a href="./index.php">Trang chủ</a></li>
                <li class="active"><a href="./shop-grid.php">Cửa hàng</a></li>
                <li><a href="./blog.php">Bài viết</a></li>
                <li><a href="./contact.php">Liên hệ</a></li>
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
                <li><i class="fa fa-envelope"></i> laxanhsp@gmail.com</li>
                <li>Uy tín tạo niềm tin</li>
            </ul>
        </div>
    </div>

    <!-- Header Section -->
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
                                        <?php echo htmlspecialchars($_SESSION['user']); ?>
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
                        <a href="./index.php"><img src="img/logo1.png" alt="Lá Xanh Organic"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Trang chủ</a></li>
                            <li class="active"><a href="./shop-grid.php">Cửa hàng</a></li>
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

    <!-- Hero Section -->
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
                            <li><a
                                    href="shop-grid.php?category=<?= urlencode($se_cat['name_cat']) ?>"><?= htmlspecialchars($se_cat['name_cat']) ?></a>
                            </li>
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
                                $redirect_url = "shop-grid.php?productName=" . urlencode($productName);
                                if ($category) {
                                    $redirect_url .= "&category=" . urlencode($category);
                                }
                                echo "<script>window.location='$redirect_url';</script>";
                            }
                        }
                        ?>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>083.869.9999</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cửa hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Trang chủ</a>
                            <span>Cửa hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                <div class="sidebar__item">
                            <div class="shop__sidebar__categories">
                                <h4>Danh mục</h4>
                                <ul>
                                    <?php
                                    $select_cat = $get_data->select_cat();
                                    foreach ($select_cat as $se_cat) {
                                        $is_active = ($category == $se_cat['name_cat']) ? 'active' : '';
                                    ?>
                                    <li class="<?= $is_active ?>"><a
                                            href="shop-grid.php?category=<?= urlencode($se_cat['name_cat']) ?>"><?= htmlspecialchars($se_cat['name_cat']) ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Giảm giá sốc</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <?php
                                    $select_pro = $get_data->select_product();
                                    $discounted_products = [];
                                    foreach ($select_pro as $pro) {
                                        if (isset($pro['price_sale']) && $pro['price_sale'] < $pro['price']) {
                                            $discounted_products[] = $pro;
                                        }
                                    }
                                    $chunks = array_chunk($discounted_products, 3);
                                    foreach ($chunks as $chunk) {
                                        echo '<div class="latest-prdouct__slider__item">';
                                        foreach ($chunk as $pro) {
                                    ?>
                                    <a href="shop-details.php?id_pro=<?= $pro['id_pro'] ?>"
                                        class="latest-product__item">
                                        <div class="product__discount__badge">
                                            <?= round((100 * ($pro['price'] - $pro['price_sale'])) / $pro['price']) ?>%
                                            <div class="badge__triangle"></div>
                                        </div>
                                        <div class="latest-product__item__pic"
                                            style="width: 110px; height: 110px; overflow: hidden;">
                                            <img src="../Admin/upload/<?= $pro['image'] ?>"
                                                alt="<?= htmlspecialchars($pro['name_pro']) ?>">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?= htmlspecialchars($pro['name_pro']) ?></h6>
                                            <span
                                                class="price__sale"><?= number_format($pro['price_sale'], 0, ',', '.') ?>₫</span>
                                            <span
                                                class="price__original"><?= number_format($pro['price'], 0, ',', '.') ?>₫</span>
                                        </div>
                                    </a>
                                    <?php
                                        }
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Chọn sản phẩm</span>
                                    <select id="sort-price" onchange="sortProducts()">
                                        <option value="" <?= !isset($_GET['sort']) ? 'selected' : '' ?>>Mặc định
                                        </option>
                                        <option value="price_asc"
                                            <?= isset($_GET['sort']) && $_GET['sort'] == 'price_asc' ? 'selected' : '' ?>>
                                            Giá tăng dần</option>
                                        <option value="price_desc"
                                            <?= isset($_GET['sort']) && $_GET['sort'] == 'price_desc' ? 'selected' : '' ?>>
                                            Giá giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <h4><?php echo $category ? htmlspecialchars($category) : 'Tất cả sản phẩm'; ?></h4>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Lấy danh sách sản phẩm
                    if (!empty($productName)) {
                        $pagination_data = $get_data->search_products_pagination($productName, $start, $limit, $category, null, null, $sort);
                    } elseif ($category) {
                        $pagination_data = $get_data->select_product_cat_pagination($category, $start, $limit, $sort);
                    } else {
                        $pagination_data = $get_data->select_product_pagination($start, $limit, $current_page, $sort);
                    }

                    $products = $pagination_data['products'];
                    $total_pages = $pagination_data['total_pages'];
                    ?>

                    <div class="row">
                        <?php if (!empty($products)): ?>
                        <?php foreach ($products as $pro): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="featured__item">
                                <div class="featured__item__pic"
                                    style="background-image: url('../Admin/upload/<?= $pro['image'] ?>');">
                                    <?php if (isset($pro['price_sale']) && $pro['price_sale'] < $pro['price']): ?>
                                    <div class="product__discount__badge">
                                        <?= round((100 * ($pro['price'] - $pro['price_sale'])) / $pro['price']) ?>%
                                        <div class="badge__triangle"></div>
                                    </div>
                                    <?php endif; ?>
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="wishlist.php?id_pro=<?= $pro['id_pro'] ?>"><i
                                                    class="fa fa-heart"></i></a></li>
                                        <li><a href="shop-details.php?id_pro=<?= $pro['id_pro'] ?>"><i
                                                    class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a
                                            href="shop-details.php?id_pro=<?= $pro['id_pro'] ?>"><?= htmlspecialchars($pro['name_pro']) ?></a>
                                    </h6>
                                    <h5>
                                        <?php if (isset($pro['price_sale']) && $pro['price_sale'] < $pro['price']): ?>
                                        <span
                                            class="price__original"><?= number_format($pro['price'], 0, ',', '.') ?>₫</span>
                                        <span
                                            class="price__sale"><?= number_format($pro['price_sale'], 0, ',', '.') ?>₫</span>
                                        <?php else: ?>
                                        <span
                                            class="price__normal"><?= number_format($pro['price'], 0, ',', '.') ?>₫</span>
                                        <?php endif; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="col-12">
                            <p>Không tìm thấy sản phẩm nào.</p>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Phân trang -->
                    <div class="product__pagination">
                        <?php if ($current_page > 1): ?>
                        <a
                            href="?page=<?= $current_page - 1 ?><?= !empty($productName) ? '&productName=' . urlencode($productName) : '' ?><?= !empty($category) ? '&category=' . urlencode($category) : '' ?><?= !empty($sort) ? '&sort=' . $sort : '' ?>"><i
                                class="fa fa-long-arrow-left"></i></a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?page=<?= $i ?><?= !empty($productName) ? '&productName=' . urlencode($productName) : '' ?><?= !empty($category) ? '&category=' . urlencode($category) : '' ?><?= !empty($sort) ? '&sort=' . $sort : '' ?>"
                            <?= ($i == $current_page) ? 'class="active"' : '' ?>><?= $i ?></a>
                        <?php endfor; ?>

                        <?php if ($current_page < $total_pages): ?>
                        <a
                            href="?page=<?= $current_page + 1 ?><?= !empty($productName) ? '&productName=' . urlencode($productName) : '' ?><?= !empty($category) ? '&category=' . urlencode($category) : '' ?><?= !empty($sort) ? '&sort=' . $sort : '' ?>"><i
                                class="fa fa-long-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.php"><img src="img/logo1.png" alt="Lá Xanh Organic"></a>
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
                        <h5>“Tươi mỗi ngày – Sạch mỗi bữa – Gửi trọn yêu thương từ nông trại đến gian bếp nhà bạn.”</h5>
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

    <!-- JS Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    $(document).ready(function() {
        $(".latest-product__slider").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            items: 1,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
        });
    });

    function sortProducts() {
        var sort = document.getElementById('sort-price').value;
        var url = new URL(window.location.href);
        if (sort) {
            url.searchParams.set('sort', sort);
        } else {
            url.searchParams.delete('sort');
        }
        window.location.href = url.toString();
    }
    </script>
</body>

</html>