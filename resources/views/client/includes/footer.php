<footer class="footer">
    <?php if(!str_contains($_SERVER['REQUEST_URI'], 'dang-ky')) { ?>
    <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(<?php echo BASE_URL . 'public/client/images/bg-5.jpg' ?>);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="cta-heading text-center">
                        <h3 class="cta-title text-white">Nhận ngay ưu đãi</h3>
                        <p class="cta-desc text-white">đến từ cửa hàng <span class="font-weight-normal">voucher 200k</span> và hàng nghìn phần quà hấp dẫn</p>
                    </div>

                    <form action="#">
                        <div class="input-group input-group-round">
                            <input type="email" class="form-control form-control-white" placeholder="Nhập vào địa chỉ email" aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><span>Nhận ưu đãi ngay</span><i class="icon-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="public/client/images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>Nếu có bất kỳ thắc mắc hay hỗ trợ bạn có thể yêu cầu chúng tôi </p>

                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Gọi điện đến SDT
                            <a href="tel:#">+0399942301</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Trang</h4>

                        <ul class="widget-list">
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Cửa hàng</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Hướng dẫn mua sắm</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Dịch vụ khách hàng</h4>

                        <ul class="widget-list">
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Chính sách bảo hành</a></li>
                            <li><a href="#">Chính sách hoàn trả</a></li>
                            <li><a href="#">Hỗ trợ vận chuyển</a></li>
                            <li><a href="#">Chính sách và điều khoản</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Tài khoản của tôi</h4>

                        <ul class="widget-list">
                            <li><a href="#">Đăng nhập</a></li>
                            <li><a href="#">Xem giỏ hàng</a></li>
                            <li><a href="#">Sản phẩm yêu thích</a></li>
                            <li><a href="#">Theo dõi đơn hàng</a></li>
                            <li><a href="#">Giúp đỡ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
