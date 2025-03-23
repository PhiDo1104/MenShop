<?php
if (is_array($dm)) {
    extract($dm);
}
$errors = [];
if (!empty($_POST)) {
    if (empty($_POST['tenloai'])) {
        $errors['tenloai']['required'] = "Vui lòng nhập tên danh mục";
    }
}
?>
<div style="margin-left: 250px;">
    <div class="form-container">
        <h2>Cập Nhật Danh Mục</h2>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="id">Id</label>
                <input type="text" id="id" name="id" disabled value="<?php if (isset($Name) && ($id != "")) echo $id; ?>" required>
            </div>

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <!-- <?php if (isset(($_POST['capnhat']))) {
                        if($errors['tenloai']) {
                            echo $Name = '';
                        }else {
                            echo $Name;
                        }
                    }; ?>  -->
                <input type="text" id="name" name="tenloai" value="<?php if (isset($Name) && ($Name != "")) echo $Name; ?>" >
                <?php echo !empty($errors['tenloai']['required']) ? '<span style="color: red">' . $errors['tenloai']['required'] . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
                <input type="reset" style="background: #fb9590;" value="Nhập lại" class="mb-3 mt-3">
                <input type="submit" name="capnhat" style="background: #09d1c7;" value="Cập Nhật">
            </div>
        </form>
    </div>
</div>