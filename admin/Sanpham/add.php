<?php
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
        if (filter_var($_POST["price"],  FILTER_VALIDATE_INT)) {
            $errors['price']['invalid'] = "Giá sản phẩm phải là sô";
        }
    }
    if (empty($_POST['del'])) {
        $errors['del']['required'] = "Vui lòng nhập giá giảm sản phẩm";
    } else {
        if (filter_var($_POST["del"],  FILTER_VALIDATE_INT)) {
            $errors['del']['invalid'] = "Giá sản phẩm phải là sô";
        }
    }
    if (empty($_POST['size'])) {
        $errors['size']['required'] = "Vui lòng nhập size sản phẩm";
    }
    if (empty($_POST['quantity'])) {
        $errors['quantity']['required'] = "Vui lòng nhập số lượng sản phẩm";
    } else {
        if (filter_var($_POST["quantity"], FILTER_VALIDATE_INT)) {
            $errors['quantity']['invalid'] = "Số lượng sản phẩm phải là sô nguyên";
        }
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
        <h2 style="text-align: center;">Thêm Sản Phẩm</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <span>Danh mục </span><br>
            <select name="iddm" id="">
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="' . $id . '">' . $Name . '</option>';
                }
                ?>

            </select>
            <div class="form-row mt-5">
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name">
                    <?php echo !empty($errors['name']['required']) ? '<span style="color: red">' . $errors['name']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['name']['min_length']) ? '<span style="color: red">' . $errors['name']['min_length'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="img">Đường Dẫn Ảnh</label>
                    <input type="file" id="img" name="img" accept="img/*">
                    <?php echo !empty($errors['img']['required']) ? '<span style="color: red">' . $errors['img']['required'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="price">Giá Gốc</label>
                    <input type="text" id="price" name="price" step="0.01">
                    <?php echo !empty($errors['price']['required']) ? '<span style="color: red">' . $errors['price']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['price']['invalid']) ? '<span style="color: red">' . $errors['price']['invalid'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="del">Giá Giảm</label>
                    <input type="text" id="del" name="del" step="0.01">
                    <?php echo !empty($errors['del']['required']) ? '<span style="color: red">' . $errors['del']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['del']['invalid']) ? '<span style="color: red">' . $errors['del']['invalid'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" id="size" name="size">
                    <?php echo !empty($errors['size']['required']) ? '<span style="color: red">' . $errors['size']['required'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="quantity">Số Lượng</label>
                    <input type="number" id="quantity" name="quantity">
                    <?php echo !empty($errors['quantity']['required']) ? '<span style="color: red">' . $errors['quantity']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['quantity']['invalid']) ? '<span style="color: red">' . $errors['quantity']['invalid'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="color">Màu Sắc</label>
                    <input type="text" id="color" name="color">
                    <?php echo !empty($errors['color']['required']) ? '<span style="color: red">' . $errors['color']['required'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="status">Trạng Thái</label>
                    <select>
                        <option name="status">Còn Hàng</option>
                        <option name="status">Hết Hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="mota">Mô Tả</label>
                <textarea name="mota" id="" cols="100px"></textarea> <br>
                <?php echo !empty($errors['mota']['required']) ? '<span style="color: red">' . $errors['mota']['required'] . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <input type="reset" style="background: #fb9590;" value="Nhập lại" class="mb-3 mt-3">
                <input type="submit" name="themmoi" style="background: #09d1c7;" value="Thêm mới">
            </div>
        </form>
    </div>
</div>