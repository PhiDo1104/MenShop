<div class="main-content">
    <table>
        <thead>
            <tr>
                <p>
                    <th>Id</th>
                </p>
                <p>
                    <th>User Name</th>
                </p>
                <p>
                    <th>Email</th>
                </p>
                <p>
                    <th>Address</th>
                </p>
                <p>
                    <th>Tel</th>
                </p>
                <p>
                    <th>Role</th>
                </p>
                <p>
                    <th>Thao tác</th>
                </p>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listacc as $acc) {
                extract($acc);
                $suaacc = "index.php?act=suaacc&id=$id";
                $xoaacc = "index.php?act=xoaacc&id=$id";
                if($role == 1){
                    $role = "admin";
                }else{
                    $role = "user";
                }
            ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $username ?></td>
                    <td><?= $email?></td>
                    <td><?= $address ?></td>
                    <td><?= $tel ?></td>
                    <td><?= $role ?></td>
                    <td class="action-buttons">
                        <a href="<?= $suaacc ?>" class="btn" style="margin: 0 10px"><i class="fas fa-pen"></i></a>
                        <!-- <a href="<?= $xoaacc ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn" style="margin-right: 10px"><i class="fas fa-times"></i></a> -->
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>