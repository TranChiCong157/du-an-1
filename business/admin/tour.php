<?php 
function  tour_list(){
    if(isset($_POST['search_tour'])){
        extract($_REQUEST);
        if (empty($ngay_di) && empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour";
            $tour = query($sql);
        } else if (!empty($ngay_di) && empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour where ngay_di = '$ngay_di'";
            $tour = query($sql);
        } else if (empty($ngay_di) && !empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour where id_diachi = '$dia_chi'";
            $tour = query($sql);
        } else if (empty($ngay_di) && empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql = "SELECT * FROM tour where gia >= '$pre' and gia <= '$next'";
            } else {
                $value = $values;
                $sql = "SELECT * FROM tour where noi_di like '%$value%'";
            }
            $tour = query($sql);
        } else if (!empty($ngay_di) && !empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour where ngay_di = '$ngay_di' and id_diachi = '$dia_chi'";
            $tour = query($sql);
        } else if (empty($ngay_di) && !empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql = "SELECT * FROM tour where id_diachi = '$dia_chi' and gia > '$pre' and gia < '$next'";
            } else {
                $value = $values;
                $sql = "SELECT * FROM tour where id_diachi = '$dia_chi' and noi_di like '%$value%'";
            }
            $tour = query($sql);
        } else if (!empty($ngay_di) && empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql = "SELECT * FROM tour where ngay_di = '$ngay_di' and gia > '$pre' and gia < '$next'";
            } else {
                $value = $values;
                $sql = "SELECT * FROM tour where ngay_di = '$ngay_di' and (noi_di like '%$value%')";
            }
            $tour = query($sql);
        } else if (!empty($ngay_di) && !empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql =  "SELECT * FROM  tour where  ngay_di = '$ngay_di' and id_diachi = '$dia_chi' and (gia > '$pre' and gia < '$next')";
            } else {
                $value = $values;
                $sql =  "SELECT * FROM  tour where  ngay_di = '$ngay_di' and id_diachi = '$dia_chi' and (noi_di like '%$value%')";
            }
            $tour = query($sql);
        }
    }else if(isset($_GET['id'])){
        $tour = getSelect_by_id('tour', 'id', intval($_GET['id']));
        
    }else if(isset($_GET['id_ct'])){
        $tour = getSelect_by_id('tour', 'id_danhmuc', intval($_GET['id_ct']));
    }else if(isset($_GET['id_st'])){
        $tour = getSelect_by_id('tour', 'trang_thai', intval($_GET['id_st']));
    
    } else{
       
        $tour = getSelect('tour', 0, 10);
       
    }
    $address = getSelect('dia_chi', 0, 20);
    admin_render('tour/list.php', ['result' => $tour,'address' => $address]);

   
    
}

function tour_add(){
    admin_render('tour/add.php');
} 

function tour_save_add(){
    extract($_REQUEST);
    $anh = $_FILES['anh'];
if(
    checkEmpty($ten) == false ||
    checkEmpty($id_danhmuc) == false ||
    checkEmpty($id_diachi) == false ||
    checkEmpty($noi_di) == false ||
    checkEmpty($gia) == false ||
    checkEmpty($mo_ta) == false ||
    checkEmpty($thong_tin) == false ||
    checkEmpty($anh['name']) == false 
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: ". BASE_URL . "/admin/tour/add");
    die;
}
if(!checkInt(intval($gia))){
    $_SESSION['error'] = "Giá không đúng định dạng !";
    header("Location: ". BASE_URL . "/admin/tour/add");
    die;
}
if(!checkImage($anh)){
    $_SESSION['error'] = "File phải là ảnh !";
    header("Location: ". BASE_URL . "/admin/tour/add");
    die;
}

if($id_danhmuc == "1"){
    $ngay_di = null;
    $ngay_den = null;
}

save_file($anh);
$ngay_them = date('Y-m-d');
insert_tour( $ten, $id_diachi, $anh['name'], $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia ,$ngay_them);
header("Location:" . BASE_URL . "/admin/tour/list");
}

function tour_update(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/tour/list");
    }
    $result = getSelect_one('tour', 'id', intval($_GET['id']));
    admin_render('tour/update.php', ['value' => $result]);

}
function tour_save_update(){
    extract($_REQUEST);
    $anh = $_FILES['anh'];
    $ngay_sua = date('Y-m-d');
    if(
        checkEmpty($ten) == false ||
        checkEmpty($id_danhmuc) == false ||
        checkEmpty($id_diachi) == false ||
        checkEmpty($noi_di) == false ||
        checkEmpty($gia) == false ||
        checkEmpty($mo_ta) == false ||
        checkEmpty($thong_tin) == false 
    ){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location:" . BASE_URL . "/admin/tour/update?id=$id");
        die;
    }
    if(!checkInt(intval($gia))){
        $_SESSION['error'] = "Giá không đúng định dạng !";
        header("Location:" . BASE_URL . "/admin/tour/update?id=$id");
        die;
    }
    if($id_danhmuc == "1"){
        $ngay_di = null;
        $ngay_den = null;
    }
    $tour = getSelect_one('tour','id',$id);
    $don_hang = getSelect_one('don_hang', 'id_tour', $tour['id']);
    if(!empty($don_hang)){
        $_SESSION['error'] = "Đã có khách đặt tour, bạn không thể cập nhật !";
        header("Location:" . BASE_URL . "/admin/tour/update?id=$id");
        die;
    }
    if(!checkEmpty($anh['name'])){
        update_tour($ten, $id_diachi, $tour['anh'], $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
    } else{
        if(!checkImage($anh)){
            $_SESSION['error'] = "File không phải là ảnh !";
            header("Location: " . BASE_URL . "/admin/tour/update?id=$id");
            die;
        }
        save_file($anh);
        unlink($image_path . $tour['anh']);
        update_tour($ten, $id_diachi, $anh['name'], $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
    }   
    header("Location:" . BASE_URL . "/admin/tour/update");

}
function tour_delete(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/tour/list");
    }
    $tour = getSelect_one('tour','id',intval($_GET['id']));
    unlink($_SERVER['DOCUMENT_ROOT'] . IMAGE_URL . $tour['anh']);
    getDelete('tour', 'id',intval($_GET['id']));
    header("Location: " . BASE_URL . "/admin/tour/list");
}

function tour_status(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/tour/list");
    }
    $id = intval($_GET['id']);
    $status = intval($_GET['st']);
    if($status == 1){
        update_status('tour', 2, $id);
    } else if($status == 2){
        update_status('tour', 1, $id);
    }
    header("Location: " . BASE_URL . "/admin/tour/list");
    
}


?>