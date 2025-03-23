<form action="index.php?act=listOrder" method="post" style="margin-left: 250px; width: 100%;">
    <div style="margin-left: 20px">
        <input type="text" name="kyw" style="border-radius: 20px;padding-left: 20px" placeholder="Tìm Kiếm">
        <input type="submit" name="listsubmit" value="Tìm kiếm" class="btn-danger" style="border-radius: 10px">
    </div>
</form>
<div class="main-content">
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên người nhận</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listOrder as $order) {
                extract($order);
                $xemchitiet = "index.php?act=chiTietOrder&id=$id";

                if ($status == 0) $mes = "Đang xử lý";
                else $mes = "Đã giao hàng";
            ?>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td><?= $address ?></td>
                <td><?= $tel ?></td>
                <td><?= $ngaydathang ?></td>
                <td>
                    <form action="index.php?act=suaOrder" method="post">
                        <input hidden name="idbill" value="<?= $id ?>">
                        <?php if ($status == 0) { ?>
                            <button class="btn btn-primary" name="xuly" value="1">Đang Xử Lý</button>
                            <button class="btn btn-danger" name="huy" value="-1">Hủy Đơn</button>
                        <?php } else if ($status == 1) { ?>
                            <button name="giaohang" value="2" class="btn btn-warning">Đang Giao Hàng</button>
                        <?php } else if ($status == 2) { ?>
                            <button name="giaohang" class="btn btn-success">Đã Giao Hàng</button>
                        <?php } else { ?>
                            <button class="btn btn-danger">Đã Hủy Đơn Hàng</button>
                        <?php } ?>
                    </form>
                </td>
                <td class="action-buttons">
                    <a href="<?= $xemchitiet ?>"  class="btn" style="margin-right: 10px"><i class="fa-solid fa-eye"></i></a>
                </td>
                </tr> <!-- Thêm các hàng dữ liệu khác tại đây -->
            <?php } ?>
        </tbody>
    </table>
</div>