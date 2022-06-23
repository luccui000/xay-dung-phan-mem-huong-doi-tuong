<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Liên hệ: +0123 456 789</a>
            </div>
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">Việt Nam</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">Việt Nam</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php if(\Luccui\Core\Session::has(\Luccui\Classes\XacThuc::SESSION_DA_DANG_NHAP)) { ?>
                                <li>
                                    <a href="/tai-khoan">
                                        <?php echo \Luccui\Core\Session::get(\Luccui\Classes\XacThuc::SESSION_TEN_TAI_KHOAN); ?>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li><a href="{! route('dang-ky') !}">Đăng ký / Đăng nhập</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Mở menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="/" class="logo">
                    <img src="{! assets('public/client/images/logo.png') !}" alt="Molla Logo" width="105" height="25">
                </a>
            </div>

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="/san-pham/tat-ca" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Tìm kiếm</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Tìm kiếm sản phẩm ..." required>
                        </div>
                    </form>
                </div>
            </div>

            <div class="header-right">
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <p>So sánh</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                            </li>
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Xóa tất cả</a>
                            <a href="#" class="btn btn-outline-primary-2"><span>So sánh ngay</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php $wishlist = resolve(\Luccui\Classes\Wishlist::class)->getItems(); ?>
                <div class="wishlist">
                    <a href="{! route('/san-pham/danh-sach-yeu-thich') !}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge"><?php echo count($wishlist); ?></span>
                        </div>
                        <p>Yêu thích</p>
                    </a>
                </div>

                <?php $cart = resolve(\Luccui\Classes\Cart::class)->getItems(); ?>
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count"><?php echo count($cart); ?></span>
                        </div>
                        <p>Giỏ hàng</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <?php foreach ($cart as $items) {?>
                                <?php foreach ($items as $item) {?>
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="/san-pham/chi-tiet?id=<?php echo $item['id']; ?>"><?php echo $item['attributes']['ten_san_pham']; ?></a>
                                            </h4>

                                            <span class="cart-product-info">
                                                        <span class="cart-product-qty"><?php echo $item['quantity']; ?></span>
                                                        x <?php echo vnmoney($item['attributes']['gia_cuoi_cung']); ?>
                                                    </span>
                                        </div>

                                        <figure class="product-image-container">
                                            <a href="/san-pham/chi-tiet?id=<?php echo $item['id']; ?>" class="product-image">
                                                <img src="<?php echo assets($item['attributes']['hinh_anh']); ?>" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Tổng tiền</span>

                            <span class="cart-total-price"><?php echo vnmoney(resolve(\Luccui\Classes\Cart::class)->getAttributeTotal('gia_cuoi_cung')); ?></span>
                        </div>

                        <div class="dropdown-cart-action">
                            <a href="{! route('/san-pham/gio-hang'); !}" class="btn btn-primary">Xem giỏ hàng</a>
                            <a href="{! route('/san-pham/thanh-toan'); !}" class="btn btn-outline-primary-2"><span>Thanh toán</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        Danh mục sản phẩm <i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                <?php foreach (\Luccui\Models\DanhMuc::all() as $danhmuc) { ?>
                                    <li><a href="/san-pham/tat-ca?danhmuc%5B%5D=<?php echo $danhmuc->id; ?>"><?php echo $danhmuc->ten_danh_muc; ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <style>
                            .sf-with-ul {
                                display: block;
                                text-align: center;
                            }

                            .menu.sf-arrows .sf-with-ul::after {
                                display: none;
                            }
                            .header-bottom .menu>li>.sf-with-ul {
                                padding: 10px 20px;
                            }
                        </style>
                        <li class="megamenu-container active">
                            <a href="/" class="sf-with-ul">Trang chủ</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="/san-pham/tat-ca" class="sf-with-ul">Cửa hàng</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="/bai-viet" class="sf-with-ul">Bài viết</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="#" class="sf-with-ul">Liên hệ</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Tiết kiệm<span class="highlight">&nbsp;đến 30% khi mua sắm</span></p>
            </div>
        </div>
    </div>
</header>
