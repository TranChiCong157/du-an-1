<?php 
extract($tour);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Update Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Update Đơn Hàng</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/order/save-update" method="POST">
                    <div class="box-body">
                        <input type="hidden" value="<?=$don_hang['id']?>" name="id">
                        <input type="hidden" value="<?=$id?>" name="id_tour">
                        <input type="hidden" value="<?=$gia?>" id="gia">
                        <input type="hidden" value="<?=$thong_tin?>" name="lich_trinh">
                        <div class="form-group">
                            <label>Tour : <?=$ten?></label>
                        </div>
                        <div class="form-group">
                            <label>Ngày đi</label>
                            <input type="date" class="form-control" name="ngay_di" value="<?=$don_hang['ngay_di']?>" <?=empty($ngay_di) ? "" : "readonly"?>>
                        </div>
                        <div class="form-group">
                            <label>Địa điểm khởi hành</label>
                            <input type="text" class="form-control" name= "noi_di" value="<?=$don_hang['noi_di']?>" <?=empty($ngay_di) ? "" : "readonly"?>>
                        </div>
                        <div class="form-group">
                            <label>Email khách hàng*</label>
                            <input type="text" class="form-control" name= "email" value="<?=$user['email']?>">
                        </div>
                        <div class="form-group">
                            <label>Số lượng người lớn*</label>
                            <input type="number" class="form-control" name= "nguoi_lon" id="nguoi_lon" onchange="tinh_gia();" value="<?=$don_hang['nguoi_lon']?>">
                        </div>
                        <div class="form-group">
                            <label>Số lượng trẻ em dưới 10 tuổi *</label>
                            <input type="number" class="form-control" name= "tre_em" onchange="tinh_gia();" id="tre_em" value="<?=$don_hang['tre_em']?>">
                        </div>
                        <div class="form-group">
                            <label>Giá *</label>
                            <input type="number" class="form-control" name= "gia" id="tong_gia" readonly value="<?=$don_hang['gia']?>">
                        </div>
                        <script>
                            function tinh_gia(){
                                var nguoi_lon = document.querySelector('#nguoi_lon').value;
                                var tre_em = document.querySelector('#tre_em').value;
                                var gia = document.querySelector('#gia').value;
                                var tong_gia = (nguoi_lon*gia) + (tre_em*(gia*(70/100)));
                                document.querySelector('#tong_gia').value = tong_gia;
                            }
                        </script>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/order/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay Lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>