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
                        Danh sách danh mục
                    </h4>
                </div>
                <div class="main-content row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-success mb-2">Thêm mới</button>
                                <ul class="list-group">
                                    <?php foreach ($danhmucs as $danhmuc) { ?>
                                        <li class="list-group-item">
                                            <img class="img-thumbnail mr-2" src="<?php echo assets($danhmuc->hinh_anh) ?>" width="30" height="30" />
                                            <a href="/admin/danh-muc?id=<?php echo $danhmuc->id; ?>">
                                                <?php echo $danhmuc->ten_danh_muc; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="/admin/danh-muc" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="ten_danh_muc">Tên danh mục <span class="text-danger">*</span></label>
                                        <input name="ten_danh_muc"  class="form-control" id="ten_danh_muc" />
                                    </div>
                                    <div class="form-group">
                                        <label for="thu_tu">Thứ tự </label>
                                        <input name="thu_tu" type="number" class="form-control" id="thu_tu" />
                                    </div>
                                    <div class="form-group">
                                        <label for="hinh_anh">Hình ảnh</label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input name="hinh_anh" type="file" class="custom-file-input" id="hinh_anh">
                                                <label class="custom-file-label" for="hinh_anh">Chọn hình ảnh</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="preview">
                                        <img src="" alt="">
                                    </div>
                                    <div class="form-group ml-3">
                                        <div class="form-check">
                                            <input name="noi_bat" value="1" class="form-check-input" type="checkbox" id="noi_bat">
                                            <label class="form-check-label" for="noi_bat">
                                                Danh mục nổi bật
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                                </form>
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
            $("#hinh_anh").on("change", function(e) {
                const fileReader = new FileReader();
                const fileSource = e.target.files[0];
                fileReader.onload = function () {
                    $("#preview img").attr('src', fileReader.result).css({
                        'width': '100px',
                        'height': '100px',
                        'object-fit': 'cover',
                        'object-position': 'center'
                    });
                }
                fileReader.readAsDataURL(fileSource)
            })

            const { toastSuccess, toastError } = HDTShop.toast;
            const {  handleHinhanhUpload } = HDTShop.sanpham
            <?php
                if(has_session('success')) {
                    echo "toastSuccess('Thành công', '" . get_session('success'). "')";
                    remove_session('success');
                }
            ?>
            <?php
            if(has_session('error')) {
                echo "toastSuccess('Thất bại', '" . get_session('error'). "')";
                remove_session('error');
            }
            ?>
        })
    </script>
</div>
</body>
</html>
