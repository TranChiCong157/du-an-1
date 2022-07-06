<?php 
function vehicle_list(){
    if(isset($_POST['search_vehicle'])){
        extract($_REQUEST);
        $sql = "SELECT * FROM phuong_tien where bien_so LIKE '%$values%' ";
        $result = query($sql);
    }else if (isset($_GET['id_st'])){
        $result = getSelect_by_id('phuong_tien', 'trang_thai', intval($_GET['id_st']));
    }
    else{
        $result = getSelect('phuong_tien', 0, 10);
    }
    admin_render('vehicle/list.php', ['result' => $result]);
}
function vehicle_add(){
    admin_render('vehicle/add.php');
}

function vehicle_save_add(){
    extract($_REQUEST);
    $anh = $_FILES['anh'];
 
if(
    checkEmpty($ten) == false ||
    checkEmpty($bien_so) == false ||
    checkEmpty($anh['name']) == false ||
    checkEmpty($so_ghe) == false 

){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL . "/admin/vehicle/add");
    die;
}

if(!checkBien($bien_so)){
    $_SESSION['error'] = "Biển số sai định dạng !";
    header("Location: " . BASE_URL . "/admin/vehicle/add");
    die;
}
$ton_tai_bien= getSelect_one('phuong_tien','bien_so', $bien_so);
if(!empty($ton_tai_bien)){
    $_SESSION['error'] = "Biển số đã tồn tại !";
    header("Location: " . BASE_URL . "/admin/vehicle/add");
    die;
}
if(!checkImage($anh)){
    $_SESSION['error'] = "File phải là ảnh!";
    header("Location: " . BASE_URL . "/admin/vehicle/add");
    die;
}

$ton_tai = getSelect_one('phuong_tien', 'bien_so', $bien_so);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Phương tiện đã tồn tại !";
    header("Location: " . BASE_URL . "/admin/vehicle/add");
    die;
}
save_file($anh,$image_path);
$ngay_them = date('Y-m-d');
insert_phuongtien($ten, $bien_so, $so_ghe,$anh['name'],$ngay_them);
header("Location: " . BASE_URL . "/admin/vehicle/list");
    
}

function vehicle_update(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/vehicle/list");
    }
    $result = getSelect_one('phuong_tien', 'id', intval($_GET['id']));
    admin_render('vehicle/update.php', ['result' => $result]);

}

function vehicle_save_update(){
    extract($_REQUEST);
    $anh = $_FILES['anh'];
if(
    checkEmpty($ten) == false ||
    checkEmpty($bien_so) == false ||
    checkEmpty($so_ghe) == false 

){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL . "/admin/vehicle/update?id=$id");
    die;
}

$ton_tai_bien = getSelect_one('phuong_tien', 'bien_so', $bien_so);
if(!empty($ton_tai_bien) && $bien_so_cu != $bien_so){
    $_SESSION['error'] = "Biển số đã tồn tại !";
    header("Location: " . BASE_URL . "/admin/vehicle/update?id=$id");
    die;
}
if(!checkBien($bien_so)){
    $_SESSION['error'] = "Biển số sai định dạng !";
    header("Location: " . BASE_URL . "/admin/vehicle/update?id=$id");
    die;
}
$phuong_tien = getSelect_one('phuong_tien','id',$id);
if(!checkEmpty($anh['name'])){
    update_phuongtien($ten, $bien_so, $so_ghe,$phuong_tien['anh'], $id);
} else{
    if(!checkImage($anh)){
        $_SESSION['error'] = "File không phải là ảnh !";
        header("Location: " . BASE_URL . "/admin/vehicle/update?id=$id");
        die;
    }
    save_file($anh);
    unlink($image_path . $phuong_tien['anh']);
    update_phuongtien($ten, $bien_so, $so_ghe,$anh['name'], $id);
}   
header("Location: " . BASE_URL . "/admin/vehicle/list");
}
function vehicle_delete(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/vehicle/list");
    }
    $phuong_tien = getSelect_one('phuong_tien','id',intval($_GET['id']));
    unlink($_SERVER['DOCUMENT_ROOT'] . IMAGE_URL . $phuong_tien['anh']);
    getDelete('phuong_tien', 'id',intval($_GET['id']));
    header("Location: " . BASE_URL . "/admin/vehicle/list");
}
function vehicle_status(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/vehicle/list");
    }
    $id = intval($_GET['id']);
    $status = intval($_GET['st']);
    if($status == 1){
        update_status('phuong_tien', 2, $id);
    } else if($status == 2){
        update_status('phuong_tien', 1, $id);
    }
    header("Location: " . BASE_URL . "/admin/vehicle/list");
    
}


?>