<div class="main-content">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                $suadm = "index.php?act=updatedm&id=$id";
                $xoadm = "index.php?act=xoadm&id=$id";
                
            ?>

            <tr>
            <td><?=  $id ?></td>
            <td><?= $Name ?></td>
            <td>
               <a href="<?= $suadm ?>" class="btn" style="margin: 0 10px"><i class="fas fa-pen"></i></a>
               <!-- <a href="<?= $xoadm ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn" style="margin-right: 10px"><i class="fas fa-times"></i></a> -->
            </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>