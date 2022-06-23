<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh sách bài viết</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{! assets('public/client/images/icons/browserconfig.xml'); !}">
    <meta name="theme-color" content="#ffffff">
    <?php partial('includes/stylesheet.php', 'client'); ?>
    <style>
        .entry-content *{
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
        }
        .entry-media img {
            object-position: center;
            object-fit: cover;
            max-height: 170px;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <?php partial('includes/header.php', 'client'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('<?php echo assets('public/client/images/page-header-bg.jpg'); ?>')">
            <div class="container">
                <h1 class="page-title">Thông tin tài khoản</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/tai-khoan">Tài khoản</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
                </ol>
            </div>
        </nav>
        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a href="#tab-thongtincanhan" class="nav-link active" data-toggle="tab" role="tab" aria-controls="tab-dashboard" aria-selected="true">Thông tin cá nhân</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-dathang" class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-orders" aria-selected="false">Đặt hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-diachi" class="nav-link"  data-toggle="tab" role="tab" aria-controls="tab-downloads" aria-selected="false">Địa chỉ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-chitiettaikhoan" class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-address" aria-selected="false">Chi tiết tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Đăng xuất</a>
                                </li>
                            </ul>
                        </aside>

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-thongtincanhan" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                    Xin chào <?php echo $taikhoan->ho . ' ' . $taikhoan->ten; ?>
                                </div>

                                <div class="tab-pane fade" id="tab-dathang" role="tabpanel" aria-labelledby="tab-orders-link">
                                    <p>No order has been made yet.</p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Trạng thái đơn</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) { ?>
                                                <tr>
                                                    <td><?php echo $donhang->ma_don_hang; ?></td>
                                                    <td><?php echo $donhang->ngay_dat; ?></td>
                                                    <td>
                                                        <?php if($donhang->trang_thai == \Luccui\Models\DonHang::DANG_CHO_XAC_NHAN) {?>
                                                            <span class="badge badge-danger"><?php echo $donhang->trang_thai; ?></span>
                                                        <?php } else if($donhang->trang_thai == \Luccui\Models\DonHang::DA_XAC_NHAN)  {?>
                                                            <span class="badge badge-success"><?php echo $donhang->trang_thai; ?></span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-secondary"><?php echo $donhang->trang_thai; ?></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo vnmoney($donhang->tong_tien); ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tab-diachi" role="tabpanel" aria-labelledby="tab-address-link">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Địa chỉ giao hàng</h3>
                                                    <p>Tên hiển thị<br>
                                                        <?php echo $taikhoan->ho . ' ' . $taikhoan->ten; ?><br>
<!--                                                        Tên công ty<br>-->
                                                        <?php echo $taikhoan->dia_chi ?><br>
                                                        <?php echo $taikhoan->so_dien_thoai ?><br>
                                                        <?php echo $taikhoan->email ?><br>
                                                        <a href="#">Chỉnh sửa <i class="icon-edit"></i></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-chitiettaikhoan" role="tabpanel" aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" required="">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" required="">
                                            </div>
                                        </div>

                                        <label>Display Name *</label>
                                        <input type="text" class="form-control" required="">
                                        <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" required="">

                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control mb-2">

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php partial('includes/footer.php', 'client'); ?>
</div>
<?php partial('includes/script.php', 'client'); ?>
</body>
</html>
