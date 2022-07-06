<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông tin bình luận
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý bình luận</a></li>
            <li class="active">Danh Sách binh luận</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3></h3>
                    <div class="box-tools">
                        <form action="list" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="values" class="form-control pull-right"placeholder="Search Tour">
                            <div class="input-group-btn">
                                <button type="submit" name="search_tour" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Tour</td>
                                <td>Số lượng bình luận</td>
                                <td>Đánh giá trung bình</td>
                                <td>Trạng Thái</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result)){
                            } else {
                                $j = 1;
                                foreach($result as $values) {
                                    $count =  select_count_cmt($values['id']);
                                    $avg =  select_avg($values['id']);
                            ?>
                                <tr>
                                    <td><?=$j?></td>
                                    <td>
                                        <?=$values['ten']?>
                                    </td>
                                    <td>
                                        
                                        <?=$count['tong']?>
                                    </td>
                                    <td>
                                    <?php
                                        for ($i = 0; $i < intval($avg['trung_binh']); $i++) {
                                        ?>
                                            <i class="fas fa-star"></i>
                                        <?php
                                        }
                                        for ($j = 0; $j < (5 - intval($avg['trung_binh'])); $j++) {
                                        ?>
                                            <i class="far fa-star"></i>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <a href="<?=BASE_URL?>/admin/comment/detail?id_tour=<?=$values['id']?>" class="btn btn-default">Chi tiết</a>
                                    </td>
                                </tr>
                            <?php
                            $j++;
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