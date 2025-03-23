<div class="main-content">
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Số Lượng</th>
                <th>Size</th>
                <th>Màu Sắc</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listOrder as $order) {
                extract($order);
                // var_dump($order['name']);
                $hinhpath = "../upload/" . $img;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height='80'> ";
                } else {
                    $hinh = "Khong co hinh";
                }
            ?>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td><?= $hinh ?></td>
                <td><?= $price ?></td>
                <td><?= $order['thanhtien'] ?></td>
                <td><?= $quantity ?></td>
                <td><?= $size ?></td>
                <td><?= $color ?></td>

                </tr> <!-- Thêm các hàng dữ liệu khác tại đây -->
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php?act=listOrder" class="btn btn-primary">Quay Lại</a>
</div>