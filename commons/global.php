<?php
const BASE_URL = "http://localhost/DU_AN";
const ADMIN_URL = BASE_URL . "/admin/";
const IMAGE_URL = BASE_URL . "/images/";

$image_path = $_SERVER['DOCUMENT_ROOT'] . IMAGE_URL;

function save_file($image){
    $fileName = $image['name'];
    move_uploaded_file($image['tmp_name'], "./images/". $fileName);
}


