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
<?php
$text = "Hãy để chúng tôi đồng hành cùng bạn trên con đường hướng tới lối sống lành mạnh với những sản phẩm rau củ chất lượng cao.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lá Xanh Organic</title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    overflow-x: hidden;
}

.testimonials-section {
    padding: 60px 0;
    text-align: center;
}

.testimonials-section h2 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 50px;
    color: #333;
    text-transform: uppercase;
    position: relative;
}

.testimonials-section h2::after {
    content: '';
    width: 100px;
    height: 4px;
    background: #28a745;
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
}

.testimonials-section h2 span {
    color: #28a745;
    font-size: 1.2rem;
    display: block;
    margin-bottom: 15px;
    font-weight: normal;
    text-transform: none;
}

.swiper-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    padding: 30px;
    text-align: center;
    border: 2px solid #28a745;
    height: 300px;
    box-sizing: border-box;
}

.testimonial {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.blog__details__author__pic img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #28a745;
}

.blog__details__author__text h6 {
    font-size: 1.4rem;
    margin: 0;
    color: #333;
    font-weight: bold;
}

.blog__details__author__text span {
    font-size: 1rem;
    color: #777;
}

.testimonial p {
    font-size: 1.1rem;
    color: #555;
    margin: 0;
    position: relative;
    padding: 0 20px;
}

.testimonial p::before {
    content: '“';
    font-size: 2.5rem;
    color: #28a745;
    position: absolute;
    left: 0;
    top: -10px;
}

.testimonial p::after {
    content: '”';
    font-size: 2.5rem;
    color: #28a745;
    position: absolute;
    right: 0;
    bottom: -10px;
}

.swiper-pagination-bullet {
    background: #ccc;
}

.swiper-pagination-bullet-active {
    background: #28a745;
}

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

.marquee-container {
    width: 100%;
    max-width: 1000px;
    height: 40px;
    margin: 0 auto 20px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    padding: 5px 10px;
    backdrop-filter: blur(10px);
    white-space: nowrap;
}

.marquee-text {
    display: inline-block;
    font-size: 18px;
    font-weight: bold;
    animation: marquee 15s linear infinite, colorChange 5s infinite alternate;
    white-space: nowrap;
    padding-right: 20px;
}

@keyframes marquee {
    0% {
        transform: translateX(100%);
    }

    100% {
        transform: translateX(-100%);
    }
}

@keyframes colorChange {
    0% {
        color: red;
    }

    25% {
        color: orange;
    }

    50% {
        color: green;
    }

    75% {
        color: blue;
    }

    100% {
        color: purple;
    }
}

.blink {
    font-weight: bold;
    font-size: 16px;
    color: white;
    padding: 5px 10px;
    background: linear-gradient(45deg, red, orange);
    border-radius: 10px;
    border: 2px solid rgba(255, 255, 255, 0.7);
    text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.8);
    animation: blink 1s infinite alternate;
}

@keyframes blink {
    from {
        opacity: 1;
    }

    to {
        opacity: 0.6;
    }
}

