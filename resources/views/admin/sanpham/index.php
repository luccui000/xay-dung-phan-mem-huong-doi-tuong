<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php partial('partials/stylesheet.php' ); ?>
    <title>Admin</title>
    <style>
        table#example {
            padding: 0;
        }
        .btn-create {
            position: absolute;
            z-index: 999;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid transparent;
        }
    </style>
</head>
<body>
<div class="loader-wrapper">
    <div class="loader-circle">
        <div class="loader-wave"></div>
    </div>
</div>

<div class="container-fluid">
    <?php partial('partials/header.php' ); ?>
    <div class="row main-content">
        <div class="col-2 sidebar pl-0">
            <?php partial('partials/sidebar.php' ); ?>
        </div>
        <div class="col-10 content pt-3 pl-0">
            <div class="card p-2">
                <a href="/admin/san-pham/create" class="btn btn-success btn-create" style="top: 20px"> <i class="fa fa-plus mr-1"></i>Thêm mới</a>
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
                                        <img src="<?php echo $sanpham->hinh_anh; ?>" width="100" alt="">
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
<?php partial('partials/script.php'); ?>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
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
</body>
</html>
