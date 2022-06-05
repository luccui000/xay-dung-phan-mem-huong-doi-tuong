<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php partial('partials/stylesheet.php' ); ?>
    <title>Admin</title>
    <style>
        .hinh-anh {
            width: 100%;
            height: 100px;
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>
<body>
<div class="loader-wrapper">
    <div class="loader-circle">
        <div class="loader-wave"></div>
    </div>
</div>

<div class="container-fluid">
    <?php partial('partials/header.php' ); ?>
    <div class="row main-content">
        <div class="col-2 sidebar pl-0">
            <?php partial('partials/sidebar.php' ); ?>
        </div>
        <div class="col-10 content pt-3 pl-0">
            <div class="card p-2">
                <form action="/admin/hinh-anh/store" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8 d-flex justify-content-end">
                            <input name="hinh_anh[]" multiple hidden id="hinh_anh" type="file">
                            <label for="hinh_anh">
                                <a class="btn btn-primary text-white">Tải hình ảnh</a>
                            </label>
                        </div>
                        <div class="col-4"></div>
                        <div class="modal fade" id="upload">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-2">
                                    <div class="modal-header">
                                        <h5 class="model-title">Header</h5>
                                    </div>
                                    <div class="model-body">
                                        <ul class="list-group" id="files_uploading">

                                        </ul>
                                        <button class="btn btn-success btn-block mt-2">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-2">
                    <div class="col-8">
                        <?php foreach ($hinhanhs as $hinhanh) { ?>
                            <div class="row">
                                <?php foreach ($hinhanh as $cot) { ?>
                                    <div class="col-2">
                                        <div class="card" data-hinhanh data-id="<?php echo $cot->id; ?>" data-duongdan="<?php echo assets($cot->duong_dan); ?>">
                                            <img class="card-img-top hinh-anh" src="<?php echo assets($cot->duong_dan); ?>" alt="Card image cap">
                                            <p class="card-text py-1 text-center"><?php echo $cot->id; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4">
                        <div class="card p-2">
                            <h6>Thông tin hình ảnh</h6>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php partial('partials/script.php'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hinhanhs = document.querySelectorAll("[data-hinhanh]");
        const inputHinhAnh = document.getElementById("hinh_anh");
        const filesUploading = document.getElementById("files_uploading");

        hinhanhs.forEach(hinhanh => {
            hinhanh.addEventListener('click', function() {
                hinhanhs.forEach(h => h.classList.remove('border'))
                hinhanh.classList.add('border');
            })
        })
        inputHinhAnh.addEventListener("change", function (e) {
            const files = e.target.files;
            Array.from(files).forEach(file => createFileNameDOM(file.name))
            $("#upload").modal('show')
        })
        function createFileNameDOM(fileName) {
            const li = document.createElement('li');
            li.classList.add('list-group-item');
            li.textContent = fileName;
            filesUploading.append(li);
        }
    })
</script>
</body>
</html>
