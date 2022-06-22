<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cập nhật sản phẩm</title>
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
                    <h3 class="page-title">
                        Thêm mới sản phẩm
                    </h3>
                </div>
                <div class="row">
                    <div class="col-12 content">
                        <form action="{! route('/admin/sanpham/update'); !}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Thông tin sản phẩm</h5>
                                                <div class="line"></div>
                                                <label>
                                                    <input value="<?php if(isset($sanpham)) echo $sanpham->id;  ?>" name="id" class="form-control" type="text" hidden >
                                                </label>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="ten_san_pham">Tên sản phẩm</label>
                                                            <input value="<?php if(isset($sanpham)) echo $sanpham->ten_san_pham;  ?>" name="ten_san_pham" id="ten_san_pham" placeholder="Tên sản phẩm" class="form-control" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="ma_san_pham">Mã sản phẩm</label>
                                                            <input value="<?php if(isset($sanpham)) echo $sanpham->ma_san_pham;  ?>" name="ma_san_pham" id="ma_san_pham" placeholder="Mã sản phẩm" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="so_luong">Số lượng</label>
                                                            <input value="<?php if(isset($sanpham)) echo $sanpham->so_luong;  ?>" name="so_luong" id="so_luong" placeholder="Số lương" min='1' class="form-control" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="nhacungcap_id">Nhà cung cấp</label>
                                                            <select name="nhacungcap_id" id="nhacungcap_id" class="form-control custom-select">
                                                                <?php foreach ($nhacungcaps as $nhacungcap) { ?>
                                                                    <option <?php if(isset($sanpham) && $sanpham->nhacungcap_id == $nhacungcap->id) echo 'selected';  ?> value="<?php echo $nhacungcap->id; ?>"><?php echo $nhacungcap->ten_nha_cung_cap; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="danhmuc_id">Nhóm hàng</label>
                                                            <select name="danhmuc_id" id="danhmuc_id" class="form-control custom-select">
                                                                <?php foreach ($danhmucs as $danhmuc) { ?>
                                                                    <option <?php if(isset($sanpham) && $sanpham->danhmuc_id == $danhmuc->id) echo 'selected';  ?> value="<?php echo $danhmuc->id; ?>"><?php echo $danhmuc->ten_danh_muc; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="mo_ta_ngan">Trích dẫn</label>
                                                            <input value="<?php if(isset($sanpham)) echo $sanpham->mo_ta_ngan;  ?>" name="mo_ta_ngan" id="mo_ta_ngan" placeholder="Trích dẫn" class="form-control" required type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="mo_ta">Mô tả sản phẩm</label>
                                                            <textarea name="mo_ta_chi_tiet" placeholder="Mô tả sản phẩm" id="mo_ta" class="form-control" cols="30" rows="10"><?php if(isset($sanpham)) echo $sanpham->mo_ta_chi_tiet;  ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Hình ảnh sản phẩm</h5>
                                                <div class="line"></div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_1" style="background-image: url(<?php if(isset($hinhanhs) && isset($hinhanhs[0])) echo assets($hinhanhs[0]['duong_dan']);  ?>)">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_1" hidden id="hinhanhs_1">
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_2" style="background-image: url(<?php if(isset($hinhanhs) && isset($hinhanhs[1])) echo assets($hinhanhs[1]['duong_dan']);  ?>)">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_2" hidden id="hinhanhs_2">
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_3" style="background-image: url(<?php if(isset($hinhanhs) && isset($hinhanhs[2])) echo assets($hinhanhs[2]['duong_dan']);  ?>)">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_3" hidden id="hinhanhs_3">
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_4" style="background-image: url(<?php if(isset($hinhanhs) && isset($hinhanhs[3])) echo assets($hinhanhs[3]['duong_dan']);  ?>)">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_4" hidden id="hinhanhs_4">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Giá sản phẩm</h5>
                                                <div class="line"></div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="gia_ban">Giá sản phẩm</label>
                                                            <input value="<?php if(isset($sanpham)) echo vnmoney($sanpham->gia_san_pham); ?>" class="form-control" name="gia_san_pham" required id="gia_ban" placeholder="0đ">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="gia_von">Giá khuyến mãi</label>
                                                            <input value="<?php if(isset($sanpham)) echo vnmoney($sanpham->gia_cuoi_cung); ?>" class="form-control" name="gia_cuoi_cung" id="gia_von" placeholder="0đ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Vận chuyển</h5>
                                                <div class="line"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input select-collapse" name="cho_phep_giao_hang" id="cho_phep_giao_hang">
                                                            <label class="custom-control-label" for="cho_phep_giao_hang">Chọn để cho phép giao hàng với sản phẩm này</label>
                                                            <div class="multi-collapse collapse mt-2" id="vanchuyen" >
                                                                <div class="card card-body accordion-body">
                                                                    <div class="form-group" id="form_khoi_luong">
                                                                        <label for="khoi_luong">Khối lượng</label>
                                                                        <input name="khoi_luong" class="form-control w-50" id="khoi_luong" placeholder="0" type="text">
                                                                        <span id="span_khoi_luong">grams</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Hiển thị</h5>
                                                <div class="line"></div>
                                                <div>
                                                    <button class="btn btn-success" style="width: 100px">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Chọn </h5>
                                                <div class="line"></div>
                                                <div class="ml-2">
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input <?php if(isset($sanpham) && $sanpham->la_san_pham_moi) echo 'checked'; ?> name="trang_thai" type="checkbox" class="custom-control-input" id="trang_thai">
                                                        <label class="custom-control-label cursor-pointer" for="trang_thai">Hiển thị website</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input <?php if(isset($sanpham) && $sanpham->la_san_pham_noi_bat) echo 'checked'; ?> name="la_san_pham_noi_bat" type="checkbox" class="custom-control-input" id="la_san_pham_noi_bat">
                                                        <label class="custom-control-label cursor-pointer" for="la_san_pham_noi_bat">Sản phẩm nổi bật</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input <?php if(isset($sanpham) && $sanpham->la_san_pham_moi) echo 'checked'; ?> name="la_san_pham_moi" type="checkbox" class="custom-control-input" id="la_san_pham_moi">
                                                        <label class="custom-control-label cursor-pointer" for="la_san_pham_moi">Sản phẩm mới</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php partial('includes/script.php', 'admin'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            const editor = document.querySelector('#mo_ta');
            const hinhanhUploader = document.querySelectorAll(".hinhanh-uploader");
            const { handleHinhanhUpload } = HDTShop.sanpham;

            handleHinhanhUpload(hinhanhUploader);
            ClassicEditor
                .create(editor, {
                    ckfinder: {
                        uploadUrl: "/api/upload"
                    }
                })
                .then(editor => console.log("editor:::", editor))
                .catch(error => console.log(error))
        })
    </script>
</div>
</body>
</html>
