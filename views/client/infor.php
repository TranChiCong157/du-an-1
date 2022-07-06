<div style="margin-top: 100px;"></div>
<h1 class="heading" style="margin-bottom:50px"><span>Giới Thiệu về VNTravel</span> </h1>
<?php
        if (empty($result)) {
        } else {
            foreach ($result as $value) {
                if($value['trang_thai'] == 1){
        ?>

<h3 class="col-9" style="margin:auto"><?= $value['noi_dung'] ?></h3>
<?php
        }
    }
}
?>
        