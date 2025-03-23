<?php
$errors = [];
if (!empty($_POST)) {
    if (empty($_POST['username'])) {
        $errors['username']['required'] = "Vui lòng nhập tên đăng nhập";
    } else {
        if (strlen(trim($_POST['username'])) < 5) {
            $errors['username']['min_length'] = "Họ và tên phải trên 5 kí tự";
        }
    }

    if (empty($_POST['email'])) {
        $errors['email']['required'] = "Vui lòng nhập email của bạn";
    } else {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['invalid'] = "Định dạng email không hợp lệ";
        }
    }
    if (empty($_POST['password'])) {
        $errors['password']['required'] = "Vui lòng nhập mật khẩu";
    } else {
        if (strlen(trim($_POST['password'])) < 6) {
            $errors['password']['min_length'] = "Mật khẩu phải trên 6 kí tự";
        }
    }
    if (empty($_POST['rPassword'])) {
        $errors['rPassword']['required'] = "Vui lòng nhập lại mật khẩu";
    } else {
        if (trim($_POST['rPassword']) !== trim($_POST['password'])) {
            $errors['rPassword']['invalid'] = "Nhạp lại mật khẩu không đúng";
        }
    }
    if (empty($_POST['address'])) {
        $errors['address']['required'] = "Vui lòng nhập địa chỉ";
    }
    if (empty($_POST['tel'])) {
        $errors['tel']['required'] = "Vui lòng nhập số điện thoại";
    } else {
        if (filter_var($_POST['tel'], FILTER_VALIDATE_INT) && strlen(trim($_POST['tel'])) == 10) {
            $errors['tel']['invalid'] = "Số điện thoại phải có 10 chữ số";
        }
    }
} ?>
<div style="margin-left: 250px;">
    <div class="form-container">
        <h2 style="text-align: center;">Thêm Tài Khoản</h2>
        <form action="index.php?act=addacc" method="post" enctype="multipart/form-data">
            <div class="form-row mt-5">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username">
                    <?php echo !empty($errors['username']['required']) ? '<span style="color: red">' . $errors['username']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['username']['min_length']) ? '<span style="color: red">' . $errors['username']['min_length'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <?php echo !empty($errors['email']['required']) ? '<span style="color: red">' . $errors['email']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['email']['invalid']) ? '<span style="color: red">' . $errors['email']['invalid'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" step="0.01">
                    <?php echo !empty($errors['password']['required']) ? '<span style="color: red">' . $errors['password']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['password']['min_length']) ? '<span style="color: red">' . $errors['password']['min_length'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="rPassword">rPassword</label>
                    <input type="password" id="rPassword" name="rPassword" step="0.01">
                    <?php echo !empty($errors['rPassword']['required']) ? '<span style="color: red">' . $errors['rPassword']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['rPassword']['invalid']) ? '<span style="color: red">' . $errors['rPassword']['invalid'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address">
                    <?php echo !empty($errors['address']['required']) ? '<span style="color: red">' . $errors['address']['required'] . '</span>' : ''; ?>
                </div>
                <div class="form-group">
                    <label for="tel">Tel</label>
                    <input type="text" id="tel" name="tel">
                    <?php echo !empty($errors['tel']['required']) ? '<span style="color: red">' . $errors['tel']['required'] . '</span>' : ''; ?>
                    <?php echo !empty($errors['tel']['invalid']) ? '<span style="color: red">' . $errors['tel']['invalid'] . '</span>' : ''; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="reset" style="background: #fb9590;" value="Nhập lại" class="mb-3 mt-3">
                <input type="submit" name="themmoi" style="background: #09d1c7;" value="Thêm mới">
            </div>
        </form>
    </div>
</div>