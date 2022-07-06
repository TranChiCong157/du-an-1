<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông Tin Tour
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Tour</a></li>
            <li class="active">Danh Sách Tour</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?=BASE_URL?>/admin/tour/add" class="btn btn-success col-md-1">+Thêm mới Tour</a>
                    <div class="col-md-2">
                        <select class="form-control" onchange="location=this.value;" >
                            <option value="0" selected>Chọn danh mục</option>
                            <?php
                            $rows = getSelect('danh_muc', 0, 10);
                            foreach ($rows as $row) {
                                extract($row);
                            ?>
                                <option value=" <?=BASE_URL?>/admin/tour/list?id_ct=<?= $id; ?>"><?= $ten; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="" class="form-control" id="" onchange="location=this.value;">
                            <option value="">Chọn trạng Thái</option>
                            <option value=" <?=BASE_URL?>/admin/tour/list?id_st=1">Hoạt động</option>
                            <option value=" <?=BASE_URL?>/admin/tour/list?id_st=2">Khóa</option>                  
                        </select>
                    </div>
                    <div class="box-tools">
                    <span>
                        <div class="dropdown">
                            
                            <a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-search"></i>
                            </a>

                            <form action="list" method="POST" style="width:300px" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <div>
                                        <a>Chọn ngày đi:</a>
                                        <input type="date" class="form-control" name="ngay_di" style="font-size: 17px;" value="">
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a>Tìm kiếm giá hoặc nơi khởi hành:</a>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="values" style="font-size: 17px;" placeholder="Nhập vào giá, địa chỉ khởi hành" value="">
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <select class="form-select" style="font-size: 17px;" name="dia_chi">
                                            <option selected value="">Bạn muốn đi đâu?</option>
                                            <?php
                                            if (empty($address)) {
                                            } else {
                                                foreach ($address as $value) {
                                                    if ($value['trang_thai'] == 1) {
                                            ?>
                                                        <option value="<?= $value['id'] ?>"><?= $value['dia_chi'] ?></option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <button type="submit" style="font-size:17px" name="search_tour" class="btn btn-default form-control">Tìm kiếm</button>
                                    </div>
                                </li>
                            </form>
                        </div>
                    </span>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên</td>
                                <td>Ảnh</td>
                                <td>Ngày đi</td>
                                <td>Ngày đến</td>
                                <td>Giá</td>
                                <td>Ngày tạo</td>
                                <td>Ngày sửa</td>
                                <td>Trạng thái</td>
                                <td>Thao Tác</td>
                                <td>Khác</td>
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
                                    <img src="<?=IMAGE_URL . $values['anh']?>" width="50px" alt=""> 
                                    </td>
                                    <td>
                                        <?=$values['ngay_di']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_den']?>
                                    </td>
                                    <td>
                                        <?=number_format($values['gia'])?> VNĐ
                                    </td>
                                    <td>
                                        <?=$values['ngay_tao']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_sua']?>
                                    </td>
                                    <td>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/tour/status?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/tour/status?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/tour/update?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/tour/delete?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                            if((date('Y-m-d') <= $values['ngay_di']) || empty($values['ngay_di'])){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/order/add?id=<?=$values['id']?>" class="btn btn-primary">Đặt Tour</a>
                                        <?php
                                            } else {
                                        ?>
                                        <span style="color:red">Hết thời gian đặt tour</span>
                                        <?php
                                            }
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