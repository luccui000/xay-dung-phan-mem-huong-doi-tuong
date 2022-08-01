<div class="tab-content tab-content-carousel just-action-icons-sm">
    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                    "nav": true,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":5
                        }
                    }
                }'>
            <?php foreach ($sanphams as $sanpham) { ?>
                <?php if($sanpham->la_san_pham_moi) {?>
                    <div class="product product-2">
                        <figure class="product-media">
                            <?php if($sanpham->la_san_pham_moi) {?>
                                <span class="product-label label-circle label-new">New</span>
                            <?php } ?>
                            <?php if($sanpham->la_san_pham_giam_gia) {?>
                                <span class="product-label label-circle label-sale">Sale</span>
                            <?php } ?>
                            <?php if($sanpham->la_san_pham_noi_bat) {?>
                                <span class="product-label label-circle label-top">Top</span>
                            <?php } ?>
                            <a href="/san-pham/chi-tiet?id=<?php echo $sanpham->id; ?>">
                                <img src="<?php echo $sanpham->hinh_anh; ?>" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="/san-pham/them-vao-yeu-thich?id=<?php echo $sanpham->id; ?>" class="btn-product-icon btn-wishlist" title="Thêm vào danh sách yêu thích"></a>
                            </div>

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                <a href="#" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                            </div>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Laptops</a>
                            </div>
                            <h3 class="product-title"><a href="/san-pham/chi-tiet?id=<?php echo $sanpham->id; ?>"><?php echo $sanpham->ten_san_pham ?></a></h3>
                            <div class="product-price">
                                <?php echo vnmoney($sanpham->gia_cuoi_cung); ?>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div>
                                </div>
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="new-tv-tab" role="tabpanel" aria-labelledby="new-tv-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-3.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-2.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <span class="product-label label-circle label-sale">Sale</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-4.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL  128GB</a></h3>
                    <div class="product-price">
                        <span class="new-price">$35.41</span>
                        <span class="old-price">Was $41.67</span>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 10 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-5.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">TV & Home Theater</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Samsung - 55" Class  LED 2160p Smart</a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 5 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="new-computers-tab" role="tabpanel" aria-labelledby="new-computers-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-5.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">TV & Home Theater</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Samsung - 55" Class  LED 2160p Smart</a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 5 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-3.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-2.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <span class="product-label label-circle label-sale">Sale</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-4.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL  128GB</a></h3>
                    <div class="product-price">
                        <span class="new-price">$35.41</span>
                        <span class="old-price">Was $41.67</span>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 10 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="new-phones-tab" role="tabpanel" aria-labelledby="new-phones-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-2.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-3.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-5.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">TV & Home Theater</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Samsung - 55" Class  LED 2160p Smart</a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 5 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <span class="product-label label-circle label-sale">Sale</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-4.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL  128GB</a></h3>
                    <div class="product-price">
                        <span class="new-price">$35.41</span>
                        <span class="old-price">Was $41.67</span>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 10 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="new-watches-tab" role="tabpanel" aria-labelledby="new-watches-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <span class="product-label label-circle label-sale">Sale</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-4.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL  128GB</a></h3>
                    <div class="product-price">
                        <span class="new-price">$35.41</span>
                        <span class="old-price">Was $41.67</span>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 10 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-2.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-3.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="new-acc-tab" role="tabpanel" aria-labelledby="new-acc-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-5.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">TV & Home Theater</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Samsung - 55" Class  LED 2160p Smart</a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 5 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-2.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div>
                </div>
            </div>

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-3.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
