<?php
function order_list(){      
    $result1 = select_order_linh_dong();
    $result = select_distinct();
    if(isset($_GET['id_ct'])){
        if(intval($_GET['id_ct']) == 1){
        $result1 = select_order_linh_dong();
        $result = [];
        }else{
        $result = select_distinct();
        $result1 = [];
        }
}
    admin_render('order/list.php', ['result1' => $result1, 'result' => $result]);
}

function order_add(){
    if(isset($_GET['id'])){
        $tour = getSelect_one("tour", 'id', intval($_GET['id']));
        admin_render('order/add.php', ['tour' => $tour]);
    }
    header("Location: " . BASE_URL  . "/admin/order/list");
}

function order_save_add(){
    extract($_REQUEST);
    if(
        checkEmpty($id_tour) == false ||
        checkEmpty($ngay_di) == false ||
        checkEmpty($noi_di) == false ||
        checkEmpty($gia) == false ||
        checkEmpty($email) == false 

    ){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
        die;
    }

    if(empty($nguoi_lon)){
        $nguoi_lon = 0;
    }
    if(empty($tre_em)){
        $tre_em = 0;
    }

    $user = getSelect_one("khach_hang", 'email', $email);
    if(empty($user)){
        $_SESSION['error'] = "Email không có trong dữ liệu !";
        header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
        die;
    }
    if(intval($user['trang_thai']) == 2){
        $_SESSION['error'] = "Tài khoản khách hàng bị vô hiệu hóa !";
        header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
        die;
    }
    if(!checkInt(intval($nguoi_lon))){
        $_SESSION['error'] = "Số lượng người lớn không đúng định dạng !";
        header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
        die;
    }

    if(!checkInt(intval($tre_em))){
        $_SESSION['error'] = "Số lượng trẻ em không đúng định dạng !";
        header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
        die;
    }

    if(!checkInt(intval($gia))){
        $_SESSION['error'] = "Giá không đúng định dạng !";
        header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
        die;
    }
    $danh_muc = getSelect_one('tour', 'id', $id_tour);
    if(intval($danh_muc['id_danhmuc']) == 1){
        if(intval($nguoi_lon) + intval($tre_em) < 7){
            $_SESSION['error'] = "Tổng số người phải trên 7 !";
            header("Location: " . BASE_URL . "/admin/order/add?id=$id_tour");
            die;
        }
    }
    $ngay_them = date('Y-m-d');
    insert_donhang($id_tour, $user['id'], $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $ngay_them, $_SESSION['admin']['id']);
    $don_hang = getSelect('don_hang', 0, 1);
    $chu_de = "Thanh Toán Đơn Hàng";
    $noi_dung = "<h3>Xin chào " . $user['name'] . " Cảm ơn bạn đã đặt tour tại website VNTravel, để thanh toán cho đơn hàng vui lòng truy cập <a href='" . BASE_URL . "/pay?don_hang=". $don_hang[0]['id'] ."'>Vào đây</a>, Xin cảm ơn</h3>";
    $_SESSION['checkMail']['noi_dung'] = $noi_dung;
    $_SESSION['checkMail']['chu_de'] = $chu_de;
    $_SESSION['checkMail']['ten'] = $ten;
    $_SESSION['checkMail']['email'] = $email;
    header("Location:" . BASE_URL . "/send-mail?id=4");
}

function order_update(){
    if(isset($_GET['id'])){
    $don_hang = getSelect_one("don_hang", 'id', intval($_GET['id']));
    $tour = getSelect_one("tour", 'id', intval($don_hang['id_tour']));
    $user = getSelect_one("khach_hang", 'id', intval($don_hang['id_kh']));
    admin_render('order/update.php', [
        'don_hang' => $don_hang,
        'user' => $user,
        'tour' => $tour
    ]);
    }
    header("Location: " . BASE_URL . "/admin/order/list");
}

function order_save_update(){
extract($_REQUEST);
if( 
    checkEmpty($ngay_di) == false ||
    checkEmpty($noi_di) == false ||
    checkEmpty($gia) == false ||
    checkEmpty($email) == false 
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL . "/admin/order/update?id=$id");
    die;
}

$user = getSelect_one("khach_hang", 'email', $email);
if(empty($user)){
    $_SESSION['error'] = "Email không có trong dữ liệu !";
    header("Location: " . BASE_URL . "/admin/order/update?id=$id");
    die;
}
if(empty($nguoi_lon)){
    $nguoi_lon = 0;
}
if(empty($tre_em)){
    $tre_em = 0;
}
if(!checkInt(intval($nguoi_lon))){
    $_SESSION['error'] = "Số lượng người lớn không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/order/update?id=$id");
    die;
}

if(!checkInt(intval($tre_em))){
    $_SESSION['error'] = "Số lượng trẻ em không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/order/update?id=$id");
    die;
}

if(!checkInt(intval($gia))){
    $_SESSION['error'] = "Giá không đúng định dạng !";
    header("Location: " . BASE_URL . "/admin/order/update?id=$id");
    die;
}
update_donhang($id_tour, $user['id'], $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $id);
if(isset($_GET['ct'])){
    header("Location: " . BASE_URL . "/admin/order/detail?ed=" . $_GET['ct']);
    die;
}
header("Location: " . BASE_URL . "/admin/order/list");
}

function order_delete(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        getDelete('don_hang', 'id', $id);
    }
    if(isset($_GET['ct'])){
        header("Location: " . BASE_URL . "/admin/order/detail?ed=" . $_GET['ct']);
        die;
    }
    header("Location: " . BASE_URL . "/admin/order/list");
}

function order_detail(){
    if(isset($_GET['id'])){
    $don_hang = getSelect_one("don_hang", 'id', intval($_GET['id']));
    $tour = getSelect_one("tour", 'id', $don_hang['id_tour']);
    $user = getSelect_one("khach_hang", 'id', $don_hang['id_kh']);
    admin_render('order/detail.php', [
        'don_hang' => $don_hang,
        'user' => $user,
        'tour' => extract($tour)
    ]);
    } else if (isset($_GET['ed'])){
        $don_hang = select_order_by_id_tour(intval($_GET['ed']));
        $tour = getSelect_one("tour", 'id', intval($_GET['ed']));
        admin_render('order/detail.php', [
            'don_hang' => $don_hang,
            'tour' => extract($tour)
        ]);
    }
}

function order_deposit(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $deposit = intval($_GET['dc']);
        if($deposit == 1){
            update_deposit('don_hang', 2, $id);
        } else if($deposit == 2){
            update_deposit('don_hang', 1, $id);
        }
    }
    if(isset($_GET['ct'])){
        header("Location: " . BASE_URL . "/admin/order/detail?ed=" . $_GET['ct']);
        die;
    }
    header("Location: " . BASE_URL . "/admin/order/list");
}

function order_status(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('don_hang', 2, $id);
        } else if($status == 2){
            update_status('don_hang', 1, $id);
        }
    }
    if(isset($_GET['ct'])){
        header("Location: " . BASE_URL . "/admin/order/detail?ed=" . $_GET['ct']);
        die;
    }
    header("Location: " . BASE_URL . "/admin/order/list");
}
?>