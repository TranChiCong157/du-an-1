<?php
// General -------------------------------------------------
function getSelect($table,$start, $quantity){
    $sql = "SELECT * FROM $table order by ngay_tao desc limit $start,$quantity";
    return query($sql);
}

function getSelect_one($table, $value, $id){
    $sql = "SELECT * FROM $table where $value = ?";
    return query_one($sql, $id);
}

function getDelete($table, $id, $value){
    $sql = "DELETE FROM $table WHERE $id = ?";
    return execute($sql, $value);
}

function update_status($table, $value, $id){
    $sql = "UPDATE $table set trang_thai = ? where id = ?";
    execute($sql, $value, $id);
}
function getSelect_by_id($table,$id, $value){
    $sql = "SELECT * FROM $table where $id = '$value'";
    return query($sql);
}

function getSelectAll($table){
    $sql = "SELECT * FROM $table";
    return query($sql);
}

// User ---------------------------------------------------
function insert_user($ten, $mat_khau, $email, $sdt, $ngay_them){
    $sql = "INSERT INTO khach_hang(ten, mat_khau, email, sdt, ngay_tao) VALUES (?, ?, ?, ?, ?)";
    execute($sql, $ten, $mat_khau, $email, $sdt, $ngay_them);
}

function edit_user($ten, $sdt, $id) {
    $sql = "UPDATE khach_hang set ten = ?, sdt = ? where id = ?";
    return execute($sql, $ten, $sdt, $id);
} 

function edit_password($mat_khau, $id) {
    $sql = "UPDATE khach_hang set mat_khau = ? where id = ?";
    return execute($sql, $mat_khau, $id);
} 

function update_user($ten, $mat_khau, $email, $sdt, $id){
    $sql = "UPDATE khach_hang set ten = ?, mat_khau = ?, email = ?, sdt = ? where id = ?";
    execute($sql, $ten, $mat_khau, $email, $sdt, $id);
}

function update_user_one($mat_khau, $email) {
    $sql = "UPDATE khach_hang set mat_khau = ? where email = ?";
    return execute($sql, $mat_khau, $email);
}

function check_email_existed($email) {
    $sql = "SELECT email FROM khach_hang WHERE email=?";
    return query_one($sql, $email);
}
//----------------------------------------ADMIN------------------------------------
function insert_admin($ten, $mat_khau, $email, $sdt, $vaitro, $anh, $ngay_them){
    $sql = "INSERT INTO admin(ten, mat_khau, email, sdt, vai_tro, anh, ngay_tao) VALUES (?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $ten, $mat_khau, $email, $sdt, $vaitro, $anh, $ngay_them);
}

function edit_admin($ten, $email, $sdt, $anh, $vai_tro, $id){
    $sql = "UPDATE admin set ten = ?, email = ?, sdt = ?, anh = ?, vai_tro = ? where id = ?";
    execute($sql, $ten, $email, $sdt, $anh, $vai_tro, $id);
}

function check_email_existed_admin($email) {
    $sql = "SELECT email FROM admin WHERE email=?";
    return query_one($sql, $email);
}
// function edit_admin($ten, $sdt, $anh, $id) {
//     $sql = "UPDATE admin set ten = ?, sdt = ?, anh = ? where id = ?";
//     execute($sql, $ten, $sdt, $anh, $id);
// } 
function edit_password_admin($mat_khau, $id) {
    $sql = "UPDATE admin set mat_khau = ? where id = ?";
     execute($sql, $mat_khau, $id);
} 


function update_admin($mat_khau,$email){
    $sql = "UPDATE admin set  mat_khau = ? where email = ?";
    execute($sql,$mat_khau, $email);
}



// Địa chỉ ------------------------------------------------
function insert_diachi($dia_chi,$ngay_tao){
    $sql = "INSERT INTO dia_chi(dia_chi, ngay_tao) VALUES(?, ?)";
    execute($sql, $dia_chi, $ngay_tao);
}
function update_diachi($dia_chi, $id){
    $sql = "UPDATE dia_chi set dia_chi = ? where id = ?";
    execute($sql,$dia_chi, $id);
}

