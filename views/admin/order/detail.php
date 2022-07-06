<style>
.myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9);
}
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 1000px;
}
.modal-content {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}
.close {
  position: absolute;
  top: 10%;
  right: 15%;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Chi Tiết Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-10">
            <!--TOUR Linh Động-->
            <?php if (isset($user)) {
            $admin = getSelect_one('admin', 'id', $don_hang['id_admin']);
            ?>
                <div class="row box box-primary">
                    <div class="col-md-12 box-header with-border">
                        <a href="<?=BASE_URL?>/admin/order/list" class="btn btn-primary">Quay Lại</a>
                        <h3>Thông Tin Khách Hàng</h3>
                    </div>
                    <div class="box-body col-md-8">
                        <span style="color:red">Mã đơn hàng:  <?=$don_hang['id']?></span><br>
                        <span>Họ Và Tên: <?= $user['ten'] ?></span><br>
                        <span>Email: <?= $user['email'] ?></span><br>
                        <span>SĐT: <?= $user['sdt'] ?></span><br>
                        <span>Địa Chỉ: <?= $don_hang['noi_di'] ?></span><br>
                        <a href="" class="btn btn-default"><?=intval($admin['vai_tro']) == 2 ? "Quản trị viên: ".$admin['ten'] : "Nhân viên: ".$admin['ten']?></a>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hình ảnh thanh toán</label><br>
                        <img src="<?=IMAGE_URL . $don_hang['thanh_toan']?>"  class="myImg" alt="" style="max-width: 50%">
                    </div>
                </div>
                <div class="row box box-primary">
                    <div class="box-header with-border">
                        <h3>Thông Tin Tour</h3>
                    </div>
                    <div class="box-body">
                        <span>Người lớn: <?= $don_hang['nguoi_lon'] ?></span><br>
                        <span>Trẻ em dưới 10 tuổi: <?= $don_hang['tre_em'] ?></span><br>
                        <span>Đơn giá: <?= number_format($don_hang['gia']) ?> VNĐ</span><br>
                        <span>Ngày đi: <?= $don_hang['ngay_di'] ?></span><br>
                        <h4>Lịch Trình</h4>
                        <p><?= $don_hang['lich_trinh'] ?></p>
                    </div>
                </div>
            <?php } ?>
            <!--TOUR Cố Định-->
            <?php if (!isset($user)) { ?>
                <div class="row box box-primary">
                    <div class="col-md-12 box-header with-border">
                        <a href="<?=BASE_URL?>/admin/order/list" class="btn btn-primary">Quay Lại</a>
                        <h3>Thông Tin Khách Hàng</h3>
                    </div>
                    <?php
                    $i = 1;
                    $coc = 0;
                    $tong = 0;
                    foreach ($don_hang as $don) {
                        $user = getSelect_one('khach_hang', 'id', intval($don['id_kh']));
                        $admin = getSelect_one('admin', 'id', $don['id_admin'])
                    ?>
                        <div class="row col-md-12">
                            <h2 style="border-top: 2px solid #000"></h2>
                            <div class="col-md-4">
                                <br>
                                <span style="color:red">Khách Hàng Thứ <?= $i ?></span><br>
                                <span style="color:red">Mã đơn hàng:  <?=$don['id']?></span><br>
                                <span>Họ Và Tên: <?= $user['ten'] ?></span><br>
                                <span>Email: <?= $user['email'] ?></span><br>
                                <span>SĐT: <?= $user['sdt'] ?></span><br>
                                <span>Địa Chỉ: <?= $don['noi_di'] ?></span><br>
                                <span>Người lớn: <?= $don['nguoi_lon'] ?></span><br>
                                <span>Trẻ em dưới 10 tuổi: <?= $don['tre_em'] ?></span><br>
                                <span>Đơn giá: <?= number_format($don['gia']) ?> VNĐ</span><br>
                                <a href="" class="btn btn-default"><?=intval($admin['vai_tro']) == 2 ? "Quản trị viên: ".$admin['ten'] : "Nhân viên: ".$admin['ten']?></a><br>
                            </div>
                            <div class="col-md-5">
                                <br>
                                <?php
                                if($don['trang_thai'] == 2){
                                    $now = strtotime(date('Y-m-d'));
                                    if ((strtotime($don['ngay_di']) - $now < (12 * 3600)) && ($don['dat_coc'] == 2)) {
                                        echo "<span style='color:red'>Quá Hạn Đặt Cọc</span>";
                                    } else {
                                        if ($don['dat_coc'] == 1) {
                                ?>
                                        <a href="<?= BASE_URL ?>/admin/order/deposit?id=<?= $don['id'] ?>&dc=1&ct=<?= $don['id_tour'] ?>" class="btn btn-success">Đã đặt cọc</a>
                                    <?php
                                        } else {
                                    ?>
                                        <a href="<?= BASE_URL ?>/admin/order/deposit?id=<?= $don['id'] ?>&dc=2&ct=<?= $don['id_tour'] ?>" class="btn btn-danger">Chưa đặt cọc</a>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <?php
                                if ($don['trang_thai'] == 1) {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin/order/status?id=<?= $don['id'] ?>&st=1&ct=<?= $don['id_tour'] ?>" class="btn btn-success">Đã thanh toán</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin/order/status?id=<?= $don['id'] ?>&st=2&ct=<?= $don['id_tour'] ?>" class="btn btn-danger">Chưa thanh toán</a>
                                <?php
                                }
                                ?>
                                <a href="<?= BASE_URL ?>/admin/order/update?id=<?= $don['id'] ?>&ct=<?= $don['id_tour'] ?>" class="btn btn-primary">Update</a>
                                <?php
                                if ($_SESSION['admin']['vai_tro'] == 2) {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin/order/delete?id=<?= $don['id'] ?>&ct=<?= $don['id_tour'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                <?php
                                }
                                ?>
                                <div>
                                    <h4>Truy Thu: </h4>
                                    <span>
                                        <?php
                                        if (intval($don['trang_thai']) == 2) {
                                            if(intval($don['dat_coc']) == 1){
                                                $coc += ($don['gia']) * (30 / 100);
                                            }else {
                                                $coc += 0;
                                            }
                                        ?>
                                            <?= intval($don['dat_coc']) == 1 ? (number_format(($don['gia']) * (30 / 100))) : "0" ?>
                                             
                                        <?php
                                        } else {
                                            $coc += $don['gia'];
                                        ?>
                                            <?= number_format($don['gia']) ?>
                                        <?php
                                        }
                                        ?>
                                        /<?= number_format($don['gia']) ?> VNĐ
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Hình ảnh thanh toán</label><br>
                                <img class="myImg" src="<?=IMAGE_URL . $don['thanh_toan']?>" alt="" style="max-width: 50%">
                            </div>
                            
                        </div>
                    <?php
                        $tong += $don['gia'];
                        $i++;
                    }
                    ?>
                </div>
                <div><p class="btn btn-success">Tổng tiền: <?=number_format($coc)?>/<?=number_format($tong)?> VNĐ</p></div><br>
                <div class="row box box-primary">
                    <div class="box-header with-border">
                        <h3>Thông Tin Tour</h3>
                    </div>
                    <div class="box-body">
                        <span>Ngày đi: <?= $don['ngay_di'] ?></span><br>
                        <h4>Lịch Trình</h4>
                        <p><?= $don['lich_trinh'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <div class="myModal modal">
        <span class="close">&times;</span>
        <img class="modal-content img">
    </div>
</div>
<script>
    var modal = document.querySelector(".myModal");
    var img = document.querySelector(".myImg");
    var modalImg = document.querySelector(".img");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }
    var span = document.querySelector(".close");
    span.onclick = function() { 
    modal.style.display = "none";
    }
</script>