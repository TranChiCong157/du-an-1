<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý admin</a></li>
            <li class="active">Update admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Update admin</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/admin/save-update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name = "id" value = "<?=$result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Email*</label>
                            <input type="text" class="form-control" name ="email" value="<?=$result['email']?>">
                            <input type="hidden" class="form-control" name ="email_cu" value="<?=$result['email']?>">
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
                        <div class="form-group">
                            <label>Vai trò*</label>
                            <select name="vai_tro" class= "form-control" id="">
                                <option <?= intval($result['vai_tro']) == 1 ? 'selected ' : '' ?> value="1">Nhân Viên</option>
                                <option <?= intval($result['vai_tro']) == 2 ? 'selected ' : '' ?> value="2">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Chọn ảnh*</label>
                            <input type="file" name="anh" />
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/admin/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay Lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>