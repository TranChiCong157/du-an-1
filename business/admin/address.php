<?php 
function  address_list(){
    if(isset($_POST['search_address'])){
        extract($_REQUEST);
        $sql = "SELECT * FROM dia_chi where dia_chi LIKE '%$values%' ";
        $result = query($sql);
    }else if (isset($_GET['id_st'])){
        $result = getSelect_by_id('dia_chi', 'trang_thai', intval($_GET['id_st']));
    }
    else{
        $result = getSelect('dia_chi', 0, 10);
    }
    admin_render('address/list.php', ['result' => $result]);
}
function address_add(){
        admin_render('address/add.php');
    } 

function address_save_add(){
    extract($_REQUEST);
    if(
        
        checkEmpty($diachi) == false
    ){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: ". BASE_URL . "/admin/address/add");
        die;
    }
    
    $ton_tai = getSelect_one('dia_chi', 'dia_chi', $diachi);
    if(!empty($ton_tai)){
        $_SESSION['error'] = "Địa chỉ đã tồn tại !";
        header("Location: ". BASE_URL . "/admin/address/add");
        die;
    }
    
    
    $ngay_tao = date('Y-m-d');
    insert_diachi($diachi, $ngay_tao);
    header("Location:". BASE_URL . "/admin/address/list");
}    

function address_update(){
    if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/address/list");
    }
    $result = getSelect_one('dia_chi', 'id', intval($_GET['id']));
    admin_render('address/update.php', ['result' => $result]);

}

function address_save_update(){
    extract($_REQUEST);
if(
    
    checkEmpty($diachi) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: " . BASE_URL . "/admin/address/update?id=$id");
    die;
}

$ton_tai = getSelect_one('dia_chi', 'dia_chi', $diachi);
if(!empty($ton_tai) && $dia_chi_cu != $diachi){
    $_SESSION['error'] = "Địa chỉ đã tồn tại !";
    header("Location: " . BASE_URL . "/admin/address/update?id=$id");
    die;
}

update_diachi($diachi,$id);
header("Location: " . BASE_URL . "/admin/address/list");
}

function address_status(){
if(!isset($_GET['id'])){
        header("Location: " . BASE_URL . "/admin/address/list");
}
    $id = intval($_GET['id']);
    $status = intval($_GET['st']);
    if($status == 1){
        update_status('dia_chi', 2, $id);
    } else if($status == 2){
        update_status('dia_chi', 1, $id);
    }
    header("Location:". BASE_URL . "/admin/address/list");
}

function address_delete(){
    if(!isset($_GET['id'])){
    header("Location: " . BASE_URL . "/admin/address/list");
}
    $id = intval($_GET['id']);
    getDelete('dia_chi', 'id', $id);
    header("Location:". BASE_URL . "/admin/address/list");
}


?>