<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh sách bài viết</title>
    <?php partial('includes/stylesheet.php', 'admin'); ?>
    <style>
        table thead tr th:nth-child(1) {
            width: 100px;
        }
        table thead tr th:nth-child(2) {
            width: 500px;
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
                        Danh sách bài viết
                    </h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card p-2">
                            <a href="/admin/bai-viet/them-moi" class="btn btn-success btn-create"> <i class="fa fa-plus mr-1"></i>Thêm mới</a>
                            <table id="baiviet" class="table table-hover mt-2" >
                                <thead>
                                    <tr>
                                        <th class="text-center">Trạng thái</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Ngày tạo</th>
                                        <th class="text-center">Lượt xem</th>
                                        <th>ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($baiviets as $baiviet) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <input
                                                    <?php echo ($baiviet->trang_thai == \Luccui\Models\BaiViet::CONG_BO) ? "checked" : "";  ?>
                                                    type="checkbox" class="form-control">
                                            </td>
                                            <td>
                                                <a href="/admin/bai-viet/sua?id=<?php echo $baiviet->id; ?>">
                                                    <?php echo $baiviet->tieu_de; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $baiviet->nguoi_tao->ho . ' ' .$baiviet->nguoi_tao->ten; ?>
                                            </td>
                                            <td>
                                                <?php echo $baiviet->ngay_tao; ?>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-primary">
                                                    <?php echo $baiviet->luot_xem; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php echo $baiviet->id; ?>
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
    <?php partial('includes/script.php', 'admin'); ?>
    <script>
        $(document).ready(function () {
            $("#baiviet").DataTable();
        })
    </script>
</div>
</body>
</html>
