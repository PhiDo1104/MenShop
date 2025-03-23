<form action="index.php?act=listComment" method="post" style="margin-left: 250px; width: 100%;">
    <div style="margin-left: 20px">
        <input type="text" name="kyw" style="border-radius: 20px;padding-left: 20px" placeholder="Tìm Kiếm">
        <input type="submit" name="listsubmit" value="Tìm kiếm" class="btn-danger" style="border-radius: 10px">
    </div>
</form>
<div class="main-content">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Nội Dung</th>
                <th>Tên Sản Phẩm</th>
                <th>Ngày Bình Luận</th>
                <th>Tên Người Dùng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;

            foreach ($listcomment as $comment) {
                extract($comment);
                $iduser = $comment['iduser'];
                $idpro = $comment['idpro'];
                $i += 1;
                $sanpham = loadOne_sanpham($idpro);
                $acc = loadOne_acc($iduser);
                $xoaComment = "index.php?act=xoaComment&id=$id";
            ?>
                <td><?= $i ?></td>
                <td><?= $noidung ?></td>
                <td><?= $sanpham['name'] ?></td>
                <td><?= $ngaybinhluan ?></td>
                <td><?= $acc['username'] ?></td>
                <td class="action-buttons">
                    <a href="<?= $xoaComment ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn" style="margin-right: 10px"><i class="fas fa-times"></i></a>
                </td>
                </tr> <!-- Thêm các hàng dữ liệu khác tại đây -->
            <?php } ?>
        </tbody>
    </table>
</div>