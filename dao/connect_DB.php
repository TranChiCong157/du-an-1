<?php
function getConnection(){
    $dbHost = "mysql:host=localhost;dbname=du_an";
    $dbName = 'root';
    $dbPass ='';
    $connection = new PDO($dbHost, $dbName, $dbPass);
    $connection->exec("set names utf8");
    return $connection;
}

function execute($sql){
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = getConnection();
        $statement = $conn->prepare($sql);
        $statement->execute($args);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

function query($sql){
    try {
        $conn = getConnection();
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

function query_one($sql){
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = getConnection();
        $statement = $conn->prepare($sql);
        $statement->execute($args);
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>