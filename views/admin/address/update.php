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
                <form role="form" action="<?=BASE_URL?>/admin/address/save-update" method="POST">
                    <input type="hidden" name = "id" value = "<?=$result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Địa chỉ*</label>
                            <input type="text" class="form-control" name ="diachi" value="<?=$result['dia_chi']?>">
                            <input type="hidden" class="form-control" name ="dia_chi_cu" value="<?=$result['dia_chi']?>">
                        </div>                       
                    </div>                   
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL?>/admin/address/list" class="btn btn-primary"><i class="fa fa-home"></i> Trang chủ</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>