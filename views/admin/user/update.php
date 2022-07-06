<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý User</a></li>
            <li class="active">Update User</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Update User</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/user/save-update" method="POST">
                    <input type="hidden" name = "id" value = "<?=$result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Email*</label>
                            <input type="text" class="form-control" name ="email" value="<?=$result['email']?>">
                            <input type="hidden" class="form-control" name ="email_cu" value="<?=$result['email']?>">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu*</label>
                            <input type="password" class="form-control" name= "mat_khau" value="<?=$result['mat_khau']?>">
                            <input type="hidden" class="form-control" name= "mat_khau_cu" value="<?=$result['mat_khau']?>">
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box box-primary">Thông Tin cá nhân</h3>
                        <div class="form-group">
                            <label>Họ Tên*</label>
                            <input type="text" class="form-control" name= "ten" value="<?=$result['ten']?>">
                        </div>
                        <div class="form-group">
                            <label>SĐT*</label>
                            <input type="text" class="form-control" name= "sdt" value="<?=$result['sdt']?>">
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/user/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay Lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>