<?php
function admin_dashbroard(){
    $admin = getSelectAll('admin');
    $khach_hang = getSelectAll('khach_hang');
    $tour = getSelectAll('tour');
    $don_hang = getSelectAll('don_hang');
    $slider = getSelectAll('slider');
    $danh_muc = getSelectAll('danh_muc');
    $don_hang_month = select_order_by_id_day();
    admin_render("dashbroard.php", [
        'admin' => $admin,
        'khach_hang' => $khach_hang,
        'tour' => $tour,
        'don_hang' => $don_hang,
        'slider' => $slider,
        'danh_muc' => $danh_muc,
        'don_hang_month' => $don_hang_month
    ]);
}
?>