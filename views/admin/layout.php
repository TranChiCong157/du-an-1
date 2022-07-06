<?php
if(!isset($_SESSION['admin'])){
    header("Location: " . BASE_URL . "/admin/login");
    die;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Quản Trị</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?=BASE_URL?>/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?=BASE_URL?>/css/AdminLTE.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/css/_all-skins.min.css">
    <!-- <link rel="stylesheet" href="<?=BASE_URL?>/css/jquery-ui.css"> -->
    <!-- <link rel="stylesheet" href="<?=BASE_URL?>/css/style.css" /> -->
    <script src="<?=BASE_URL?>/js/angular.min.js"></script>
    <script src="<?=BASE_URL?>/js/app.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=BASE_URL?>/" class="logo">
                <span class="fa fa-home"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="" class="fa fa-bars" style="padding: 15px ; color:#fff" data-toggle="push-menu" role="button"></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=IMAGE_URL . $_SESSION['admin']['anh']?>" class="user-image">
                                <span class="hidden-xs"><?=$_SESSION['admin']['ten']?></span>

                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?=IMAGE_URL . $_SESSION['admin']['anh']?>" class="img-circle">

                                    <p>
                                        <?=$_SESSION['admin']['ten']?> - <?=intval($_SESSION['admin']['vai_tro']) == 1 ? "Nhân Viên" : "Quản Trị Viên"?>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-right">
                                        <form action="<?=BASE_URL?>/admin/edit-info" method="POST">
                                            <button class="btn btn-default btn-flat" style="position: absolute; left : 30px; margin-right:10px;">Edit Info</button>
                                        </form>
                                        <form action="<?=BASE_URL?>/admin/edit-password" method="POST">
                                        <button class="btn btn-default btn-flat" >Change Password</button>
                                         </form>
                                         <form action="<?=BASE_URL?>/admin/logout" method="POST">
                                        <button class="btn btn-default" style="position: relative; right :30px; margin-top:10px;" > Log Out </button>
                                         </form>
                                    </div>
                                </li>
                            </ul>
                        </li>   
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=IMAGE_URL . $_SESSION['admin']['anh'] ?>" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <p><?=$_SESSION['admin']['ten'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="<?=BASE_URL?>/admin">
                            <i class="fa fa-database"></i> <span>Thống Kê</span>
                        </a>
                    </li>
                        
                    <?php
                    if($_SESSION['admin']['vai_tro'] == 2){
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cog"></i> <span>Quản Lí Admin</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/admin/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/admin/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Quản Lí User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/user/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/user/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Quản Lí Danh Mục </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/category/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/category/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Quản Lí Giới Thiệu </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/infor/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/infor/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản Lí Tour</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/tour/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/tour/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản Lí Đơn Hàng</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/order/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-list-alt"></i> <span>Quản Lí Khách sạn</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/hotel/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/hotel/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản lí địa chỉ</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/address/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/address/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                      
                         </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản lí phương tiện</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/vehicle/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/phuongtien/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>            
                         </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản lí Slider</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/slider/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=BASE_URL?>/admin/slider/add"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>            
                         </ul>
                    </li> 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản lí Comment</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li><a href="<?=BASE_URL?>/admin/comment/list"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>          
                         </ul>
                    </li>               
                </ul>
            </section>
        </aside>


    <!-- START --- CONTENT-->


    <?php include_once $businessView;?>


    <!-- END --- CONTENT-->


    </div>
<script src="<?=BASE_URL ?>/js/jquery.min.js"></script>
<script src="<?=BASE_URL ?>/js/jquery-ui.js"></script>
<script src="<?=BASE_URL ?>/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL ?>/js/adminlte.min.js"></script>
<script src="<?=BASE_URL ?>/js/dashboard.js"></script> 
<script src="<?=BASE_URL ?>/tinymce/tinymce.min.js"></script>
<script src="<?=BASE_URL ?>/tinymce/config.js"></script>
<script src="<?=BASE_URL ?>/js/function.js"></script>
</body>
</html>