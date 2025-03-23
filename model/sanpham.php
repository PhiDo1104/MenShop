<?php
function insert_sanpham($name,$price,$img,$mota,$iddm,$del,$size,$quantity,$color){
    $sql = "insert into product(name,price,img,mota,iddm,del,size,quantity,color)
         values ('$name','$price','$img','$mota','$iddm','$del','$size','$quantity','$color');";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql = "DELETE FROM `product` WHERE id=".$id;
    pdo_query($sql);
}
function all_sanpham($kyw,$iddm){
    $sql = "select * from product where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'"; 
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function all_search($kyw){
    $sql = "select * from product where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    $listsanphamsearch = pdo_query($sql);
    return $listsanphamsearch;
}
function loadAll_sanpham(){
    $sql = "SELECT * FROM `product` where 1 order by id desc ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadAll_sanpham_DM($kyw,$iddm){
    $sql = "SELECT * FROM `product` where iddm = '$iddm' order by id desc ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadOne_sanpham($id){
    $sql = "SELECT * FROM `product` WHERE id = ".$id;
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function updateById($id, $quantity){
    $sql = "UPDATE `product` SET quantity = '$quantity' WHERE id = ".$id;
    pdo_execute($sql);
}
function updateDm_sanpham($id,$name,$price,$mota,$img,$iddm,$del,$size,$quantity,$color){
    if($img!=""){
       $sql="update product set iddm='".$iddm."',`img`='$img',name='".$name."',mota='".$mota."',price='".$price."',del='".$del."',size='".$size."',quantity='".$quantity."',color='".$color."' WHERE id = ".$id;
    }
    else{
        $sql="update product set iddm='".$iddm."',`img`='$img',name='".$name."',mota='".$mota."',price='".$price."',del='".$del."',size='".$size."',quantity='".$quantity."',color='".$color."' WHERE id = ".$id;
    }
    // $sql = "UPDATE `product` SET `id`='$id',`name`='$name',`price`='$price',`img`='$img',`mota`='$mota',`luotxem`= 0 ,`iddm`='$iddm',`del`='$del',`size`='$size',`quantity`='$quantity',`color`='$color' WHERE 1";
    pdo_execute($sql);
}
function loadOne_sanpham_cungloai($id,$iddm){
    $sql = "SELECT * FROM `product` WHERE iddm = '".$iddm."' AND id <> $id";
    $listsanpham =pdo_query($sql);
    return $listsanpham;
}
?>