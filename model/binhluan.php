<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan) {
    $sql = "INSERT INTO binhluan (noidung, iduser, idpro, ngaybinhluan) 
            VALUES ('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
    
    pdo_execute($sql);
}
function allbinhluan($idpro){
    $sql = "SELECT * FROM `binhluan` where idpro='".$idpro."' order by id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function allComment(){
    $sql = "SELECT * FROM `binhluan` where 1";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function deleteComment($id){
    $sql = "DELETE FROM `binhluan` WHERE id = $id";
    pdo_query($sql);
}
function searchComment($kyw){
    $sql = "SELECT * FROM `binhluan` where 1";
    if($kyw!=""){
        $sql.=" AND noidung LIKE '%".$kyw."%'";
    }
    $sql.=" order by id desc";
    $listComment = pdo_query($sql);
    return $listComment;
}
?>