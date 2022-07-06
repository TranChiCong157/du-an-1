<?php

function slider_list() {
    if(isset($_POST['search_slider'])){
        extract($_REQUEST);
        $sql = "SELECT * FROM slider where ngay_tao  LIKE '%$values%' OR ten_slide LIKE '%$values%' ";
        $result = query($sql);
    }else if (isset($_GET['id_st'])){
        $result = getSelect_by_id('slider', 'trang_thai', intval($_GET['id_st']));
    }
    else{
        $result = getSelect('slider', 0, 10);
    }
    admin_render('slider/list.php', ['result' => $result]);
}

function slider_add() {
    admin_render('slider/add.php');
}

function slider_save_add() {
    $ten_slide = $_POST['ten_slide'];
    $image = $_FILES['anh'];
    $url = $_POST['url'];
    $date = date('Y-m-d');

    if(empty($ten_slide) || empty($image['name']) || empty($url)){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: ". BASE_URL ."/admin/slider/add");
        die;
    }

    $ton_tai = getSelect_one('slider', 'ten_slide', $ten_slide);
    if(!empty($ton_tai)){
        $_SESSION['error'] = "Tên slide đã tồn tại!";
        header("Location: ". BASE_URL ."/admin/slider/add");
        die;
    }

    if(!checkImage($image)) {
        $_SESSION['error'] = 'Loại ảnh không đúng.';
        header("location: ". BASE_URL ."/admin/slider/add");
        die;
    }

    save_file($image);
    insert_slide($ten_slide, $image['name'], $url, $date);
    header("Location: ". BASE_URL ."/admin/slider/list");
}
function slider_status(){
    if(!isset($_GET['id'])){
            header("Location: " . BASE_URL . "/admin/slider/list");
    }
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('slider', 2, $id);
        } else if($status == 2){
            update_status('slider', 1, $id);
        }
        header("Location:". BASE_URL . "/admin/slider/list");
    }

function slider_update() {
    if(!isset($_GET['id'])) {
        header("Location: ". BASE_URL ."/admin/slider/list");
        die;
    }
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $result = getSelect_one('slider', 'id', $id);
    admin_render('slider/update.php', ['result' => $result]);
}

function slider_save_update() {
    extract($_REQUEST);
    $id = $_SESSION['id'];
    $ten_slide = $_POST['ten_slide'];
    $image = $_FILES['anh'];
    $url = $_POST['url'];
    $date = date('Y-m-d');

    if(empty($ten_slide) || empty($image['name']) || empty($url)){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: ". BASE_URL ."/admin/slider/update?id=" . $id);
        die;
    }

    $ton_tai = getSelect_one('slider', 'ten_slide', $ten_slide);
    if(!empty($ton_tai)){
        $_SESSION['error'] = "Tên slide đã tồn tại!";
        header("Location: ". BASE_URL ."/admin/slider/update");
        die;
    }

    if(!checkImage($image)) {
        $_SESSION['error'] = 'Loại ảnh không đúng.';
        header("location: ". BASE_URL ."/admin/slider/update?id=".$id);
        die;
    }

    save_file($image);
    update_slide($ten_slide, $image['name'], $url, $id);
    header("Location: ". BASE_URL ."/admin/slider/list");
}

function slider_delete() {
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $khach_san = getSelect_one('slider', 'id', $id);
        unlink($_SERVER['DOCUMENT_ROOT'] . IMAGE_URL . $khach_san['image']);
        getDelete('slider', 'id', $id);
    }
    header("Location:" . BASE_URL .  "/admin/slider/list");   
}

?>