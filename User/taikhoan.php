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

    body {
        font-family: 'Roboto', sans-serif;
        color: #333;
        background-color: #f8f9fa;
    }

    .container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 15px;
    }

    h2,
    h3 {
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #343a40;
    }

    /* Account Sidebar */
    .col-md-4 {
        background-color: #f0f2f5;
        border-radius: 8px;
        padding: 25px;
        height: 100%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .col-md-4 h2 {
        border-bottom: 2px solid #79b928;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .col-md-4 ul {
        list-style: none;
        padding-left: 0;
    }

    .col-md-4 ul li {
        margin-bottom: 15px;
    }

    .col-md-4 ul li a {
        color: #495057;
        text-decoration: none;
        display: block;
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .col-md-4 ul li a:hover {
        background-color: #79b928;
        color: white;
        transform: translateX(5px);
    }

    /* Main Content Area */
    .col-md-7 {
        background-color: white;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    /* Form Styling */
    .billing-form .form-control {
        height: 50px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 16px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .billing-form .form-control:focus {
        border-color: #79b928;
        box-shadow: 0 0 0 0.2rem rgba(121, 185, 40, 0.25);
    }

    .billing-form label {
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
        color: #495057;
    }

    .billing-heading {
        border-bottom: 2px solid #79b928;
        padding-bottom: 10px;
        margin-bottom: 25px;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #79b928;
        border-color: #79b928;
        color: white;
        font-weight: 500;
        padding: 12px 25px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #68a021;
        border-color: #68a021;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(121, 185, 40, 0.3);
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 25px;
        font-size: 15px;
    }

    table th,
    table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
    }

    table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
    }

    table tr:hover {
        background-color: #f0f7e6;
    }

    /* Account Information */
    .pb-md-5 p {
        font-size: 16px;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .pb-md-5 p strong {
        font-weight: 600;
        color: #495057;
        margin-right: 10px;
    }

    /* Address Links */
    a {
        color: #79b928;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    a:hover {
        color: #68a021;
        text-decoration: underline;
    }

    a[style="color: red;"] {
        color: #e74a3b !important;
    }

    a[style="color: red;"]:hover {
        color: #be2617 !important;
    }

    /* Add New Address Link */
    .pb-md-5 a[href="taikhoan.php?address&insert"] {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #79b928;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pb-md-5 a[href="taikhoan.php?address&insert"]:hover {
        background-color: #68a021;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(121, 185, 40, 0.3);
    }

    /* Responsive Table */
    @media (max-width: 768px) {

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: 600;
        }

        /* Add labels for each cell in responsive view */
        td:nth-of-type(1):before {
            content: "Tên/Mã đơn hàng";
        }

        td:nth-of-type(2):before {
            content: "Số điện thoại/Ngày đặt";
        }

        td:nth-of-type(3):before {
            content: "Địa chỉ/Thành tiền";
        }

        td:nth-of-type(4):before {
            content: "Action/Phương thức";
        }

        td:nth-of-type(5):before {
            content: "Action/Trạng thái";
        }
    }

    /* Responsive layout */
    @media (max-width: 992px) {

        .col-md-4,
        .col-md-7 {
            margin-bottom: 30px;
        }
    }



    /*NEW */
     .account-sidebar {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        padding: 20px;
    }
    
    .account-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    
    .account-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .menu-item {
        margin-bottom: 8px;
    }
    
    .menu-item a {
        display: block;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s;
    }
    
    .menu-item a:hover, .menu-item a.active {
        background-color: #f8f9fa;
        color: #007bff;
    }
    
    .menu-item i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    .account-content {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        padding: 25px;
    }
    
    .info-item {
        display: flex;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #eee;
    }
    
    .info-label {
        font-weight: 600;
        width: 180px;
    }
    
    .order-history {
        margin-top: 30px;
    }
    
    .table th {
        background-color: #f8f9fa;
    }
    
    .badge-success {
        background-color: #28a745;
    }
    
    .badge-warning {
        background-color: #ffc107;
    }
    
    .badge-secondary {
        background-color: #6c757d;
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


    <!-- Shoping Cart Section Begin -->
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-4 p-md-5 justify-content-center align-items-center">
                        <h2>Tài khoản</h2>
						<ul>
                        <li><a href="taikhoan.php?account">Thông tin tài khoản</a></li>
                        <li><a href="taikhoan.php?address">Danh sách địa chỉ</a></li>
                    </ul>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
             <?php
             if (isset($_GET['address'])) {
               if (isset($_GET['insert'])) { ?>
                <div class="page-inner">
                  <h3 class="mb-4 billing-heading">Thông tin nhận hàng</h3>
                  <form action="#" method="post" class="billing-form">
                      <div class="row align-items-end">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="firstname">Tên</label>
                                  <input type="text" class="form-control" name="txtFName" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="lastname">Họ</label>
                                  <input type="text" class="form-control" name="txtLName" required>
                              </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="streetaddress">Tên đường, số nhà</label>
                                  <input type="text" name="txtAdd1" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="address">Quận/Huyện</label>
                                  <input name="txtAdd2" type="text" class="form-control" required>
                              </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="towncity">Thành phố/Tỉnh</label>
                                  <input name="txtAdd3" type="text" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="phone">Số điện thoại </label>
                                  <input type="text" name="txtPhone" class="form-control" required>
                              </div>
                          </div>
                          <p><input type="submit" name="txtsub" value="Thêm địa chỉ" class="btn btn-primary py-3 px-4"></p>
                      </div>
                  </form>
              </div>
               <?php
                if(isset($_POST['txtsub'])){
                  $name = $_POST['txtLName'] . ' ' . $_POST['txtFName'];
                  $address = $_POST['txtAdd1'] . ', ' . $_POST['txtAdd2'] . ', ' . $_POST['txtAdd3'];
                  $phone = $_POST['txtPhone'];
                  $user_id = $_SESSION['user'];
                  $insert_add = $get_data->insert_address($user_id,$name,$phone, $address);
                  if($insert_add){
                      echo "<script>alert('Thêm địa chỉ thành công'); window.location='taikhoan.php?address';</script>";
                  } else {
                      echo "<script>alert('Vui lòng kiểm tra lại thông tin');</script>";
                  }
              }
	           } else {
                 $select_add = $get_data->select_address($_SESSION['user']) ?>
                <div class="pb-md-5">
                  <table style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại </th>
                            <th>Địa chỉ</th>
                            <th colspan="2" style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($select_add as $se_add): ?>
                        <tr>
                            <td><?php echo $se_add['name_custommer'] ?></td>
                            <td><?php echo $se_add['phone'] ?></td>
                            <td><?php echo $se_add['address'] ?></td>
                          
                                  <td><a href="updateAdd.php?id_add=<?php echo $se_add['id_address'] ?>" >Cập nhật</a></td>
                                 <td><a style="color: red;" href="deleteAdd.php?del=<?php echo $se_add['id_address'] ?>" >Xóa</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="pb-md-5">
                  <a href="taikhoan.php?address&insert">Thêm địa chỉ</a>
                </div>
             <?php }
             } else { ?>
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h3>Thông tin tài khoản</h3>
	            </div>
	          </div>
	          <div class="pb-md-5">
                <?php
                $select = $get_data->select_user($_SESSION['user']);
                foreach ($select as $se) { ?>
	          	<p><strong>Tên tài khoản: </strong><?php echo $se['username']; ?></p>
                 
                    <p><strong>Email: </strong><?php echo $se['email']; ?></p>
                    <?php } ?>
						</div>
            <div class="pb-md-12">
                <h3>Danh sách đơn hàng</h3>
                <table >
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Thành tiền</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $select_or = $get_data->select_order($_SESSION['user']);
                      foreach( $select_or as $se_or ): ?>
                        <tr>
                            <td><a href="#">#<?php echo $se_or['id_order'] ?></a></td>
                            <td><?php echo $se_or['date'] ?></td>
                            <td><?php $price_sale = $se_or['total_order'];
                            $formatted_price = number_format($price_sale, 0, ',', '.'); 
                            echo $formatted_price . ' ₫'; ?></td>
                            <td><?php echo $se_or['payment'] ?></td>
                            <td><?php echo $se_or['status'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php  } ?>
        </div>
					</div>
				</div>
			</div>
		</section>
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