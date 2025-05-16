<?php
session_start();
include ("control.php");
$get_data = new data();
$get_user = new data_user();
if (empty($_SESSION['user'])) {
  echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
    window.location = 'login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["assets/css/fonts.min.css"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Custom CSS for logo size and marquee -->
    <style>
        .card-stats .row.align-items-center {
    display: flex;
    align-items: center;
    flex-wrap: nowrap; /* Ngăn các phần tử xuống dòng */
}

.card-stats .col-icon {
    flex: 0 0 auto; /* Không cho icon mở rộng */
}

.card-stats .col-stats {
    flex: 1; /* Cho phép phần nội dung chiếm không gian còn lại */
    white-space: nowrap; /* Ngăn văn bản xuống dòng */
}

.card-stats .numbers {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
}

.card-stats .card-title {
    margin: 0; /* Loại bỏ margin để tránh đẩy nội dung */
    font-size: 1.2rem; /* Điều chỉnh kích thước chữ nếu cần */
}
    /* Điều chỉnh kích thước logo trong sidebar */
    .sidebar-logo .logo-header .logo img.navbar-brand {
        height: 65px !important;
        width: auto;
    }

    /* Điều chỉnh kích thước logo trong main header */
    .main-header-logo .logo-header .logo img.navbar-brand {
        height: 30px !important;
        width: auto;
    }

    /* CSS cho giải băng chạy */
    .marquee-container {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        padding: 10px 0;
    }
    .marquee-content {
        display: inline-block;
        animation: marquee 15s linear infinite;
    }
    .marquee-item {
        display: inline-flex;
        align-items: center;
        margin-right: 20px;
    }
    .marquee-item img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }
    .marquee-content:hover {
        animation-play-state: paused;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a href="index.php" class="logo">
                        <img src="assets/img/kaiadmin/logo1.png" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="index.php" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Trang chủ</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Quản lý</h4>
                        </li>
                        <li class="nav-item">
                            <a href="Product.php">
                                <i class="icon-book-open"></i>
                                <span class="sub-item">Sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Category.php">
                                <i class="icon-menu"></i>
                                <span class="sub-item">Danh mục</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Contact.php">
                                <i class="icon-envelope"></i>
                                <span class="sub-item">Liên hệ</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Order.php">
                                <i class="icon-calendar"></i>
                                <span class="sub-item">Đơn đặt hàng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Report.php">
                                <i class="icon-chart"></i>
                                <span class="sub-item">Báo cáo</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Blog.php">
                                <i class="icon-book-open"></i>
                                <span class="sub-item">Blog</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="User.php">
                                <i class="icon-user"></i>
                                <span class="sub-item">Quản lý thành viên</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.php" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                </div>
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification"></span>
                                </a>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <?php if (isset($_SESSION['user'])) {
                                    $select_admin = $get_user->select_admin($_SESSION['user']);
                                    foreach ($select_admin as $se) { ?>
                                        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                            <div class="avatar-sm">
                                                <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                                            </div>
                                            <span class="profile-username">
                                                <span class="op-7">Hi,</span>
                                                <span class="fw-bold"><?php echo $se['username'] ?></span>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                                            <div class="dropdown-user-scroll scrollbar-outer">
                                                <li>
                                                    <div class="user-box">
                                                        <div class="avatar-lg">
                                                            <img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded" />
                                                        </div>
                                                        <div class="u-text">
                                                            <h4><?php echo $se['username'] ?></h4>
                                                            <p class="text-muted"><?php echo $se['email'] ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                                </li>
                                            </div>
                                        </ul>
                                    <?php }
                                } else { ?>
                                    <a href="login.php">Đăng nhập</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Khách hàng</p>
                                                <h4 class="card-title"><?php $select = $get_user->select_user();
                                                    $num_rows = mysqli_num_rows($select);
                                                    echo $num_rows;
                                                ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
    <div class="card card-stats card-round">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-icon">
                    <div class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="fas fa-luggage-cart"></i>
                    </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                        <p class="card-category">Tổng bán</p>
                        <h4 class="card-title">
                            <?php 
                            $select_sale = $get_data->select_sale();
                            $sales = 0;
                            foreach($select_sale as $se){
                                $sales += $se['total_order'];
                            }
                            $formatted_price = number_format($sales, 0, ',', '.');
                            echo $formatted_price . ' VND'; 
                            ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="far fa-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Đơn đặt hàng</p>
                                                <h4 class="card-title"><?php $select_order = $get_data->select_order();
                                                    $num_rows = mysqli_num_rows($select_order);
                                                    echo $num_rows; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-round">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Doanh thu</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="htmlLegendsChart"></canvas>
                                        </div>
                                        <div id="myChartLegend"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-round">
                                <div class="card-body">
                                    <div class="card-head-row card-tools-still-right">
                                        <div class="card-title">Khách hàng mới</div>
                                    </div>
                                    <div class="marquee-container">
                                        <div class="marquee-content">
                                            <?php 
                                            $select_user = $get_user->select_user_top();
                                            $counter = 0;
                                            foreach($select_user as $se){
                                                if ($counter >= 5) break;
                                            ?>
                                            <div class="marquee-item">
                                                <img src="assets/img/jm_denis.jpg" alt="..." />
                                                <span class="username"><?php echo htmlspecialchars($se['username']); ?></span>
                                            </div>
                                            <?php 
                                                $counter++;
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-round">
                                <div class="card-body">
                                    <div class="card-head-row card-tools-still-right">
                                        <div class="card-title">Top 8 sản phẩm bán chạy nhất</div>
                                    </div>
                                    <div class="card-list py-4">
                                        <?php 
                                        $top_products = $get_data->select_top_products();
                                        $counter = 0;
                                        foreach($top_products as $product){
                                            if ($counter >= 8) break;
                                            $image = !empty($product['image']) ? 'upload/' . htmlspecialchars($product['image']) : 'assets/img/product_placeholder.jpg';
                                            $name_pro = htmlspecialchars($product['name_pro'] ?? 'Sản phẩm không tên');
                                        ?>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="<?php echo $image; ?>" alt="<?php echo $name_pro; ?>" width="70px" height="70px" class="avatar-img" />
                                            </div>
                                            <div class="info-user ms-3">
                                                <div class="username"><?php echo $name_pro; ?></div>
                                                <div class="status">Số lượng bán: <?php echo $product['total_sold']; ?></div>
                                            </div>
                                        </div>
                                        <?php 
                                            $counter++;
                                        } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var htmlLegendsChart = document.getElementById("htmlLegendsChart").getContext("2d");

    var gradientStroke = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, "#177dff");
    gradientStroke.addColorStop(1, "#80b6f4");

    var gradientFill = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
    gradientFill.addColorStop(0, "rgba(23, 125, 255, 0.7)");
    gradientFill.addColorStop(1, "rgba(128, 182, 244, 0.3)");

    <?php $select = $get_data->revenue(); ?>
    var labels = [];
    var data = [];
    <?php while($row = $select->fetch_assoc()) { ?>
        labels.push("Tháng <?php echo $row['month']; ?>");
        data.push(<?php echo $row['total']; ?>);
    <?php } ?>

    var myHtmlLegendsChart = new Chart(htmlLegendsChart, {
        type: "line",
        data: {
            labels: labels,
            datasets: [{
                label: "Doanh thu",
                borderColor: gradientStroke,
                pointBackgroundColor: gradientStroke,
                pointRadius: 0,
                backgroundColor: gradientFill,
                legendColor: "#177dff",
                fill: true,
                borderWidth: 1,
                data: data
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            layout: {
                padding: { left: 15, right: 15, top: 15, bottom: 15 }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "500",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "500"
                    }
                }]
            },
            legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend html-legend">');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                    text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>');
                    if (chart.data.datasets[i].label) {
                        text.push(chart.data.datasets[i].label);
                    }
                    text.push('</li>');
                }
                text.push('</ul>');
                return text.join('');
            }
        }
    });

    var myLegendContainer = document.getElementById("myChartLegend");
    myLegendContainer.innerHTML = myHtmlLegendsChart.generateLegend();

    var legendItems = myLegendContainer.getElementsByTagName('li');
    for (var i = 0; i < legendItems.length; i += 1) {
        legendItems[i].addEventListener("click", legendClickCallback, false);
    }

    function legendClickCallback(event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        while (target.nodeName !== 'LI') {
            target = target.parentElement;
        }
        var parent = target.parentElement;
        var chartId = parseInt(parent.classList[0].split('-')[0], 10);
        var chart = Chart.instances[chartId];
        var index = Array.prototype.slice.call(parent.children).indexOf(target);
        var meta = chart.getDatasetMeta(index);
        meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
        chart.update();
    }
    </script>
</body>
</html>