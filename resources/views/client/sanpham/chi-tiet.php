<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chi tiết sản phẩm</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{! assets('public/client/images/icons/browserconfig.xml'); !}">
    <meta name="theme-color" content="#ffffff">
    <?php partial('includes/stylesheet.php', 'client'); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

        .main, a, p {
            font-family: 'Montserrat', sans-serif;
        }
        .product-details-action .btn-cart {
            max-width: 220px !important;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <?php partial('includes/header.php', 'client'); ?>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/san-pham/tat-ca">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Trước</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Tiếp</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="<?php echo assets($sanpham->hinh_anh); ?>" data-zoom-image="<?php echo assets($sanpham->hinh_anh); ?>" alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure>

                                    <div id="product-zoom-gallery" class="product-image-gallery">

                                        <?php foreach ($hinhanhs as $hinhanh) { ?>
                                            <a class="product-gallery-item active" href="#" data-image="<?php echo assets($hinhanh->duong_dan); ?>" data-zoom-image="<?php echo assets($hinhanh->duong_dan); ?>">
                                                <img src="<?php echo assets($hinhanh->duong_dan); ?>" alt="product side">
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title"><?php echo($sanpham->ten_san_pham); ?></h1>

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <?php echo vnmoney($sanpham->gia_cuoi_cung); ?>
                                </div>

                                <div class="product-content">
                                    <p><?php echo($sanpham->mo_ta_ngan); ?></p>
                                </div>
                                <form action="{! route('/san-pham/them-vao-gio-hang') !}" method="POST">
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Số lượng:</label>
                                        <div class="product-details-quantity">
                                            <label>
                                                <input name="sanpham_id" value="<?php echo $sanpham->id; ?>" hidden type="text">
                                            </label>
                                            <input type="number" name="so_luong" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div>
                                    </div>

                                    <div class="product-details-action">
                                        <button
                                            type="submit"
                                            class="btn-product btn-cart"
                                            style="max-width: 200px;"
                                        ><span>Thêm vào giỏ hàng</span></button>
                                    </div>
                                </form>

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Danh mục:</span>
                                        <a href="#"><?php echo $sanpham->ten_danh_muc; ?></a>
                                    </div>

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Chia sẻ:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả ngắn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Thông tin chi tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Chế độ giao hàng và hoàn trả</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Thông tin sản phẩm</h3>
                                <p><?php echo $sanpham->mo_ta_ngan; ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Chi tiết sản phẩm</h3>
                                <p><?php echo $sanpham->mo_ta_chi_tiet; ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Giao hàng và hoàn trả</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="title text-center mb-4">Có thể bạn thích</h2>

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                     data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                    <?php foreach ($sanphamlienquans as $splq) { ?>
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="/san-pham/chi-tiet?id=<?php echo $splq->id; ?>">
                                    <img src="<?php echo assets($splq->hinh_anh); ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="/san-pham/them-vao-yeu-thich?id=<?php echo $splq->id; ?>" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                </div>

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                                </div>
                            </figure>
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Women</a>
                                </div>
                                <h3 class="product-title"><a href="<?php echo $splq->id; ?>"><?php echo $splq->ten_san_pham; ?></h3>
                                <div class="product-price">
                                    <?php echo vnmoney($splq->gia_cuoi_cung); ?>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 20%;"></div>
                                    </div>
                                    <span class="ratings-text">( 2 Reviews )</span>
                                </div>

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <?php partial('includes/footer.php', 'client'); ?>
</div>
<?php partial('includes/script.php', 'client'); ?>
</body>
</html>

