<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Tour</a></li>
            <li class="active">Update Tour</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Update Tour</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/tour/save-update" enctype="multipart/form-data" method="POST">
                    <div class="box-body">
                    <input type="hidden" name = "id" value = "<?=$value['id'] ?>">
                        <div class="form-group">
                           <label>Tên*</label>
                            <input type="text" class="form-control" name ="ten" value="<?=$value['ten']?>">                          
                        </div>
                        <div class="form-group">
                        <label>Chọn ảnh*</label>
                            <input type="file" name="anh" />
                        </div>
                        <div class="form-group">
                            <label>Giá*</label>
                            <input type="text" class="form-control" name= "gia" value="<?=$value['gia']?>">
                        </div> 
                        <div class="form-group">
                            <label>Điểm đến</label>
                            <select name="id_diachi" id="">
                                <?php
                                $rows = getSelect('dia_chi', 0, 10);
                                foreach ($rows as $row) {
                                    extract($row);
                                ?>
                                    <option <?= $id == $value['id_diachi'] ? "selected": ""?> value="<?=$id?>"><?=$dia_chi?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="id_danhmuc" id="">
                                <option value="0" selected>Chọn danh mục</option>
                                <?php
                                $rows = getSelect('danh_muc', 0, 10);
                                foreach ($rows as $row) {
                                    extract($row);
                                ?>
                                    <option <?=$id == $value['id_danhmuc'] ? "selected": ""?> value="<?= $id; ?>"><?= $ten; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày đi</label>
                            <input type="date" class="form-control" name= "ngay_di" value="<?=$value['ngay_di']?>">
                        </div>
                        <div class="form-group">
                            <label>Ngày đến*</label>
                            <input type="date" class="form-control" name= "ngay_den" value="<?=$value['ngay_den']?>">
                        </div>
                        <div class="form-group">
                            <label>Địa điểm khởi hành</label>
                            <input type="text" class="form-control" name= "noi_di" value="<?=$value['noi_di']?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="mo_ta" id="mo_ta"><?=$value['mo_ta']?></textarea>
                        </div>                                       
                        <div class="form-group">
                            <label>Thông tin</label>
                            <textarea name="thong_tin" id="thong_tin" rows="10"><?=$value['thong_tin']?></textarea>
                        </div>                  
                        <script src="<?=BASE_URL?>/ckeditor/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                            .create(document.querySelector('#thong_tin'),{
                                ckfinder: {
                                    uploadUrl: '<?=BASE_URL?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                                },
                            })
                            .catch(error => {
                                console.error(error);
                            });
                            ClassicEditor
                            .create(document.querySelector('#mo_ta'),{
                                ckfinder: {
                                    uploadUrl: '<?=BASE_URL?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                                },
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        </script>
                       <br>
                                                       
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=BASE_URL ?>/admin/tour/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>