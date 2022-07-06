<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhập mã code</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/css/login.css">
</head>

<body>
    <form class="auth-form" action="<?=BASE_URL?>/admin/check-code" method="post" style="margin: 50px auto 0;">
        <div class="auth-form--title">
            <h1>Nhập code xác nhận Email</h1>
            <span style="color: red;">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </span>
        </div>
        <div class="auth-form--body">
            <div class="mb-3">
                <label for="password">Nhập mã code</label>
                <input type="text" class="form-control" name="code" id="password2" placeholder="Nhập code">
            </div>
            <button type="submit" class="btn btn-blue mb-3" name="register">Xác Nhận</button>
        </div>
    </form>
</body>

</html>