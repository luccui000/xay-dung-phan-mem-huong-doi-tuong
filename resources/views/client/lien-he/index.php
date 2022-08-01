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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

        .main, a, p {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <?php partial('includes/header.php', 'client'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('<?php echo assets('public/client/images/page-header-bg.jpg'); ?>')">
            <div class="container">
                <h1 class="page-title">Liên hệ</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ol>
            </div>
        </nav>

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <h2 class="title mb-1">Thông tin liên hệ</h2>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">
                                    <h3>Cửa hàng</h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-map-marker"></i>
                                            126 Nguyễn Thiện Thành, TP Trà Vinh
                                        </li>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:#">03999xxxx</a>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <a href="mailto:#">hotro@demo.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="contact-info">
                                    <h3>Giờ mở cửa</h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            <span class="text-dark">T2 - T7</span> <br>11AM - 7PM
                                        </li>
                                        <li>
                                            <i class="icon-calendar"></i>
                                            <span class="text-dark">Chủ nhật</span> <br>11AM-6PM
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title mb-1">Liên hệ?</h2>
                        <p class="mb-2">Thông tin của bạn sẽ được chúng tôi phản hồi sơm nhất</p>

                        <form action="#" class="contact-form mb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Họ tên</label>
                                    <input type="text" class="form-control" id="cname" placeholder="Họ tên *" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="cphone" placeholder="Số điện thoại">
                                </div>

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Tiêu đề</label>
                                    <input type="text" class="form-control" id="csubject" placeholder="Tiêu đề">
                                </div>
                            </div>

                            <label for="cmessage" class="sr-only">Nội dung</label>
                            <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Nội dung *"></textarea>

                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>Gửi yêu cầu</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <hr class="mt-4 mb-5">

            </div>
        </div>
    </main>

    <?php partial('includes/footer.php', 'client'); ?>
</div>
<?php partial('includes/script.php', 'client'); ?>
</body>
</html>
