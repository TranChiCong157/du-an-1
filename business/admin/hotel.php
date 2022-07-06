<?php

function hotel_list(){
    if(isset($_POST['search_hotel'])){
        extract($_REQUEST);
        $sql = "SELECT * FROM khach_san where dia_chi_ct LIKE '%$values%' OR sdt LIKE '%$values%' OR id_dc LIKE '%$values%' OR ten_ks LIKE '%$values%' ";
        $result = query($sql);
    }else if(isset($_GET['id_st'])){
        $result = getSelect_by_id('khach_san', 'trang_thai', intval($_GET['id_st']));
    }
    else{
    $result = getSelect('khach_san', 0, 10);
    }
    admin_render('hotel/list.php', ['result' => $result]);
}

function hotel_add() {
    $rows = getSelect('dia_chi', 0, 10);
    admin_render('hotel/add.php', ['rows' => $rows]);
}

function hotel_save_add() {
    extract($_REQUEST);
    $date = date('Y-m-d');
    $anh = $_FILES['anh'];

    if(empty($ten_ks) || empty($mo_ta) || empty($id_dc) ||
     empty($dia_chi_ct) || empty($sdt) || empty($anh['name'])){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: ". BASE_URL ."/admin/hotel/add");
        die;
    }

    $ton_tai = getSelect_one('khach_san', 'ten_ks', $ten_ks);
    if(!empty($ton_tai)){
        $_SESSION['error'] = "Tên khách sạn đã tồn tại!";
        header("Location: ". BASE_URL ."/admin/hotel/add");
        die;
    }
    if(!checkSdt($sdt)) {
        $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
        header("location: ". BASE_URL ."/admin/hotel/add");
        die;
    }

    if(!checkImage($anh)) {
        $_SESSION['error'] = 'Loại ảnh không đúng.';
        header("location: ". BASE_URL ."/admin/hotel/add");
        die;
    }

    save_file($anh);
    insert_ks($ten_ks, $anh['name'], $mo_ta, $id_dc, $dia_chi_ct, $sdt, $date);
    header("Location: ". BASE_URL ."/admin/hotel/list");
    }

function hotel_update() {
    if(!isset($_GET['id'])) {
        header("Location: ". BASE_URL ."/admin/hotel/list");
        die;
    }
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $rows = getSelect('dia_chi', 0, 10);
    $result = getSelect_one('khach_san', 'id', $id);
    admin_render('hotel/update.php', ['result' => $result, 'rows' => $rows]);
}

function hotel_save_update() {
    extract($_REQUEST);
    $id = $_SESSION['id'];
    $anh = $_FILES['anh'];


    if(empty($ten_ks) || empty($mo_ta) || empty($id_dc) ||
     empty($dia_chi_ct) || empty($sdt)){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location:".BASE_URL."/admin/hotel/update?id=$id");
        die;
    }

    $ton_tai = getSelect_one('khach_san', 'ten_ks', $ten_ks);
    if(!empty($ton_tai) && $ten_ks_cu != $ten_ks){
        $_SESSION['error'] = "Tên khách sạn không được trùng với khách sạn cũ   !";
        header("Location:".BASE_URL."/admin/hotel/update?id=$id");
        die;
    }
    if(!checkSdt($sdt)) {
        $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
        header("location:".BASE_URL."/admin/hotel/update?id=$id");
        die;
    }

    $khach_san = getSelect_one('khach_san', 'id', $id);
    if(!checkEmpty($anh['name'])) {
        update_ks($ten_ks,$khach_san['anh'],$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
    }
    else {
        if(!checkImage($anh)) {
            $_SESSION['error'] = "File không phải là ảnh !";
            header("Location:".BASE_URL."/admin/hotel/update?id=$id");
            die;
        }
        save_file($anh);
        unlink($image_path . $khach_san['anh']);
        update_ks($ten_ks,$anh['name'],$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
    }
    header("Location:".BASE_URL."/admin/hotel/list");
}

function hotel_delete() {
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $khach_san = getSelect_one('khach_san', 'id', $id);
        unlink($_SERVER['DOCUMENT_ROOT'] . IMAGE_URL . $khach_san['anh']);
        getDelete('khach_san', 'id', $id);
    }
    header("Location:" . BASE_URL .  "/admin/hotel/list");   
}

function hotel_status() {
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('khach_san', 2, $id);
        } else if($status == 2){
            update_status('khach_san', 1, $id);
        }
    }
    header("Location:" . BASE_URL .  "/admin/hotel/list");  
}
