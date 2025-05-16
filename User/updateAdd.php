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
    <!-- Breadcrumb Section End -->
   

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
    <h3 class="mb-4 billing-heading">Cập  nhật thông tin</h3>
                  <form action="#" method="post" class="billing-form">
                      <div class="row align-items-end">
                        <?php $select_add = $get_data->select_add_id($_SESSION['user'],$_GET['id_add']);
                        foreach($select_add as $se): ?>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="firstname">Tên người nhận</label>
                                  <input type="text" class="form-control" value="<?php echo $se['name_custommer'] ?>" name="txtFName" required>
                              </div>
                          </div>
                          
                          <div class="w-100"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="streetaddress">Địa chỉ</label>
                                  <input type="text" name="txtAdd1" value="<?php echo $se['address'] ?>" class="form-control" required>
                              </div>
                          </div>
                                                    <div class="w-100"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="address">Số điện thoại</label>
                                  <input name="phone" type="text" value="<?php echo $se['phone'] ?>" class="form-control" required>
                              </div>
                          </div>
                                                    <div class="w-100"></div>
                          <p><input type="submit" name="txtsub" value="Cập nhật" class="btn btn-primary py-3 px-4"></p>
                          <?php endforeach; ?>
                      </div>
                  </form>
              </div>
              </div>
              <?php 
              if(isset($_POST['txtsub'])){
                $update = $get_data->update_add_id($_SESSION['user'],$_GET['id_add'],$_POST['txtFName'],$_POST['phone'], $_POST['txtAdd1']);
                  if ($update) {
                    echo "<script>alert('Cập nhật thành công');
                    window.location=('taikhoan.php?address')</script>";
                  } else {
                     echo "<script>alert('Cập nhật thất bại')</script>";
                  }
              } ?>
    <!-- Shoping Cart Section End -->

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


</body>

</html>