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
    <link rel="stylesheet" href="../../../../public/client/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../public/client/css/style.css">
    <link rel="stylesheet" href="../../../../public/client/css/skin-demo-4.css">
    <link rel="stylesheet" href="../../../../public/client/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../../../public/css/client.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .top-menu {
            padding: 10px 0;
        }
        .header-left {
            padding: 0;
        }
        .page-link {
            cursor: pointer;
        }
        .page-link.active {
            border: 1px solid #ccc;
        }
        .page-link.disable {
            background-color: #ddd;
        }
        .product-price {
            font-size: 20px;
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="/dang-nhap" data-toggle="modal">Đăng ký/ Đăng nhập</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="/" class="logo">
                            <img src="../../../../public/client/images/logo.png" alt="TMDT" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Tìm kiếm</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Tìm kiếm sản phẩm..." required="">
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                <div class="icon">
                                    <i class="icon-random"></i>
                                </div>
                                <p>So sánh</p>
                            </a>
                        </div>
                        <div class="wishlist">
                            <a href="/san-pham/danh-sach-yeu-thich" title="Yêu thích">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Yêu thích</p>
                            </a>
                        </div>
                        <?php $cart = resolve(\Luccui\Classes\Cart::class)->getItems(); ?>
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">2</span>
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
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="sticky-wrapper"><div class="header-bottom sticky-header">
                    <div class="container">
                        <div class="header-left">
                            <div class="dropdown category-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                    Danh mục sản phẩm <i class="icon-angle-down"></i>
                                </a>
                            </div><!-- End .category-dropdown -->
                        </div><!-- End .header-left -->

                        <div class="header-center">
                            <nav class="main-nav">
                                <ul class="menu" style="touch-action: pan-y;">
                                    <li class="megamenu-container ">
                                        <a href="#" class="sf-with-ul">Trang chủ</a>
                                    </li>
                                    <li class="megamenu-container active">
                                        <a href="#" class="sf-with-ul">Cửa hàng</a>
                                    </li>
                                    <li class="megamenu-container">
                                        <a href="/bai-viet" class="sf-with-ul">Bài viết</a>
                                    </li>
                                    <li class="megamenu-container">
                                        <a href="/lien-he" class="sf-with-ul">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right">
                            <i class="la la-lightbulb-o"></i><p>Tiết kiệm đến 30% khi mua sắm</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="page-header text-center" style="background-image: url(../../../../public/client/images/page-header-bg.jpg)">
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
            <div id="app">
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="toolbox">
                                    <div class="toolbox-left">
                                        <div class="toolbox-info">
                                            Hiển thị <span>9 trong 23</span> sản phẩm
                                        </div><!-- End .toolbox-info -->
                                    </div><!-- End .toolbox-left -->

                                    <div class="toolbox-right">
                                        <div class="toolbox-sort">
                                            <label for="sortby">Sắp xếp theo:</label>
                                            <div class="select-custom">
                                                <select name="sortby" id="sortby" class="form-control">
                                                    <option value="popularity" selected="selected">Most Popular</option>
                                                    <option value="rating">Most Rated</option>
                                                    <option value="date">Date</option>
                                                </select>
                                            </div>
                                        </div><!-- End .toolbox-sort -->
                                        <div class="toolbox-layout">
                                            <a href="#" class="btn-layout active">
                                                <svg width="16" height="10">
                                                    <rect x="0" y="0" width="4" height="4"></rect>
                                                    <rect x="6" y="0" width="10" height="4"></rect>
                                                    <rect x="0" y="6" width="4" height="4"></rect>
                                                    <rect x="6" y="6" width="10" height="4"></rect>
                                                </svg>
                                            </a>

                                            <a href="#" class="btn-layout">
                                                <svg width="10" height="10">
                                                    <rect x="0" y="0" width="4" height="4"></rect>
                                                    <rect x="6" y="0" width="4" height="4"></rect>
                                                    <rect x="0" y="6" width="4" height="4"></rect>
                                                    <rect x="6" y="6" width="4" height="4"></rect>
                                                </svg>
                                            </a>

                                            <a href="#" class="btn-layout">
                                                <svg width="16" height="10">
                                                    <rect x="0" y="0" width="4" height="4"></rect>
                                                    <rect x="6" y="0" width="4" height="4"></rect>
                                                    <rect x="12" y="0" width="4" height="4"></rect>
                                                    <rect x="0" y="6" width="4" height="4"></rect>
                                                    <rect x="6" y="6" width="4" height="4"></rect>
                                                    <rect x="12" y="6" width="4" height="4"></rect>
                                                </svg>
                                            </a>

                                            <a href="#" class="btn-layout">
                                                <svg width="22" height="10">
                                                    <rect x="0" y="0" width="4" height="4"></rect>
                                                    <rect x="6" y="0" width="4" height="4"></rect>
                                                    <rect x="12" y="0" width="4" height="4"></rect>
                                                    <rect x="18" y="0" width="4" height="4"></rect>
                                                    <rect x="0" y="6" width="4" height="4"></rect>
                                                    <rect x="6" y="6" width="4" height="4"></rect>
                                                    <rect x="12" y="6" width="4" height="4"></rect>
                                                    <rect x="18" y="6" width="4" height="4"></rect>
                                                </svg>
                                            </a>
                                        </div><!-- End .toolbox-layout -->
                                    </div><!-- End .toolbox-right -->
                                </div>
                                <div class="products mb-3">
                                    <div class="row justify-content-center">
                                        <div v-for="sanpham in sanphams" :key="sanpham.id" class="col-6 col-md-4 col-lg-4 col-xl-3">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media" style="border-radius: 5px;">
                                                    <span v-if="sanpham.la_san_pham_moi" class="product-label label-new">Mới</span>

                                                    <a href="#">
                                                        <img :src="sanpham.hinh_anh" :alt="sanpham.ten_san_pham" class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm vào yêu thích</span></a>
                                                        <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                    </div>

                                                </figure>

                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <a href="#">{{ sanpham.danhmucs.ten_danh_muc }}</a>
                                                    </div>
                                                    <h3 class="product-title"  style="width: 200px; overflow: hidden" >
                                                        <a class="text-truncate":href="`/san-pham/chi-tiet?id=${sanpham.id}`">
                                                            {{ sanpham.ten_san_pham }}
                                                        </a>
                                                    </h3>
                                                    <p><del>{{ VNDFormat(sanpham.gia_san_pham) }}</del></p>
                                                    <div class="product-price">
                                                        {{ VNDFormat(sanpham.gia_cuoi_cung) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav v-if="paginate" aria-label="page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li v-for="link in paginate.links" :key="link.label" class="page-item">
                                            <a
                                                class="page-link page-link-prev"
                                                v-if="link.label === 'Previous'"
                                                :class="{'disable': link.url === null}"
                                            >
                                                <span>
                                                    <i class="icon-long-arrow-left"></i>
                                                </span>
                                                Trang trước
                                            </a>
                                            <a
                                                class="page-link page-link-prev"
                                                v-else-if="link.label === 'Next'"
                                            >
                                                Trang kế
                                                <span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </span>
                                            </a>
                                            <a
                                                class="page-link"
                                                :class="{'active': link.active}"
                                                v-else
                                                @click="page = link.label"
                                            >
                                                {{ link.label }}
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <aside class="col-lg-3 order-lg-first">
                                <div class="sidebar sidebar-shop">
                                    <div class="widget widget-clean">
                                        <label>Lọc theo:</label>
                                        <a @click="clearFilter" href="#" class="sidebar-filter-clear">Xóa bộ lọc</a>
                                    </div>
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a @click="showDanhMuc = !showDanhMuc" >
                                                Danh mục
                                            </a>
                                        </h3>

                                        <div class="collapse" :class="{'show': showDanhMuc}" >
                                            <div class="widget-body">
                                                <div v-for="danhmuc in danhmucs" :key="danhmuc.id" class="filter-items filter-items-count">
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input v-model="selectedDanhMuc" type="checkbox" :value="danhmuc.id" class="custom-control-input" :id="`cat-${danhmuc.id}`" />
                                                            <label class="custom-control-label" :for="`cat-${danhmuc.id}`">
                                                                {{ danhmuc.ten_danh_muc }} </label>
                                                        </div>
                                                        <span class="item-count">{{ danhmuc.so_luong }}</span>
                                                    </div>
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
                                        <div class="collapse show" id="widget-4">
                                            <div class="widget-body">
                                                <div class="filter-items">
                                                    <div v-for="nhacungcap in nhacungcaps" :key="nhacungcap.id" class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input v-model="selectedNhaCungCap" type="checkbox" class="custom-control-input" :value="nhacungcap.id" :id="`brand-${nhacungcap.id}`">
                                                            <label class="custom-control-label" :for="`brand-${nhacungcap.id}`">
                                                                {{ nhacungcap.ten_nha_cung_cap }}
                                                            </label>
                                                        </div>
                                                    </div>
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
                                            <button @click="applyFilter" class="btn btn-primary">Áp dụng</button>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<script src="https://unpkg.com/vue@3"></script>
<script>
    const { createApp, watch } = Vue

    createApp({
        created() {
            this.getAllSanPham();
            this.getAllNhaCungCap();
            this.getAllDanhMuc();
        },
        data() {
            return {
                message: 'Hello Vue!',
                nhacungcaps: [],
                danhmucs: [],
                sanphams: [],
                paginate: null,
                showDanhMuc: true,
                selectedDanhMuc: [],
                selectedNhaCungCap: [],
                page: 1
            }
        },
        watch: {
            page(value, old) {
                this.getAllSanPham(value)
            }
        },
        methods: {
            async getAllSanPham(page = 1) {
                const response = await fetch(`/api/san-pham?trang=${page}`)
                const data = await response.json();
                this.paginate = data;
                this.sanphams = data.data
            },
            getAllNhaCungCap() {
                fetch('/api/nha-cung-cap')
                    .then(response => response.json())
                    .then(response => this.nhacungcaps = response)
            },
            getAllDanhMuc() {
                fetch('/api/danh-muc')
                    .then(response => response.json())
                    .then(response => this.danhmucs = response)
            },
            applyFilter() {
                this.getAllSanPham().then(resp => {
                    if(this.selectedDanhMuc.length) {
                        this.sanphams = this.sanphams.filter(el => this.selectedDanhMuc.includes(el.danhmuc_id))
                    }
                    if(this.selectedNhaCungCap.length) {
                        this.sanphams = this.sanphams.filter(el => this.selectedNhaCungCap.includes(el.nhacungcap_id))
                    }

                })
            },
            VNDFormat(value) {
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(value);
            },
            clearFilter(e) {
                e.preventDefault()
                this.getAllSanPham()
            }
        }
    }).mount('#app')
</script>
</body>
</html>
