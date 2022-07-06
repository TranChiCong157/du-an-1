<section class="home" id="home" style="margin-top: 85px">
    <?php
    if (empty($slider)) {
    } else {
        for ($i = 0; $i < count($slider); $i++) {
    ?>
            <div class="slide-container <?= $i == 0 ? "active" : "" ?>">
                <a href="<?= $slider[$i]['url'] ?>">
                    <img src="<?= IMAGE_URL . $slider[$i]['image'] ?>" class="sliderImage" width="100%" style="height: 500px;" alt="">
                </a>
            </div>
    <?php
        }
    }
    ?>
    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>
</section>
<aside style="margin-top: 20px;">
    <h1 class="heading"> Tour <span>Nổi bật</span> </h1>
    <style>
        #tournoibat {
            display: grid;
            grid-template-columns: auto auto;
            grid-gap: 20px;
            max-width: 85%;
            margin: auto;
            padding: 10px;
        }

        #tournoibat .img2 {
            display: grid;
            grid-template-columns: auto auto;
            grid-gap: 10px;
        }
        #tournoibat .img1 img{
            border-radius: 10px;
            max-width: 100%;
        }
        #tournoibat .img2 img{
            border-radius: 15px;
            max-width: 96%;
        }
        @media only screen and (max-width: 1200px) {
            #tournoibat {
                display: grid;
                grid-template-columns: auto;
                grid-gap: 0px;
                max-width: 90%;
                margin: auto;
            }
            #tournoibat .img2 {
                display: grid;
                grid-template-columns: auto;
                grid-gap: 0px;
            }
            #tournoibat .img2 img{
                border-radius: 15px;
                max-width: 100%;
                padding-top: 10px;
            }


        }
    </style>
    <div id="tournoibat" class="container">
        <?php
        if (empty($hightlights)) {
        } else {
            for ($i = 0; $i < 1; $i++) {
        ?>
        <div class="img1 "><a href="<?=BASE_URL?>/detail?id=<?=$hightlights[$i]['id']?>"><img src="<?= IMAGE_URL . $hightlights[$i]['anh']?>" alt=""></a></div>
        <?php
            }
        }
        ?>
        <div class="img2 ">
            <?php
            if (empty($hightlights)) {
            } else {
                for ($i = 1; $i < count($hightlights); $i++) {
            ?>
            <a class="row" href="<?=BASE_URL?>/detail?id=<?=$hightlights[$i]['id']?>"><img src="<?= IMAGE_URL . $hightlights[$i]['anh']?>" alt=""></a>
            
            <?php
                }
            }
            ?>
        </div>
    </div>
    <h1 class="heading"> Tour <span>Mới Nhất</span> </h1>
    <p class="heading" style="color:green; text-align:center; font-size: 17px">
        <?php
        if(isset($_SESSION['find_tour'])){
            echo $_SESSION['find_tour'];
            unset($_SESSION['find_tour']);
        }
        ?>
    </p>
    <div class="row col-12 container" id="row" style="margin:auto;">
        <?php
        if (empty($result)) {
        } else {
            foreach ($result as $value) {
                if ($value['trang_thai'] == 1) {
        ?>
                    <div id="so1" style="padding: 0px;">
                        <a href="<?= BASE_URL ?>/detail?id=<?= $value['id'] ?>">
                            <div class="img col">
                                <img src="<?= IMAGE_URL . $value['anh'] ?>" height="400px" width="1000px" style="max-width: 100%;">
                            </div>
                            <div class="conten-item col">
                                <h2 style="color: white; margin-top:10px;"><?= $value['ten']?></h2>
                                <p><?= number_format($value['gia']) ?> VNĐ</p>
                                <a href="<?= BASE_URL ?>/detail?id=<?= $value['id'] ?>" class="btn col-md-2" style="border: 2px solid #fff;padding: 10px;color:#fff; ">Xem Thêm</a>
                            </div>
                        </a>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>

</aside>

<article aria-label="Page navigation example" class="col-1" style="margin: 50px auto 20px auto;">
    <ul class="pagination col-12" style="margin:auto;">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</article>