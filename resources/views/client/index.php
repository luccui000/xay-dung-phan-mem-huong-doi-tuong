<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SHOP - Bootstrap eCommerce Template</title>
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

            .cat-block h3 {
                font-family: 'Montserrat', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <?php partial('includes/header.php', 'client'); ?>
            <main class="main">
                <div class="intro-slider-container mb-5">
                    {! partial('sanpham/partials/slider.php', 'client'); !}
                    <span class="slider-loader">
                </div>
                <div class="container">
                    <h2 class="title text-center mb-4">Khám phá các danh mục phổ biến</h2>
                    <?php include CLIENT_BASE_PATH . 'sanpham/include/explore.php' ?>
                </div>
                <div class="mb-4"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <?php partial('sanpham/partials/banner.php', 'client'); ?>
                    </div>
                </div>

                <div class="mb-3"></div>

                <div class="container new-arrivals">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Sản phẩm mới</h2>
                        </div>

                        <div class="heading-right">
                            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">Tất cả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-tv-link" data-toggle="tab" href="#new-tv-tab" role="tab" aria-controls="new-tv-tab" aria-selected="false">TV</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-computers-link" data-toggle="tab" href="#new-computers-tab" role="tab" aria-controls="new-computers-tab" aria-selected="false">Máy tính</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-phones-link" data-toggle="tab" href="#new-phones-tab" role="tab" aria-controls="new-phones-tab" aria-selected="false">Ảnh kỹ thuật số</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-watches-link" data-toggle="tab" href="#new-watches-tab" role="tab" aria-controls="new-watches-tab" aria-selected="false">Điện thoại di động</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-acc-link" data-toggle="tab" href="#new-acc-tab" role="tab" aria-controls="new-acc-tab" aria-selected="false">Âm thanh</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php include CLIENT_BASE_PATH . 'sanpham/partials/arrival-product.php' ?>
                </div>
                <div class="mb-6"></div>
                <div class="container">
                    <div class="cta cta-border mb-5" style="background-image: url('public/client/images/bg-1.jpg');">
                        <img src="public/client/images/camera.png" alt="camera" class="cta-img">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="cta-content">
                                    <div class="cta-text text-right text-white">
                                        <p>Ưu đãi ngày hôm nay <br><strong>Lưu giữ khoảnh khắc tuyệt vời cùng HERO7 Black</strong></p>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-round"><span>Mua ngay - 8.999.000đ</span><i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php partial('sanpham/partials/brand.php', 'client'); ?>

                <div class="bg-light pt-5 pb-6">
                    <div class="container trending-products">
                        <div class="heading heading-flex mb-3">
                            <div class="heading-left">
                                <h2 class="title">Sản phẩm thịnh hành</h2>
                            </div>

                            <div class="heading-right">
                                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Đánh giá tốt nhất</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="trending-best-link" data-toggle="tab" href="#trending-best-tab" role="tab" aria-controls="trending-best-tab" aria-selected="false">Đáng mua nhất</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="trending-sale-link" data-toggle="tab" href="#trending-sale-tab" role="tab" aria-controls="trending-sale-tab" aria-selected="false">Đang khuyến mãi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php partial('sanpham/partials/trending-product.php', 'client'); ?>
                    </div>
                </div>
                <div class="mb-5"></div>
                <div class="container for-you">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Đề xuất cho bạn</h2>
                        </div>

                        <div class="heading-right">
                            <a href="{! route('/san-pham/tat-ca') !}" class="title-link">Xem tất cả <i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php include CLIENT_BASE_PATH . 'sanpham/partials/recommend-product.php' ?>
                </div>
                <div class="mb-4"></div>
                <div class="container">
                    <hr class="mb-0">
                </div>
                <?php partial('sanpham/partials/prefooter.php', 'client'); ?>
            </main>
            <?php partial('includes/footer.php', 'client'); ?>
        </div>
        <?php partial('includes/script.php', 'client'); ?>
    </body>
</html>

