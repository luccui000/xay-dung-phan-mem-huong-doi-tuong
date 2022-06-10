<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{! assets('public/client/images/icons/browserconfig.xml'); !}">
    <meta name="theme-color" content="#ffffff">
    <?php partial('includes/stylesheet.php', 'client'); ?>
</head>
<body>
<div class="page-wrapper">
    <?php partial('includes/header.php', 'client'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('<?php echo assets('public/client/images/page-header-bg.jpg'); ?>')">
            <div class="container">
                <h1 class="page-title">Trang thanh toán</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Bạn có mã giảm giá? <span>Nhấn vào đây để điền mã giảm giá</span></label>
                        </form>
                    </div>
                    <form action="/san-pham/thanh-toan" method="post">
                        <div class="row">
                            <div class="col-lg-9">
                                <?php
                                    if(\Luccui\Core\Session::has(\Luccui\Classes\XacThuc::SESSION_DA_DANG_NHAP)) {
                                        $taikhoan_id = \Luccui\Core\Session::get(\Luccui\Classes\XacThuc::SESSION_ID_TAI_KHOAN);
                                        $taikhoan = \Luccui\Models\TaiKhoan::where('id', '=', $taikhoan_id)->first();
//                                        var_dump($taikhoan);
                                        function fillIfExist($taikhoan, $field) {
                                            if($taikhoan) {
                                               echo $taikhoan->$field;
                                            }
                                        }
                                    }
                                ?>
                                <h2 class="checkout-title">Chi tiết hóa đơn</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="ho_khach_hang">Họ *</label>
                                        <input value="<?php fillIfExist($taikhoan, 'ho'); ?>" name="ho_khach_hang" id="ho_khach_hang" type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Tên *</label>
                                        <input value="<?php fillIfExist($taikhoan, 'ten'); ?>" name="ten_khach_hang" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Tên công ty (Không bắt buộc)</label>
                                            <input value="<?php fillIfExist($taikhoan, 'ten_cong_ty'); ?>" name="ten_cong_ty" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Địa chỉ chi tiết *</label>
                                            <input value="<?php fillIfExist($taikhoan, 'dia_chi'); ?>" name="dia_chi" type="text" class="form-control" placeholder="Số nhà tên đường địa chỉ nhà" required>
                                        </div>
                                    </div>
                                </div>
<!--                                <input type="text" class="form-control" placeholder="Văn phòng, công ty ..." required>-->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="ma_tinh">Tỉnh / Thành phố *</label>
                                        <select name="ma_tinh" id="ma_tinh" class="form-control"  required>
                                            <?php foreach ($tinhs as $tinh) {?>
                                                <option value="<?php echo $tinh['id']; ?>"><?php echo $tinh['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="ma_huyen">Quận / Huyện *</label>
                                        <select name="ma_huyen" id="ma_huyen" class="form-control"  required>

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="ma_xa">Xã *</label>
                                        <select name="ma_xa" id="ma_xa" class="form-control" required>

                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Số điện thoại *</label>
                                        <input value="<?php fillIfExist($taikhoan, 'so_dien_thoai'); ?>" name="so_dien_thoai" type="tel" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Địa chỉ email *</label>
                                            <input value="<?php fillIfExist($taikhoan, 'email'); ?>" name="email" type="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

<!--                                <div class="custom-control custom-checkbox">-->
<!--                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">-->
<!--                                    <label class="custom-control-label" for="checkout-create-acc">Đăng ký tài khoản?</label>-->
<!--                                </div>-->
<!---->
<!--                                <div class="custom-control custom-checkbox">-->
<!--                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">-->
<!--                                    <label class="custom-control-label" for="checkout-diff-address">Thêm địa chỉ mới?</label>-->
<!--                                </div>-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Ghi chú giao hàng (không bắt buộc)</label>
                                            <textarea name="ghi_chu" class="form-control" cols="30" rows="4" placeholder="Ghi chú chi tiết nội dung mà khách hàng yêu cầu,.."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Chi tiết đơn hàng</h3>
                                    <?php $cart = resolve(\Luccui\Classes\Cart::class)->getItems(); ?>
                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($cart as $items) {?>
                                                <?php foreach ($items as $item) {?>
                                                    <tr>
                                                        <td><a href="#"><?php echo $item['attributes']['ten_san_pham']; ?></a></td>
                                                        <td><?php echo vnmoney($item['attributes']['gia_cuoi_cung']); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>

                                            <tr class="summary-subtotal">
                                                <td>Tạm tính:</td>
                                                <td><?php echo vnmoney(resolve(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung')); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phí giao hàng:</td>
                                                <td>
                                                    <input type="text" hidden name="phi_giao_hang" >
                                                    <span id="phi_giao_hang">Miễn phí</span>
                                                </td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Thành tiền:</td>
                                                <td>
                                                    <input name="thanh_tien" hidden type="text" value="<?php echo resolve(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung'); ?>">
                                                    <span id="thanh_tien"><?php echo vnmoney(resolve(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung')); ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title thanhtoan">
                                                    <input value="nhanhang" id="tt_khi_nhan_hang" name="phuong_thuc_thanh_toan" type="radio">
                                                    <label for="tt_khi_nhan_hang" data-toggle="collapse" href="#collapse-1">
                                                        Thanh toán khi nhận hàng
                                                    </label>
                                                </h2>
                                            </div>
                                            <div id="collapse-1" class="collapse" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Sau khi thanh toán khách hàng có thể kiểm tra tình trạng máy sau đó thanh toán với nhân viên giao hàng
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title thanhtoan">
                                                    <input value="online" id="tt_online" name="phuong_thuc_thanh_toan" type="radio">
                                                    <label for="tt_online" data-toggle="collapse" href="#collapse-4">
                                                        Thanh toán online qua VNPay
                                                    </label>
                                                </h2>
                                            </div>
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    VNPAY ứng dụng công nghệ hiện đại, đột phá trong lĩnh vực thanh toán điện tử nhằm xây dựng hệ sinh thái dịch vụ đa dạng về sản phẩm, tiện ích, mang tới những trải nghiệm dịch vụ ưu việt phục vụ khách hàng và đối tác.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Đặt hàng</span>
                                        <span class="btn-hover-text">Tiến hành  hang</span>
                                    </button>
                                </div>
                            </aside>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php partial('includes/footer.php', 'client'); ?>
</div>
<?php partial('includes/script.php', 'client'); ?>
<script>


    document.addEventListener("DOMContentLoaded", function() {
        const { danhSachHuyen, danhSachXa, tinhPhi } = HDTShop.apis;
        const { VNDFormat } = HDTShop.utils;
        $("#ma_tinh").on("change", function () {
            const maTinh = $("#ma_tinh option:selected").val();
            danhSachHuyen(maTinh).then(response => {
                const { data } = JSON.parse(response);
                const optionHuyen = data.map(huyen => {
                    return `<option value="${huyen.id}">${huyen.name}</option>`;
                })
                $("#ma_xa").empty();
                $("#ma_huyen").empty().append(optionHuyen);
            })
        })
        $("#ma_huyen").on("change", function() {
            const maHuyen = $("#ma_huyen option:selected").val();

            danhSachXa(maHuyen).then(response => {
                const { data } = JSON.parse(response);
                const optionXa = data.map(xa => {
                    return `<option value="${xa.id}">${xa.name}</option>`;
                })
                $("#ma_xa").empty().append(optionXa);
            })
        });
        $("#ma_xa").on("change", function() {
            const maXa = $("#ma_xa").val();
            const maHuyen = $("#ma_huyen").val();

            tinhPhi(maXa, maHuyen).then(response => {
                const { total } = JSON.parse(response);

                $("input[name=phi_giao_hang]").val(total);
                $("#phi_giao_hang").text(VNDFormat(total));

                const inpThanhTien = $("input[name=thanh_tien]").val();

                $("#thanh_tien").text(VNDFormat(+inpThanhTien + total));

                HDTShop.MyLocalStorage.add(HDTShop.global.DIA_CHI, {
                    maTinh: $("#ma_tinh").val(),
                    maHuyen: $("#ma_huyen").val(),
                    maXa: $("#ma_xa").val()
                });
            })
        })
    })
</script>
</body>
</html>


