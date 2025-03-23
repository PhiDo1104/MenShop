<?php
function insert_danhmuc($tenloai){
    $sql = "INSERT INTO `danhmuc`( `Name`) 
                VALUES ('$tenloai')";
                pdo_execute($sql);
}
function delete_dm($id){
    $sql = "DELETE FROM `danhmuc` WHERE id=".$id;
    pdo_query($sql);
}
function all(){
    $sql = "SELECT * FROM `danhmuc`";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadOne($id){
    $sql = "SELECT * FROM `danhmuc` WHERE id = ".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function updateDm($id,$tenloai){
    $sql = "UPDATE `danhmuc` SET
    `id`='$id',`Name`='$tenloai' WHERE id=".$id;
    pdo_execute($sql);
}
?>