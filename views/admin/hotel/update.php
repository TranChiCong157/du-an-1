<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý khách sạn</a></li>
            <li class="active">Cập nhật khách sạn</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Cập nhật khách sạn</h3>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/hotel/save-update" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên khách sạn</label>
                            <input type="text" class="form-control" name="ten_ks"  value="<?=$result['ten_ks']?>">
                            <input type="hidden" class="form-control" name="ten_ks_cu"  value="<?=$result['ten_ks']?>">
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" name="anh"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="mo_ta" class="form-control" cols="30" rows="6"><?=$result['mo_ta']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <select name="id_dc" id="">
                                <?php
                                foreach ($rows as $row) {
                                ?>
                                    <option <?= $row['id'] == $result['id_dc'] ? 'selected' : '' ?>  value="<?= $row['id']; ?>"><?= $row['dia_chi']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ chi tiết</label>
                            <input type="text" class="form-control" name="dia_chi_ct"   value="<?=$result['dia_chi_ct']?>">
                            <input type="hidden" class="form-control" name="dia_chi_ct_cu"   value="<?=$result['dia_chi_ct']?>">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" value="<?=$result['sdt']?>">
                            <input type="hidden" class="form-control" name="sdt_cu" value="<?=$result['sdt']?>">
                        </div>
                    </div>

                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?= BASE_URL ?>/admin/hotel/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>