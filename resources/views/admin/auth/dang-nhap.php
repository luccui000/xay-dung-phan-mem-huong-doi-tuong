<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody Admin</title>
    <?php partial('includes/stylesheet.php'); ?>
    <style>
        .auth .login-half-bg {
            background: url('<?php echo assets('/public/admin/images/login-bg.jpg') ?>');
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <h4>Chào mừng bạn đã quay lại!</h4>
                        <form action="/admin/dang-nhap" method="POST" class="pt-3">
                            <div class="form-group">
                                <label for="ten_dang_nhap">Tên đăng nhập</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-user text-primary"></i>
                                      </span>
                                    </div>
                                    <input name="ten_dang_nhap" type="text" class="form-control  border-left-0" id="ten_dang_nhap" placeholder="Tên đăng nhập">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mat_khau">Mật khẩu</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-lock text-primary"></i>
                                      </span>
                                    </div>
                                    <input name="mat_khau" type="password" class="form-control border-left-0" id="mat_khau" placeholder="Mật khẩu">
                                </div>
                                <span class="text-danger"></span>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Nhớ đăng nhập
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-primary">Đăng nhập</button>
                            </div>
                            <div class="mb-2 d-flex">
                                <button type="button" class="btn btn-facebook flex-grow mr-1">
                                    <i class="fab fa-facebook-f mr-2"></i>Facebook
                                </button>
                                <button type="button" class="btn btn-google flex-grow ml-1">
                                    <i class="fab fa-google mr-2"></i>Google
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018
                        All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php partial('includes/script.php', 'admin'); ?>
<script>
    $(document).ready(function () {
        const { toastError } = HDTShop.toast;
        <?php
            if(has_session('error')) {
                echo "toastError('Đăng nhập thất bại', '" . get_session('error') . "')";
            }
        ?>
    })
</script>
</body>
</html>
