<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Slider</a></li>
            <li class="active">Cập nhật Slider</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Cập nhật Slider</h3>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/slider/save-update" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" class="form-control" name="ten_slide"  value="<?=$result['ten_slide']?>">
                            <input type="hidden" class="form-control" name="ten_slide_cu"  value="<?=$result['ten_slide']?>">
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label><br>
                            <img src="<?= IMAGE_URL . $result['image']?>" width="200px" alt="">
                            <input type="file" class="form-control" name="anh"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" name="url" value="<?=$result['url']?>">
                            <input type="hidden" class="form-control" name="url_cu"  value="<?=$result['url']?>">
                        </div>
                    </div>

                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?= BASE_URL ?>/admin/slider/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>