<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sửa bài viết <?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?></title>
    <?php partial('includes/stylesheet.php', 'admin'); ?>
    <style>
        label[for=hinh_anh] {
            border: 1px dashed #ccc;
            height: 200px;
            position: relative;
            cursor: pointer;
        }
        label[for=hinh_anh] i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
            background-color: #333333;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
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
                         Sửa bài viết <?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>
                    </h3>
                </div>
                <form action="/admin/bai-viet/cap-nhat?id=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-9">
                            <div class="card p-2">
                                <h5>
                                    <a href="/admin/bai-viet"><i class="fa fa-arrow-left mr-2 "></i></a>
                                    Nội dung bài viết
                                </h5>
                                <div class="line"></div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="tieu_de">Tiêu đề bài viết</label>
                                        <input value="<?php echo $baiviet->tieu_de; ?>" name="tieu_de" id="tieu_de" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="noi_dung">Nội dung</label>
                                        <textarea name="noi_dung" id="noi_dung" class="form-control" cols="30" rows="10"><?php echo $baiviet->noi_dung; ?></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h5>Hành động</h5>
                                        <div class="line"></div>
                                        <label>
                                            <input  name="nguoi_tao" hidden value="<?php echo get_session(\Luccui\Classes\XacThuc::SESSION_ADMIN_ID_TAI_KHOAN); ?>">
                                        </label>
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h5>Danh mục</h5>
                                        <div class="line"></div>
                                        <label>
                                            <select name="danhmuc_id" class="form-control" >
                                                <?php foreach ($danhmucs as $danhmuc) { ?>
                                                    <option value="<?php echo $danhmuc->id ?>">
                                                        <?php echo $danhmuc->ten_danh_muc ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h5>Hình ảnh bìa</h5>
                                        <div class="line"></div>
                                        <label for="hinh_anh" id="lbl_hinh_anh">
                                            <i class="fa fa-plus"></i>
                                        </label>
                                        <input name="hinh_anh" type="file" class="hinh-anh" id="hinh_anh" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php partial('includes/script.php', 'admin'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        function createEditor(editor) {
            ClassicEditor
                .create(editor, {
                    ckfinder: {
                        uploadUrl: "/api/upload"
                    }
                }).then(editor => {
                console.log(editor)
            })
        }
        $(document).ready(function() {
            const { toastError } = HDTShop.toast;
            createEditor(document.getElementById('noi_dung'));
            $("#hinh_anh").on("change", function(event) {
                const reader = new FileReader();
                reader.onload = function () {
                    $("#lbl_hinh_anh").css({
                        "background-image":   `url(${reader.result})`
                    })
                }
                reader.readAsDataURL(event.target.files[0]);
            })

            <?php
            if(has_session('error')) {
                echo "toastError('Thất bại', '" . get_session('error') ."')";
                remove_session('error');
            }
            ?>
        })
    </script>
</div>
</body>
</html>
