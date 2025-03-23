<?php
include "./view/header.php";
?>

<main>
    <h3 style="text-align: center;" class="mt-5 mb-5">GIỎ HÀNG</h3>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Size</th>
                <th>Màu Sắc</th>
                <th>Tổng Tiền</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sum = 0;
            if (isset($_SESSION['username'])) {

                if ($_SESSION['myCart'] == []) {
            ?>
                    <tr>
                        <td colspan="8">Không có sản phẩm nào</td>
                    </tr>
                    <?php } else {
                    $i = 0;
                    foreach ($_SESSION['myCart'] as $cart) {
                        extract($cart);
                        $i += 1;
                        $price = str_replace('.', '', $cart[3]); // Loại bỏ dấu chấm
                        if (is_numeric($price)) {
                            $ttien = $cart[4] * $price;
                        } else {
                            $ttien = 0; // Xử lý lỗi nếu giá không hợp lệ
                        }
                        $sum += $ttien;
                        $hinh = $img_path . $cart[2];
                        $xoacart = "index.php?act=delCart&id=" . ($i - 1);
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $cart[1] ?></td>
                            <td><img src="<?= $hinh ?>" height="80px" alt=""></td>
                            <td><?= number_format($price, 0, ',') ?> VNĐ</td>
                            <td>
                                <a class="btn" href=""><i class="fa-solid fa-minus"></i></a> <?= $cart[4] ?>
                                <a class="btn" href=""><i class="fa-solid fa-plus"></i></a>
                            </td>
                            <td><?= $cart[5] ?></td>
                            <td><?= $cart[6] ?></td>

                            <td><b class="fs-7" style="color: rgb(255, 21, 0);"><?= number_format($ttien, 0, ',') ?> VNĐ</b></td>
                            <td><a href="<?= $xoacart ?>"><button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</button></a></td>
                        </tr>
            <?php }
                }
            } else {

                echo "<script>alert('Bạn phải đăng nhập để xem giỏ hàng!')</script>";

                header("Location:index.php?act=login");
            } ?>
            <tr>
                <td colspan="4"><input type="checkbox" name="" id=""> Chọn Tất Cả</td>
                <td><a class="btn" href="<?= $xoacart ?>">Xóa</a></td>
                <td>Tổng Thanh Toán: <b class="fs-5" style="color: rgb(255, 21, 0);"><?= number_format($sum, 0, ',', '.') ?> VNĐ</b></td>
                <td>
                    <?php if ($_SESSION['myCart'] != []) { ?>
                        <a href="index.php?act=bill" class="btn btn-danger" type="submit">ĐẶT HÀNG</a>
                    <?php } else { ?>
                        <a href="" class="btn btn-danger" type="submit">ĐẶT HÀNG</a>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
</main>
<?php include 'footer.php'; ?>