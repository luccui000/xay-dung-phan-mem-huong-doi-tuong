<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="<?php echo assets('public/images/logo.png'); ?>" alt="image"/>
                </div>
                <div class="profile-name">
                    <p class="name">
                        Xin chào <?php echo lcfirst(\Luccui\Core\Session::get(\Luccui\Classes\XacThuc::SESSION_ADMIN_TEN_TAI_KHOAN)); ?>
                    </p>
                    <p class="designation">
                        Quản trị viên
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{! route('/admin/trang-chu'); !}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Trang chủ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/widgets.html">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Widgets</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Sản phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="/admin/san-pham">Danh sách</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="/admin/san-pham/create">Thêm mới</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="/admin/danh-muc">Danh mục</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                <i class="fas fa-pen-square menu-icon"></i>
                <span class="menu-title">Bài viết</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/bai-viet">Bài viết</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="pages/forms/code_editor.html">Code editors</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Đơn hàng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{! route('/admin/don-hang') !}">Đơn hàng</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
                <i class="fas fa-minus-square menu-icon"></i>
                <span class="menu-title">Popups</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation.html">
                <i class="far fa-file-alt menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
