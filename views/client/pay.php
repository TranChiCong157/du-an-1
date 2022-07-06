<div style="margin-top: 100px;"></div>
<h1 class="heading" style="margin-bottom:20px"><span>Thanh toán đơn hàng</span></h1>
<?php
if(empty($don_hang)){
?>
<span style="font-size: 17px; color: red">Bạn chưa có đơn hàng nào !</span>
<?php
} else {
?>
<div class="col-10" style="margin:auto;font-size: 18px">
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
            <th style="width:50%">Tour</th>
            <th style="width:8%">Người lớn</th>
            <th style="width:8%">Trẻ em</th>
            <th style="width:10%">Ngày đi</th>
            <th style="width:10%">Đặt cọc</th>
            <th style="width:14%">Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tour = getSelect_one('tour', 'id', $don_hang['id_tour'])
            ?>
            <tr>
                <td class="align-middle">
                    <?=$tour['ten']?>
                </td>
                <td class="align-middle">
                    <?=$don_hang['nguoi_lon']?>
                </td>
                <td class="align-middle">
                    <?=$don_hang['tre_em']?>
                </td>
                <td class="align-middle">
                    <?=$don_hang['ngay_di']?>
                </td>
                <td class="align-middle">
                    <?=number_format($don_hang['gia']*(30/100))?> VNĐ
                </td>
                <td class="align-middle">
                    <?=number_format($don_hang['gia'])?> VNĐ
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <p style="color: #ff9f1a">Thông tin thanh toán: </p>
    <p>Vietcombank: xxxx xxxxxx xxx</p><br>
    <form action="<?=BASE_URL?>/save-pay" class="col-12 col-sm-12 col-xl-5" enctype="multipart/form-data" method="post" style="padding: 20px;border: 2px solid #000">
    <span style="color: red">
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </span>
    <p style="color: #ff9f1a">Nội dung thanh toán:</p>
    <p>- Nếu bạn đặt cọc: <span style="color:blue">Dat coc don hang <?=$don_hang['id']?></span></p>
    <p>- Nếu bạn thanh toán: <span style="color:blue">Thanh toan don hang  <?=$don_hang['id']?></span></p>
    <input type="hidden" value="<?=$don_hang['id']?>" name="id">
        <div class="form-group">
            <label>Hình ảnh hóa đơn*:</label><br>
            <input type="file" name="thanh_toan">
        </div>
        <div class="col-md-4">
            <button class="btn btn-success">Thanh Toán</button>
        </div>
    </form>
</div>
<?php
}
?>