.header__menu ul {
    display: flex;
    list-style: none;
    padding: 10px;
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

.hero {
    display: flex;
    align-items: start;
    position: relative;
}

.hero__categories__all {
    font-size: 18px;
    font-weight: bold;
    color: white;
    cursor: pointer;
}

.hero__categories ul {
    list-style: none;
    display: none;
    background: white;
    position: absolute;
    width: 100%;
    top: 100%;
    left: 0;
    z-index: 30;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.slideshow-container {
    position: relative;
    width: 100%;
    max-width: 1150px;
    height: 520px;
    overflow: hidden;
    z-index: 10;
    border-radius: 20px;
    margin: auto;
}

.slideshow-container img {
    width: 100%;
    height: 100%;
    display: none;
    transition: opacity 1s ease-in-out;
    object-fit: cover;
    border-radius: 20px;
}

.slideshow-container img.active {
    display: block;
    opacity: 1;
}

.prev,
.next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

.dots-container {
    text-align: center;
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
}

.dot {
    height: 10px;
    width: 10px;
    margin: 0 5px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
}

.dot.active {
    background-color: black;
}

.chatbot-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 320px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    display: none;
    flex-direction: column;
    z-index: 1000;
    height: 400px;
}

.chatbot-header {
    background: #4CAF50;
    color: white;
    padding: 12px 15px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbot-messages {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    background: #f9f9f9;
    max-height: 300px;
}

.chatbot-input {
    display: flex;
    padding: 8px;
    border-top: 1px solid #eee;
    background: white;
}

.chatbot-input input {
    flex: 1;
    padding: 8px 10px;
    border: 1px solid #ddd;
    border-radius: 20px;
    outline: none;
    font-size: 14px;
}

.chatbot-input button {
    margin-left: 8px;
    padding: 8px 12px;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 14px;
}

#chatbot-toggle {
    position: fixed;
    bottom: 80px;
    right: 20px;
    background: #4CAF50;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    z-index: 999;
    animation: shake 0.6s ease-in-out infinite;
}

#chatbot-toggle i {
    font-size: 20px;
}

@keyframes shake {
    0% {
        transform: translateX(0) translateY(0) rotate(0deg);
    }

    25% {
        transform: translateX(-8px) translateY(5px) rotate(-3deg);
    }

    50% {
        transform: translateX(8px) translateY(-5px) rotate(3deg);
    }

    75% {
        transform: translateX(-5px) translateY(3px) rotate(-2deg);
    }

    100% {
        transform: translateX(0) translateY(0) rotate(0deg);
    }
}

#back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: linear-gradient(45deg, #2c2c2c, #4a4a4a);
    color: white;
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: none;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    z-index: 998;
    transition: all 0.3s ease;
}

#back-to-top i {
    font-size: 24px;
    line-height: 1;
}

#back-to-top:hover {
    background: linear-gradient(45deg, #3c3c3c, #5a5a5a);
    transform: scale(1.1);
}

.message-user,
.message-bot {
    padding: 8px 12px;
    margin: 4px 0;
    max-width: 85%;
    word-wrap: break-word;
    font-size: 14px;
    line-height: 1.4;
    border-radius: 12px;
}

.message-user {
    background: #e3f2fd;
    border-radius: 12px 12px 0 12px;
    margin-left: auto;
}

.message-bot {
    background: white;
    border-radius: 12px 12px 12px 0;
    border: 1px solid #eee;
    margin-right: auto;
}

.quick-questions {
    margin-top: 8px;
    background: #f5f5f5;
    padding: 8px;
    border-radius: 8px;
    font-size: 13px;
}

.quick-questions ul {
    list-style: none;
    padding: 0;
    margin: 8px 0 0 0;
}

.quick-question {
    padding: 6px 10px;
    margin-bottom: 4px;
    background: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.2s;
}

.quick-question:hover {
    background: #e3f2fd;
}

.product-item {
    display: flex;
    padding: 8px;
    margin-bottom: 8px;
    background: white;
    border-radius: 5px;
    border: 1px solid #eee;
    cursor: pointer;
    transition: all 0.2s;
}

.product-item:hover {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.product-item img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    margin-right: 8px;
    border-radius: 3px;
}

.product-info {
    flex: 1;
    font-size: 13px;
}

.product-info del {
    color: #999;
    margin-right: 5px;
    font-size: 12px;
}

.close-chatbot {
    background: none;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
    padding: 0;
    line-height: 1;
}

.chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

.chatbot-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

.chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Loại bỏ góc bo tròn cho ảnh trong các bài Blog */
.blog__item__pic img {
    border-radius: 20px;
}

/* Hiệu ứng phóng to khi di chuột vào ảnh Blog */
.blog__item__pic {
    overflow: hidden;
}

