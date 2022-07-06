<?php 
extract($tour);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Thêm Mới Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Đơn Hàng</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/order/save-add" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tour : <?=$ten?></label>
                            <input type="hidden" value="<?=$id?>" name="id_tour">
                            <input type="hidden" name="lich_trinh" value="<?=$thong_tin?>">
                            <input type="hidden" value="<?=$gia?>" id="gia">
                        </div>
                        <div class="form-group">
                            <label>Ngày đi</label>
                            <input type="date" class="form-control" name="ngay_di" value="<?=$ngay_di?>" <?=empty($ngay_di) ? "" : "readonly"?>>
                        </div>
                        <div class="form-group">
                            <label>Địa điểm khởi hành</label>
                            <input type="text" class="form-control" name= "noi_di" value="<?=$noi_di?>" <?=empty($ngay_di) ? "" : "readonly"?>>
                        </div>
                        <div class="form-group">
                            <label>Email khách hàng*</label>
                            <input type="text" class="form-control" name= "email" placeholder="Nhập mật email">
                        </div>
                        <div class="form-group">
                            <label>Số lượng người lớn*</label>
                            <input type="number" class="form-control" name= "nguoi_lon" id="nguoi_lon" onchange="tinh_gia();" placeholder="Nhập Số Lượng Người Lớn">
                        </div>
                        <div class="form-group">
                            <label>Số lượng trẻ em dưới 10 tuổi *</label>
                            <input type="number" class="form-control" name= "tre_em" onchange="tinh_gia();" id="tre_em" placeholder="Nhập Số Lượng Trẻ Em Dưới 10 Tuổi">
                        </div>
                        <div class="form-group">
                            <label>Giá *</label>
                            <input type="number" class="form-control" name= "gia" id="tong_gia" readonly>
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
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/tour/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay Lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>