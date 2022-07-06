<div class="auth-wrapper">
    <div class="auth-background"></div>
    <div class="auth-container">
        <form class="auth-form" action="<?= BASE_URL ?>/client/save-info" method="post" enctype="multipart/form-data" style="width: 400px; object-position: center;">
            <div class="auth-form--title">
                <h1 style="text-align: center; margin-bottom: 20px; margin-top:80px">Thông tin tài khoản</h1>
                <span style="color: red;">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </span>
            </div>
            <div class="auth-form--body" style="font-size: 19px;">
                <div class="mb-3">
                    <label for="avatar" style="width: 100px; height: 100px; margin-left: 150px;; border: 3px solid black; border-radius: 50%; text-align: center; cursor: pointer; font-size: 6.5rem;"><i class="far fa-user-circle"></i></label>
                    <input type="file" class="form-control" hidden name="avatar" id="avatar">
                </div>
                <div class="mb-3">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" name="email" id="name" value="<?= $user['email'] ?>" disabled style="text-transform: none; font-size: 20px;">
                </div>
                <div class="mb-3">
                    <label for="name">Họ Tên</label>
                    <input type="text" class="form-control" name="ten" id="name" value="<?= $user['ten'] ?>" style="text-transform: none; font-size: 20px;">
                </div>
                <div class="mb-3">
                    <label for="sdt">SĐT</label>
                    <input type="text" class="form-control" name="sdt" id="sdt" value="<?= $user['sdt'] ?>" style="text-transform: none; font-size: 20px;">
                </div>
                <a href='<?= BASE_URL ?>/client/edit-password'>Đổi mật Khẩu</a>
                <button type="submit" class="btn btn-blue mb-6" name="register">Cập nhật</button>
                <a href='<?= BASE_URL ?>/log-out' class="btn btn-danger">Đăng Xuất</a>
            </div>
        </form>
    </div>
</div>