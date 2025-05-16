<?php
session_start();
include("control.php");
$get_data = new data_user();

// Kiểm tra giỏ hàng
if (isset($_SESSION['user'])) {
    $count = $get_data->count_Cart($_SESSION['user']);
} else {
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0';
}

// Kiểm tra sản phẩm tồn tại
if (!isset($_GET['id_pro']) || empty($_GET['id_pro'])) {
    header("Location: shop-grid.php");
    exit;
}

$select_id_pro = $get_data->select_product_id($_GET["id_pro"]);
if (mysqli_num_rows($select_id_pro) == 0) {
    header("Location: shop-grid.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="zxx">
<style>
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

.product__details__pic__item--large {

    object-fit: cover;
    /* Đảm bảo ảnh không bị méo */
    border-radius: 10px;
    /* Bo góc nhẹ cho đẹp */
}

.product__details__pic__slider img {

    object-fit: cover;
    border-radius: 5px;
    cursor: pointer;
    /* Khi rê chuột vào ảnh sẽ có hiệu ứng nhấn */
    transition: transform 0.2s ease-in-out;
}

.product__details__pic__slider img:hover {
    transform: scale(1.1);
    /* Khi rê chuột vào ảnh, ảnh sẽ phóng to nhẹ */
}

/* Product Price Styling */
.product__details__price {
    margin-bottom: 15px;
}

.product__details__price .price {
    margin: 0;
    line-height: 1.2;
}

.product__details__price .price-sale {
    color: #e53935;
    /* Vibrant red color */
    font-size: 24px;
    /* Larger font size */
    font-weight: 700;
    /* Bold font weight */
    display: inline-block;
}

/* Optional hover effect */
.product__details__price:hover .price-sale {
    transform: scale(1.05);
    transition: transform 0.2s ease;
}

/* Optional decorative elements */
.product__details__price .price-sale::after {
    content: "";
    display: block;
    width: 100%;
    height: 2px;
    background-color: rgba(229, 57, 53, 0.3);
    margin-top: 3px;
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


/*cmt */
.comment-item {
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
    background-color: #f8f9fa;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.comment-user {
    font-weight: bold;
    color: #007bff;
}

.comment-date {
    color: #6c757d;
    font-size: 0.9em;
}

.comment-rating {
    color: #ffc107;
    margin-bottom: 10px;
}

.comment-actions {
    margin-top: 10px;
}

.comment-form {
    margin-top: 30px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 5px;
}

.rating-stars {
    font-size: 1.5em;
    color: #ffc107;
}

.edit-comment-text {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    resize: vertical;
}

.comment-actions {
    margin-top: 10px;
    display: flex;
    gap: 5px;
}

.comment-actions button {
    padding: 3px 8px;
    font-size: 12px;
}

/* CSS Chatbot */
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
                        <h2>Sản phẩm của chúng tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Trang chủ</a>
                            <a href="./index.php">Sản phẩm chi tiết</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <form method="post">
        <section class="product-details spad">
            <div class="container">
                <div class="row">

                    <?php
                    $category = '';
                    $select_id_pro = $get_data->select_product_id($_GET["id_pro"]);
                    foreach ($select_id_pro as $pro) {
                        $additional_images = $get_data->get_additional_images($pro['id_pro']);
                        ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <a id="main-image-link" href="../Admin/upload/<?php echo $pro['image'] ?>"
                                    class="image-popup">
                                    <img id="main-image" class="product__details__pic__item--large img-fluid main-image"
                                        src="../Admin/upload/<?php echo $pro['image'] ?>"
                                        alt="<?php echo $pro['name_pro'] ?>">
                                </a>
                            </div>
                            <div class="product__details__pic__slider owl-carousel">
                                <?php foreach ($additional_images as $image) { ?>
                                <img data-imgbigurl="../Admin/upload/<?php echo $image; ?>"
                                    src="../Admin/upload/<?php echo $image; ?>" alt="<?php echo $pro['name_pro'] ?>"
                                    class="img-thumbnail" style="width: 100px; height: 100px; margin-right: 5px;"
                                    onclick="swapImages(this);">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <ul>
                                <h3><?php echo $pro['name_pro'] ?></h3>
                                <div class="product__details__price">
                                    <p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="price-sale"><?php
                                           $price_sale = $pro['price_sale'];
                                           $formatted_price = number_format($price_sale, 0, ',', '.');
                                           echo $formatted_price . ' ₫';
                                           ?></span><?php } else { ?><span class="price-sale"><?php $price_sale = $pro['price'];
                                              $formatted_price = number_format($price_sale, 0, ',', '.');
                                              echo $formatted_price . ' ₫'; ?></span> <?php } ?></p>
                                </div>
                                <div class="product__details__rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>

                                    <H6>(18 reviews) | 500 đã bán</H6>

                                </div>

                                <li><b>Trạng thái</b> <span>
                                        <?php echo $pro['quantity'] > 0 ? 'Còn hàng' : 'Hết hàng'; ?></span></li>
                                <li><b>Giao hàng</b> <span>01 ngày. <samp> ( Miễn phí nhận tại cửa hàng )</samp></span>
                                </li>
                                <li><b>Trọng lượng</b> <span><?php echo "Còn " . $pro['quantity'] . "kg" ?></span></li>
                            </ul>
                            <br>



                            <div class="product__details__quantity">
                                <div class="pro-qty d-flex align-items-center">
                                    <span class="input-group-btn mr-2">
                                        <button type="button" class="quantity-left-minus btn" data-type="minus"
                                            data-field="">
                                            <i class="ion-ios-remove"></i>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                        value="1" min="1" max="<?php echo $pro['quantity'] ?>">
                                    <span class="input-group-btn ml-2">
                                        <button type="button" class="quantity-right-plus btn" data-type="plus"
                                            data-field="">
                                            <i class="ion-ios-add"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <input class="btn btn-primary py-3 px-5" type="submit" name="txtsub"
                                value="Thêm vào giỏ"></input>

                            <a href="wishlist.php?id_pro=<?php echo $pro['id_pro'] ?>" class="heart-icon">
                                <span class="icon_heart_alt"></span>
                            </a>
                            <ul>

                            </ul>


                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </form>
    <?php
    if (isset($_POST['txtsub'])) {

        if (empty($_POST['quantity'])) {
            echo "<script>alert('Vui lòng nhập đủ thông tin');</script>";
        } else {
            foreach ($select_id_pro as $se) {
                if ($_POST['quantity'] < 1 || $_POST['quantity'] > $se['quantity']) {
                    echo "<script>alert('Số lượng không phù hợp');</script>";
                } else {
                    $id_pro = $_GET['id_pro'];
                    $quantity = $_POST['quantity'];
                    $update = $get_data->update_quantity_pro($se['id_pro'], $se['quantity'] - $quantity);
                    $new_product = array(
                        'id_pro' => $se['id_pro'],
                        'name' => $se['name_pro'],
                        'quantity' => $quantity,
                        'picture' => $se['image'],
                        'price' => $price_sale,
                        'total' => $price_sale * $quantity
                    );
                    if (isset($_SESSION['user'])) {
                        $select_cart = $get_data->select_cart($_SESSION['user']);
                        $found = false;
                        foreach ($select_cart as $cart_item) {
                            if ($cart_item['id_pro'] == $id_pro) {
                                $new_total = $cart_item['total'] + $quantity * $cart_item['price'];
                                $found = true;
                                $updateResult = $get_data->update_cart_item($cart_item['id_pro'], $cart_item['quantity_order'] + $quantity, $new_total, $_SESSION['user']);
                                echo "<script>window.location=('shoping-cart.php')</script>";
                                break;
                            }
                        }
                        if (!$found) {
                            $insertResult = $get_data->insert_Cart($_SESSION['user'], $se['id_pro'], $se['name_pro'], $price_sale, $se['image'], $quantity, $price_sale * $quantity);
                            echo "<script>window.location=('shoping-cart.php')</script>";
                        }
                    } else if (isset($_SESSION['cart'])) {
                        $found = false;

                        foreach ($_SESSION['cart'] as &$cart_item) {
                            if ($cart_item['id_pro'] == $id_pro) {
                                $cart_item['quantity'] += $quantity;
                                $cart_item['total'] += $quantity * $cart_item['price'];
                                $found = true;
                                echo "<script>window.location=('shoping-cart.php')</script>";
                                break;
                            }
                        }
                        if ($found == false) {
                            $_SESSION['cart'][] = $new_product;
                            echo "<script>window.location=('shoping-cart.php')</script>";
                        }
                    } else {
                        $_SESSION['cart'][] = $new_product;
                        echo "<script>window.location=('shoping-cart.php')</script>";
                    }
                }
            }
        }
    }
    ?>
    </div>
    <div class="col-lg-12">
        <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Thông
                        tin sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Bình luận</a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Tab Thông tin sản phẩm -->
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h6>Thông tin sản phẩm</h6>
                        <p><?php echo $pro['description'] ?></p>
                    </div>
                </div>

                <!-- Tab Bình luận -->
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h6>Bình luận sản phẩm</h6>

                        <!-- Danh sách bình luận -->
                        <div id="comments-container">
                            <?php
                            $comments = $get_data->get_comments($pro['id_pro']);
                            if ($comments->num_rows > 0) {
                                while ($comment = $comments->fetch_assoc()) {
                                    ?>
                            <div class="comment-item" data-id="<?php echo $comment['id_comment']; ?>">
                                <div class="comment-header">
                                    <span class="comment-user"><?php echo $comment['username']; ?></span>
                                    <span
                                        class="comment-date"><?php echo date('d/m/Y H:i', strtotime($comment['date_comment'])); ?></span>
                                </div>
                                <div class="comment-rating">
                                    <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                echo $i <= $comment['rating'] ? '★' : '☆';
                                            }
                                            ?>
                                </div>
                                <div class="comment-content">
                                    <?php echo htmlspecialchars($comment['content']); ?>
                                </div>

                                <?php if (isset($_SESSION['user']) && $_SESSION['user'] == $comment['username']) { ?>
                                <div class="comment-actions">
                                    <button class="btn btn-sm btn-outline-primary edit-comment-btn">Sửa</button>
                                    <button class="btn btn-sm btn-outline-danger delete-comment-btn">Xóa</button>
                                </div>
                                <?php } ?>
                            </div>
                            <?php
                                }
                            } else {
                                echo '<p>Chưa có bình luận nào cho sản phẩm này.</p>';
                            }
                            ?>
                        </div>

                        <!-- Form bình luận -->
                        <?php if (isset($_SESSION['user'])) { ?>
                        <div class="comment-form">
                            <h6>Viết bình luận</h6>
                            <form id="comment-form">
                                <input type="hidden" name="id_pro" value="<?php echo $pro['id_pro']; ?>">
                                <div class="form-group">
                                    <label for="rating">Đánh giá:</label>
                                    <select name="rating" id="rating" class="form-control">
                                        <option value="5">★★★★★ (5 sao)</option>
                                        <option value="4">★★★★☆ (4 sao)</option>
                                        <option value="3">★★★☆☆ (3 sao)</option>
                                        <option value="2">★★☆☆☆ (2 sao)</option>
                                        <option value="1">★☆☆☆☆ (1 sao)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung:</label>
                                    <textarea name="content" id="content" class="form-control" rows="3"
                                        required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                            </form>
                        </div>
                        <?php } else { ?>
                        <div class="alert alert-info">
                            Vui lòng <a href="login.php">đăng nhập</a> để bình luận sản phẩm.
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product" id="related-products">
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
            $id_pro = isset($_GET['id_pro']) ? (int)$_GET['id_pro'] : 0;
            $product = $get_data->select_product_id($id_pro);
            $pro = mysqli_fetch_assoc($product);

            // Lấy danh sách sản phẩm ngẫu nhiên
            $related_products = $get_data->select_random_products($id_pro, 4); // Lấy 4 sản phẩm ngẫu nhiên, loại trừ $id_pro

            while ($related_pro = mysqli_fetch_assoc($related_products)) {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic" style="background-image: url('../Admin/upload/<?= $related_pro['image'] ?>'); border-radius: 10px; transition: transform 0.3s ease;">
                        <?php if (isset($related_pro['price_sale']) && $related_pro['price_sale'] < $related_pro['price']): ?>
                            <div class="product__discount__badge">
                                <?= round((100 * ($related_pro['price'] - $related_pro['price_sale'])) / $related_pro['price']) ?>%
                                <div class="badge__triangle"></div>
                            </div>
                        <?php endif; ?>
                        <ul class="featured__item__pic__hover">
                            <li><a href="shop-details.php?id_pro=<?= $related_pro['id_pro'] ?>"><i class="fa fa-heart"></i></a></li>
                            <li><a href="shop-details.php?id_pro=<?= $related_pro['id_pro'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="shop-details.php?id_pro=<?= $related_pro['id_pro'] ?>"><?= $related_pro['name_pro'] ?></a></h6>
                        <h5>
                            <?php if (isset($related_pro['price_sale']) && $related_pro['price_sale'] < $related_pro['price']): ?>
                                <span class="price__original"><?= number_format($related_pro['price'], 0, ',', '.') ?>₫</span>
                                <span class="price__sale"><?= number_format($related_pro['price_sale'], 0, ',', '.') ?>₫</span>
                            <?php else: ?>
                                <span class="price__normal"><?= number_format($related_pro['price'], 0, ',', '.') ?>₫</span>
                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
            </div>
            <?php
            }
            // Giải phóng kết quả truy vấn để tránh xung đột
            mysqli_free_result($related_products);
            ?>
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
    function swapImages(image) {
        let mainImage = document.getElementById("main-image");
        let mainImageLink = document.getElementById("main-image-link");
        mainImage.src = image.src;
        mainImageLink.href = image.src;
    }
    </script>



    <script>
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
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


    <script>
    $(document).ready(function() {
        // Hàm chuyển đổi giữa hiển thị và chỉnh sửa
        function toggleEditMode(commentItem, isEdit) {
            const content = commentItem.find('.comment-content').text();

            if (isEdit) {
                commentItem.find('.comment-content').html(`
                <textarea class="form-control edit-comment-text" rows="3">${content}</textarea>
                <div class="mt-2">
                    <button class="btn btn-sm btn-primary save-edit-btn">Lưu</button>
                    <button class="btn btn-sm btn-secondary cancel-edit-btn">Hủy</button>
                </div>
            `);
                commentItem.find('.comment-actions').hide();
            } else {
                commentItem.find('.comment-content').text(content);
                commentItem.find('.comment-actions').show();
            }
        }

        // Gắn sự kiện cho các nút bình luận
        function bindCommentEvents() {
            // Xử lý gửi bình luận mới
            $('#comment-form').off('submit').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'process_comment.php',
                    type: 'POST',
                    data: $(this).serialize() + '&add_comment=1',
                    dataType: 'json',
                    success: function() {
                        $('#content').val(''); // Xóa nội dung textarea
                        reloadComments(); // Load lại danh sách bình luận
                    },
                    error: function() {
                        alert('Có lỗi xảy ra khi gửi bình luận');
                    }
                });
            });

            // Xử lý sửa bình luận
            $(document).off('click', '.edit-comment-btn').on('click', '.edit-comment-btn', function() {
                const commentItem = $(this).closest('.comment-item');
                toggleEditMode(commentItem, true);
            });

            // Xử lý lưu chỉnh sửa
            $(document).off('click', '.save-edit-btn').on('click', '.save-edit-btn', function() {
                const commentItem = $(this).closest('.comment-item');
                const commentId = commentItem.data('id');
                const newContent = commentItem.find('.edit-comment-text').val();

                if (newContent.trim() === '') {
                    alert('Nội dung không được để trống');
                    return;
                }

                $.ajax({
                    url: 'process_comment.php',
                    type: 'POST',
                    data: {
                        edit_comment: 1,
                        id_comment: commentId,
                        content: newContent
                    },
                    dataType: 'json',
                    success: function() {
                        reloadComments();
                    },
                    error: function() {
                        alert('Có lỗi khi cập nhật bình luận');
                    }
                });
            });

            // Xử lý hủy chỉnh sửa
            $(document).off('click', '.cancel-edit-btn').on('click', '.cancel-edit-btn', function() {
                const commentItem = $(this).closest('.comment-item');
                toggleEditMode(commentItem, false);
            });

            // Xử lý xóa bình luận
            $(document).off('click', '.delete-comment-btn').on('click', '.delete-comment-btn',
                function() {
                    if (confirm('Bạn có chắc chắn muốn xóa bình luận này?')) {
                        const commentId = $(this).closest('.comment-item').data('id');

                        $.ajax({
                            url: 'process_comment.php',
                            type: 'POST',
                            data: {
                                delete_comment: 1,
                                id_comment: commentId
                            },
                            dataType: 'json',
                            success: function() {
                                reloadComments();
                            },
                            error: function() {
                                alert('Có lỗi khi xóa bình luận');
                            }
                        });
                    }
                });
        }

        // Hàm load lại danh sách bình luận
        function reloadComments() {
            $.ajax({
                url: 'load_comments.php',
                type: 'GET',
                data: {
                    id_pro: <?php echo $pro['id_pro']; ?>
                },
                success: function(response) {
                    $('#comments-container').html(response);
                    bindCommentEvents();
                },
                error: function() {
                    alert('Có lỗi khi tải bình luận');
                }
            });
        }

        // Gắn sự kiện ban đầu
        bindCommentEvents();


    });
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Mặc định hiển thị phần "Các sản phẩm khác" khi ở tab "Thông tin sản phẩm"
    $('#related-products').show();

    // Sự kiện khi click vào tab "Thông tin sản phẩm"
    $('a[href="#tabs-1"]').on('click', function() {
        $('#related-products').show();
    });

    // Sự kiện khi click vào tab "Bình luận"
    $('a[href="#tabs-2"]').on('click', function() {
        $('#related-products').hide();
    });
});
</script>


</body>

</html>