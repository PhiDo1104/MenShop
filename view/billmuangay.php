<?php include "header.php"; ?>
<style>
    /* Toàn bộ trang */
body {
    font-family: 'Roboto', sans-serif;
    line-height: 1.6;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    color: #333;
}

/* Tiêu đề cảm ơn */
p.fw-bold.text-center {
    background: #ff6f61;
    color: #fff;
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    padding: 20px;
    margin: 0;
    border-radius: 8px;
}

/* Thông tin đơn hàng và các phần container */
.row.mb-5 {
    background-color: #ffffff;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.row.mb-5 p {
    font-size: 1.2rem;
    color: #555;
    margin: 10px 0;
    text-align: center;
}

/* Bảng thông tin chi tiết */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

table th,
table td {
    padding: 15px;
    border: 1px solid #e0e0e0;
    text-align: center;
    font-size: 1rem;
}

table th {
    background-color: #fafafa;
    font-weight: 600;
    color: #444;
    text-transform: uppercase;
}

table td {
    color: #555;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s;
}

/* Hình ảnh sản phẩm */
table td img {
    max-height: 80px;
    border-radius: 5px;
    object-fit: cover;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Tổng tiền */
h4 {
    font-size: 1.4rem;
    color: #ff5722;
    text-align: right;
    margin-top: 10px;
}

/* Tiêu đề phần thông tin */
p.fw-bold {
    font-size: 1.3rem;
    font-weight: 700;
    background: #6c757d;
    color: white;
    padding: 15px 20px;
    margin: 0 -20px 20px -20px;
    border-radius: 8px 8px 0 0;
}

/* Responsive cho màn hình nhỏ */
@media (max-width: 768px) {
    table th, table td {
        font-size: 0.9rem;
        padding: 10px;
    }

    h4 {
        font-size: 1.2rem;
    }

    p.fw-bold.text-center {
        font-size: 1.2rem;
    }
}

</style>
<main>
    <form action="index.php?act=billConfirm" method="post">
        <p style="padding: 20px ; background: red" class="fw-bold text-center">CẢM ƠN BẠN ĐÃ ĐẶT HÀNG</p>
        <?php
        if (isset($bill) && is_array($bill)) {
            extract($bill);
        }
        ?>
        <div class="row mb-5" style="border: 1px solid #999;">
            <p style="padding: 20px 0; background: #9999" class="fw-bold text-center">
                THÔNG TIN ĐƠN HÀNG
            </p>
            <div style="padding-left:20px" class="mt-3">
                <p class="fw-bold text-center">
                    Mã Đơn Hàng: ABC-<?= $bill['id'] ?>
                </p>
                <p class="fw-bold text-center">
                    Ngày Đặt Hàng: <?= $bill['ngaydathang'] ?>
                </p>
                <p class="fw-bold text-center">
                    Tổng Đơn Hàng: <?= $bill['total'] ?>
                </p>
                <p style="padding: 20px  50px;" class="fw-bold text-center">
                    PHƯƠNG THỨC THANH TOÁN: <?= $bill['pttt'] ?>
                </p>
            </div>
        </div>
        <div class="d-flex mt-5">
            <div class="row mb-5" style="width:100%; border: 1px solid #999;">
                <p style="padding:20px 50px; background: #9999" class="fw-bold">
                    THÔNG TIN ĐẶT HÀNG
                </p>
                <div style="padding-left:20px" class="mt-3">
                    <table>
                        <tr>
                            <th style="padding-right: 100px;" scope="col">Người đặt hàng</th>
                            <th><?= $bill['name'] ?></th>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <th><?= $bill['address'] ?></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th><?= $bill['email'] ?></th>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <th><?= $bill['tel'] ?></th>
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
                            if ($_SESSION['muangay'] == []) {
                        ?>
                                <tr>
                                    <td colspan="8">Không có sản phẩm nào</td>
                                </tr>
                                <?php } else {
                                foreach ($_SESSION['muangay'] as $cart) {
                                    // var_dump($cart[5]);
                                    extract($cart);
                                    $price = str_replace('.', '', $cart[3]); // Loại bỏ dấu chấm
                                    // if (is_numeric($price)) {
                                    //     $cart[5] = $cart[4] * $price;
                                    // } else {
                                    //     $cart[5] = 0; // Xử lý lỗi nếu giá không hợp lệ
                                    // }
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
                        <?php }
                            }
                        } ?>
                    </tbody>
                </table>
                <h4>Tổng Tiền : <b class="fs-7" style="color: rgb(255, 21, 0);"><?= number_format($sum, 0, ',') ?> VNĐ</b></h4>
            </div>
        </div>
    </form>
</main>
<?php include "footer.php"; ?>