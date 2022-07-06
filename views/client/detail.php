<div style="margin-top: 150px;"></div>
<h1 class="heading" style="margin-bottom:50px"><span>Chi Tiết Tour</span> </h1>
<div class="row col-8" style="margin:auto">
    <div class="col-6"><img src="<?= IMAGE_URL . $tour_detail['anh'] ?>" alt="" width="100%"></div>
    <div class="col-6">
        <h1 style="font-size:30px"><?= $tour_detail['ten'] ?></h1>
        <h1 style="border-bottom:1px solid #000"></h1>
        <p style="font-size:20px">Mô tả:</p>
        <h2><?= $tour_detail['mo_ta'] ?></h2>
        <h1 style="border-bottom:1px solid #000"></h1>
        <br>
        <h3>- Người Lớn: <span style="font-size:20px; color:red"><?= number_format($tour_detail['gia']) ?> VNĐ</span></h3>
        <h3>- Trẻ em dưới 10 tuổi: <span style="font-size:20px; color:red"><?=number_format(floor((intval($tour_detail['gia']))*(70/100)))?> VNĐ</span></h3>
        <h3>- Trẻ em dưới 3 tháng tuổi: <span style="font-size:20px; color:red">0 VNĐ</span></h3>
        <?php
            if (!isset($_SESSION['user'])) {
            ?>
                <a href="<?=BASE_URL?>/login" class="btn" style="border: 2px solid #000;padding: 5px; font-size:15px">Đăng nhập ngay để liên hệ đặt tour</a>
            <?php
            } else {
            ?>
                <a href="tel:1234567890" class="btn col-md-5" style="border: 2px solid #000;padding: 10px; font-size:20px">Liên Hệ Để Đặt Tour</a>
            <?php
            }
            ?>
    </div>

</div>

<div class="col-8" style="margin: 50px auto;">
    <h1 style="border-bottom:1px solid #000"></h1>
</div>
<div class="col-7" style="margin:auto">
<h1 class="heading" style="margin-bottom:50px"><span class="fas fa-map"> Lịch Trình</span> </h1>
    <h2><?= $tour_detail['thong_tin'] ?></h2>
