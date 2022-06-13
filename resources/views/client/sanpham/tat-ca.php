<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh sách tất cả sản phẩm</title>
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
                <h1 class="page-title">Trang sản phẩm</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">Tất cả sản phẩm</a>
                    </li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Hiển thị <span>9 of 56</span> Products
                                </div>
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sắp xếp theo:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Độ phổ biến</option>
                                            <option value="rating">Sao đánh giá</option>
                                            <option value="date">Ngày</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="toolbox-layout">
                                    <a href="#" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="10" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="10" height="4" />
                                        </svg>
                                    </a>

                                    <a href="#" class="btn-layout">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="#" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="#" class="btn-layout active">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="18" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                            <rect x="18" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                <?php foreach ($sanphams['data'] as $sanpham) { ?>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <?php if($sanpham[0]['la_san_pham_moi']) {?>
                                                    <span class="product-label label-new">New</span>
                                                <?php } ?>
                                                <a href="#">
                                                    <img src="<?php echo assets($sanpham[0]['hinh_anh']); ?>" alt="<?php echo $sanpham[0]['ten_san_pham']; ?>" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm vào yêu thích</span></a>
                                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div>

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div>
                                            </figure>

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#"><?php echo isset($sanpham['danhmucs'][0]) ? $sanpham['danhmucs'][0]['ten_danh_muc'] : ''; ?></a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/san-pham/chi-tiet?id=<?php echo $sanpham[0]['id'] ?>">
                                                        <?php echo $sanpham[0]['ten_san_pham'] ?>
                                                    </a>
                                                </h3>
                                                <div class="product-price">
                                                    <?php echo vnmoney($sanpham[0]['gia_cuoi_cung']); ?>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div>

                                                <div class="product-nav product-nav-thumbs">
                                                    <?php if(count($sanpham['hinhanhs']) > 0) {?>
                                                        <?php foreach ($sanpham['hinhanhs'] as $hinhanh) {?>
                                                            <a href="#" class="active">
                                                                <img src="<?php echo assets($hinhanh['duong_dan']); ?>" alt="product desc">
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php foreach ($sanphams['links'] as $link) { ?>
                                    <?php if($link['label'] == "Previous") {?>
                                        <li class="page-item <?php echo is_null($link['url']) ? 'disabled' : ''; ?>">
                                            <a class="page-link page-link-prev" href="/san-pham/tat-ca<?php echo ltrim($link['url'], '/') ?>" aria-label="Trang trước" tabindex="-1" aria-disabled="true">
                                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Trang trước
                                            </a>
                                        </li>
                                    <?php } else if($link['label'] == "Next") {?>
                                        <li class="page-item <?php echo is_null($link['url']) ? 'disabled' : ''; ?>">
                                            <a class="page-link page-link-prev" href="/san-pham/tat-ca<?php echo ltrim($link['url'], '/') ?>" aria-label="Trang trước" tabindex="-1" aria-disabled="true">
                                                Trang kế <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                            </a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="page-item <?php echo $link['active'] ? 'active' : ''; ?>" aria-current="page">
                                            <a class="page-link" href="/san-pham/tat-ca<?php echo ltrim($link['url'], '/') ?>">
                                                <?php echo $link['label'] ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
<!--                                <li class="page-item-total">of </li> -->
                            </ul>
                        </nav>
                    </div>
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Lọc theo:</label>
                                <a href="#" class="sidebar-filter-clear">Xóa bộ lọc</a>
                            </div>
                            <form method="GET" action="{! route('/san-pham/tat-ca') !}">
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                            Danh mục
                                        </a>
                                    </h3>

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                <?php
                                                    if(isset($_GET['danhmuc'])) {
                                                        $dms = $_GET['danhmuc'];
                                                    }
                                                ?>
                                                <?php foreach ($danhmucs as $danhmuc) { ?>
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input
                                                                name="danhmuc[]" type="checkbox"
                                                                <?php
                                                                    if(isset($dms) && in_array($danhmuc->id, $dms))
                                                                        echo 'checked';
                                                                ?>
                                                                id="cat-<?php echo $danhmuc->id; ?>"
                                                                value="<?php echo $danhmuc->id; ?>"
                                                                class="custom-control-input">
                                                            <label class="custom-control-label" for="cat-<?php echo $danhmuc->id; ?>">
                                                                <?php echo $danhmuc->ten_danh_muc; ?>
                                                            </label>
                                                        </div>
                                                        <span class="item-count"><?php echo $danhmuc->so_luong_san_pham; ?></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                            Nhà cung cấp
                                        </a>
                                    </h3>
                                    <?php
                                        if(isset($_GET['nhacungcap'])) {
                                            $ncc = $_GET['nhacungcap'];
                                        }
                                    ?>
                                    <div class="collapse show" id="widget-4">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                <?php foreach ($nhacungcaps as $nhacungcap) {?>
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input
                                                                type="checkbox"
                                                                name="nhacungcap[]"
                                                                class="custom-control-input"
                                                                value="<?php echo $nhacungcap->id; ?>"
                                                                id="brand-<?php echo $nhacungcap->id; ?>"
                                                                <?php
                                                                    if(isset($ncc) && in_array($nhacungcap->id, $ncc))
                                                                        echo 'checked';
                                                                ?>
                                                            >
                                                            <label class="custom-control-label" for="brand-<?php echo $nhacungcap->id; ?>">
                                                                <?php echo $nhacungcap->ten_nha_cung_cap; ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                            Giá
                                        </a>
                                    </h3>

                                    <div class="collapse show" id="widget-5">
                                        <div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                    Giá từ:
                                                    <span id="filter-price-range"></span>
                                                </div>

                                                <div id="price-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-primary">Áp dụng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <?php partial('includes/footer.php', 'client'); ?>
</div>
<?php partial('includes/script.php', 'client'); ?>
</body>
</html>
