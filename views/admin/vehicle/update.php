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
                <form role="form" action="<?=BASE_URL?>/admin/vehicle/save-update" enctype="multipart/form-data"  method="POST">
                    <input type="hidden" name = "id" value = "<?=$result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Tên*</label>
                            <input type="text" class="form-control" name ="ten" value="<?=$result['ten']?>">
                            
                        </div>
                        <div class="form-group">
                           <label>Biển số*</label>
                            <input type="text" class="form-control" name ="bien_so" value="<?=$result['bien_so']?>">
                            <input type="hidden" class="form-control" name ="bien_so_cu" value="<?=$result['bien_so']?>">
                        </div>
                        <div class="form-group">
                           <label>Số ghế*</label>
                            <input type="text" class="form-control" name ="so_ghe" value="<?=$result['so_ghe']?>">
                            
                        </div>  
                        <div class="form-group">
                           <label>ảnh*</label>
                            <input type="file" class="form-control" name ="anh" value="<?=$result['anh']?>">                          
                        </div> 
                    </div>
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/vehicle/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>