</div>
<div class="col-7" style="margin:auto">
    <h1 class="heading" style="margin-top:50px"><span>Đánh Giá</span> </h1>
    <div style="margin-bottom: 50px;">
        <?php
        if (empty($comment)) {
            echo "<h2 style='text-align: center; color:red'>Chưa có đánh giá !</h2>";
        } else {
            foreach ($comment as $cmt) {
                if(intval($cmt['trang_thai']) == 1){
                $user = getSelect_one('khach_hang', 'id', $cmt['id_kh']);
        ?>
                <h3 style="color:blue" ><?= $user['ten'] ?></h3>
                <div class="stars">
                    <?php
                    for ($i = 0; $i < intval($cmt['danh_gia']); $i++) {
                    ?>
                        <i class="fas fa-star"></i>
                    <?php
                    }
                    for ($j = 0; $j < (5 - intval($cmt['danh_gia'])); $j++) {
                    ?>
                        <i class="far fa-star"></i>
                    <?php
                    }
                    ?>
                    <br>
                    <br>
                    <style>
                    .nd img{
                        max-width: 100%;
                    }
                    </style>
                    <h4 style="font-size:25px" class="nd"><?= $cmt['noi_dung'] ?></h4>
                    <p>
                        <?php
                        if (strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao']) < 60) {
                            echo (strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) . " Giây trước";
                        } else if ((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) < 3600) {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) / 60) . " Phút trước";
                        } else if ((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) < 86400) {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) / 3600) . " Giờ trước";
                        } else if ((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) < 2592000) {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) / 86400) . " Ngày trước";
                        } else {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['ngay_tao'])) / 2592000) . " Tháng trước";
                        }

                        ?>
                    </p>
                </div>
                <h1 style="border-bottom:1px solid #000"></h1>
        <?php
                }
            }
        }
        ?>
    </div>
    <h1 class="col-12" style="border-bottom:1px solid #000"></h1>
    <h1 class="col-12" style="border-bottom:1px solid #000"></h1>
    <h1 class="col-12" class="col-10" style="border-bottom:1px solid #000"></h1>
    <div style="margin: 20px"></div>
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
        /*reset css*/
        div,
        label {
            margin: 0;
            padding: 0;
        }

        /****** Style Star Rating Widget *****/
        #rating {
            border: none;
            float: left;
        }

        #rating>input {
            display: none;
        }

        /*ẩn input radio - vì chúng ta đã có label là GUI*/
        #rating>label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        /*1 ngôi sao*/
        #rating>label {
            float: right;
        }

        /*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
        /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
        #rating>input:checked~label,
        #rating:not(:checked)>label:hover,
        #rating:not(:checked)>label:hover~label {
            color: #ff9f1a;
        }

        /* Hover vào các sao phía trước ngôi sao đã chọn*/
        #rating>input:checked+label:hover,
        #rating>input:checked~label:hover,
        #rating>label:hover~input:checked~label,
        #rating>input:checked~label:hover~label {
            color: #FFD700;
        }
        #so1>a{
            color: white;
            padding-top: 20px;
        }
       #loww>img{
            height: 245px;
       }
      
    </style>
    <div class="col-12" id="comment">
        <h4 style="color: red;">
        <?php
        if (isset($_SESSION['error_cmt'])) {
            echo $_SESSION['error_cmt'];
            unset($_SESSION['error_cmt']);
        }
        ?>
        </h4>

        <form action="save-comment" method="POST">
            <h2>Đánh giá*</h2>
            <input type="hidden" name="id_tour" value="<?= $value['id'] ?>">
            <input type="hidden" name="id_kh" value="<?=isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : "" ?>">
            <div id="rating">
                <input type="radio" id="star5" value="5" name="danh_gia" />
                <label class="full" for="star5" title="Tuyệt vời quá"></label>

                <input type="radio" id="star4" value="4" name="danh_gia" />
                <label class="full" for="star4" title="Rất tốt"></label>

                <input type="radio" id="star3" value="3" name="danh_gia" />
                <label class="full" for="star3" title="Bình thường"></label>

                <input type="radio" id="star2" value="2" name="danh_gia" />
                <label class="full" for="star2" title="Tạm được"></label>

                <input type="radio" id="star1" value="1" name="danh_gia" />
                <label class="full" for="star1" title="Không thích"></label>
            </div>
            <br><br>
            <h2>Nội dung*</h2><br>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <h4>Bạn đang bình luận dưới tên: <span style="color:blue"><?=$_SESSION['user']['ten']?></span></h4><br>
            <?php
            }
            ?>
            <div class="form-group">
                <textarea name="noi_dung" id="noi_dung" placeholder="Viết cảm nghĩ của bạn" class="form-control"></textarea>
            </div>
            <?php
            if (!isset($_SESSION['user'])) {
            ?>
                <a href="<?=BASE_URL?>/login" class="btn col-md-3" style="border: 2px solid #000;padding: 5px; font-size:15px">Đăng nhập ngay để đánh giá</a>
            <?php
            } else {
            ?>
                <button class="btn col-md-2" style="border: 2px solid #000;padding: 10px">Gửi Đánh Giá</button>
            <?php
            }
            ?>
        </form>
        <script src="<?= BASE_URL ?>/ckeditor/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#noi_dung'), {
                    ckfinder: {
                        uploadUrl: '<?= BASE_URL ?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                    },
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <div style="margin: 50px"></div>
    </div>
</div>


<section class="products " id="products">
    <h1 class="heading"> Tour <span>Liên Quan</span> </h1>
    <div class="container" id="lq1">
        <div class="row container">
        <?php
        if (empty($lq)) {
        } else {
            foreach ($lq as $values) {   
                if ($values['trang_thai'] == 1) {    
        ?>
            <div class="row col row-cols-1" id="lq">
                <div class="col" style="padding: 0px;" id="so1">
                    <a href="<?= BASE_URL ?>/detail?id=<?= $values['id'] ?>">
                        <div class="img row rounded float-end col" id="loww">
                            <img src="<?= IMAGE_URL . $values['anh'] ?>" class="img-thumbnail" style="width:1000px">
                        </div>
                        <div class="conten-item col"><br>
                            <h5 style="color: white; padding: 0px 10px"><?= $values['ten']?></h5>
                            <a href="<?= BASE_URL ?>/detail?id=<?= $value['id'] ?>" class="btn col-md-4" style="border: 2px solid #fff;padding: 10px;color:#fff; ">Xem Thêm</a>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                }
            }
        }
        ?>
        </div>
    </div>
</section>