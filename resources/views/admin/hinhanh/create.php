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
