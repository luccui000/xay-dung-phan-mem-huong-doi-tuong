<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh sách bài viết</title>
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
        .entry-content * {
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
        }
        .entry-media img {
            max-height: 400px;
            object-fit: cover;
            object-position: center;
        }
        .entry-content img {
            border-radius: 5px;
        }
        .entry-author-details {
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <?php partial('includes/header.php', 'client'); ?>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('<?php echo assets('public/client/images/page-header-bg.jpg'); ?>')">
            <div class="container">
                <h1 class="page-title">Bài viết</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/bai-viet">Bài viết</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <article class="entry single-entry">
                            <figure class="entry-media">
                                <img src="<?php echo assets($baiviet->hinh_anh); ?>" alt="image desc">
                            </figure>

                            <div class="entry-body">
                                <div class="entry-meta">
                                        <span class="entry-author">
                                            by <a href="#">John Doe</a>
                                        </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 22, 2018</a>
                                </div>

                                <h2 class="entry-title">
                                    <?php echo $baiviet->tieu_de; ?>
                                </h2>

                                <div class="entry-cats">
                                    in <a href="#">Lifestyle</a>,
                                    <a href="#">Shopping</a>
                                </div>

                                <div class="entry-content editor-content">
                                    <?php echo $baiviet->noi_dung; ?>
                                </div>

                                <div class="entry-footer row no-gutters flex-column flex-md-row">
                                    <div class="col-md">
                                        <div class="entry-tags">
                                            <span>Tags:</span> <a href="#">photography</a> <a href="#">style</a>
                                        </div>
                                    </div>

                                    <div class="col-md-auto mt-2 mt-md-0">
                                        <div class="social-icons social-icons-color">
                                            <span class="social-label">Share this post:</span>
                                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="entry-author-details">
                                <figure class="author-media">
                                    <a href="#">
                                        <img src="https://img.freepik.com/free-vector/white-abstract-background_23-2148810113.jpg?w=2000" alt="User name">
                                    </a>
                                </figure>

                                <div class="author-body">
                                    <div class="author-header row no-gutters flex-column flex-md-row">
                                        <div class="col">
                                            <h4><a href="#"><?php echo $tacgia->ho . ' ' . $tacgia->ten; ?></a></h4>
                                        </div>
                                        <div class="col-auto mt-1 mt-md-0">
                                            <a href="#" class="author-link">View all posts by John Doe <i class="icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <nav class="pager-nav" aria-label="Page navigation">
                            <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                                Bài viết trước
                                <span class="pager-link-title">Cras iaculis ultricies nulla</span>
                            </a>

                            <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                                Bào viết kế
                                <span class="pager-link-title">Praesent placerat risus</span>
                            </a>
                        </nav>

                    </div>

                    <aside class="col-lg-3">
                        <div class="sidebar">
                            <div class="widget widget-search">
                                <h3 class="widget-title">Search</h3>

                                <form action="#">
                                    <label for="ws" class="sr-only">Search in blog</label>
                                    <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required="">
                                    <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                                </form>
                            </div>

                            <div class="widget widget-cats">
                                <h3 class="widget-title">Categories</h3>

                                <ul>
                                    <li><a href="#">Lifestyle<span>3</span></a></li>
                                    <li><a href="#">Shopping<span>3</span></a></li>
                                    <li><a href="#">Fashion<span>1</span></a></li>
                                    <li><a href="#">Travel<span>3</span></a></li>
                                    <li><a href="#">Hobbies<span>2</span></a></li>
                                </ul>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Popular Posts</h3>

                                <ul class="posts-list">
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="http://lara-ecommerce.local/public/uploads/sanpham/Galaxy-S22-Ultra-Burgundy-600x600.jpg" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 22, 2018</span>
                                            <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="http://lara-ecommerce.local/public/uploads/sanpham/Galaxy-S22-Ultra-Burgundy-600x600.jpg" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 19, 2018</span>
                                            <h4><a href="#">Cras ornare tristique elit.</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="http://lara-ecommerce.local/public/uploads/sanpham/Galaxy-S22-Ultra-Burgundy-600x600.jpg" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 12, 2018</span>
                                            <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="http://lara-ecommerce.local/public/uploads/sanpham/Galaxy-S22-Ultra-Burgundy-600x600.jpg" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 25, 2018</span>
                                            <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Browse Tags</h3>

                                <div class="tagcloud">
                                    <a href="#">fashion</a>
                                    <a href="#">style</a>
                                    <a href="#">women</a>
                                    <a href="#">photography</a>
                                    <a href="#">travel</a>
                                    <a href="#">shopping</a>
                                    <a href="#">hobbies</a>
                                </div>
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
