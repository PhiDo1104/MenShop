<?php
include "./view/header.php";
?>

<main>
    <div class="row mb-5" style="border: 1px solid #999;">
        <p style="padding:20px 50px; background: #9999" class="fw-bold">
            LỊCH SỬ MUA HÀNG
        </p>
        <div style="padding-left:20px" class="mt-3">
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
                        <th>Ngày Đặt Hàng</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sum = 0;
                    $i = 0;
                    $cart = allCartById($_SESSION['id']);
                    if (empty($cart)) {
                        echo "<tr><td colspan='9' class='text-center fs-4 fw-bold'>Bạn chưa mua sản phẩm nào!</td></tr>";
                        exit;
                    } else {
                        foreach ($cart as $c) {
                            extract($c);
                            $hinh = $img_path . $c['img'];
                            $ttien = str_replace(',', '', $c['thanhtien']);
                            $sum += $ttien;
                            $price = str_replace(',', '', $c['price']);
                            $bill = allBillById($c['idbill']);
                            foreach ($bill as $b) {
                                extract($b);
                                $ngaydathang = date('d/m/Y', strtotime($b['ngaydathang']));
                    ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $c['name'] ?></td>
                                    <td><img src="<?= $hinh ?>" height="80px" alt=""></td>
                                    <td><?= number_format($price, 0, ',', '.') ?> VNĐ</td>
                                    <td><?= $c['quantity'] ?></td>
                                    <td><?= $c['size'] ?></td>
                                    <td><?= $c['color'] ?></td>
                                    <td><?= $ngaydathang ?></td>
                                    <td class="d-flex">
                                        <?php
                                        if ($b['status'] == 0) {
                                            echo "<button class='btn btn-primary'>Đang Xử Lý</button>";

                                        ?>
                                            <form action="index.php?act=huy" method="post">
                                                <input type="hidden" name="idbill" value="<?= $b['id'] ?>">
                                                <button name="huy" value="-1" class="btn btn-danger">Hủy</button>
                                            </form>
                                        <?php
                                        } else if ($b['status'] == 1) {
                                            echo "<button class='btn btn-warning'>Đang Giao Hàng</button>";
                                        } else if ($b['status'] == 2) {
                                            echo "<button class='btn btn-success'>Đã Giao Hàng</button>";
                                        } else {
                                            echo "<button class='btn btn-danger'>Đã Hủy Đơn Hàng</button>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
            <h4>Tổng Tiền : <b class="fs-7" style="color: rgb(255, 21, 0);"><?= number_format($sum, 0, ',') ?> VNĐ</b></h4>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>