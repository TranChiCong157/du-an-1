<?php
    function category_list(){
        $values = getSelect("danh_muc",0,10);
        admin_render("category/list.php", ["values" => $values]);
       
    }
    function category_add(){
        admin_render("category/add.php");
    }
    function category_save_add(){
        extract($_REQUEST);
        if(empty($ten)){
            $_SESSION['error'] = "Vui lòng không để trống !";
            header("Location: ". BASE_URL ."/admin/category/add");
            die;
        }
        $ton_tai = getSelect_one('danh_muc', 'ten', $ten);
        if(!empty($ton_tai)){
            $_SESSION['error'] = "Tên Danh mục đã tồn tại!";
            header("Location: ". BASE_URL ."/admin/category/add");
            die;
        }
        $date = date('Y-m-d');
        insert_danhmuc($ten,$date);
        header("Location: ". BASE_URL ."/admin/category/list");
    }
    function category_update(){
        if(!isset($_GET['id'])) {
            header("Location: ". BASE_URL ."/admin/category/list");
            die;
        }
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        $result = getSelect_one('danh_muc', 'id', $id);
        admin_render('category/update.php',['result' => $result]);
    }
    function category_save_update(){
        extract($_REQUEST);
        if(empty($ten)){
            $_SESSION['error'] = "Vui lòng không để trống !";
            header("Location:".BASE_URL."/admin/category/update?id=$id");
            die;
        }
        $ton_tai = getSelect_one('danh_muc', 'ten', $ten);
        if(!empty($ton_tai) && $ten != $ten_cu){
            $_SESSION['error'] = "Tên danh mục đã tồn tại!";
            header("Location:".BASE_URL."/admin/category/update?id=$id");
            die;
        }   
        update_danhmuc($ten,$id);
        header("Location:".BASE_URL."/admin/category/list");
    }
    function  category_delete(){
        if(isset($_GET['id'])) {
            $id = intval($_GET['id']);
            getDelete('danh_muc', 'id', $id);
        }
        header("Location:" . BASE_URL .  "/admin/category/list");  
    }
    function category_status(){
        if(isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $status = intval($_GET['st']);
            if($status == 1){
                update_status('danh_muc', 2, $id);
            } else if($status == 2){
                update_status('danh_muc', 1, $id);
            }
        }
        header("Location:" . BASE_URL .  "/admin/category/list");  
    }
     
 
?>