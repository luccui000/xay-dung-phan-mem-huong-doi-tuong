<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="#" type="image/x-icon">
    <?php partial('partials/stylesheet.php' ); ?>
    <link rel="stylesheet" href="{! assets('public/dist/magicsuggest/magicsuggest.css'); !}">
    <title>Admin</title>
    <style>
        h6 {
            margin-bottom: 0;
        }
        .upload-image {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 20px 10px;
            border: 1px dashed #ccc;
        }
        #form_khoi_luong {
            position: relative;
        }
        #span_khoi_luong {
            position: absolute;
            top: 35px;
            right: calc(50% + 10px);
            color: #ccc;
            transition: color .3s linear;
        }
        #khoi_luong:focus ~ #span_khoi_luong {
            color: #80bdff;
        }
        .select-collapse:checked ~ .collapse {
            display: block;
        }
    </style>
</head>
<body>
    <?php partial('partials/preloader.php' ); ?>
    <div class="container-fluid">
        <?php partial('partials/header.php' ); ?>
        <div class="row main-content">
            <div class="col-2 sidebar pl-0">
                <?php partial('partials/sidebar.php' ); ?>
            </div>
            <div class="col-10 content pt-3 pl-0">
                <h5>Tạo sản phẩm</h5>
                <form action="{! route('admin/sanpham/store'); !}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="ten_san_pham">Tên sản phẩm</label>
                                                    <input name="ten_san_pham" id="ten_san_pham" placeholder="Tên sản phẩm" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nhacungcap_id">Nhà cung cấp</label>
                                                    <select name="nhacungcap_id" id="nhacungcap_id" class="form-control custom-select">
                                                        <option>1</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="danhmuc_id">Nhóm hàng</label>
                                                    <select name="danhmuc_id" id="danhmuc_id" class="form-control custom-select">
                                                        <option>1</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="mo_ta">Mô tả sản phẩm</label>
                                                    <textarea name="mo_ta" placeholder="Mô tả sản phẩm" id="mo_ta" class="form-control" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="mo_ta_ngan">Trích dẫn</label>
                                                    <input name="mo_ta_ngan" id="mo_ta_ngan" placeholder="Trích dẫn" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h6>Hình ảnh sản phẩm</h6>
                                        <div class="line"></div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="upload-image">
                                                    <i class="fa fa-image"></i>
                                                    <label for="hinhanhs_1">Tải hình ảnh</label>
                                                    <input type="file" name="hinhanhs[]" hidden id="hinhanhs_1">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="upload-image">
                                                    <i class="fa fa-image"></i>
                                                    <label for="hinhanhs_2">Tải hình ảnh</label>
                                                    <input type="file" name="hinhanhs[]" hidden id="hinhanhs_2">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="upload-image">
                                                    <i class="fa fa-image"></i>
                                                    <label for="hinhanhs_3">Tải hình ảnh</label>
                                                    <input type="file" name="hinhanhs[]" hidden id="hinhanhs_3">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="upload-image">
                                                    <i class="fa fa-image"></i>
                                                    <label for="hinhanhs_4">Tải hình ảnh</label>
                                                    <input type="file" name="hinhanhs[]" hidden id="hinhanhs_4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h6>Giá sản phẩm</h6>
                                        <div class="line"></div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="gia_ban">Giá bán</label>
                                                    <input class="form-control" name="gia_ban" id="gia_ban" placeholder="0đ">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="gia_von">Giá vốn</label>
                                                    <input class="form-control" name="gia_von" id="gia_von" placeholder="0đ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h6>Vận chuyển</h6>
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
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h6>Biến thể sản phẩm</h6>
                                        <div class="line"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input select-collapse" name="bien_the" id="bien_the">
                                                    <label class="custom-control-label" for="bien_the">Sản phẩm này có nhiều biến thể. Ví dụ như khác nhau về kích thước, màu sắc.</label>
                                                    <div class="multi-collapse collapse mt-2" style="">
                                                        <div class="card card-body accordion-body">
                                                            <div id="them_bien_the">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <div class="form-group">
                                                                            <label for="thuoctinh_id">Thuộc tính</label>
                                                                            <select name="thuoctinh_id[]" id="thuoctinh_id" class="form-control custom-select">
                                                                                <option value="Màu sắc">Màu sắc</option>
                                                                                <option value="Kích thước">Kích thước</option>
                                                                                <option value="Tiêu đề">Tiêu đề</option>
                                                                                <option value="Kiểu dáng">Kiểu dáng</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <label for="gia_tri_1" style="visibility: hidden">.</label>
                                                                        <input name="thuoctinh_id[][]" id="gia_tri_1" placeholder="Giá trị"  class="form-control gia-tri" type="text">
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <div class="form-group">
                                                                            <label for="" style="visibility: hidden">.</label>
                                                                            <button class="btn btn-danger" type="button" onclick="xoa_thuoc_tinh(this, 1)">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-12">
                                                                    <button class="btn" id="them_gia_tri" type="button" style="border: 1px dashed #ccc; width: 166px">
                                                                        <i class="fa fa-plus"></i>
                                                                        <span>Thêm thuộc tính</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <div id="xem_bien_the">
                                                                    <table class="table table-hover">
                                                                        <tbody>

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
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h6>Hiển thị</h6>
                                        <div class="line"></div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="hien_thi">
                                            <label class="custom-control-label" for="hien_thi">Website</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card p-2">
                                        <h6>Hiển thị</h6>
                                        <div class="line"></div>
                                        <div>
                                            <button class="btn btn-success" style="width: 100px">Lưu</button>
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
    <?php partial('partials/script.php' ); ?>
    <script src="{! assets('public/dist/magicsuggest/magicsuggest.js'); !}"></script>
    <script>
        let suggestInput = [];

        function xoa_thuoc_tinh(event, index) {
            console.log(event)
            const bienThe = document.getElementById("them_bien_the");
            removeSuggestInput(`#gia_tri_${index}`);
            if(bienThe.hasChildNodes()) {
                bienThe.removeChild(bienThe.children[index - 1]);
            }
        }
        function addSuggestInput(className) {
            suggestInput.push({
                name: className,
                magicSuggest: $(className).magicSuggest()
            });
        }
        function removeSuggestInput(className) {
            suggestInput = suggestInput.filter(i => i.name !== className);
            triggerMagicSuggest(suggestInput);
            makeVariant(suggestInput);
        }
        function makeVariant(magicSuggests) {
            let variants = [];
            magicSuggests.forEach(ms => {
                let vr = ms.magicSuggest.getSelection().map(m => m.name);
                variants.push(vr);
            })
            const variantTypes = generateVariantType(variants);
            console.log(variantTypes);
            const variantTemplate = generateVariantCode(variantTypes);
            console.log(variantTemplate)
            $("#xem_bien_the table tbody").empty().append(variantTemplate);
        }
        function generateVariantType(variants) {
            let variantsLen = variants.length;
            let newVariants = [];
            if(variantsLen === 1) {
                for(let i = 0; i < variants[0].length; i++) {
                    newVariants.push([variants[0][i]]);
                }
            } else if(variantsLen === 2) {
                for(let i = 0; i < variants[0].length; i++) {
                    for(let j = 0; j < variants[1].length; j++) {
                        newVariants.push([
                            variants[0][i],
                            variants[1][j]
                        ]);
                    }
                }
            } else if(variantsLen === 3) {
                for (let i = 0; i < variants[0].length; i++) {
                    for (let j = 0; j < variants[1].length; j++) {
                        for (let k = 0; k < variants[2].length; k++) {
                            newVariants.push([
                                variants[0][i],
                                variants[1][j],
                                variants[2][k]
                            ]);
                        }
                    }
                }
            }
            return newVariants;
        }

        function generateVariantCode(variants) {
            let template = "";
            variants.forEach(curr => {
                console.log(curr.length)
                template += `
                    <tr class="d-flex justify-content-between" style="border-bottom: 1px solid #ccc" >
                        <td>${ curr.join("/") }</td>
                        <td>
                            0đ
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_${curr.map(e => e.toLowerCase()).join("_")}">edits</button>
                            <div class="modal  fade" id="modal_${curr.map(e => e.toLowerCase()).join("_")}" role="dialog" tabindex="-1" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h6>Chỉnh sửa ${ curr.join("/") }</h6>
                                            <div class="line"></div>
                                            <div class="form-group">
                                                <label for="">Giá bán</label>
                                                <input type="hidden" name="ten_bien_the[]" value="${curr.join("/")}" >
                                                <input id="value_${ curr.join("/") }" class="form-control" name="gia_tri_bien_the[]" value="0" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                `
            });
            return template;
        }
        function triggerMagicSuggest(magicSuggests) {
            magicSuggests.forEach(ms => {
                $(ms.magicSuggest).on('selectionchange', function() {
                    makeVariant(magicSuggests);
                })
            })
        }
        $(document).ready(function () {
            const themBienThe = $("#them_bien_the");
            addSuggestInput('#gia_tri_1');
            triggerMagicSuggest(suggestInput);

            $("#them_gia_tri").click(function() {
                const totalItem = themBienThe.children('.row').length;
                if(totalItem > 2)
                    return;
                const bienThe = `
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="thuoctinh_id">Thuộc tính</label>
                                <select name="thuoctinh_id[][]" id="thuoctinh_id" class="form-control custom-select">
                                    <option>Màu sắc</option>
                                    <option>Kích thước</option>
                                    <option>Tiêu đề</option>
                                    <option>Kiểu dáng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="" style="visibility: hidden">.</label>
                            <input name="gia_tri" id="gia_tri_${totalItem + 1}" placeholder="Giá trị"  class="form-control gia-tri" type="text">
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="" style="visibility: hidden">.</label>
                                <button class="btn btn-danger" onclick="xoa_thuoc_tinh(this, ${totalItem + 1})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                themBienThe.append(bienThe);
                addSuggestInput(`#gia_tri_${totalItem + 1}`);
                triggerMagicSuggest(suggestInput);
            })
        })
    </script>
</body>
</html>
