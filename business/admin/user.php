<?php
function user_list() {
    if(isset($_POST['search_user'])){
        extract($_REQUEST);
        $sql = "SELECT * FROM khach_hang where ten  LIKE '%$values%' OR email LIKE '%$values%' OR sdt LIKE '%$values%' ";
        $result = query($sql);
    }else if (isset($_GET['id_st'])){
        $result = getSelect_by_id('khach_hang', 'trang_thai', intval($_GET['id_st']));
    }else if(isset($_GET['id'])){
        $result = getSelect_one('khach_hang', 'id', intval($_GET['id']));
    }    
    else{
        $result = getSelect('khach_hang', 0, 10);
    }
    admin_render('user/list.php', ['result' => $result]);
   
}

function user_add() {
    admin_render('user/add.php');
}

function user_save_add(){
    extract($_REQUEST);
if(
    checkEmpty($email) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($sdt) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL  . "/admin/user/add");
    die;
}

$ton_tai = getSelect_one('khach_hang', 'email', $email);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Email đã tồn tại !";
    header("Location: " . BASE_URL  . "/admin/user/add");
    die;
}

$mat_khau = md5($mat_khau);

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: " . BASE_URL  . "/admin/user/add");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: " . BASE_URL  . "/admin/user/add");
    die;
}
$ngay_them = date('Y-m-d');
insert_user($ten, $mat_khau, $email, $sdt, $ngay_them);
header("Location: " . BASE_URL  . "/admin/user/list");
}

function user_update(){
    if(isset($_GET['id'])){
        $result = getSelect_one('khach_hang', 'id', intval($_GET['id']));
        admin_render('user/update.php', ['result' => $result]);
    }
    header("Location: " . BASE_URL  . "/admin/user/list");
}

function user_save_update(){
    extract($_REQUEST);
if(
    checkEmpty($id) == false ||
    checkEmpty($email) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($sdt) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL . "/admin/user/update?id=$id");
    die;
}

$ton_tai = getSelect_one('khach_hang', 'email', $email);
if(!empty($ton_tai) && $email_cu != $email){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: " . BASE_URL . "/admin/user/update?id=$id");
    die;
}

if($mat_khau_cu == $mat_khau){
    $mat_khau = $mat_khau_cu;
} else {
    $mat_khau = md5($mat_khau);
}

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/user/update?id=$id");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/user/update?id=$id");
    die;
}
update_user($ten, $mat_khau, $email, $sdt, $id);
header("Location: " . BASE_URL . "/admin/user/list");
}

function user_status(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('khach_hang', 2, $id);
        } else if($status == 2){
            update_status('khach_hang', 1, $id);
        }
    }
    header("Location: " . BASE_URL . "/admin/user/list");
}

function user_delete(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        getDelete('khach_hang', 'id', $id);
    }
    header("Location: " . BASE_URL . "/admin/user/list");
}
?>