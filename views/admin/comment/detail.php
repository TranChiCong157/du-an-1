<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông tin bình luận
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý bình luận</a></li>
            <li class="active">Chi Tiết bình luận</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3>Tour: <?=$tour['ten']?></h3>
                <a href="<?=BASE_URL?>/admin/comment/list" class="btn btn-primary">Quay lại</a>
                    <div class="box-tools">
                        <form action="list" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="values" class="form-control pull-right"placeholder="Search....">
                            <div class="input-group-btn">
                                <button type="submit" name="search_comment" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Khách hàng</td>
                                <td>Nội dung</td>
                                <td>Đánh giá</td>
                                <td>Trạng thái</td>
                                <?php
                                    if($_SESSION['admin']['vai_tro'] == 2){
                                ?>
                                <td>Thao tác</td>
                                <?php }?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result)){
                            } else {
                                $k = 1;
                                foreach($result as $values) {
                                    $user =  getSelect_one('khach_hang', 'id', $values['id_kh']);
                            ?>
                                <tr>
                                    <td><?=$k?></td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/user/list?id=<?=$values['id_kh']?>" class="btn btn-default"><?=$user['ten']?></a>
                                    </td>
                                    <style>
                                    .nd img {
                                        max-width: 100%;
                                    }
                                    </style>
                                    <td class="nd">
                                        <?=$values['noi_dung']?>
                                    </td>
                                    <td>
                                    <?php
                                        for ($i = 0; $i < intval($values['danh_gia']); $i++) {
                                        ?>
                                            <i class="fas fa-star"></i>
                                        <?php
                                        }
                                        for ($j = 0; $j < (5 - intval($values['danh_gia'])); $j++) {
                                        ?>
                                            <i class="far fa-star"></i>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if(intval($values['trang_thai']) == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/comment/status?id=<?=$values['id']?>&st=1&id_tour=<?=$tour['id']?>" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/comment/status?id=<?=$values['id']?>&st=2&id_tour=<?=$tour['id']?>" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <?php
                                        if($_SESSION['admin']['vai_tro'] == 2){
                                    ?>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/comment/delete?id=<?=$values['id']?>&id_tour=<?=$tour['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>      
                                    </td>
                                    <?php
                                        }
                                    ?>  
                                </tr>
                            <?php
                            $k++;
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