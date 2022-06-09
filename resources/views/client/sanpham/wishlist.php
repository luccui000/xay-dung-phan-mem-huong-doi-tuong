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
                <h1 class="page-title">Sản phẩm yêu thích</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Trạng thái hàng</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($sanphams as $sanpham) {?>
                        <tr>
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
                            <?php if($sanpham->so_luong > 0) { ?>
                                <td class="stock-col">
                                    <span class="in-stock">Còn hàng</span>
                                </td>
                                <td class="action-col">
                                    <form action="{! route('/san-pham/them-vao-gio-hang') !}" method="POST">
                                        <input name="wishlist_id" value="<?php echo $sanpham->id; ?>" hidden type="text">
                                        <input name="sanpham_id" value="<?php echo $sanpham->id; ?>" hidden type="text">
                                        <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </td>
                                <td class="remove-col">
                                    <form action="{! route('/san-pham/xoa-khoi-yeu-thich') !}" method="POST">
                                        <input name="sanpham_id" hidden value="<?php echo $sanpham->id; ?>" type="text">
                                        <button class="btn-remove"><i class="icon-close"></i></button>
                                    </form>
                                </td>
                            <?php } else { ?>
                                <td class="stock-col"><span class="out-of-stock">Hết hàng</span></td>
                                <td class="action-col">
                                    <button class="btn btn-block btn-outline-primary-2 disabled">Đã hết hàng</button>
                                </td>
                                <td class="remove-col">
                                    <form action="{! route('/san-pham/xoa-khoi-yeu-thich') !}" method="POST">
                                        <input name="sanpham_id" hidden value="<?php echo $sanpham->id; ?>" type="text">
                                        <button class="btn-remove"><i class="icon-close"></i></button>
                                    </form>
                                </td>
                            <?php }  ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php partial('includes/footer.php', 'client'); ?>
</div>
<?php partial('includes/script.php', 'client'); ?>
</body>
</html>




