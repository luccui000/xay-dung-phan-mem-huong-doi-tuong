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
                    <h1 class="page-title">Trang giỏ hàng</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div>
            </nav>

            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <form id="gio_hang" action="{! route('/api/san-pham/cap-nhat-gio-hang'); !}">
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sanphams as $sanpham) { ?>
                                                <tr>
                                                    <?php $item = app(\Luccui\Classes\Cart::class)->getItem($sanpham->id); ?>
                                                    <td class="product-col">
                                                        <div class="product">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="<?php echo assets($sanpham->hinh_anh); ?>" alt="Product image">
                                                                </a>
                                                            </figure>

                                                            <h3 class="product-title">
                                                                <a href="/san-pham/chi-tiet?id=<?php echo $sanpham->id; ?>"><?php echo $sanpham->ten_san_pham; ?></a>
                                                            </h3>
                                                        </div>
                                                    </td>
                                                    <td class="price-col"><?php echo vnmoney($sanpham->gia_cuoi_cung); ?></td>
                                                    <td class="quantity-col">
                                                        <div class="cart-product-quantity">
                                                            <label>
                                                                <input value="<?php echo $item['quantity']; ?>" name="so_luong" data-sanpham_id="<?php echo $sanpham->id; ?>" type="number" class="form-control"  min="1" max="<?php echo $sanpham->so_luong; ?>" step="1" data-decimals="0" required>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="total-col">
                                                        <?php echo  vnmoney($item['quantity'] * $sanpham->gia_cuoi_cung); ?>
                                                    </td>
                                                    <td class="remove-col">
                                                        <a href="/san-pham/xoa-khoi-gio-hang?id=<?php echo $sanpham->id; ?>" class="btn-remove"><i class="icon-close"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" required placeholder="Nhập mã giảm giá">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-6">-->
<!--                                        <button id="update_cart" class="btn btn-outline-dark-2"><span>Cập nhật giỏ hàng</span><i class="icon-refresh"></i></button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Thông tin giỏ hàng</h3>

                                    <table class="table table-summary">
                                        <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Tạm tính:</td>
                                            <td><?php echo vnmoney(app(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung')); ?></td>
                                        </tr>
                                        <tr class="summary-shipping">
                                            <td>Giao hàng:</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Miễn phí</label>
                                                </div>
                                            </td>
                                            <td><?php echo vnmoney(0); ?></td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="standart-shipping">Tiêu chuẩn:</label>
                                                </div>
                                            </td>
                                            <td><?php echo vnmoney(23000); ?></td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="express-shipping">Giao hàng nhanh:</label>
                                                </div>
                                            </td>
                                            <td><?php echo vnmoney(44000); ?></td>
                                        </tr>

                                        <tr class="summary-total">
                                            <td>Tổng tiền:</td>
                                            <td><?php echo vnmoney(app(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung')); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <a href="/san-pham/thanh-toan" class="btn btn-outline-primary-2 btn-order btn-block">TIẾN HÀNH ĐẶT HÀNG</a>
                                </div>

                                <a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>TIẾP TỤC MUA SẮM</span><i class="icon-refresh"></i></a>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php partial('includes/footer.php', 'client'); ?>
    </div>
    <?php partial('includes/script.php', 'client'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("input[name=so_luong]").forEach(soLuong => {
                soLuong.addEventListener("change", function () {
                    const { sanpham_id } = $(soLuong).data();
                    const so_luong = $(soLuong).val();
                    const data = {
                        'sanpham_id': sanpham_id,
                        'so_luong': +so_luong
                    };

                    $.ajax({
                        type: "POST",
                        url: '{! route("/api/san-pham/cap-nhat-gio-hang") !}',
                        data: data,
                        success: function(data) {
                            if(!JSON.parse(data).data) {
                                alert(JSON.parse(data).message)
                            }
                            window.location.reload(true);
                        }
                    })
                })
            })
        })
    </script>
</body>
</html>




