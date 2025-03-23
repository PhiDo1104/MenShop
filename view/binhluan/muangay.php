<?php
if (isset($_POST['addCart'])) {
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $color = $_POST['color'];
}
var_dump($size);
?>

<form action="index.php?act=muangay" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="name" value="<?= $name ?>">
    <input type="hidden" name="img" value="<?= $img ?>">
    <input type="hidden" name="price" value="<?= $price ?>">
    <input type="hidden" name="quantity" value="<?= $quantity ?>">
    <input type="hidden" name="size" value="<?= $size ?>">
    <input type="hidden" name="color" value="<?= $color ?>">
    <input type="submit" class="btn btn-success" name="muangay" value="Mua Ngay">
</form>