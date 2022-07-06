
<div class="auth-wrapper" style="margin-top: -80px;">
    <div class="auth-background"></div>
    <div class="auth-container">
        <form class="auth-form" action="<?=BASE_URL?>/client/save-edit-password" method="post" enctype="multipart/form-data">
            <div class="auth-form--body" style="font-size: 17px;">
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
                    <label for="email">Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="mat_khau_cu" id="" placeholder="******">
                </div>
                <div class="mb-3">
                    <label for="email">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="mat_khau" id="" placeholder="******">
                </div>
                <div class="mb-3">
                    <label for="email">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="mat_khau2" id="" placeholder="******">
                </div>
                <button type="submit" class="btn btn-blue mb-3" name="login">Đổi mật khẩu</button>
            </div>
        </form>
    </div>
</div>