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
    <script src="{! assets('public/dist/js/apis.js'); !}" defer></script>
    <?php partial('includes/stylesheet.php', 'client'); ?>
</head>
<body>
<div class="page-wrapper">
    <?php partial('includes/header.php', 'client'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('<?php echo assets('public/client/images/page-header-bg.jpg'); ?>')">
            <div class="container">
                <h1 class="page-title">Đặt hàng thành công</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đặt hàng thành công</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h3>Mã đơn hàng: #<?php echo $donhang->id; ?></h3>
                            <h6>Họ tên người đặt: <b><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></b></h6>
                            <h5>Tổng đơn hàng: <?php echo vnmoney($donhang->tong_tien); ?></h5>
                        </div>
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


