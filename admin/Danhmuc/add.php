<?php
$errors = [];
if (!empty($_POST)) {
    if (empty($_POST['tenloai'])) {
        $errors['tenloai']['required'] = "Vui lòng nhập tên danh mục";
    }
}
?>
<div style="margin-left: 250px;">
    <div class="form-container">
        <h2>Thêm Danh Mục</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="id">Id</label>
                <input type="text" id="id" name="id" disabled required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="tenloai">
                <?php echo !empty($errors['tenloai']['required']) ? '<span style="color: red">' . $errors['tenloai']['required'] . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <input type="reset" style="background: #fb9590;" value="Nhập lại" class="mb-3 mt-3">
                <input type="submit" name="themmoi" style="background: #09d1c7;" value="Thêm mới">
            </div>
        </form>
    </div>
</div>