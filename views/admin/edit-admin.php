<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Sửa thông tin</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Sửa thông tin</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/save-info" enctype="multipart/form-data"  method="POST">
                    <input type="hidden" name = "id" value = "<?=$admin['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Tên*</label>
                            <input type="text" class="form-control" name ="ten" value="<?=$admin['ten']?>">
                            
                        </div>
                        <div class="form-group">
                           <label>Email*</label>
                            <input type="text" class="form-control" name ="email" value="<?=$admin['email']?>">
                            
                        </div>
                        <div class="form-group">
                           <label>Số điện thoại*</label>
                            <input type="text" class="form-control" name ="sdt" value="<?=$admin['sdt']?>">
                        </div>  
                        <div class="form-group">
                           <label>Ảnh*</label>
                           <input type="file" class="form-control" name ="anh" value="<?=$admin['anh']?>">
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