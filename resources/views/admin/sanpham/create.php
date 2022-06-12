<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody Admin</title>
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
                        <form action="{! route('/admin/sanpham/store'); !}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card p-2">
                                                <h5>Thông tin sản phẩm</h5>
                                                <div class="line"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="ten_san_pham">Tên sản phẩm</label>
                                                            <input name="ten_san_pham" id="ten_san_pham" placeholder="Tên sản phẩm" class="form-control" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="ma_san_pham">Mã sản phẩm</label>
                                                            <input name="ma_san_pham" id="ma_san_pham" placeholder="Mã sản phẩm" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="so_luong">Số lượng</label>
                                                            <input name="so_luong" id="so_luong" placeholder="Số lương" min='1' class="form-control" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="nhacungcap_id">Nhà cung cấp</label>
                                                            <select name="nhacungcap_id" id="nhacungcap_id" class="form-control custom-select">
                                                                <?php foreach ($nhacungcaps as $nhacungcap) { ?>
                                                                    <option value="<?php echo $nhacungcap->id; ?>"><?php echo $nhacungcap->ten_nha_cung_cap; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="danhmuc_id">Nhóm hàng</label>
                                                            <select name="danhmuc_id" id="danhmuc_id" class="form-control custom-select">
                                                                <?php foreach ($danhmucs as $danhmuc) { ?>
                                                                    <option value="<?php echo $danhmuc->id; ?>"><?php echo $danhmuc->ten_danh_muc; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="mo_ta_ngan">Trích dẫn</label>
                                                            <input name="mo_ta_ngan" id="mo_ta_ngan" placeholder="Trích dẫn" class="form-control" required type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="mo_ta">Mô tả sản phẩm</label>
                                                            <textarea name="mo_ta_chi_tiet" placeholder="Mô tả sản phẩm" id="mo_ta" class="form-control" cols="30" rows="10"></textarea>
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
                                                        <label class="upload-image" for="hinhanhs_1">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_1" hidden id="hinhanhs_1">
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_2">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_2" hidden id="hinhanhs_2">
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_3">
                                                            <i class="fa fa-image"></i>
                                                            <span>Tải hình ảnh</span>
                                                            <input type="file" class="hinhanh-uploader" name="hinhanhs_3" hidden id="hinhanhs_3">
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="upload-image" for="hinhanhs_4">
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
                                                            <input class="form-control" name="gia_san_pham" required id="gia_ban" placeholder="0đ">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="gia_von">Giá khuyến mãi</label>
                                                            <input class="form-control" name="gia_cuoi_cung" id="gia_von" placeholder="0đ">
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
                                    <!--                            <div class="row mt-2">-->
                                    <!--                                <div class="col-12">-->
                                    <!--                                    <div class="card p-2">-->
                                    <!--                                        <h6>Biến thể sản phẩm</h6>-->
                                    <!--                                        <div class="line"></div>-->
                                    <!--                                        <div class="row">-->
                                    <!--                                            <div class="col-12">-->
                                    <!--                                                <div class="custom-control custom-checkbox">-->
                                    <!--                                                    <input type="checkbox" name="co_bien_the" class="custom-control-input select-collapse" id="bien_the">-->
                                    <!--                                                    <label class="custom-control-label" for="bien_the">Sản phẩm này có nhiều biến thể. Ví dụ như khác nhau về kích thước, màu sắc.</label>-->
                                    <!--                                                    <div class="multi-collapse collapse mt-2" style="">-->
                                    <!--                                                        <div class="card card-body accordion-body">-->
                                    <!--                                                            <div id="them_bien_the">-->
                                    <!--                                                                <div class="row">-->
                                    <!--                                                                    <div class="col-3">-->
                                    <!--                                                                        <div class="form-group">-->
                                    <!--                                                                            <label for="thuoctinh_key">Thuộc tính</label>-->
                                    <!--                                                                            <select name="thuoctinh_key[]" id="thuoctinh_key" class="form-control custom-select">-->
                                    <!--                                                                                --><?php //foreach ($tuychons as $tuychon) {?>
                                    <!--                                                                                    <option value="--><?php //echo $tuychon->ten_tuy_chon; ?><!--">--><?php //echo $tuychon->ten_tuy_chon; ?><!--</option>-->
                                    <!--                                                                                --><?php //} ?>
                                    <!--                                                                            </select>-->
                                    <!--                                                                        </div>-->
                                    <!--                                                                    </div>-->
                                    <!--                                                                    <div class="col-8">-->
                                    <!--                                                                        <label for="gia_tri_1" style="visibility: hidden">.</label>-->
                                    <!--                                                                        <input id="gia_tri_1" placeholder="Giá trị"  class="form-control gia-tri" type="text">-->
                                    <!--                                                                    </div>-->
                                    <!--                                                                    <div class="col-1">-->
                                    <!--                                                                        <div class="form-group">-->
                                    <!--                                                                            <label for="" style="visibility: hidden">.</label>-->
                                    <!--                                                                            <button class="btn btn-danger" type="button" onclick="xoa_thuoc_tinh(this, 1)">-->
                                    <!--                                                                                <i class="fa fa-trash"></i>-->
                                    <!--                                                                            </button>-->
                                    <!--                                                                        </div>-->
                                    <!--                                                                    </div>-->
                                    <!--                                                                </div>-->
                                    <!--                                                            </div>-->
                                    <!--                                                            <div class="row mt-2">-->
                                    <!--                                                                <div class="col-12">-->
                                    <!--                                                                    <button class="btn" id="them_gia_tri" type="button" style="border: 1px dashed #ccc; width: 166px">-->
                                    <!--                                                                        <i class="fa fa-plus"></i>-->
                                    <!--                                                                        <span>Thêm thuộc tính</span>-->
                                    <!--                                                                    </button>-->
                                    <!--                                                                </div>-->
                                    <!--                                                            </div>-->
                                    <!--                                                        </div>-->
                                    <!--                                                        <div class="row mt-2">-->
                                    <!--                                                            <div class="col-12">-->
                                    <!--                                                                <div id="xem_bien_the">-->
                                    <!--                                                                    <table class="table table-hover">-->
                                    <!--                                                                        <tbody>-->
                                    <!---->
                                    <!--                                                                        </tbody>-->
                                    <!--                                                                    </table>-->
                                    <!--                                                                </div>-->
                                    <!--                                                            </div>-->
                                    <!--                                                        </div>-->
                                    <!--                                                    </div>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                </div>-->
                                    <!--                            </div>-->
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
                                                        <input name="trang_thai" type="checkbox" class="custom-control-input" id="trang_thai">
                                                        <label class="custom-control-label cursor-pointer" for="trang_thai">Hiển thị website</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input name="la_san_pham_noi_bat" type="checkbox" class="custom-control-input" id="la_san_pham_noi_bat">
                                                        <label class="custom-control-label cursor-pointer" for="la_san_pham_noi_bat">Sản phẩm nổi bật</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input name="la_san_pham_moi" type="checkbox" class="custom-control-input" id="la_san_pham_moi">
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
    <script>
        // let suggestInput = [];
        //
        // function xoa_thuoc_tinh(event, index) {
        //     const bienThe = document.getElementById("them_bien_the");
        //     removeSuggestInput(`#gia_tri_${index}`);
        //     if(bienThe.hasChildNodes()) {
        //         bienThe.removeChild(bienThe.children[index - 1]);
        //     }
        // }
        // function addSuggestInput(className) {
        //     suggestInput.push({
        //         name: className,
        //         magicSuggest: $(className).magicSuggest()
        //     });
        // }
        // function removeSuggestInput(className) {
        //     suggestInput = suggestInput.filter(i => i.name !== className);
        //     triggerMagicSuggest(suggestInput);
        //     makeVariant(suggestInput);
        // }
        // function makeVariant(magicSuggests) {
        //     let variants = [];
        //     magicSuggests.forEach(ms => {
        //         let vr = ms.magicSuggest.getSelection().map(m => m.name);
        //         variants.push(vr);
        //     })
        //     const variantTypes = generateVariantType(variants);
        //     // console.log(variantTypes);
        //     const variantTemplate = generateVariantCode(variantTypes);
        //     // console.log(variantTemplate)
        //     $("#xem_bien_the table tbody").empty().append(variantTemplate);
        // }
        // function generateVariantType(variants) {
        //     let variantsLen = variants.length;
        //     let newVariants = [];
        //     if(variantsLen === 1) {
        //         for(let i = 0; i < variants[0].length; i++) {
        //             newVariants.push([variants[0][i]]);
        //         }
        //     } else if(variantsLen === 2) {
        //         for(let i = 0; i < variants[0].length; i++) {
        //             for(let j = 0; j < variants[1].length; j++) {
        //                 newVariants.push([
        //                     variants[0][i],
        //                     variants[1][j]
        //                 ]);
        //             }
        //         }
        //     } else if(variantsLen === 3) {
        //         for (let i = 0; i < variants[0].length; i++) {
        //             for (let j = 0; j < variants[1].length; j++) {
        //                 for (let k = 0; k < variants[2].length; k++) {
        //                     newVariants.push([
        //                         variants[0][i],
        //                         variants[1][j],
        //                         variants[2][k]
        //                     ]);
        //                 }
        //             }
        //         }
        //     }
        //     return newVariants;
        // }
        //
        // function generateVariantCode(variants) {
        //     let template = "";
        //     variants.forEach(curr => {
        //         console.log(curr.length)
        //         template += `
        //             <tr class="d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #ccc" >
        //                 <td>
        //                     ${ curr.join("/") }
        //                     <input name="gia_tri[]" value="${ curr.join("_") }" hidden type="text">
        //                 </td>
        //
        //                 <td class="d-flex align-items-center">
        //                     <div class="d-flex flex-column mr-3 text-right">
        //                         <p><small>Giá: <span id="gia_${ curr.join("_") }">0đ</span></small></p>
        //                         <p><small>Số lượng nhập: <span id="soluongnhap_${ curr.join("_") }">0</span></small></p>
        //                     </div>
        //                     <div>
        //                         <button type="button" class="btn btn-primary-outline btn-sm" data-toggle="modal" data-target="#modal_${curr.map(e => e.toLowerCase()).join("_")}"><i class="fa fa-pencil"></i></button>
        //                     </div>
        //                     <div class="modal fade" id="modal_${curr.map(e => e.toLowerCase()).join("_")}" role="dialog" tabindex="-1" >
        //                         <div class="modal-dialog" role="document">
        //                             <div class="modal-content">
        //                                 <div class="modal-body">
        //                                     <h6>Chỉnh sửa ${ curr.join("/") }</h6>
        //                                     <div class="line"></div>
        //                                     <div class="form-group">
        //                                         <label for="">Giá vốn</label>
        //                                         <input id="gia_input_${ curr.join("_") }" class="form-control" name="bien_the[${ curr.join("_") }][]" value="0" type="text" >
        //                                     </div>
        //                                     <div class="form-group">
        //                                         <label for="">Giá khuyến mãi</label>
        //                                         <input id="gia_input_${ curr.join("_") }" class="form-control" name="bien_the[${ curr.join("_") }][]" value="0" type="text" >
        //                                     </div>
        //                                     <div class="form-group">
        //                                         <label for="">Số lượng nhập</label>
        //                                         <input id="soluongnhap_input_${ curr.join("_") }" class="form-control" name="bien_the[${ curr.join("_") }][]" value="0" type="text" >
        //                                     </div>
        //                                     <button type="button" onclick="updatePrice(this, '${ curr.join("_") }')" class="btn btn-primary" id="luu_gia">Lưu</button>
        //                                 </div>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </td>
        //             </tr>
        //         `
        //     });
        //     return template;
        // }
        // function updatePrice(that, id) {
        //     let gia = $("#gia_input_" + id).val();
        //     let soluongnhap = $("#soluongnhap_input_" + id).val();
        //     gia = window.vietnam_money_format(gia)
        //     $("#gia_" + id).text(gia);
        //     $("#soluongnhap_" + id).text(soluongnhap);
        // }
        // function triggerMagicSuggest(magicSuggests) {
        //     magicSuggests.forEach(ms => {
        //         $(ms.magicSuggest).on('selectionchange', function() {
        //             makeVariant(magicSuggests);
        //         })
        //     })
        // }
        $(document).ready(function () {
            // const themBienThe = $("#them_bien_the");
            // addSuggestInput('#gia_tri_1');
            // triggerMagicSuggest(suggestInput);
            //
            // $("#them_gia_tri").click(function() {
            //     const totalItem = themBienThe.children('.row').length;
            //     if(totalItem > 2)
            //         return;
            //     const bienThe = `
            //         <div class="row">
            //             <div class="col-3">
            //                 <div class="form-group">
            //                     <label for="thuoctinh_key">Thuộc tính</label>
            //                     <select name="thuoctinh_key[]" id="thuoctinh_key" class="form-control custom-select">
//                                    <?php //foreach ($tuychons as $tuychon) {?>
//                                        <option value="<?php //echo $tuychon->ten_tuy_chon; ?>//"><?php //echo $tuychon->ten_tuy_chon; ?>//</option>
//                                    <?php //} ?>
//                                 </select>
//                             </div>
//                         </div>
//                         <div class="col-8">
//                             <label for="" style="visibility: hidden">.</label>
//                             <input id="gia_tri_${totalItem + 1}" placeholder="Giá trị"  class="form-control gia-tri" type="text">
//                         </div>
//                         <div class="col-1">
//                             <div class="form-group">
//                                 <label for="" style="visibility: hidden">.</label>
//                                 <button class="btn btn-danger" onclick="xoa_thuoc_tinh(this, ${totalItem + 1})">
//                                     <i class="fa fa-trash"></i>
//                                 </button>
//                             </div>
//                         </div>
//                     </div>
//                 `;
//                 themBienThe.append(bienThe);
//                 addSuggestInput(`#gia_tri_${totalItem + 1}`);
//                 triggerMagicSuggest(suggestInput);
//             })
        })
    </script>
</div>
</body>
</html>
