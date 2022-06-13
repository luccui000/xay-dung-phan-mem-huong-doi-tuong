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
        .entry-content *{
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
        }
        .entry-media img {
            object-position: center;
            object-fit: cover;
            max-height: 170px;
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
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <?php foreach ($baiviets as $baiviet) { ?>
                            <article class="entry entry-list">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <figure class="entry-media">
                                            <a href="#">
                                                <img src="<?php echo assets($baiviet->hinh_anh) ?>" alt="<?php echo $baiviet->tieu_de ?>">
                                            </a>
                                        </figure>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <span class="entry-author">
                                                    by <a href="#">John Doe</a>
                                                </span>
                                                <span class="meta-separator">|</span>
                                                <a href="#">Nov 22, 2018</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">2 Comments</a>
                                            </div>

                                            <h2 class="entry-title">
                                                <a href="/bai-viet/chi-tiet?id=<?php echo $baiviet->id ?>"><?php echo $baiviet->tieu_de ?></a>
                                            </h2>

                                            <div class="entry-cats">
                                                in <a href="#">Lifestyle</a>,
                                                <a href="#">Shopping</a>
                                            </div>

                                            <div class="entry-content">
                                                <p><?php echo \Luccui\Core\Str::makeReadMore($baiviet->noi_dung) ?></p>
                                                <a href="/bai-viet/chi-tiet?id=<?php echo $baiviet->id ?>" class="read-more">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php } ?>

                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
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
                                                <img src="assets/images/blog/sidebar/post-1.jpg" alt="post">
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
                                                <img src="assets/images/blog/sidebar/post-2.jpg" alt="post">
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
                                                <img src="assets/images/blog/sidebar/post-3.jpg" alt="post">
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
                                                <img src="assets/images/blog/sidebar/post-4.jpg" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 25, 2018</span>
                                            <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">ad box 280 x 280</div>

                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                    </a>
                                </div>
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

                            <div class="widget widget-text">
                                <h3 class="widget-title">About Blog</h3>

                                <div class="widget-text-content">
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                                </div>
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
