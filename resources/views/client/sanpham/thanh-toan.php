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
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Chi tiết hóa đơn</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Họ *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Tên *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>

                                <label>Tên công ty (Không bắt buộc)</label>
                                <input type="text" class="form-control">

                                <label>Thành phố *</label>
                                <input type="text" class="form-control" required>

                                <label>Địa chỉ chi tiết *</label>
                                <input type="text" class="form-control" placeholder="Số nhà tên đường địa chỉ nhà" required>
                                <input type="text" class="form-control" placeholder="Văn phòng, công ty ..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Tỉnh / Thành phố *</label>
                                        <select name="" class="form-control"  required>
                                            <option value="">1</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Quận / Huyện *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Mã bưu điện *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Số điện thoại *</label>
                                        <input type="tel" class="form-control" required>
                                    </div>
                                </div>

                                <label>Địa chỉ email *</label>
                                <input type="email" class="form-control" required>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Đăng ký tài khoản?</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Thêm địa chỉ mới?</label>
                                </div>

                                <label>Ghi chú giao hàng (không bắt buộc)</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Ghi chú chi tiết nội dung mà khách hàng yêu cầu,.."></textarea>
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
                                                <td>Miễn phí</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Thành tiền:</td>
                                                <td><?php echo vnmoney(resolve(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung')); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                        Thanh toán khi nhận hàng
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Sau khi thanh toán khách hàng có thể kiểm tra tình trạng máy sau đó thanh toán với nhân viên giao hàng
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                        Thanh toán online qua VNPay
                                                    </a>
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
</body>
</html>


