<?php
function admin_list() {
    if(isset($_POST['search_admin'])){
        extract($_REQUEST);
        $sql = "SELECT * FROM admin where ten  LIKE '%$values%' OR email LIKE '%$values%' OR sdt LIKE '%$values%' ";
        $result = query($sql);
    }else if (isset($_GET['id_st'])){
        $result = getSelect_by_id('admin', 'trang_thai', intval($_GET['id_st']));
    }else if(isset($_GET['id'])){
        $result = getSelect_one('admin', 'id', intval($_GET['id']));
    }    
    else{
        $result = getSelect('admin', 0, 10);
    }
    admin_render('admin/list.php', ['result' => $result]);
   
}

function admin_add() {
    admin_render('admin/add.php');
}

function admin_save_add(){
    extract($_REQUEST);
    $vaitro = $_POST['vai_tro'];
    if(
        checkEmpty($email) == false ||
        checkEmpty($mat_khau) == false ||
        checkEmpty($ten) == false ||
        checkEmpty($sdt) == false ||
        checkEmpty($vaitro) == false
    ){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: " . BASE_URL  . "/admin/admin/add");
        die;
    }

    $ton_tai = getSelect_one('admin', 'email', $email);
    if(!empty($ton_tai)){
        $_SESSION['error'] = "Email đã tồn tại !";
        header("Location: " . BASE_URL  . "/admin/admin/add");
        die;
    }

    if (checkEmail($email) == false){
        $_SESSION['error'] = "Email không đúng định dạng !";
        header("Location: " . BASE_URL  . "/admin/admin/add");
        die;
    }

    if (checkSdt($sdt) == false){
        $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
        header("Location: " . BASE_URL  . "/admin/admin/add");
        die;
    }
    $ngay_them = date('Y-m-d');
    insert_admin($ten, $mat_khau, $email, $sdt, $vaitro, $anh, $ngay_them);
    header("Location: " . BASE_URL  . "/admin/admin/list");
}

function admin_update(){
    if(isset($_GET['id'])){
        $result = getSelect_one('admin', 'id', intval($_GET['id']));
        admin_render('admin/update.php', ['result' => $result]);
    }
    header("Location: " . BASE_URL  . "/admin/admin/list");
}

function admin_save_update(){
    extract($_REQUEST);
    $anh = $_FILES['anh'];
    if(
    checkEmpty($id) == false ||
    checkEmpty($email) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($vai_tro) == false ||
    checkEmpty($sdt) == false
    ){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL . "/admin/admin/update?id=$id");
    die;
    }   

    $ton_tai = getSelect_one('admin', 'email', $email);
    if(!empty($ton_tai) && $email_cu != $email){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: " . BASE_URL . "/admin/admin/update?id=$id");
    die;
    }

    if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/admin/update?id=$id");
    die;
    }

    if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/admin/update?id=$id");
    die;
    }
    $user_old = getSelect_one('admin','id', $id);
    if(!checkEmpty($anh['name'])){

        edit_admin($ten, $email, $sdt, $user_old['anh'], $vai_tro, $id);
    }else{
        if(!checkImage($anh)){
            $_SESSION['error'] = "File không phải là ảnh !";
            header("Location: " . BASE_URL . "/admin/admin/update?id=$id");
            die;
        }
        
            save_file($anh);
            unlink($image_path . $user_old['anh']);
            edit_admin($ten, $email, $sdt, $anh['name'], $vai_tro, $id);
        }   
    header("Location: " . BASE_URL . "/admin/admin/list");    
}
function admin_status(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('admin', 2, $id);
        } else if($status == 2){
            update_status('admin', 1, $id);
        }
    }
    header("Location: " . BASE_URL . "/admin/admin/list");
}

function admin_delete(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        getDelete('admin', 'id', $id);
    }
    header("Location: " . BASE_URL . "/admin/admin/list");
}
?>