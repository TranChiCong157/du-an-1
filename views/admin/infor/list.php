<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thông tin Giới Thiệu
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Giới Thiệu</a></li>
            <li class="active">Danh Sách Giới Thiệu</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?=BASE_URL?>/admin/infor/add" class="btn btn-success">+Thêm mới Giới Thiệu</a>
                    <div class="box-tools">
                        <form action="<?=BASE_URL?>/admin/phuongtien/find-user.php" class="input-group input-group-sm" style="width: 150px;" method="GET">
                            <input type="text" name="id" class="form-control pull-right"placeholder="Search ID">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Ngày tạo</td>
                                <td>Trạng Thái</td>
                                <td>Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($values)){
                            } else {
                                foreach($values as $value) {?>
                                <tr>
                                    <td>
                                        
                                        <?=$value['id']?>
                                    </td>
                                    <td>
                                        
                                        <?=$value['ngay_tao']?>
                                    </td>
                                    <td>
                                        
                                        <?php
                                        if($value['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/infor/status?id=<?=$value['id']?>&st=1" class="btn btn-success" onclick="return comp('Bạn có chắc muốn xóa không ? ')">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/infor/status?id=<?=$value['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        
                                        <a href="<?=BASE_URL?>/admin/infor/update?id=<?=$value['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/infor/delete?id=<?=$value['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                </tr>
                            <?php
                                }
                            } 
                            ?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>