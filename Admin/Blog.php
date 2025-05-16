<?php
session_start();
include("control.php");
$get_data = new data();
$get_user = new data_user();
if (empty($_SESSION['user'])) {
    echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
    window.location = 'sign-in.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Category</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 patchedSolid",
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

    <!-- Custom CSS for logo size -->
    <style>
        /* Điều chỉnh kích thước logo trong sidebar */
        .sidebar-logo .logo-header .logo img.navbar-brand {
            height: 65px !important; /* Thay đổi chiều cao logo */
            width: auto; /* Giữ tỷ lệ chiều rộng */
        }

        /* Điều chỉnh kích thước logo trong main header */
        .main-header-logo .logo-header .logo img.navbar-brand {
            height: 30px !important; /* Thay đổi chiều cao logo */
            width: auto; /* Giữ tỷ lệ chiều rộng */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.php" class="logo">
                        <img src="assets/img/kaiadmin/logo1.png" alt="navbar brand" class="navbar-brand"
                            height="20" />
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
                <!-- End Logo Header -->
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
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.php" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
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
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
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
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-expanded="false" aria-haspopup="true">
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
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification"></span>
                                </a>
                            </li>

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <?php if (isset($_SESSION['user'])) {
                                    $select_admin = $get_user->select_admin($_SESSION['user']);
                                    foreach ($select_admin as $se) { ?>
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
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
                                                    <img src="assets/img/profile.jpg" alt="image profile"
                                                        class="avatar-img rounded" />
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
                                } else {
                                    ?>
                                <span class="fw-bold"><a href="login.php">Đăng nhập</a></span>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Quản Lý Blog</h4>
                                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                            data-bs-target="#addBlogModal">
                                            <i class="fa fa-plus"></i>
                                            Thêm bài viết mới
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal Thêm Bài Viết -->
                                    <div class="modal fade" id="addBlogModal" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">Thêm</span>
                                                        <span class="fw-light">Bài viết mới</span>
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Tiêu đề bài viết</label>
                                                                    <input name="title" type="text" class="form-control"
                                                                        placeholder="Nhập tiêu đề" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Danh mục</label>
                                                                    <input name="category" type="text"
                                                                        class="form-control" placeholder="Nhập danh mục"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Ảnh đại diện</label>
                                                                    <input name="image_url" type="file"
                                                                        class="form-control"
                                                                        accept=".jpg, .jpeg, .png" />
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Nội dung bài viết</label>
                                                                    <textarea class="form-control" id="blogContent"
                                                                        name="content" rows="10" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0">
                                                            <button type="submit" name="add_blog"
                                                                class="btn btn-primary">Thêm bài viết</button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if (isset($_POST['add_blog'])) {
                                        // Xử lý upload ảnh đại diện
                                        $image_url = '';
                                        if (!empty($_FILES['image_url']['name'])) {
                                            $target_dir = "upload/";
                                            $file_extension = pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION);
                                            $new_filename = 'blog_'.time().'_'.uniqid().'.'.$file_extension;
                                            $target_file = $target_dir . $new_filename;

                                            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
                                                $image_url = $new_filename;
                                            } else {
                                                echo "<script>alert('Lỗi khi upload ảnh đại diện')</script>";
                                                exit;
                                            }
                                        }

                                        // Thêm bài viết vào database
                                        $insert = $get_data->insert_blog(
                                            $_POST['title'],
                                            $_POST['content'],
                                            $_POST['category'],
                                            $image_url
                                        );

                                        if ($insert) {
                                            echo "<script>
                                                alert('Thêm bài viết thành công');
                                                window.location.href = 'blog.php';
                                            </script>";
                                        } else {
                                            echo "<script>alert('Thêm bài viết thất bại')</script>";
                                        }
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table id="blog-table" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Danh mục</th>
                                                    <th>Ngày đăng</th>
                                                    <th>Ảnh</th>
                                                    <th>Nội dung</th>
                                                    <th style="width: 15%">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $blogs = $get_data->select_blog_admin();
                                                $i = 1;
                                                foreach ($blogs as $blog) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; $i++; ?></td>
                                                    <td><?php echo htmlspecialchars($blog['title']); ?></td>
                                                    <td><?php echo htmlspecialchars($blog['category_blog']); ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($blog['created_at'])); ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($blog['image_url'])): ?>
                                                        <img src="../Admin/upload/<?php echo htmlspecialchars($blog['image_url']); ?>"
                                                            style="width: 80px; height: 50px; object-fit: cover;">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        // Giới hạn nội dung hiển thị (ví dụ: 100 ký tự) và render HTML
                                                        $content = strip_tags($blog['content'], '<b><i><u><p><br>');
                                                        echo substr($content, 0, 100) . (strlen($content) > 100 ? '...' : ''); 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button"
                                                                class="btn btn-link btn-primary btn-lg">
                                                                <a href="update_blog.php?id=<?php echo $blog['id']; ?>"
                                                                    class="fa fa-edit"></a>
                                                            </button>
                                                            <button type="button" class="btn btn-link btn-danger"
                                                                onclick="if(confirm('Bạn có chắc chắn muốn xóa bài viết này?')) 
                                                                window.location.href='delete_blog.php?del=<?php echo $blog['id']; ?>'">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
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
                            <button type="button" class следующие кнопки:="changeTopBarColor"
                                data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
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
                            <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
    <!-- Core JS Files -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
    $(document).ready(function() {
        // Initialize Summernote
        $('#blogContent').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']],
                ['insert', ['link', 'picture']]
            ]
        });

        // Initialize DataTable with pagination
        $("#blog-table").DataTable({
            pageLength: 5
        });
    });
    </script>
</body>

</html>