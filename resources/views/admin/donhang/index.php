<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh sách đơn hàng</title>
    <?php partial('includes/stylesheet.php', 'admin'); ?>
</head>
<body>
<div class="container-scroller">
    <button class="align-self-center" type="button" data-toggle="minimize" id="toggle-menu">
        <span class="fas fa-bars"></span>
    </button>
    <div class="container-fluid page-body-wrapper">
        <div class="theme-setting-wrapper">
            <?php includes('includes/theme.php') ?>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <?php includes('includes/right-sidebar.php') ?>
        </div>
        <?php includes('includes/sidebar.php') ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h4 class="page-title">
                        Danh sách đơn hàng
                    </h4>
                </div>
                <div class="main-content row">
                    <div class="col-12 content">
                        <div class="card p-2">
                            <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a href="#pills-tatca" class="nav-link active show" data-toggle="pill" role="tab" >Tất cả</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pills-dangchoxacnhan" class="nav-link" data-toggle="pill" role="tab" >Đang chờ xác nhận</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pills-daxacnhan" class="nav-link" data-toggle="pill" role="tab">Đã xác nhận</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pills-dahoanthanh" class="nav-link" data-toggle="pill" role="tab">Đã hoàn thành</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pills-dahuy" class="nav-link" data-toggle="pill" role="tab">Đã hủy</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-tatca" role="tabpanel">
                                    <table id="example" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Tên khách hàng</th>
                                                <th>Phương thức thanh toán</th>
                                                <th class="text-center">Trạng thái</th>
                                                <th>Tổng tiền</th>
                                                <th>In hóa đơn</th>
                                                <th>ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) {?>
                                                <tr>
                                                    <td>
                                                        <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                            <?php echo $donhang->ma_don_hang; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $donhang->ngay_dat; ?></td>
                                                    <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                    <td><?php echo $donhang->phuong_thuc_thanh_toan; ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if($donhang->trang_thai == \Luccui\Models\DonHang::DANG_CHO_XAC_NHAN) {
                                                                echo "<span class='badge badge-danger'>$donhang->trang_thai</span>";
                                                            }
                                                            if($donhang->trang_thai == \Luccui\Models\DonHang::DA_XAC_NHAN) {
                                                                echo "<span class='badge badge-primary'>$donhang->trang_thai</span>";
                                                            }
                                                            if($donhang->trang_thai == \Luccui\Models\DonHang::DA_HOAN_THANH) {
                                                                echo "<span class='badge badge-success'>$donhang->trang_thai</span>";
                                                            }
                                                            if($donhang->trang_thai == \Luccui\Models\DonHang::DA_HUY) {
                                                                echo "<span class='badge badge-warning'>$donhang->trang_thai</span>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                    <td>
                                                        <form action="/admin/don-hang/in-hoa-don" method="POST">
                                                            <label>
                                                                <input name="donhang_id" value="<?php echo $donhang->id; ?>" type="text" hidden>
                                                            </label>
                                                            <button type="submit" class="btn"><i class="fa fa-print mr-1"></i></button>
                                                        </form>
                                                    </td>
                                                    <td><?php echo $donhang->id; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-dangchoxacnhan" role="tabpanel">
                                    <table id="table-dangchoxacnhan" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Tên khách hàng</th>
                                                <th>Phương thức thanh toán</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng tiền</th>
                                                <th>In hóa đơn</th>
                                                <th>ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) {?>
                                                <?php if($donhang->trang_thai == \Luccui\Models\DonHang::DANG_CHO_XAC_NHAN) {?>
                                                    <tr>
                                                        <td>
                                                            <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                                <?php echo $donhang->ma_don_hang; ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $donhang->ngay_dat; ?></td>
                                                        <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                        <td><?php echo $donhang->phuong_thuc_thanh_toan; ?></td>
                                                        <td class="text-center">
                                                            <span class='badge badge-danger'><?php echo $donhang->trang_thai; ?></span>
                                                        </td>
                                                        <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                        <td>
                                                            <form action="/admin/don-hang/in-hoa-don" method="POST">
                                                                <label>
                                                                    <input name="donhang_id" value="<?php echo $donhang->id; ?>" type="text" hidden>
                                                                </label>
                                                                <button type="submit" class="btn"><i class="fa fa-print mr-1"></i></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <?php echo $donhang->id ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-daxacnhan" role="tabpanel">
                                    <table id="table-daxacnhan" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Tên khách hàng</th>
                                                <th>Phương thức thanh toán</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng tiền</th>
                                                <th>In hóa đơn</th>
                                                <th>ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) {?>
                                                <?php if($donhang->trang_thai == \Luccui\Models\DonHang::DA_XAC_NHAN) {?>
                                                    <tr>
                                                        <td>
                                                            <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                                <?php echo $donhang->ma_don_hang; ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $donhang->ngay_dat; ?></td>
                                                        <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                        <td><?php echo $donhang->phuong_thuc_thanh_toan; ?></td>
                                                        <td class="text-center">
                                                            <span class='badge badge-primary'><?php echo $donhang->trang_thai; ?></span>
                                                        </td>
                                                        <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                        <td>
                                                            <form action="/admin/don-hang/in-hoa-don" method="POST">
                                                                <label>
                                                                    <input name="donhang_id" value="<?php echo $donhang->id; ?>" type="text" hidden>
                                                                </label>
                                                                <button type="submit" class="btn"><i class="fa fa-print mr-1"></i></button>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $donhang->id; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-dahoanthanh" role="tabpanel">
                                    <table id="table-dahoanthanh" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tên khách hàng</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>In hóa đơn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) {?>
                                                <?php if($donhang->trang_thai == \Luccui\Models\DonHang::DA_HOAN_THANH) {?>
                                                    <tr>
                                                        <td>
                                                            <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                                <?php echo $donhang->ma_don_hang; ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $donhang->ngay_dat; ?></td>
                                                        <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                        <td><?php echo $donhang->phuong_thuc_thanh_toan; ?></td>
                                                        <td>
                                                            <span class='badge badge-warning'><?php echo $donhang->trang_thai; ?></span>
                                                        </td>
                                                        <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                        <td>
                                                            <form action="/admin/don-hang/in-hoa-don" method="POST">
                                                                <label>
                                                                    <input name="donhang_id" value="<?php echo $donhang->id; ?>" type="text" hidden>
                                                                </label>
                                                                <button type="submit" class="btn"><i class="fa fa-print mr-1"></i></button>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $donhang->id; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-dahuy" role="tabpanel">
                                    <table id="table-dahuy" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tên khách hàng</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>In hóa đơn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($donhangs as $donhang) {?>
                                            <?php if($donhang->trang_thai == \Luccui\Models\DonHang::DA_HUY) {?>
                                                <tr>
                                                    <td>
                                                        <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                            <?php echo $donhang->ma_don_hang; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $donhang->ngay_dat; ?></td>
                                                    <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                    <td><?php echo $donhang->phuong_thuc_thanh_toan; ?></td>
                                                    <td>
                                                        <span class='badge badge-warning'><?php echo $donhang->trang_thai; ?></span>
                                                    </td>
                                                    <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                    <td>
                                                        <form action="/admin/don-hang/in-hoa-don" method="POST">
                                                            <label>
                                                                <input name="donhang_id" value="<?php echo $donhang->id; ?>" type="text" hidden>
                                                            </label>
                                                            <button type="submit" class="btn"><i class="fa fa-print mr-1"></i></button>
                                                        </form>
                                                    </td>
                                                    <td><?php echo $donhang->id; ?></td>
                                                </tr>
                                            <?php } ?>
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
    <?php partial('includes/script.php', 'admin'); ?>
    <script>
        $(document).ready(function () {
            $("#example").DataTable();
            $("#table-dangchoxacnhan").DataTable();
            $("#table-daxacnhan").DataTable();
            $("#table-dahoanthanh").DataTable();
            $("#table-dahuy").DataTable();
        })
    </script>
</div>
</body>
</html>
