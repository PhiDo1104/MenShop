<?php
function allCart()
{
    $sql = 'SELECT * FROM `cart` WHERE 1';
    $cart = pdo_query($sql);;
    return $cart;
}
function allCartById($iduser)
{
    $sql = 'SELECT * FROM `cart` WHERE iduser = ' . $iduser;
    $cart = pdo_query($sql);;
    return $cart;
}
function allCartByIdBill($idbill)
{
    $sql = 'SELECT * FROM `cart` WHERE idbill = ' . $idbill;
    $cart = pdo_query($sql);;
    return $cart;
}
function update_bill_status($idbill, $status) {
    $sql = "UPDATE `bill` SET `status`='$status' WHERE id = '$idbill'";
    pdo_execute($sql);
}

function allBill()
{
    $sql = 'SELECT * FROM `bill` WHERE 1';
    $cart = pdo_query($sql);;
    return $cart;
}
function allBillById($id)
{
    $sql = 'SELECT * FROM `bill` WHERE id = ' . $id;
    $bill = pdo_query($sql);;
    return $bill;
}
function deleteCart($id)
{
    $sql = "DELETE FROM `cart` WHERE id = " . $id;
    pdo_query($sql);
}
function update_bill($status)
{
    $sql = "UPDATE `bill` 
    SET `status`='$status' WHERE 1";
    $bill = pdo_execute_lastInsertId($sql);
    return $bill;
}
function insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $total)
{
    $sql = "INSERT INTO bill(id, name, address, tel, email, pttt, ngaydathang, total, status) 
            VALUES (NULL,'$name','$address','$tel','$email','$pttt','$ngaydathang','$total',0)";
    $bill = pdo_execute_lastInsertId($sql);
    return $bill;
}
function insert_cart($iduser, $idsp, $img, $name, $price, $ttien, $quantity, $size, $color, $idbill)
{
    $sql = "INSERT INTO `cart`(`id`, `iduser`, `idsp`, `img`, `name`, `price`, `thanhtien`, `quantity`, `size`, `color`,   `idbill`)
             VALUES (NULL,'$iduser','$idsp','$img','$name','$price','$ttien','$quantity','$size','$color','$idbill')";
    pdo_execute($sql);
}
function loadOne_bill($id)
{
    $sql = "SELECT * FROM `bill` WHERE id = " . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadOne_cart($idbill)
{
    $sql = "SELECT * FROM `cart` WHERE idbill = $idbill" ;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadCartById($idbill)
{
    $sql = "SELECT * FROM `cart` WHERE idbill = $idbill" ;
    $bill = pdo_query($sql);
    return $bill;
}
function searchOrder($kyw){
    $sql = "SELECT * FROM `bill` where 1";
    if($kyw!=""){
        $sql.=" AND id LIKE '%".$kyw."%'";
    }
    $sql.=" order by id desc";
    $listComment = pdo_query($sql);
    return $listComment;
}
function load_thongke_(){
    $sql = "select danhmuc.name, count(sanpham.id) as countsp , min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price)";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" oder by danhmuc.id desc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}
