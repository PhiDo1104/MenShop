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
$errors = [];
if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        $errors['name']['required'] = "Vui lòng nhập tên sản phẩm";
    } else {
        if (strlen(trim($_POST['name'])) < 5) {
            $errors['name']['min_length'] = "Tên sản phẩm phải trên 5 kí tự";
        }
    }

    if (empty($_POST['img'])) {
        $errors['img']['required'] = "Vui lòng nhập đường dẫn ảnh của bạn";
    }

    if (empty($_POST['price'])) {
        $errors['price']['required'] = "Vui lòng nhập giá gốc sản phẩm";
    } else {
        if (filter_var($_POST["price"], FILTER_VALIDATE_INT)) {
            $errors['price']['invalid'] = "Giá sản phẩm phải là sô";
        }
    }
    if (empty($_POST['del'])) {
        $errors['del']['required'] = "Vui lòng nhập giá giảm sản phẩm";
    } else {
        if (filter_var($_POST["del"], FILTER_VALIDATE_INT)) {
            $errors['del']['invalid'] = "Giá sản phẩm phải là sô";
        }
    }
    if (empty($_POST['size'])) {
        $errors['size']['required'] = "Vui lòng nhập size sản phẩm";
    }
    if (empty($_POST['quantity'])) {
        $errors['quantity']['required'] = "Vui lòng nhập số lượng sản phẩm";
    }
    if (empty($_POST['color'])) {
        $errors['color']['required'] = "Vui lòng nhập màu sắc sản phẩm";
    }
    if (empty($_POST['mota'])) {
        $errors['mota']['required'] = "Vui lòng nhập mô tả sản phẩm";
    }
}
?>
<div style="margin-left: 250px;">
    <div class="form-container">
        <h2 style="text-align: center;">Cập Nhật Sản Phẩm</h2>
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <span>Danh Mục Sản Phẩm </span><br>
            <select name="iddm" id="">
                <option value="0" selected>Tất cả </option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    if ($iddm == $id) $s = "selected";
                    else $s = "";
                    echo '<option value="' . $id . '" ' . $s . '>' . $Name . '</option>';
                }
                ?>
            </select>
            <div class="form-row mt-5">
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                    <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['name']) {
                            echo $name = '';
                        }else {
                            echo $name;
                        }
                    }; ?>  -->
                    <input type="text" id="name" name="name" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                    <?php echo !empty($errors['name']['required']) ? '<span style="color: red">' . $errors['name']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['name']['min_length']) ? '<span style="color: red">' . $errors['name']['min_length'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="img">Dường Dẫn Ảnh</label>
                    <img class="mb-3" src="<?php if (isset($img) && ($img != "")) echo $hinhpath = "../upload/" . $img; ?>" width="100px" alt="">
                    <input type="file" name="img" id="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="price">Giá Gốc</label>
                    <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['price']) {
                            echo $price = '';
                        }else {
                            echo $price;
                        }
                    }; ?>  -->
                    <input type="text" id="price" name="price" value="<?php if (isset($price) && ($price != "")) echo $price; ?>" step="0.01">
                    <?php echo !empty($errors['price']['required']) ? '<span style="color: red">' . $errors['price']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['price']['invalid']) ? '<span style="color: red">' . $errors['price']['invalid'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="del">Giá Giảm</label>
                    <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['del']) {
                            echo $del = '';
                        }else {
                            echo $del;
                        }
                    }; ?>  -->
                    <input type="text" id="del" name="del" value="<?php if (isset($del) && ($del != '')) echo $del;?>" step="0.01">
                    <?php echo !empty($errors['del']['required']) ? '<span style="color: red">' . $errors['del']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['del']['invalid']) ? '<span style="color: red">' . $errors['del']['invalid'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="size">Size</label>
                    <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['size']) {
                            echo $size = '';
                        }else {
                            echo $size;
                        }
                    }; ?>  -->
                    <input type="text" id="size" name="size" value="<?php if (isset($size) && ($size != "")) echo $size; ?>">
                    <?php echo !empty($errors['size']['required']) ? '<span style="color: red">' . $errors['size']['required'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="quantity">Số Lượng</label>
                    <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['quantity']) {
                            echo $quantity = '';
                        }else {
                            echo $quantity;
                        }
                    }; ?>  -->
                    <input type="number" id="quantity" name="quantity" value="<?php if (isset($quantity) && ($quantity != "")) echo $quantity; ?>">
                    <?php echo !empty($errors['quantity']['required']) ? '<span style="color: red">' . $errors['quantity']['required'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="color">Màu Sắc</label>
                    <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['color']) {
                            echo $color = '';
                        }else {
                            echo $color;
                        }
                    }; ?>  -->
                    <input type="text" id="color" name="color" value="<?php if (isset($color) && ($color != "")) echo $color; ?>">
                    <?php echo !empty($errors['color']['required']) ? '<span style="color: red">' . $errors['color']['required'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="status">Trạng Thái</label>
                    <select id="status" name="status" value="<?php if (isset($status) && ($status != "")) echo $status; ?>">
                        <option value="available">Còn Hàng</option>
                        <option value="unavailable">Hết Hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="mota">Mô Tả</label>
                <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['mota']) {
                            echo $mota = '';
                        }else {
                            echo $mota;
                        }
                    }; ?>  -->
                <textarea name="mota" id="" value="" cols="100px"><?php if (isset($mota) && ($mota != "")) echo $mota; ?></textarea><br>
                <?php echo !empty($errors['mota']['required']) ? '<span style="color: red">' . $errors['mota']['required'] . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php if (isset($id) && ($id != "")) echo $sanpham['id']; ?>">
                <!-- <?php var_dump($sanpham['id']); ?> -->
                <input type="reset" style="background: #fb9590;" value="Nhập lại" class="mb-3 mt-3">
                <input type="submit" name="capnhat" style="background: #09d1c7;" value="Cập Nhật">
            </div>
        </form>
    </div>
</div>