<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'> ";
} else {
    $hinh = "Khong co hinh";
}
?>
<div style="margin-left: 250px;">
    <div class="form-container">
        <h2 style="text-align: center;">Chi Tiết Sản Phẩm</h2>
        <span>Danh Mục Sản Phẩm </span><br>
        <?php
        $dm
        ?>
        <div class="form-row mt-5">
            <div class="form-group">
                <label for="name">Tên Sản Phẩm</label>
                <p><?php if (isset($name) && ($name != "")) echo $name; ?></p>
            </div>
            <div class="form-group">
                <label for="img">Ảnh Sản Phẩm</label>
                <img class="mb-3" src="<?php if (isset($img) && ($img != "")) echo $hinhpath = "../upload/" . $img; ?>" width="300px" alt="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="price">Giá Gốc</label>
                <p><?php if (isset($price) && ($price != "")) echo $price; ?></p>
            </div>
            <div class="form-group">
                <label for="del">Giá Giảm</label>
                <p><?php if (isset($del) && ($del != "")) echo $del; ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="quantity">Size</label>
                <p><?php if (isset($size) && ($size != "")) echo $size; ?></p>

            </div>
            <div class="form-group">
                <label for="quantity">Số Lượng</label>
                <p><?php if (isset($quantity) && ($quantity != "")) echo $quantity; ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="color">Màu Sắc</label>
                <p><?php if (isset($color) && ($color != "")) echo $color; ?></p>
            </div>
            <div class="form-group">
                <label for="status">Trạng Thái</label>
                <?php
                if ($quantity > 0) {
                ?>
                    <h6>Còn hàng</h6>
                <?php } else { ?>
                    <h6>Hết hàng</h6>
                <?php }
                ?>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="mota">Mô Tả</label>
            <p><?php if (isset($mota) && ($mota != "")) echo $mota; ?></p>
        </div>
        <div class="form-group">
            <a href="index.php?act=listsp" class="btn btn-primary">Quay Lại</a>
        </div>
    </div>
</div>