// Khách sạn--------------------------------------------
function insert_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$ngay_tao) {
    $sql = "INSERT INTO khach_san(ten_ks,anh,mo_ta,id_dc,dia_chi_ct,sdt,ngay_tao) values(?,?,?,?,?,?,?)";
    return execute($sql, $ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$ngay_tao);
}

function update_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id){
    $sql = "UPDATE khach_san set ten_ks = ?,anh = ?,mo_ta = ?,id_dc = ?,dia_chi_ct = ?,sdt = ? where id = ?";
    return execute($sql,$ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
}

// Phương tiện-----------------------------------------
function insert_phuongtien($ten, $bien_so, $so_ghe, $anh, $ngay_tao){
    $sql = "INSERT INTO phuong_tien(ten, bien_so, so_ghe, anh, ngay_tao) VALUES(?, ?, ?, ?, ?)";
    execute($sql, $ten, $bien_so, $so_ghe, $anh, $ngay_tao);
}
function update_phuongtien($ten, $bien_so, $so_ghe,$anh, $id){
    $sql = "UPDATE phuong_tien set ten = ?, bien_so =?, so_ghe = ?, anh = ? where id = ?";
    execute($sql, $ten, $bien_so, $so_ghe,$anh, $id);
}
//Tour----------------------------------------------------
function insert_tour($ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia ,$ngay_tao){
    $sql = "INSERT INTO tour(ten, id_diachi, anh, id_danhmuc, ngay_di, ngay_den, noi_di, mo_ta, thong_tin, gia , ngay_tao) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia ,$ngay_tao);
}
function update_tour($ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia, $ngay_sua, $id){
    $sql = "UPDATE tour set ten = ?, id_diachi = ?, anh = ? ,id_danhmuc = ?, ngay_di = ?, ngay_den = ?, noi_di = ?, mo_ta =?, thong_tin = ?, gia = ?, ngay_sua = ? where id = ?";
    execute($sql, $ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
}
function select_hightlights(){
    $sql = "SELECT * FROM tour where trang_thai = 1  order by luot_xem asc limit 0,5 ";
    return query($sql);
}
function selct_tour_lq($id_danhmucchon){
    $sql = " SELECT * FROM  tour where id_danhmuc = " .$id_danhmucchon. " order by ngay_tao desc limit 0,3";
    return query($sql);
}

// Đơn hàng ---------------------------------------------
function insert_donhang($id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $ngay_tao, $id_admin){
    $sql = "INSERT INTO don_hang(id_tour, id_kh, nguoi_lon, tre_em, ngay_di, noi_di, gia, lich_trinh, ngay_tao, id_admin) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $ngay_tao, $id_admin);
}
function update_donhang($id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $id){
    $sql = "UPDATE don_hang set id_tour = ?, id_kh = ?, nguoi_lon = ?, tre_em = ?, ngay_di = ?, noi_di = ?, gia = ?, lich_trinh = ? where id = ?";
    execute($sql, $id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $id);
}
function update_deposit($table, $value, $id){
    $sql = "UPDATE $table set dat_coc = ? where id = ?";
    execute($sql, $value, $id);
}

// lấy danh sách đơn hàng có tour cố định
function select_distinct(){
    $sql1 = "SELECT * FROM tour where id_danhmuc = 2";
    $tours = query($sql1);
    $result = [];
    foreach($tours as $tour){
        $sql = "SELECT * FROM don_hang where id_tour = " . $tour['id'] . " order by ngay_tao DESC limit 0,1"; 
        if(!empty(query($sql))){
            array_push($result, query($sql));
        }
    }
    return $result;
}
function select_status_order($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = " . $id_tour . " and trang_thai = 1"; 
    return query($sql);
}
function select_deposit_order($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = " . $id_tour . " and dat_coc = 1"; 
    return query($sql);
}
// lấy danh sách đơn hàng có tour linh động
function select_order_linh_dong(){
    $sql1 = "SELECT * FROM tour where id_danhmuc = 1";
    $tours = query($sql1);
    $result = [];
    foreach($tours as $tour){
        $sql = "SELECT * FROM don_hang where id_tour = " . $tour['id'] . " order by ngay_tao DESC";
        if(!empty(query($sql))){
            array_push($result, query($sql));
        }
    }
    return $result;
}
// lấy danh sách khách hàng đặt tour linh động
function select_user_by_id_tour($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = $id_tour order by ngay_tao DESC";
    $order_distinct = query($sql);
    $result = [];
    foreach($order_distinct as $user){
        $sql = "SELECT * FROM khach_hang where id = " . $user['id_kh'] ;
        if(!empty(query($sql))){
            array_push($result, query($sql));
        }
    }
    return $result;
}
// lấy danh sách đơn hàng cùng 1 tour cố định
function select_order_by_id_tour($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = $id_tour order by ngay_tao DESC";
    return query($sql);
}

function select_order_by_id_category($id_category){
    $sql = "SELECT DH.* FROM ((don_hang DH INNER JOIN tour T ON DH.id_tour = T.id) INNER JOIN danh_muc DM ON T.id_danhmuc = DM.id) WHERE DM.id = $id_category";
    return query($sql);
}
function select_order_by_id_day(){
    $firstDay = date('Y-m-01');
    $lastDay = date("Y-m-t");
    $sql = "SELECT distinct(ngay_tao) FROM don_hang where ngay_tao >= '$firstDay' and ngay_tao <= '$lastDay'";
    return query($sql);
}
// function select_price_by_id_day($day){
//     $sql = "SELECT sum(gia) as gia FROM don_hang where ngay_tao = '$day'";
//     return query($sql);
// }

function insert_pay($thanh_toan, $id){
    $sql ="UPDATE don_hang SET thanh_toan = ? WHERE id = ?";
    execute($sql, $thanh_toan, $id);
}
// --------------------------- Danh Mục ------------------
function insert_danhmuc($ten,$date){
    $sql ="INSERT INTO danh_muc(ten,ngay_tao) VALUES(?,?)"; 
     execute($sql, $ten,$date);
}
function update_danhmuc($ten,$id){
    $sql ="UPDATE danh_muc set ten = ? where id = ?"; 
    execute($sql, $ten,$id);
}
/// tìm kiếm theo danh mục 
function tour_by_category($id_danhmuc)
{
    $sql = "SELECT * from tour where  id_danhmuc = $id_danhmuc";
    return query($sql);
}
// tìm kiếm theo tên

// Slider
function insert_slide($ten_slide, $anh, $url, $date) {
    $sql = "INSERT INTO slider(ten_slide,image,url,ngay_tao) values(?,?,?,?)";
    return execute($sql,$ten_slide, $anh, $url, $date);
}

function update_slide($ten_slide, $image, $url, $id){
    $sql = "UPDATE slider set ten_slide = ?, image =?, url = ? where id = ?";
    execute($sql, $ten_slide, $image, $url, $id);
}

/// ------------ Giới Thiệu -----------------------------
function insert_gioithieu($ten,$date){
    $sql ="INSERT INTO gioi_thieu(noi_dung,ngay_tao) VALUES(?,?)"; 
    execute($sql, $ten,$date);
}
function update_gioithieu($ten,$id){
    $sql ="UPDATE gioi_thieu set noi_dung = ? where id = ?"; 
    execute($sql, $ten,$id);
}

// --------------------Bình luận---------------------
function insert_comment($id_kh, $id_tour, $noi_dung, $danh_gia, $date){
    $sql ="INSERT INTO binh_luan(id_kh, id_tour, noi_dung, danh_gia,ngay_tao) VALUES(?,?,?,?,?)"; 
    execute($sql, $id_kh, $id_tour, $noi_dung, $danh_gia, $date);
}

function getSelect_cmt($table, $value, $id){
    $sql = "SELECT * FROM $table where $value = $id";
    return query($sql);
}

function select_tour(){
    $sql = "SELECT distinct(t.ten), t.id FROM binh_luan bl inner join tour t on bl.id_tour = t.id";
    return query($sql);
}

function select_count_cmt($id_tour){
    $sql = "SELECT count(id_tour) as tong FROM binh_luan where id_tour = ?";
    return query_one($sql, $id_tour);
}

function select_avg($id_tour){
    $sql = "SELECT avg(danh_gia) as trung_binh FROM binh_luan where id_tour = ?";
    return query_one($sql, $id_tour);
}

//-----------------------admin---------------------


?>
