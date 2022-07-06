<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Thay đổi mật khẩu</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Sửa mật khẩu</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/save-password" enctype="multipart/form-data"  method="POST">
                    <input type="hidden" name = "id" value = "<?=$admin['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Mật khẩu cũ</label>
                            <input type="password" class="form-control" name ="mat_khau_cu" >
                            
                        </div>
                        <div class="form-group">
                           <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name ="mat_khau" >
                        </div>     
                        <div class="form-group">
                           <label>Xác lại mật khẩu</label>
                           <input type="password" class="form-control" name ="mat_khau2" >
                        </div>                 
                    </div>
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thay đổi</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>