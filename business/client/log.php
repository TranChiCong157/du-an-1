<?php

function client_login_form() {
    include_once './views/client/login.php';
}

function client_login() {
    extract($_REQUEST);
    if(empty($email) || empty($mat_khau)) {
        $_SESSION['error'] = 'Không được để trống.';
        header("location: " . BASE_URL . "/login");
        die;
    }
    $user = getSelect_one('khach_hang', 'email', $email);
    
    if (empty($user) || md5($mat_khau) != $user['mat_khau']) {
        $_SESSION['error'] = 'Mật khẩu hoặc tài khoản không đúng.';
        header("location: " . BASE_URL . "/login");
        die;
    }
    if(intval($user['trang_thai']) == 2){
        $_SESSION['error'] = 'Tài khoản của bạn đã bị khóa';
        header("location: " . BASE_URL . "/login");
        die;
    }
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "<script>alert('Đăng nhập thành công.');</script>";
    if(isset($_SESSION['id_tour'])){
        $id_tour = $_SESSION['id_tour'];
        unset($_SESSION['id_tour']);
        header("location: " . BASE_URL . "/detail?id=$id_tour");
        die;
    }
    header("Location: " . BASE_URL . "/");
}

function client_log_out() {
    if(!isset($_SESSION['user'])){
        header("Location:".BASE_URL."/");
        die;
    }
    unset($_SESSION['user']);
    $_SESSION['success'] = "<script>alert('Bạn đã đăng xuất.');</script>";
    header("Location:".BASE_URL."/");
}

function client_sign_up_form() {
    include_once './views/client/sign_up.php';
}

