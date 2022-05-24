<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?php partial('partials/stylesheet.php' ); ?>
    <title>Admin</title>
    <style>
        table.dataTable thead th {
            padding: 5px 10px;
            background-color: #f5f5f5;
            border-bottom: 1px solid transparent;
            font-size: 13px;
            font-weight: normal;
            text-transform: uppercase;
        }
        a {
            font-weight: normal;
            font-size: 14px;
        }
        table.dataTable tbody td {
            font-weight: normal;
            font-size: 14px;
        }
        .dataTables_paginate a {
            padding: 0;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid #ccc;
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
                <table id="example" class="table hover">
                    <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng tồn kho</th>
                        <th>Giá trước khuyến mãi</th>
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
                                <a class="text-primary" href="#">
                                    <?php echo $sanpham->ten_san_pham; ?>
                                </a>
                            </td>
                            <td><?php echo $sanpham->so_luong_nhap; ?></td>
                            <td>
                                <?php echo vnmoney($sanpham->gia_truoc_khuyen_mai); ?>
                            </td>
                            <td><?php echo vnmoney($sanpham->gia_sau_khuyen_mai); ?></td>
                            <td><?php echo $sanpham->trang_thai; ?></td>
                            <td>
                                <a href="#" onclick="toggle_dropdown(this); return false" role="button" >
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown dropdown-menu-right bg-white shadow">
                                    <a href="#" class="dropdown-item cursor-pointer">
                                        <i class="fa fa-pencil text-primary"></i>
                                        <span class="ml-2">edit</span>
                                    </a>
                                    <a class="dropdown-item cursor-pointer">
                                        <i class="fa fa-trash text-danger"></i>
                                        <span class="ml-2">delete</span>
                                    </a>
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
<?php partial('partials/script.php'); ?>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#example").DataTable({
            ...window.DataTableConfig,
            "columnDefs": [{
                "targets": 6,
                "orderable": false
            }]
        });
    })
</script>
</body>
</html>
