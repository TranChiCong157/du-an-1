<?php
function admin_render($viewpath, $data = []){
    extract($data);
    $businessView = "./views/admin/" . $viewpath;
    include_once "./views/admin/layout.php";
}
function client_render($viewpath, $data = []){
    extract($data);
    $businessView = "./views/client/" . $viewpath;
    include_once "./views/client/layout.php";
}
?>