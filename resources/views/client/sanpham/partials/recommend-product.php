<div class="products">
    <div class="row justify-content-center">
        <?php foreach ($sanphams as $sanpham) { ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-sale">Sale</span>
                        <a href="/san-pham/chi-tiet?id=<?php echo $sanpham->id; ?>">
                            <img src="<?php echo $sanpham->hinh_anh; ?>" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="/san-pham/them-vao-yeu-thich?id=<?php echo $sanpham->id; ?>" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div>

                        <div class="product-action">
                            <form action="{! route('/san-pham/them-vao-gio-hang') !}" method="POST">
                                <button type="submit" class="btn-product btn-cart" title="Thêm sản phẩm vào giỏ hàng"><span>Thêm giỏ hàng</span></button>
                            </form>
                            <a href="#" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="/san-pham/danh-muc?id=<?php echo $sanpham->danhmuc_id; ?>"><?php echo $sanpham->ten_danh_muc; ?></a>
                        </div>
                        <h3 class="product-title"><a href="/san-pham/chi-tiet?id=<?php echo $sanpham->id; ?>"><?php echo $sanpham->ten_san_pham; ?></a></h3>
                        <div class="product-price">
                            <span class="new-price"><?php echo vnmoney($sanpham->gia_cuoi_cung); ?></span>
                            <span class="old-price">Was $349.99</span>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 40%;"></div>
                            </div>
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div>

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-11.jpg" alt="Product image" class="product-image">
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
                        <a href="#">Cameras & Camcorders</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">GoPro - HERO7 Black HD Waterproof Action</a></h3>
                    <div class="product-price">
                        $349.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-12.jpg" alt="Product image" class="product-image">
                        <img src="public/client/images/products/product-12-2.jpg" alt="Product image" class="product-image-hover">
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
                        <a href="#">Smartwatches</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - Apple Watch Series 3 with White Sport Band</a></h3>
                    <div class="product-price">
                        $214.49
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 0%;"></div>
                        </div>
                        <span class="ratings-text">( 0 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #f2bc9e;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-13.jpg" alt="Product image" class="product-image">
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
                    <h3 class="product-title"><a href="product.html">Lenovo - 330-15IKBR 15.6"</a></h3>
                    <div class="product-price">
                        <span class="out-price">$339.99</span>
                        <span class="out-text">Out Of Stock</span>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 11 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-14.jpg" alt="Product image" class="product-image">
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
                        <a href="#">Digital Cameras</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Sony - Alpha a5100 Mirrorless Camera</a></h3>
                    <div class="product-price">
                        $499.99
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 50%;"></div>
                        </div>
                        <span class="ratings-text">( 11 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-15.jpg" alt="Product image" class="product-image">
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
                    <h3 class="product-title"><a href="product.html">Home Mini - Smart Speaker  with Google Assistant</a></h3>
                    <div class="product-price">
                        $49.00
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 24 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #ef837b;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-sale">Sale</span>
                    <a href="product.html">
                        <img src="public/client/images/products/product-16.jpg" alt="Product image" class="product-image">
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
                    <h3 class="product-title"><a href="product.html">WONDERBOOM Portable Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        <span class="new-price">$99.99</span>
                        <span class="old-price">Was $129.99</span>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 40%;"></div>
                        </div>
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div>

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="public/client/images/products/product-17.jpg" alt="Product image" class="product-image">
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
                        <a href="#">Smart Home</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Home Hub with  Google Assistant</a></h3>
                    <div class="product-price">
                        $149.00
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div>
                        </div>
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