.blog__item__pic img {
    transition: transform 0.3s ease-in-out;
}

.blog__item__pic img:hover {
    transform: scale(1.05);
}
</style>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
        </div>
        <div class="humberger__menu__widget">
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
        <hr>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Trang chủ</a></li>
                <li><a href="./shop-grid.php">Cửa hàng</a></li>
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
                                        <li><a class="dropdown-item" onclick="logout()" href="logout.php">Đăng xuất</a>
                                        </li>
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

    <section>
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
                                    href="shop-grid.php?category=<?php echo urlencode($se_cat['name_cat']); ?>"><?php echo htmlspecialchars($se_cat['name_cat']); ?></a>
                            </li>
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
        <div class="container">
            <div class="row">
                <div class="slideshow-container">
                    <img src="img/banner/B1.png" class="active">
                    <img src="img/banner/B2.png">
                    <img src="img/banner/B3.png">
                    <img src="img/banner/B4.png">
                    <img src="img/banner/B5.png">
                    <div class="prev" onclick="changeSlide(-1)">❮</div>
                    <div class="next" onclick="changeSlide(1)">❯</div>
                    <div class="dots-container">
                        <span class="dot active" onclick="currentSlide(0)"></span>
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured spad">
        <div class="container">
            <div class="marquee-container">
                <span class="marquee-text"><span class="blink">NEW</span><?php echo htmlspecialchars($text); ?>
                    <span class="blink">NEW</span></span>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Chất lượng từ sản phẩm đến dịch vụ</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <section class="ftco-section">
                    <div class="container">
                        <div class="row">
                            <?php
                            $select_pro = $get_data->select_product();
                            $dem = 0;
                            foreach ($select_pro as $pro) {
                                $dem++;
                                if ($dem == 13)
                                    break;
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
                                        <h6><a
                                                href="shop-details.php?id_pro=<?= $pro['id_pro'] ?>"><?= $pro['name_pro'] ?></a>
                                        </h6>
                                        <h5>
                                            <?php if (isset($pro['price_sale'])): ?>
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
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section class="testimonials-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Đánh giá của khách hàng</h2>
                </div>
            </div>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic">
                                <img src="img/blog/details/M1.png" alt="Minh Anh">
                            </div>
                            <div class="blog__details__author__text">
                                <h6>Chị Minh Anh</h6>
                                <span>Nội trợ</span>
                            </div>
                        </div>
                        <p>Hạt hạnh nhân giòn thơm, chất lượng tốt hơn hẳn chỗ khác. Gia đình tôi rất thích ăn vặt với
                            loại hạt này!</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic">
                                <img src="img/blog/details/M2.png" alt="Văn Đức">
                            </div>
                            <div class="blog__details__author__text">
                                <h6>Anh Văn Đức</h6>
                                <span>Văn phòng</span>
                            </div>
                        </div>
                        <p>Rau củ ở đây luôn tươi ngon, đặc biệt là bó cải xanh mua về làm salad rất hợp. Sẽ ủng hộ dài
                            dài!</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic">
                                <img src="img/blog/details/M3.png" alt="Thu Hà">
                            </div>
                            <div class="blog__details__author__text">
                                <h6>Chị Thu Hà</h6>
                                <span>Yoga Instructor</span>
                            </div>
                        </div>
                        <p>Mix hạt sấy khô của cửa hàng rất tuyệt vời, đầy đủ dinh dưỡng cho bữa ăn healthy của tôi.
                            Đóng gói cẩn thận!</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic">
                                <img src="img/blog/details/M4.png" alt="Hoàng Nam">
                            </div>
                            <div class="blog__details__author__text">
                                <h6>Anh Hoàng Nam</h6>
                                <span>Gym Lover</span>
                            </div>
                        </div>
                        <p>Hạt điều rang muối vừa miệng, giòn tan. Mỗi ngày tôi đều dùng 1 nắm nhỏ cho bữa phụ, rất tiện
                            lợi!</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic">
                                <img src="img/blog/details/M5.png" alt="Ngọc Linh">
                            </div>
                            <div class="blog__details__author__text">
                                <h6>Mẹ Ngọc Linh</h6>
                                <span>Nội trợ</span>
                            </div>
                        </div>
                        <p>Cà chua baby ngọt tự nhiên, bé nhà tôi rất thích ăn. Rau củ đều có nguồn gốc rõ ràng nên rất
                            yên tâm.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <div id="chatbot-toggle">
        <i class="fa fa-comments"></i>
    </div>
    <div id="back-to-top">
        <i class="fa fa-arrow-up"></i>
    </div>
    <div class="chatbot-container">
        <div class="chatbot-header">
            <h5>Tư vấn online</h5>
            <button class="close-chatbot">×</button>
        </div>
        <div class="chatbot-messages" id="chatbot-messages"></div>
        <div class="chatbot-input">
            <input type="text" id="chatbot-user-input" placeholder="Nhập câu hỏi của bạn...">
            <button id="chatbot-send-btn">Gửi</button>
        </div>
    </div>

    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Các bài Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $blogs = $get_data->select_blog_paginated(0, 3, 'created_at DESC');
                if (!empty($blogs)) {
                    foreach ($blogs as $blog) {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <?php
                            $image = isset($blog['image_url']) ? trim($blog['image_url']) : '';
                            $image_path = !empty($image) ? "../Admin/upload/" . htmlspecialchars($image) : 'img/blog/blog-1.jpg';
                            ?>
                            <a href="blog-details.php?id=<?php echo $blog['id'] ?? '#'; ?>">
                                <img src="<?php echo $image_path; ?>"
                                    alt="<?php echo htmlspecialchars($blog['title'] ?? 'Bài viết'); ?>"
                                    style="width: 370px; height: 266px; object-fit: cover;"
                                    onerror="this.src='img/blog/blog-1.jpg'">
                            </a>
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>
                                    <?php echo isset($blog['created_at']) ? date('j F, Y', strtotime($blog['created_at'])) : '4 Tháng 5, 2019'; ?>
                                </li>
                            </ul>
                            <h5>
                                <a href="blog-details.php?id=<?php echo $blog['id'] ?? '#'; ?>">
                                    <?php echo htmlspecialchars($blog['title'] ?? 'Mẹo nấu ăn giúp việc nấu nướng trở nên đơn giản'); ?>
                                </a>
                            </h5>
                            <p>
                                <?php
                                $content = strip_tags($blog['content'] ?? 'Do một số lý do nào đó, thời gian có thể thay đổi để phù hợp với công việc và nhu cầu...', '<b><i><u><p><br>');
                                echo strlen($content) > 100 ? substr($content, 0, 100) . '...' : $content;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                ?>
                <div class="col-12">
                    <div class="alert alert-warning">Không có bài viết nào hoặc có lỗi xảy ra.</div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/A1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/A2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>

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
                        <h5>“Tươi mỗi ngày – Sạch mỗi bữa – Gửi trọn yêu thương <br>từ nông trại đến gian bếp nhà bạn.”
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    let slideIndex = 0;
    const slides = document.querySelectorAll(".slideshow-container img");
    const dots = document.querySelectorAll(".dot");

    function showSlides() {
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            dots[i].classList.remove("active");
        });
        slides[slideIndex].classList.add("active");
        dots[slideIndex].classList.add("active");
        slideIndex = (slideIndex + 1) % slides.length;
        setTimeout(showSlides, 6000);
    }

    function changeSlide(n) {
        slideIndex = (slideIndex + n + slides.length) % slides.length;
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            dots[i].classList.remove("active");
        });
        slides[slideIndex].classList.add("active");
        dots[slideIndex].classList.add("active");
    }

    function currentSlide(n) {
        slideIndex = n;
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            dots[i].classList.remove("active");
        });
        slides[slideIndex].classList.add("active");
        dots[slideIndex].classList.add("active");
    }

    showSlides();

    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        $('#back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        $('#chatbot-toggle').click(function() {
            $('.chatbot-container').toggle();
            if ($('.chatbot-container').is(':visible')) {
                loadChatHistory();
                loadQuickQuestions();
                if (!localStorage.getItem('chatbot_greeted')) {
                    setTimeout(function() {
                        displayMessage(getGreeting(), true);
                        localStorage.setItem('chatbot_greeted', 'true');
                    }, 500);
                }
            }
        });

        $('.close-chatbot').click(function() {
            $('.chatbot-container').hide();
        });

        $('#chatbot-send-btn').click(sendMessage);
        $('#chatbot-user-input').keypress(function(e) {
            if (e.which == 13) sendMessage();
        });

        function sendMessage() {
            const message = $('#chatbot-user-input').val().trim();
            if (message === '') return;
            displayMessage(message, false);
            $('#chatbot-user-input').val('');
            $.ajax({
                url: 'chatbot.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    message: message
                }),
                success: function(response) {
                    displayMessage(response.answer, true);
                },
                error: function() {
                    displayMessage("Xin lỗi, đã có lỗi xảy ra khi kết nối với hệ thống.", true);
                }
            });
        }

        function displayMessage(message, isBot) {
            const messagesContainer = $('#chatbot-messages');
            const messageClass = isBot ? 'message-bot' : 'message-user';
            const messageHtml = `<div class="${messageClass}">${message}</div>`;
            messagesContainer.append(messageHtml);
            messagesContainer.animate({
                scrollTop: messagesContainer[0].scrollHeight
            }, 100);
        }

        function loadChatHistory() {
            const messagesContainer = $('#chatbot-messages');
            $.get('chatbot.php?get_history=1', function(response) {
                messagesContainer.empty();
                response.forEach(function(msg) {
                    const messageClass = msg.is_bot ? 'message-bot' : 'message-user';
                    messagesContainer.append(
                        `<div class="${messageClass}">${msg.message}</div>`);
                });
                messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
            }, 'json');
        }

        function loadQuickQuestions() {
            $.get('chatbot.php?get_questions=1', function(questions) {
                if (questions && questions.length > 0) {
                    let html = '<div class="quick-questions"><strong>Câu hỏi thường gặp:</strong><ul>';
                    questions.forEach(function(question) {
                        html +=
                            `<li class="quick-question" onclick="sendQuickQuestion('${question.replace("'", "\\'")}')">${question}</li>`;
                    });
                    html += '</ul></div>';
                    $('#chatbot-messages').append(html);
                    $('#chatbot-messages').scrollTop($('#chatbot-messages')[0].scrollHeight);
                }
            }, 'json').fail(function() {
                console.log("Không thể tải câu hỏi gợi ý");
            });
        }

        function getGreeting() {
            const hour = new Date().getHours();
            if (hour < 12) {
                return "Chào buổi sáng! Tôi có thể giúp gì cho bạn?";
            } else if (hour < 18) {
                return "Chào buổi chiều! Tôi có thể giúp gì cho bạn?";
            } else {
                return "Chào buổi tối! Tôi có thể giúp gì cho bạn?";
            }
        }
    });

    function sendQuickQuestion(question) {
        $('#chatbot-user-input').val(question);
        $('#chatbot-send-btn').click();
    }

    function logout() {
        $.ajax({
            url: 'chatbot.php?logout=1',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response.message);
                localStorage.removeItem('chatbot_greeted');
                window.location.href = 'logout.php';
            },
            error: function() {
                console.error('Lỗi khi xóa lịch sử chat');
                window.location.href = 'logout.php';
            }
        });
    }
    </script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            },
        },
    });
    </script>
</body>

</html>