function client_sign_up() {
    extract($_REQUEST);
    $_SESSION['info'] = $_REQUEST;
    // Register
    $user = getSelect_one('khach_hang', 'email', $email);
    if(empty($email) || empty($mat_khau) || empty($mat_khau2) || empty($ten) || empty($sdt)) {
        $_SESSION['error'] = 'Mời bạn nhập đầy đủ thông tin.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if(!empty($user)) {
        $_SESSION['error'] = 'Mail bạn vừa nhập đã tồn tại.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if(strlen($mat_khau) < 6) {
        $_SESSION['error'] = 'Mật khẩu phải ít nhất 6 ký tự.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if($mat_khau2 != $mat_khau) {
        $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if(!checkSdt($sdt)) {
        $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    else {
        $chu_de = "Confirm Email";
        $code = random_int(100000,999999);
        $noi_dung = "<h3>Xin chào $ten đã đến với Webside du lịch VNTravel của chúng tôi, mã xác nhận là </h3>
        <h2 style='color:blue;'>$code</h2>
        <h3> mời bạn hãy nhập mã xác nhận ! Xin cảm ơn !</h3>";
        $_SESSION['checkMail']['noi_dung'] = $noi_dung;
        $_SESSION['checkMail']['chu_de'] = $chu_de;
        $_SESSION['checkMail']['ten'] = $ten;
        $_SESSION['checkMail']['email'] = $email;
        $_SESSION['code'] = $code;
        $_SESSION['id'] = 1;
        header("Location:" . BASE_URL . "/send-mail?id=1");
    }
}

// -------------Checkcode---------------

function client_check_code_form() {
    include_once './views/client/check_code.php';
}

function client_check_code() {
    $code = $_POST['code'];

    if(isset($_SESSION['code'])) {
        if(intval($_SESSION['code']) != $code) {
            $_SESSION['error'] = 'Mã code sai';
            header("Location:" . BASE_URL ."/check-code-form");
            die;
        }
    }

    if($_SESSION['id'] == 1) {
        if(isset($_SESSION['info'])) {
            extract($_SESSION['info']);
            $date = date('d m Y');
                $new_user = insert_user($ten, md5($mat_khau), $email, $sdt, $date);
                if(empty($new_user)) {
                    $_SESSION['success'] = "<script>alert('Đăng ký thành công');</script>";
                    header("location: " . BASE_URL . "/login");
                    die;
                }
            unset($_SESSION['info']);
            die;
        }
    }

    else {
        header('location: ' . BASE_URL . '/change-password-form');
    }
}

function client_sendmail() {
    require_once './sendmail/send.php';
}

// -------------Forgot password---------------------

//---------------- confirm email---------------------
function client_check_email_form() {
    include_once './views/client/forget-pass.php';
}

function client_check_email() {
    $email = $_POST['email'];
    
    if(!checkEmpty($email)) {
        $_SESSION['error'] = 'Bạn chưa nhập Email.';
        header("location:" . BASE_URL . "/forgot-password");
        die;
    }
    
    if(!checkEmail($email)) {
        $_SESSION['error'] = 'Email bạn nhập không đúng định dạng.';
        header("location:"  . BASE_URL ."/forgot-password");
        die;
    }
    
    $user = getSelect_one('khach_hang', 'email', $email);
    
    if(!checkEmpty($user)) {
        $_SESSION['error'] = 'Email của bạn không tồn tại.';
        header("location:" . BASE_URL ."/forgot-password");
        die;
    }
    
    else {
        $chu_de = "Confirm Email";
        $code = random_int(100000,999999);
        $noi_dung = "<h3>Xin chào " . $user['ten'] . ", mã xác nhận là <h2 style='color:blue;'>$code</h2> mời bạn hãy nhập mã xác nhận để thay đổi mật khẩu ! Xin cảm ơn !</h3>";
        $_SESSION['checkMail']['noi_dung'] = $noi_dung;
        $_SESSION['checkMail']['chu_de'] = $chu_de;
        $_SESSION['checkMail']['ten'] = $user['ten'];
        $_SESSION['checkMail']['email'] = $user['email'];
        $_SESSION['code'] = $code;
        $_SESSION['id'] = $user['id'];
        header("Location:" . BASE_URL . "/send-mail?id=2");

    }
}

// ---------------------Change forgot password---------------------
function client_change_pass_form() {
    include_once './views/client/changePass-form.php';
}

function client_change_pass() {
    $email = $_SESSION['checkMail']['email'];
    $mat_khau = $_POST['mat_khau'];
    $mat_khau2 = $_POST['mat_khau2'];
    if(strlen($mat_khau) < 6) {
        $_SESSION['error'] = 'Mật khẩu phải ít nhất 6 ký tự.';
        header("location:". BASE_URL . "/change-password-form");
        die;
    }

    if($mat_khau2 != $mat_khau) {
        $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
        header("location:". BASE_URL . "/change-password-form");
        die;
    }

    $newPass = update_user_one(md5($mat_khau), $email);
    if(!empty($newPass)) {
        $_SESSION['success'] = "<script>alert('Đổi mật khẩu không thành công');</script>";
        header("location:" . BASE_URL . "/login");
        die;
    }
    else {
        $_SESSION['success'] = "<script>alert('Đổi mật khẩu thành công');</script>";
        header("location:" . BASE_URL . "/login");
        die;
    }
}

// ---------------------CHANGE INFO USER---------------------
function client_edit_info() {
    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    if( isset($_SESSION['user'])){
        $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
        } else {
            $order = [];
    }
    $user = $_SESSION['user'];
    client_render('edit-user.php', [
        'user' => $user,
        "category" => $category,
        "address" => $address,
        "order" => $order,
    ]);
}

function client_save_edit_info() {
    $id = $_SESSION['user']['id'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    if (checkSdt($sdt) == false){
        $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
        header("Location: " . BASE_URL  . "/client/edit-info");
        die;
    }
    edit_user($ten, $sdt, $id);
    $new_user = getSelect_one('khach_hang', 'id', $id);
    $_SESSION['user'] = $new_user;
    header('location: ' . BASE_URL . '/client/edit-info');
}

// ---------------------CHANGE EDIT PASSWORD---------------------
function client_edit_password() {
    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    if( isset($_SESSION['user'])){
        $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
        } else {
            $order = [];
    }
    $user = $_SESSION['user'];
    client_render('edit-password.php', [
        'user' => $user,
        "category" => $category,
        "address" => $address,
        "order" => $order,
    ]);
}

function client_save_edit_password() {
    $mk_cu = $_POST['mat_khau_cu'];
    $mk_moi = $_POST['mat_khau'];
    $mk2 = $_POST['mat_khau2'];
    $user = $_SESSION['user'];

    if(empty($mk_cu) || empty($mk_moi) || empty($mk2)) {
        $_SESSION['error'] = "Mời bạn nhập đầy đủ thông tin";
        header("location:" . BASE_URL . "/client/edit-password");
        die;
    }

    if(strlen($mk_moi) < 6) {
        $_SESSION['error'] = "Mật khẩu ít nhất phải có 6 kí tự!";
        header("location:" . BASE_URL . "/client/edit-password");
        die;
    }

    if(md5($mk_cu) != $user['mat_khau']) {
        $_SESSION['error'] = "Mật khẩu cũ của bạn không đúng!";
        header("location:" . BASE_URL . "/client/edit-password");
        die;
    }

    if($mk_moi != $mk2) {
        $_SESSION['error'] = "Mật khẩu xác nhận không đúng!";
        header("location:" . BASE_URL . "/client/edit-password");
        die;
    }

    else {
        edit_password(md5($mk_moi), $user['id']);
        $_SESSION['error'] = "<script>alert('Đổi mật khẩu thành công.')</script>";
        header('location: ' . BASE_URL . '/client/edit-password');
    }
}