<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ cửa hàng</title>
    <?php partial('includes/stylesheet.php', 'admin'); ?>
</head>
<body>
<div class="container-scroller">
    <button class="align-self-center" type="button" data-toggle="minimize" id="toggle-menu">
        <span class="fas fa-bars"></span>
    </button>
    <div class="container-fluid page-body-wrapper">
        <div class="theme-setting-wrapper">
            <div id="settings-trigger" class="cursor-pointer"><i class="fas fa-fill-drip"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <p class="settings-heading">Thiết lập giao diện</p>
                <div class="sidebar-bg-options cursor-pointer selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3 "></div>
                    Sáng
                </div>
                <div class="sidebar-bg-options cursor-pointer" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                    Tối
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close fa fa-times"></i>
            <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
        </div>
        <?php includes('includes/sidebar.php') ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        Trang chủ
                    </h3>
                </div>
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fa fa-user mr-2"></i>
                                            Số người dùng mới
                                        </p>
                                        <h2><?php echo $current_user_counter; ?></h2>
                                        <label class="badge badge-outline-success badge-pill">
                                            <?php
                                                if($current_user_counter > $previous_user_counter)  {
                                                    echo 'tăng ';
                                                } else {
                                                    echo 'giảm ';
                                                }
                                                echo $precent_user . '% ';
                                            ?>
                                        </label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                            Tổng số sản phẩm
                                        </p>
                                        <h2><?php echo $product_counter; ?></h2>
                                        <label class="badge badge-outline-success badge-pill">Hiện còn bán</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-chart-line mr-2"></i>
                                            Doanh thu tháng này
                                        </p>
                                        <h2><?php echo vnmoney($tong_doanh_thu); ?></h2>
