<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="<?= BASE_URL ?>/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/user.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/tour.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/chitiettour.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<style>
  a {
    text-decoration: none;
  }

  .cart {
    position: relative;
  }

  #cart-icon {
    position: relative;
  }

  .number {
    position: absolute;
    top: -15px;
    color: rgba(0, 0, 0, 0.8);
    font-size: 1.4rem;
    z-index: 1;
  }

  /* Style the links inside the navigation bar */
  .navabar12 {
    display:grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }
  .navabar12 a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    text-decoration: none;
  }

  /* Change the color of links on hover */
  .navabar12 a:hover {
    color: #ff9f1a;
  }

  /* Hide the link that should open and close the navabar12 on small screens */
  .navabar12 .icon {
    display: none;
  }

  /* 
* When the screen is less than 600 pixels wide, 
* hide all links, except for the first one ("Home"). 
* Show the link that contains should open and close the navabar12 (.icon) 
*/
  @media screen and (max-width: 600px) {
    .navabar12 a:not(:first-child) {
      display: none;
    }

    .navabar12 a.icon {
      float: right;
      display: block;
    }
  }

  /* 
* The "responsive" class is added to the navabar12 with JavaScript 
* when the user clicks on the icon. This class makes the navabar12 
* look good on small screens (display the links vertically instead of horizontally) 
*/
  @media screen and (max-width: 600px) {
    .navabar12.responsive {
      position: relative;
    }

    .navabar12.responsive a.icon {
      position: absolute;
      right: 0;
      top: 0;
    }

    .navabar12.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
  }

  .navabar12 a {
    color: black;
    text-decoration: none;
    font-size: 17px;
  }

  .navabar12 a:hover {
    color: #ff9f1a;
  }

  .navabar12 .icon {
    display: none;
  }

  @media screen and (max-width: 600px) {
    .navabar12 a:not(:last-child) {
      display: none;
    }

    .navabar12 a.icon {
      float: right;
      display: block;
    }
  }

  @media screen and (max-width: 600px) {
    .navabar12.responsive {
      position: relative;
      display: block;
    }

    .navabar12.responsive a.icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .navabar12.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
  }
</style>
<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navabar12") {
      x.className += " responsive";
    } else {
      x.className = "navabar12";
    }
  }
</script>

<body>
  <header>
    <?php
    if (isset($_SESSION['success'])) {
      echo $_SESSION['success'];
      unset($_SESSION['success']);
    }
    ?>
    <a href="<?= BASE_URL ?>/" class="logo">VNTRAVEL</a>
    <nav class="navabar12" id="myTopnav">
      <a href="<?= BASE_URL ?>/" class="navbar-brand">Trang Chủ</a>
      <a href="<?= BASE_URL ?>/infor" class="nav-link">Giới Thiệu</a>
      <a>
        <select class="form-select" style="font-size: 17px; border:none;" name="ma_loai" onchange="location = this.value;">
          <option selected>Danh Mục Tour</option>
          <?php
          if (empty($category)) {
          } else {
            foreach ($category as $value) {
              if ($value['trang_thai'] == 1) {
          ?>
                <option value="<?= BASE_URL ?>/tour-by-category?ct=<?= $value['id'] ?>"><?= $value['ten'] ?></option>
          <?php
              }
            }
          }
          ?>
        </select>
      </a>
      <div class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" style="margin-left:35px">
          <i class="fas fa-search"></i>
        </a>
        <form action="search-tour" method="POST" style="width:300px" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
            <div>
              <a>&ensp;Chọn ngày đi:</a>
              <input type="date" class="form-control" name="ngay_di" style="font-size: 17px;" value="">
            </div>
          </li>
          <li>
            <div>
              <a>&ensp;Tìm kiếm giá hoặc nơi khởi hành:</a>
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
              <button type="submit" style="font-size:17px" name="submit" class="btn btn-default form-control">Tìm kiếm</button>
            </div>
          </li>
        </form>
      </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">☰</a>
    </nav>
    <div class="icons">
      <?php
      if (isset($_SESSION['user'])) {
      ?>
        <span id="cart-icon">
          <a href="<?= BASE_URL ?>/order" type="submit"><i class="fas fa-shopping-bag cart"></i></a>
          <span class="number"><?= count($order) ?></span>
        </span>
      <?php } ?>
      <?php
      if (isset($_SESSION['user'])) {
      ?>
        <a href='<?= BASE_URL ?>/client/edit-info' class='fas fa-edit'></a>
      <?php
      } else {
      ?>
        <a href='<?= BASE_URL ?>/login'><i class='fas fa-user'></i></a>
      <?php
      }
      ?>
      <?php
      if (isset($_SESSION['admin'])) {
      ?>
        <a href='<?= BASE_URL ?>/admin' class='fas fa-users-cog'></a>
      <?php
      }
      ?>
    </div>
  </header>
  <!-- START --- CONTENT-->
  <?php include_once $businessView; ?>
  <!-- END --- CONTENT-->
  <section class="footer" id="info">

    <div class="box-container">

      <div class="box">
        <h3>Hệ Thống Cửa Hàng</h3>
        <a href="#">Việt Nam</a>
        <a href="#">Mỹ</a>
        <a href="#">Nhật Bản</a>
        <a href="#">Pháp</a>
      </div>

      <div class="box">
        <h3>Xem Nhanh</h3>
        <a href="">Trang Chủ</a>
        <a href="">Sản Phẩm Mới Nhất</a>
        <a href="">Sản Phẩm Nổi Bật</a>
        <a href="">Thông Tin Website</a>
      </div>

      <div class="box">
        <h3>Tác Vụ</h3>
        <a href="#">Tài Khoản</a>
        <a href="#">Yêu Thích</a>
        <a href="#">Đơn Hàng</a>
        <a href="#email">Đăng Kí Nhận Tin</a>
      </div>

      <div class="box">
        <h3>Theo Dõi Chúng Tôi</h3>
        <a href="#"><i class="bi bi-facebook"></i> facebook</a>
        <a href="#"><i class="twitter"></i> twitter</a>
        <a href="#"><i class="instagram"></i> instagram</a>
        <a href="#"><i class="linkedin"></i> linkedin</a>
      </div>
    </div>
  </section>
  <script src="<?= BASE_URL ?>/js/script.js"></script>

</body>

</html>