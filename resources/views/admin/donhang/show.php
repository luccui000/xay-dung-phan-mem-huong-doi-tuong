<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sản phẩm</title>
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
                        Chi tiết đơn hàng <?php echo isset($_GET['id']) ? '#' . $_GET['id'] : ''; ?>
                    </h4>
                </div>
                <div class="main-content row">
                    <div class="col-12">
                        <div class="card px-2">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <h3 class="text-right">
                                        Hóa đơn số&nbsp;&nbsp;<?php echo isset($_GET['id']) ? '#' . $_GET['id'] : ''; ?>
                                    </h3>
                                    <hr>
                                </div>
                                <div class="container-fluid d-flex justify-content-between">
                                    <div class="col-lg-3 pl-0">
                                        <p class=" mb-2"><b>
                                            <?php echo \Luccui\Core\Session::get(\Luccui\Classes\XacThuc::SESSION_ADMIN_TEN_TAI_KHOAN) ?>
                                            </b></p>
                                        <p>126 Nguyễn Thiện Thành,<br>Phường 5,<br>Thành phố Trà Vinh.</p>
                                    </div>
                                    <div class="col-lg-3 pr-0">
                                        <p class="mb-2 text-right"><b>Hóa đơn đến</b></p>
                                        <p class="text-right">
                                            <?php echo implode(",<br>", explode(', ',$donhang->dia_chi) ); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="container-fluid d-flex justify-content-between">
                                    <div class="col-lg-3 pl-0">
                                        <p class="mb-1">Ngày lập hóa đơn : <?php echo \Carbon\Carbon::now()->toDayDateTimeString(); ?></p>
                                        <p>Ngày  han : 25th Jan 2017</p>
                                    </div>
                                </div>
                                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                    <div class="table-responsive w-100">
                                        <table class="table">
                                            <thead>
                                                <tr class="bg-dark text-white">
                                                    <th>#</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th class="text-right">Số lượng</th>
                                                    <th class="text-right">Giá</th>
                                                    <th class="text-right">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ctdh as $ct) { ?>
                                                    <tr>
                                                        <td class="text-left"><?php echo $ct->id ?></td>
                                                        <td class="text-left">
                                                            <a href="#"><?php echo $ct->ten_san_pham ?></a>
                                                        </td>
                                                        <td class="text-right"><?php echo $ct->so_luong; ?></td>
                                                        <td class="text-right"><?php echo vnmoney($ct->gia); ?></td>
                                                        <td class="text-right"><?php echo vnmoney($ct->thanh_tien); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="container-fluid mt-5 w-100">
                                    <p class="text-right mb-2">Tạm tính: <?php echo vnmoney($donhang->thanh_tien); ?></p>
                                    <p class="text-right">Phí vận chuyển : <?php echo vnmoney($donhang->phi_giao_hang); ?></p>
                                    <h4 class="text-right mb-5">Tổng tiền : <?php echo vnmoney($donhang->tong_tien); ?></h4>
                                    <hr>
                                </div>
                                <div class="container-fluid w-100">
                                    <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="fa fa-share mr-1"></i>Gửi hóa đơn</a>
                                    <form action="{! route('/admin/don-hang/in-hoa-don') !}" method="POST">
                                        <label>
                                            <input name="donhang_id" value="<?php echo $donhang->id; ?>" type="text" hidden>
                                        </label>
                                        <button type="submit" class="btn btn-success float-right mt-4"><i class="fa fa-print mr-1"></i>In hóa đơn</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php partial('includes/script.php', 'admin'); ?>
</div>
</body>
</html>
