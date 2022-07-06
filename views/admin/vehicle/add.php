<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Phương tiện</a></li>
            <li class="active">Thêm Mới Phương tiện</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Phương tiện</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/vehicle/save-add" enctype="multipart/form-data" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Tên*</label>
                            <input type="text" class="form-control" name ="ten" placeholder="Nhập vào tên">
                        </div>
                        <div class="form-group">
                            <label>Biển số*</label>
                            <input type="text" class="form-control" name= "bien_so" placeholder="Nhập mật biển số">
                        </div>
                        <div class="form-group">
                            <label>Số ghê*</label>
                            <input type="text" class="form-control" name= "so_ghe" placeholder="Nhập mật số ghế">
                        </div>
                        <div class="form-group">
                            <label>Chọn ảnh*</label>
                            <input type="file" name="anh" />
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL ?>/admin/vehicle/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>