<?php
function checkLogin($email, $password)
{
    $sql = "SELECT * FROM `account` WHERE email = '" . $email . "' and password = '" . $password . "'";
    $checkLogin = pdo_query($sql);
    if (count($checkLogin) > 0) return $checkLogin[0]['role'];
    else return 0;
}
function checkLoginInfo($email, $password)
{
    $sql = "SELECT * FROM `account` WHERE email = '" . $email . "' and password = '" . $password . "'";
    $checkLogin = pdo_query($sql);
    return $checkLogin;
}
function all_account()
{
    $sql = "SELECT * FROM `account` ";
    $checkLogin = pdo_query($sql);
    return $checkLogin;
}
function newAccount_admin($username, $email, $password, $address, $tel, $role)
{
    $sql = "INSERT INTO `account`(`id`, `username`, `email`, `password`, `role`, `address`, `tel`) 
            VALUES (NULL,'$username','$email','$password','$role','$address','$tel')";
    pdo_execute($sql);
}
function newAccount($username, $email, $password)
{
    $sql = "INSERT INTO `account`(`id`, `username`, `email`, `password`, `role`, `address`, `tel`) 
            VALUES (NULL,'$username','$email','$password','0','','')";
    pdo_execute($sql);
}
function delete_acc($id)
{
    $sql = "DELETE FROM `account` WHERE id=" . $id;
    pdo_query($sql);
}
function update_acc($id, $username, $email, $password, $role, $address, $tel)
{
    $sql = "UPDATE `account` 
            SET `id`= $id,`username`='$username',`email`='$email',`password`='$password',`role`='$role',`address`='$address',`tel`='$tel' WHERE id = $id";
    pdo_execute($sql);
}
function loadOne_acc($id){
    $sql = "SELECT * FROM `account` WHERE id = ".$id;
    $acc = pdo_query_one($sql);
    return $acc;
}
