<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?php partial('partials/stylesheet.php' ); ?>
    <title>Admin</title>
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
            <div class="col-sm-2 col-xs-6 sidebar pl-0">
                <?php partial('partials/sidebar.php' ); ?>
            </div>
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
            </div>
        </div>
    </div>
    <?php partial('partials/script.php' ); ?>
</body>
</html>
