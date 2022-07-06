<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi mật khẩu</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/login.css">
</head>

<body>
    <div class="auth-wrapper" style="margin-top: -80px;">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="<?=BASE_URL?>/admin/change-password" method="post" enctype="multipart/form-data">
                <div class="auth-form--body">
                    <h1>Đổi mật khẩu</h1>
                    <div class="mb-3">

                        <span style="color: red;">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="email">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="mat_khau" id="" placeholder="******">
                    </div>
                    <div class="mb-3">
                        <label for="email">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="mat_khau2" id="" placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="login">Thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>