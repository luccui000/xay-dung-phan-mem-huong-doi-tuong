<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sản phẩm</title>
    <?php partial('includes/stylesheet.php', 'admin'); ?>
    <style>
        table thead tr th:nth-child(1) {
            width: 150px;
        }
        table thead tr th:nth-child(2) {
            width: 100px;
        }
    </style>
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
                    <h3 class="page-title">
                        Sản phẩm
                    </h3>
                </div>
                <div class="row">
                    <div class="col-12 content">
                        <div class="card p-2">
                            <a href="/admin/san-pham/create" class="btn btn-success btn-create"> <i class="fa fa-plus mr-1"></i>Thêm mới</a>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <table id="example" class="table hover">
                                        <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Giá khuyến mãi</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($sanphams as $sanpham) { ?>
                                            <tr>
                                                <td><?php echo $sanpham->ma_san_pham; ?></td>
                                                <td>
                                                    <img
                                                        src="<?php echo assets($sanpham->hinh_anh); ?>"
                                                        width="100"
                                                        alt="<?php echo $sanpham->ten_san_pham; ?>">
                                                </td>
                                                <td>
                                                    <a class="text-primary" href="#">
                                                        <?php echo $sanpham->ten_san_pham; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo vnmoney($sanpham->gia_san_pham); ?>
                                                </td>
                                                <td>
                                                    <?php echo vnmoney($sanpham->gia_cuoi_cung); ?>
                                                </td>
                                                <td><?php echo $sanpham->trang_thai; ?></td>
                                                <td>

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
    <?php partial('includes/script.php', 'admin'); ?>
    <script>
        $(document).ready(function () {
            $("#example").DataTable({
                ...window.DataTableConfig,
                "columnDefs": [{
                    "targets": 1,
                    "orderable": false,
                }]
            });
        })
    </script>
</div>
</body>
</html>
