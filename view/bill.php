<?php include "header.php"; ?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: center;
    }
</style>
<main>
    <form action="index.php?act=billConfirm" method="post">
        <div class="d-flex mt-5">
            <div class="row mb-5" style="width:70%; margin-right: 10%;border: 1px solid #999;">
                <p style="padding:20px 50px; background: #9999" class="fw-bold">
                    THÔNG TIN ĐẶT HÀNG
                </p>
                <div style="padding-left:20px" class="mt-3">
                    <table>
                        <?php $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
                        $address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
                        $tel = isset($_SESSION['tel']) ? $_SESSION['tel'] : ''; ?>
                        <tr>
                            <th style="padding-right: 100px;" scope="col">Người đặt hàng</th>
                            <th><input type="text" style="width: 100%;" name="username" value="<?= $username ?>"></th>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <th><input type="text" style="width: 100%;" name="address" value="<?= $address ?>"></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th><input type="email" style="width: 100%;" name="email" value="<?= $email ?>"></th>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <th><input type="text" style="width: 100%;" name="tel" value="<?= $tel ?>"></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mb-5" style="width:30%;border: 1px solid #999;">
                <p style="padding: 20px  50px; background: #9999" class="fw-bold">
                    PHƯƠNG THỨC THANH TOÁN
                </p>
                <div style="padding-left:20px" class="mt-3">
                    <table>
                        <tr>
                            <th scope="col"><input type="radio" value="COD" name="pttt" checked> COD</th>
                        </tr>
                        <tr>
                            <th scope="col"><input type="radio" value="Chuyển khoản ngân hàng" name="pttt"> Chuyển Khoản Ngân Hàng</th>
                        </tr>
                        <tr>
                            <th scope="col"><input type="radio" value="Thanh toán online" name="pttt"> Thanh Toán Online</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mb-5" style="border: 1px solid #999;">
            <p style="padding:20px 50px; background: #9999" class="fw-bold">
                THÔNG TIN GIỎ HÀNG
            </p>
            <div style="padding-left:20px" class="mt-3">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Size</th>
                            <th>Màu Sắc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        if (isset($_SESSION['username'])) {
                            $i = 0;
                            if ($_SESSION['myCart'] == []) {
                        ?>
                                <tr>
                                    <td colspan="8">Không có sản phẩm nào</td>
                                </tr>
                                <?php } else {
                                foreach ($_SESSION['myCart'] as $cart) {
                                    // var_dump($cart[5]);
                                    extract($cart);
                                    $price = str_replace('.', '', $cart[3]); // Loại bỏ dấu chấm
                                    if (is_numeric($price)) {
                                        $cart[7] = $cart[4] * $price;
                                    } else {
                                        $cart[7] = 0; // Xử lý lỗi nếu giá không hợp lệ
                                    }
                                    $i += 1;
                                    $sum += $cart[7];
                                    $hinh = $img_path . $cart[2];
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $cart[1] ?></td>
                                        <td><img src="<?= $hinh ?>" height="80px" alt=""></td>
                                        <td><?= number_format($price, 0, ',') ?> VNĐ</td>
                                        <td> <?= $cart[4] ?></td>
                                        <td> <?= $cart[5] ?></td>
                                        <td> <?= $cart[6] ?></td>
                                    </tr>
                        <?php } ?>

                        <?php    }
                        } else {

                            echo "<script>alert('Bạn phải đăng nhập để xem giỏ hàng!')</script>";

                            header("Location:index.php?act=login");
                        } ?>
                    </tbody>
                    
                </table>
                <h4>Tổng Tiền : <b class="fs-7" style="color: rgb(255, 21, 0);"><?= number_format($sum, 0, ',') ?> VNĐ</b></h4>

            </div>
        </div>
        <div style="position: relative; right: 20px">
            <input class="btn btn-danger" type="submit" value="Thanh Toán" name="thanhToan">
        </div>

    </form>
</main>
<?php include "footer.php"; ?>