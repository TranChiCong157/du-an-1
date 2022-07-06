<?php
function comment_list(){
    $result = select_tour();
    admin_render('comment/list.php', [
        'result' => $result
    ]);
}

function comment_detail(){
    if(isset($_GET['id_tour'])){
        $result = getSelect_cmt('binh_luan', 'id_tour', intval($_GET['id_tour']));
        $tour = getSelect_one('tour', 'id', intval($_GET['id_tour']));
        admin_render('comment/detail.php', [
            'tour' => $tour,
            'result' => $result
        ]);
    }
}

function  comment_delete(){
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        getDelete('binh_luan', 'id', $id);
    }
    header("Location:" . BASE_URL .  "/admin/comment/detail?id_tour=" . $_GET['id_tour']);  
}
function comment_status(){
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('binh_luan', 2, $id);
        } else if($status == 2){
            update_status('binh_luan', 1, $id);
        }
    }
    header("Location:" . BASE_URL .  "/admin/comment/detail?id_tour=" . $_GET['id_tour']);  
}
?>