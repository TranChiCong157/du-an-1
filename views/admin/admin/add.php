<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý admin</a></li>
            <li class="active">Thêm Mới admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới admin</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL ?>/admin/admin/save-add" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Email*</label>
                            <input type="text" class="form-control" name ="email" placeholder="Nhập vào Email">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu*</label>
                            <input type="password" class="form-control" name= "mat_khau"placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box box-primary">Thông Tin cá nhân</h3>
                        <div class="form-group">
                            <label>Họ Tên*</label>
                            <input type="text" class="form-control" name= "ten"placeholder="Nhập họ tên">
                        </div>
                        <div class="form-group">
                            <label>SĐT*</label>
                            <input type="text" class="form-control" name= "sdt"placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label>Vai trò*</label>
                            <select name="vai_tro" class= "form-control" id="">
                                <option value="1">Nhân Viên</option>
                                <option value="2">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ảnh*</label>
                            <input type="file" class="form-control" name= "anh" placeholder="Mời bạn chọn ảnh">
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL ?>/admin/admin/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay Lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>