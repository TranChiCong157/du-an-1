<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý danh mục</a></li>
            <li class="active">Cập nhật danh mục</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Cập nhật danh mục</h3>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/category/save-update" method="POST" >
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$result['id']?>">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="ten"  value="<?=$result['ten']?>">
                            <input type="hidden" class="form-control" name="ten_cu"  value="<?=$result['ten']?>">
                        </div>
                    </div>
                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?= BASE_URL ?>/admin/category/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>