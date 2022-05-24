<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php partial('partials/stylesheet.php'); ?>
    <title>Admin</title>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button .current,
        .dataTables_wrapper .dataTables_paginate .paginate_button .current:hover {
            background-color: #ccc;
            border: 1px solid transparent !important;
            border-radius: 10px;
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
    <?php partial('partials/header.php'); ?>
    <div class="row main-content">
        <div class="col-2 sidebar pl-0">
            <?php partial('partials/sidebar.php'); ?>
        </div>
        <div class="col-10 content pt-3 pl-0">
            <div class="card p-2">
                <div class="row">
                    <div class="col-12">
                        <table id="example" class="table hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tên nhà cung cấp</th>
                                    <th>Tên liên hệ</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th style="width: 20px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nhacungcaps as $nhacungcap) { ?>
                                    <tr>
                                        <td><?php echo $nhacungcap->ten_nha_cung_cap ?></td>
                                        <td><?php echo $nhacungcap->ten_lien_he ?></td>
                                        <td><?php echo $nhacungcap->so_dien_thoai ?></td>
                                        <td><?php echo $nhacungcap->dia_chi ?></td>
                                        <td><?php echo $nhacungcap->email ?></td>
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
    </div>
</div>
<?php partial('partials/script.php'); ?>
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
