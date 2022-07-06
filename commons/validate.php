<?php
function checkEmpty($value){
    if(empty($value)){
        return false;
    }
    return true;
}

function checkEmail($email){
    $form = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
    $kq = preg_match($form, $email);
    return (bool)$kq;
}

function checkSdt($sdt){
    $form = "/^0[0-9]{9}$/";
    $kq = preg_match($form, $sdt);
    return (bool)$kq;
}

function checkInt($int){
    if(!is_int($int)){
        return false;
    }
    return true;
}

function checkImage($image){
    if(strpos($image['type'], 'image') === false){
        return false;
    }
    return true;
}
function checkBien($value){
    $form = "/^\d{2}-[A-Z]\d ((\d{4})|(\d{3}\.\d{2}))$/";
	if(preg_match($form,$value)==0){
    return false;
        
    }
    return true;
}
?>