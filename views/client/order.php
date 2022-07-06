<div style="margin-top: 100px;"></div>
<h1 class="heading" style="margin-bottom:20px"><span>Đơn hàng của bạn</span> </h1>
<?php
if(empty($order)){
?>
<span style="font-size: 17px; color: red">Bạn chưa có đơn hàng nào !</span>
<?php
} else {
?>
<div class="col-9" style="margin:auto">
    <table class="table table-hover table-condensed" style="font-size: 18px">
        <thead>
            <tr>
            <th style="width:50%">Tour</th>
            <th style="width:8%">Người lớn</th>
            <th style="width:8%">Trẻ em</th>
            <th style="width:10%">Ngày đi</th>
            <th style="width:14%">Giá</th>
            <th style="width:10%">Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($order as $od){
                $tour = getSelect_one('tour', 'id', $od['id_tour'])
            ?>
                <tr>
                    <td class="align-middle">
                        <?=$tour['ten']?>
                    </td>
                    <td class="align-middle">
                        <?=$od['nguoi_lon']?>
                    </td>
                    <td class="align-middle">
                        <?=$od['tre_em']?>
                    </td>
                    <td class="align-middle">
                        <?=$od['ngay_di']?>
                    </td>
                    <td class="align-middle">
                        <?=number_format($od['gia'])?> VNĐ
                    </td>
                    <td class="align-middle">
                        <?php
                        if(intval($od['trang_thai']) == 2){
                            if(intval($od['dat_coc']) == 1){
                                echo "<p style='color:green'>Đã đặt cọc";
                            } else {
                                echo "<p style='color:red'>Chưa đặt cọc";
                            }
                        } else {
                            echo "<p style='color:green'>Đã thanh toán";
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
}
?>