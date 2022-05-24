<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row mx-auto" style="width: 500px; margin-top: 100px">
        <div class="col-12" >
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/store">
                        <h5 class="text-uppercase text-center my-2">Login</h5>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" class="form-control form-control-sm" type="text">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" class="form-control form-control-sm" type="password">
                        </div>
                        <button class="btn btn-primary btn-block">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
