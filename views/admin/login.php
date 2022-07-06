<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/css/login.css">
    <style>a{text-align: center;}</style>
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="save-login" method="post">
                <div class="auth-form--title">
                    <h1>Đăng Nhập Quản Trị Viên</h1>
                </div>
                <div class="auth-form--body">
                    <div class="mb-3">
                        <span style="color:red">
                        <?php
                        
                        if (isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success']))
                        {
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                       
                        ?>
                        </span>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control"  name="email" placeholder="Tài Khoản">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" name="mat_khau" placeholder="******">
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <a href="<?= BASE_URL ?>/admin/forgot-password" id="hihi">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="login">Đăng Nhập</button>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-group-checkbox"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>