<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông tin khách sạn
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý khách sạn</a></li>
            <li class="active">Danh Sách khách sạn</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?=BASE_URL?>/admin/hotel/add" class="btn btn-success col-md-2">+Thêm mới khách sạn</a>
                    <div class="col-md-2">
                        <select name="" id="" class="form-control" onchange="location=this.value;">
                            <option value="">Chọn trạng Thái</option>
                            <option value=" <?=BASE_URL?>/admin/hotel/list?id_st=1">Hoạt động</option>
                            <option value=" <?=BASE_URL?>/admin/hotel/list?id_st=2">Khóa</option>                  
                        </select>
                    </div>
                    <div class="box-tools">
                        <form action="list" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="values" class="form-control pull-right"placeholder="Search Hotel">
                            <div class="input-group-btn">
                                <button type="submit" name="search_hotel" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên khách sạn</td>
                                <td>Ảnh</td>
                                <td>Địa chỉ</td>
                                <td>SĐT</td>
                                <td>Trạng Thái</td>
                                <td>Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result)){
                            } else {
                                foreach($result as $values) {?>
                                <tr>
                                    <td>
                                        
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        
                                        <?=$values['ten_ks']?>
                                    </td>
                                   
                                    <td>
                                        
                                        <img src="<?= IMAGE_URL . $values['anh']?>" width="100px" alt="">
                                    </td>
                                    <td>
                                        
                                        <?=$values['dia_chi_ct']?>
                                    </td>
                                    <td>
                                        
                                        <?=$values['sdt']?>
                                    </td>
                                    <td>
                                        
                                        <?php
                                        if(intval($values['trang_thai']) == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/hotel/status?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/hotel/status?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        
                                        <a href="<?=BASE_URL?>/admin/hotel/update?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/hotel/delete?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
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