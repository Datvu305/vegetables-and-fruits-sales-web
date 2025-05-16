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
    <title>Cập nhật bài viết - Kaiadmin Bootstrap 5 Admin Dashboard</title>
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

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
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
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="index.php" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a href="Product.php">
                                <i class="icon-book-open"></i>
                                <span class="sub-item">Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Category.php">
                                <i class="icon-menu"></i>
                                <span class="sub-item">Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Contact.php">
                                <i class="icon-envelope"></i>
                                <span class="sub-item">Contact</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Order.php">
                                <i class="icon-calendar"></i>
                                <span class="sub-item">Order</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Report.php">
                                <i class="icon-chart"></i>
                                <span class="sub-item">Report</span>
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
                <!-- Navbar Header -->
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
                                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                                </li>
                                            </div>
                                        </ul>
                                    <?php }
                                } else { ?>
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
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Cập nhật bài viết</div>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $blog = $get_data->get_blog($id);
                                        
                                        if ($blog) { ?>
                                            <div class="row">
                                                <form method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Tiêu đề</label>
                                                            <input type="text" value="<?php echo htmlspecialchars($blog['title']); ?>" 
                                                                   class="form-control" name="title" required />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Danh mục</label>
                                                            <input type="text" value="<?php echo htmlspecialchars($blog['category_blog']); ?>" 
                                                                   class="form-control" name="category" required />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Nội dung</label>
                                                            <textarea class="form-control" id="editor" name="content" rows="10" required>
                                                                <?php echo htmlspecialchars($blog['content']); ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Ảnh đại diện</label>
                                                            <?php if (!empty($blog['image_url'])): ?>
                                                                <div class="mb-3">
                                                                    <img src="../Admin/upload/<?php echo htmlspecialchars($blog['image_url']); ?>" 
                                                                         style="max-width: 200px; max-height: 150px;">
                                                                </div>
                                                            <?php endif; ?>
                                                            <input type="file" class="form-control" name="image" accept="image/*">
                                                            <small class="text-muted">Để trống nếu không muốn thay đổi ảnh</small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer border-0">
                                                        <button type="submit" name="update_blog" class="btn btn-primary">Cập nhật</button>
                                                        <a href="admin_blogs.php" class="btn btn-danger">Đóng</a>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php
                                        } else {
                                            echo "<div class='alert alert-danger'>Bài viết không tồn tại.</div>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-warning'>ID bài viết không được cung cấp.</div>";
                                    }

                                    // Xử lý khi submit form
                                    if (isset($_POST['update_blog'])) {
                                        $id = $_POST['id'];
                                        $title = $_POST['title'];
                                        $content = $_POST['content'];
                                        $category = $_POST['category'];
                                        
                                        // Xử lý upload ảnh nếu có
                                        $image_url = null;
                                        if (!empty($_FILES['image']['name'])) {
                                            $target_dir = "../Admin/upload/";
                                            $target_file = $target_dir . basename($_FILES['image']['name']);
                                            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                                                $image_url = basename($_FILES['image']['name']);
                                            }
                                        }
                                        
                                        $update = $get_data->update_blog($id, $title, $content, $category, $image_url);
                                        
                                        if ($update) {
                                            echo "<script>
                                                alert('Cập nhật bài viết thành công');
                                                window.location.href = 'blog.php';
                                            </script>";
                                        } else {
                                            echo "<script>alert('Cập nhật bài viết thất bại')</script>";
                                        }
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

    <!-- JS Files -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/kaiadmin.min.js"></script>
    
    <script>
        // Khởi tạo CKEditor
        CKEDITOR.replace('editor');
    </script>
</body>
</html>