<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Địa chỉ</a></li>
            <li class="active">Thêm Mới Địa chỉ</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Địa Chỉ</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/address/save-add" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Địa chỉ*</label>
                            <input type="text" class="form-control" name ="diachi" placeholder="Nhập vào địa chỉ">
                        </div>                       
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/address/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>