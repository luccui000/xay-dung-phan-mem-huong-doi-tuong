<div class="cat-blocks-container">
    <div class="row">
        <?php foreach ($danhmucs as $danhmuc) { ?>
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="#" class="cat-block">
                    <figure>
                        <span>
                            <img src="<?php echo $danhmuc['hinh_anh']; ?>" alt="Category image">
                        </span>
                    </figure>

                    <h3 class="cat-block-title"><?php echo $danhmuc['ten_danh_muc']; ?></h3>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