<!--                                        <label class="badge badge-outline-success badge-pill">10% increase</label>-->
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-check-circle mr-2"></i>
                                            Số đơn hàng hoàn thành
                                        </p>
                                        <h2><?php echo $current_order_complete_counter; ?></h2>
                                        <label class="badge badge-outline-success badge-pill">
                                            <?php
                                                 if($current_order_complete_counter > $previous_order_complete_counter)
                                                     echo 'tăng ';
                                                 else
                                                     echo 'giảm ';
                                                 echo $percent_order . ' %';
                                            ?>
                                        </label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                            Số đơn hàng đang chờ
                                        </p>
                                        <h2><?php echo $order_pending; ?></h2>
                                        <a href="/admin/don-hang">
                                            <label class="badge badge-outline-danger badge-pill">Đi đến duyệt</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-gift"></i>
                                    Đặt hàng
                                </h4>
                                <canvas id="orders-chart"></canvas>
                                <div id="orders-chart-legend" class="orders-chart-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-line"></i>
                                    Bán hàng
                                </h4>
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-pie"></i>
                                    Trạng thái website
                                </h4>
                                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                                    <canvas id="sales-status-chart" class="mt-3"></canvas>
                                    <div class="pt-4">
                                        <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="far fa-futbol"></i>
                                    Hoạt động cửa hàng
                                </h4>
                                <ul class="solid-bullet-list">
                                    <li>
                                        <h5>4 người đã chia sẻ bài viết
                                            <span class="float-right text-muted font-weight-normal small">8:30 AM</span>
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>Lam đã đăng nội dung lên nhóm
                                            <span class="float-right text-muted font-weight-normal small">11:40 AM</span>
                                        </h5>
                                        <p class="text-muted">Chia sẻ để mọi người tham khảo</p>
                                    </li>
                                    <li>
                                        <h5>Hoàn thành công việc
                                            <span class="float-right text-muted font-weight-normal small">4:30 PM</span>
                                        </h5>
                                        <p class="text-muted">Lên kế hoạch tháng tới</p>
                                    </li>
                                </ul>
                                <div class="border-top pt-3">
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-outline-dark">Xem thêm</button>
                                        <button class="btn btn-primary btn-icon-text">
                                            Thêm mới
                                            <i class="btn-icon-append fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Doanh số hàng ngày
                                </h4>
                                <p class="card-description">Doanh số hằng ngày trong 1 tháng qua</p>
                                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                                    <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0"></canvas>
                                    <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-table"></i>
                                    Dữ liệu bán hàng
                                </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Giá trị đơn hàng</th>
                                            <th class="text-center">Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) { ?>
                                                <tr>
                                                    <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                    <td>
                                                        <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                            <?php echo $donhang->ma_don_hang; ?>
                                                        </a>
                                                    <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if($donhang->trang_thai == \Luccui\Models\DonHang::DANG_CHO_XAC_NHAN)
                                                                echo "<span class='badge badge-warning'>{$donhang->trang_thai}</span>";
                                                            else if($donhang->trang_thai == \Luccui\Models\DonHang::DA_XAC_NHAN)
                                                                echo "<span class='badge badge-primary'>{$donhang->trang_thai}</span>";
                                                            else if($donhang->trang_thai == \Luccui\Models\DonHang::DA_HOAN_THANH)
                                                                echo "<span class='badge badge-success'>{$donhang->trang_thai}</span>";
                                                            else
                                                                echo "<span class='badge badge-danger'>{$donhang->trang_thai}</span>";
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-calendar-alt"></i>
                                    Lịch
                                </h4>
                                <div id="inline-datepicker-example" class="datepicker"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-thumbtack"></i>
                                    Việc cần làm
                                </h4>
                                <div class="add-items d-flex">
                                    <input type="text" class="form-control todo-list-input"  placeholder="Kế hoạch làm việc cho hôm nay">
                                    <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Thêm mới</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse todo-list">
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox">
                                                    Meeting with Alisa
                                                </label>
                                            </div>
                                            <i class="remove fa fa-times-circle"></i>
                                        </li>
                                        <li class="completed">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" checked>
                                                    Call John
                                                </label>
                                            </div>
                                            <i class="remove fa fa-times-circle"></i>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox">
                                                    Create invoice
                                                </label>
                                            </div>
                                            <i class="remove fa fa-times-circle"></i>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox">
                                                    Print Statements
                                                </label>
                                            </div>
                                            <i class="remove fa fa-times-circle"></i>
                                        </li>
                                        <li class="completed">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" checked>
                                                    Prepare for presentation
                                                </label>
                                            </div>
                                            <i class="remove fa fa-times-circle"></i>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox">
                                                    Pick up kids from school
                                                </label>
                                            </div>
                                            <i class="remove fa fa-times-circle"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-rocket"></i>
                                    Projects
                                </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                Assigned to
                                            </th>
                                            <th>
                                                Project name
                                            </th>
                                            <th>
                                                Priority
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="py-1">
                                                <img src="images/faces/face1.jpg" alt="profile" class="img-sm rounded-circle"/>
                                            </td>
                                            <td>
                                                South Shyanne
                                            </td>
                                            <td>
                                                <label class="badge badge-warning badge-pill">Medium</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <img src="images/faces/face2.jpg" alt="profile" class="img-sm rounded-circle"/>
                                            </td>
                                            <td>
                                                New Trystan
                                            </td>
                                            <td>
                                                <label class="badge badge-danger badge-pill">High</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <img src="images/faces/face3.jpg" alt="profile" class="img-sm rounded-circle"/>
                                            </td>
                                            <td>
                                                East Helga
                                            </td>
                                            <td>
                                                <label class="badge badge-success badge-pill">Low</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <img src="images/faces/face4.jpg" alt="profile" class="img-sm rounded-circle"/>
                                            </td>
                                            <td>
                                                Omerbury
                                            </td>
                                            <td>
                                                <label class="badge badge-warning badge-pill">Medium</label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <button class="btn btn-social-icon btn-facebook btn-rounded">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>
                                        <div class="ml-4">
                                            <h5 class="mb-0">Facebook</h5>
                                            <p class="mb-0">813 friends</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <button class="btn btn-social-icon btn-twitter btn-rounded">
                                            <i class="fab fa-twitter"></i>
                                        </button>
                                        <div class="ml-4">
                                            <h5 class="mb-0">Twitter</h5>
                                            <p class="mb-0">9000 followers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <button class="btn btn-social-icon btn-google btn-rounded">
                                            <i class="fab fa-google-plus-g"></i>
                                        </button>
                                        <div class="ml-4">
                                            <h5 class="mb-0">Google plus</h5>
                                            <p class="mb-0">780 friends</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-social-icon btn-linkedin btn-rounded">
                                            <i class="fab fa-linkedin-in"></i>
                                        </button>
                                        <div class="ml-4">
                                            <h5 class="mb-0">Linkedin</h5>
                                            <p class="mb-0">1090 connections</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <?php partial('includes/script.php', 'admin'); ?>
    <script>
        $(document).ready(function() {

        })
    </script>
</div>
</body>
</html>
