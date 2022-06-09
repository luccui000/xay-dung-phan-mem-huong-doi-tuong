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
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                </ol>
            </div>
        </nav>

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url(<?php echo assets('public/client/images/login-bg.jpg'); ?>)">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#signin-2" role="tab">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#register-2" role="tab" >Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form action="{! route('luu-dang-nhap') !}" method="POST">
                                    <div class="form-group">
                                        <label for="singin-email-2">Số điện thoại/ Tên đăng nhập/ Email <span class="text-danger">*</span></label>
                                        <input name="ten_dang_nhap" type="text" class="form-control" id="singin-email-2" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="singin-password-2">Mật khẩu <span class="text-danger">*</span></label>
                                        <input name="mat_khau" type="password" class="form-control" id="singin-password-2" required>
                                    </div>
                                    <div class="">
                                        <span class="text-danger">
                                            <?php
                                                if(\Luccui\Core\Session::has('thatbai')) {
                                                    try {
                                                        echo \Luccui\Core\Session::get('thatbai');
                                                    } catch (\Luccui\Exceptions\SessionNotFoundException $e) {
                                                        var_dump($e->getMessage());
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng nhập</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Nhớ đăng nhập</label>
                                        </div>

                                        <a href="#" class="forgot-link">Quên mật khẩu</a>
                                    </div>
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                <form action="{! route('luu-dang-ky') !}" method="POST">
                                    <h5>Đăng ký</h5>
                                    <div class="form-group">
                                        <label for="ho_ten">Họ tên <span class="text-danger">*</span></label>
                                        <input name="ho_ten" id="ho_ten" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="so_dien_thoai">Số điện thoại <span class="text-danger">*</span></label>
                                        <input name="so_dien_thoai" id="so_dien_thoai" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_dang_nhap">Tên đăng nhập <span class="text-danger">*</span> </label>
                                        <input name="ten_dang_nhap" type="text" class="form-control" id="ten_dang_nhap">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input name="email" type="email" class="form-control" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="mat_khau">Mật khẩu <span class="text-danger">*</span></label>
                                        <input name="mat_khau" type="password" class="form-control" id="mat_khau" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nhap_lai_mat_khau">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                        <input name="nhap_lai_mat_khau" type="password" class="form-control" id="nhap_lai_mat_khau" required>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng ký</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                            <label class="custom-control-label" for="register-policy-2">Tôi đồng ý với <a href="#">điều khoản</a> *</label>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">họặc đăng nhập qua</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Đăng nhập với Google
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Đăng nhập với Facebook
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
