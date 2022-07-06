<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông Tin admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý admin</a></li>
            <li class="active">Danh Sách Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?=BASE_URL?>/admin/admin/add" class="btn btn-success col-md-1">+Thêm mới Admin</a>
                    <div class="col-md-2">
                        <select name="" id="" class="form-control" onchange="location=this.value;">
                            <option value="">Chọn trạng Thái</option>
                            <option value=" <?=BASE_URL?>/admin/admin/list?id_st=1">Hoạt động</option>
                            <option value=" <?=BASE_URL?>/admin/admin/list?id_st=2">Khóa</option>                  
                        </select>
                    </div>
                    <div class="box-tools">
                        <form action="list" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="values" class="form-control pull-right"placeholder="Search admin">
                            <div class="input-group-btn">
                                <button type="submit" name="search_admin" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên</td>
                                <td>Email</td>
                                <td>Ảnh</td>
                                <td>Số Điện Thoại</td>
                                <td>Ngày Tạo</td>
                                <td>Vai trò</td>
                                <td>Trạng Thái</td>
                                <td colspan="2">Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(!isset($result) || empty($result)){
                            } else if(!empty($result) ) {
                                foreach($result as $values) {
                            ?>
                                <tr>
                                    <td>
                                        
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        
                                        <?=$values['ten']?>
                                    </td>
                                    <td>
                                        
                                        <?=$values['email']?>
                                    </td>
                                    <td>
                                    <img src="<?=IMAGE_URL . $values['anh']?>" width="50px" alt=""> 
                                    </td>
                                    <td>
                                        
                                        <?=$values['sdt']?>
                                    </td>
                                    <td>
                                        
                                        <?=$values['ngay_tao']?>
                                    </td>
                                    <td>                                      
                                    <?php if(($values['vai_tro'])  == 2){
                                            echo "Quản trị viên";
                                        }else{
                                            echo "Nhân viên";
                                        }
                                       
                                       ?>
                                    </td>
                                    <?php
                                         if($_SESSION['admin']['id'] == $values['id'] ) :

                                    ?>
                                    
                                    <td><span style= "color :green ;"> Đang đăng nhập</span></td>
                                    <?php endif ?>
                                  <?php if($_SESSION['admin']['id'] != $values['id'] ) : ?> 

                                    <td>

                                        
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/admin/status?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/admin/status?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        
                                        <a href="<?=BASE_URL?>/admin/admin/update?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/admin/delete?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                     <?php endif ?>
                                </tr>
                            <?php
                                }
                                }
                                if (isset($value)){
                                ?>
                                <tr>
                                    <td>
                                        <?=$value['id']?>
                                    </td>
                                    <td>
                                        <?=$value['ten']?>
                                    </td>
                                    <td>
                                        <?=$value['email']?>
                                    </td>
                                    <td>
                                        <?=$value['sdt']?>
                                    </td>
                                    <td>
                                        <?=$value['ngay_tao']?>
                                    </td>
                                     <!--  -->
                                    <td>
                                    <?php if(isset($_SESSION) && $_SESSION['admin']['id'] == 2 ) : ?>
                                        <?php
                                        if($value['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/admin/status?id=<?=$value['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/admin/status?id=<?=$value['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/admin/update?id=<?=$value['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/admin/delete?id=<?=$value['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                     <?php endif ?> -->
                                </tr>
                            <?php
                            }
                            ?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>