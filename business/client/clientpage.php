<?php
function client_homepage()
{
    if (isset($_POST['submit'])){
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
    $_SESSION['find_tour'] = "Có " . count($tour) . " Tour bạn muốn tìm";
    } else if (isset($_GET['ct'])) {
        $tour = tour_by_category(intval($_GET['ct']));
    } else {
        $tour = getSelect("tour", 0, 10);
    }
    if( isset($_SESSION['user'])){
    $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
    } else {
        $order = [];
    }
    $hightlights = select_hightlights();
    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    $slider = getSelect("slider", 0, 10);
    client_render('homepage.php', [
        "result" => $tour,
        "category" => $category,
        "address" => $address,
        "slider" => $slider ,
        "hightlights" => $hightlights,
        "order" => $order,
        ]);

}
function client_detail()
{   
    $tour_detail = getSelect_one("tour", "id", intval($_GET['id']));
    $comment = getSelect_cmt("binh_luan", "id_tour", intval($_GET['id']));
    $lq = selct_tour_lq(intval($tour_detail['id_danhmuc']));
    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    if( isset($_SESSION['user'])){
        $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
        } else {
            $order = [];
    }
    client_render('detail.php', [
        "tour_detail" => $tour_detail,
        "comment" => $comment,
        "category" => $category,
        "address" => $address,
        "lq" => $lq,
        "order" => $order,
    ]);
}
function client_infor(){
    $result = getSelect("gioi_thieu", 0, 10);
    if( isset($_SESSION['user'])){
        $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
        } else {
            $order = [];
    }
    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    client_render('infor.php',[
        "result" => $result,
        "category" => $category,
        "address" => $address,
        "order" => $order,
    ]);
}   
function client_comment(){
    extract($_REQUEST);
    if(empty($noi_dung) || empty($danh_gia)){
        $_SESSION['error_cmt'] = "Vui lòng không để trống !";
        header("location: " . BASE_URL . "/detail?id=$id_tour#comment");
        die;
    }
    $date = date('Y-m-d H:i:s');
    insert_comment($id_kh, $id_tour, $noi_dung, $danh_gia, $date);
    header("location: " . BASE_URL . "/detail?id=$id_tour#comment");
}

function client_order(){
    if( isset($_SESSION['user'])){
        $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
        } else {
            $order = [];
    }
    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    client_render('order.php',[
        "category" => $category,
        "address" => $address,
        "order" => $order,
    ]);
}

function client_pay(){
    if($_GET['don_hang']){
        $don_hang = getSelect_one('don_hang', 'id', $_GET['don_hang']);
        if( isset($_SESSION['user'])){
            $order = getSelect_by_id('don_hang','id_kh', $_SESSION['user']['id']);
            } else {
                $order = [];
        }
        $category = getSelect("danh_muc", 0, 10);
        $address = getSelect('dia_chi', 0, 10);
        client_render('pay.php',[
            "don_hang" => $don_hang,
            "category" => $category,
            "address" => $address,
            "order" => $order,
        ]);
    }
}

function client_save_pay(){
    extract($_REQUEST);
    $anh = $_FILES['thanh_toan'];
    if(empty($anh['name']) || empty($id)){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: ". BASE_URL . "/pay?don_hang=$id");
        die;
    }
    if(!checkImage($anh)){
        $_SESSION['error'] = "File phải là ảnh !";
        header("Location: ". BASE_URL . "/pay?don_hang=$id");
        die;
    }
    save_file($anh);
    insert_pay($anh['name'], $id);
    $_SESSION['success'] = "<script>alert('Thanh toán thành công');</script>";
    header("Location: ". BASE_URL);
}
?>