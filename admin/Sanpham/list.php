<form action="index.php?act=listsp" method="post" style="margin-left: 250px; width: 100%;">
    <div style="margin-left: 20px">
        <input type="text" name="kyw" style="border-radius: 20px" placeholder="     Tìm Kiếm">
        <select name="iddm" id="">
            <option value="0" selected>Tất cả </option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $Name . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="listsubmit" value="Tìm kiếm" class="btn-danger" style="border-radius: 10px">
    </div>
</form>
<div class="main-content">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Del</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listsanpham as $sanpham) {
                extract($sanpham);
                $suasp = "index.php?act=suasp&id=$id";
                $xoasp = "index.php?act=xoasp&id=$id";
                $chitietsp = "index.php?act=chitietsp&id=$id";
                $hinhpath = "../upload/" . $img;
                if ($quantity > 0) {
                    $status = "Con Hang";
                } else {
                    $status = "Het Hang";
                }
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height='80px' width='80px'> ";
                } else {
                    $hinh = "Khong co hinh";
                } ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $name ?></td>
                    <td><?= $hinh ?></td>
                    <td><?= $price ?></td>
                    <td><?= $del ?></td>
                    <td><?= $size ?></td>
                    <td><?= $quantity ?></td>
                    <td><?= $status ?></td>
                    <td><?= $color ?></td>
                    <td class="action-buttons">
                        <a href="<?= $suasp ?>" class="btn" style="margin: 0 10px"><i class="fas fa-pen"></i></a>
                        <a href="<?= $chitietsp ?>" class="btn" style="margin-right: 10px"><i class="fa-solid fa-eye"></i></a>
                        <!-- <a href="<?= $xoasp ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn" style="margin-right: 10px"><i class="fas fa-check"></i></a> -->
                    </td>
                </tr> <!-- Thêm các hàng dữ liệu khác tại đây -->
            <?php } ?>
        </tbody>
    </table>
</div>