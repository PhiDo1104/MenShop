<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/account.php";
include "../../model/sanpham.php";

$idpro = $_REQUEST['idpro'];; // Kiểm tra giá trị $idpro
// var_dump($idpro);
$listbinhluan = allbinhluan($idpro);
foreach ($listbinhluan as $bl) {
    extract($bl);
    $idpro = $bl['idpro'];
    $iduser = $bl['iduser'];
    $acc = loadOne_acc($iduser);
}
$sanpham = loadOne_sanpham($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f9f9f9;
        color: #333;
    }

    h1 {
        color: #444;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    form {
        margin-top: 20px;
    }

    form input[type="text"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<body>
    <div>
        <h1>Bình luận</h1>
        <hr>
        <table>
            <?php
            foreach ($listbinhluan as $binhluan) {
                extract($binhluan);
                echo '<tr> <td>' . $noidung . '</td>';
                echo '<td>' .  $acc["username"]  . '</td>';
                echo '<td>' .  $sanpham["name"]  . '</td>';
                echo '<td>' . $ngaybinhluan . '</td> </tr>';
            }
            ?>
        </table>

        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idpro" value="<?= $idpro ?>">
            <input type="hidden" name="iduser" value="<?= $iduser ?>">
            <input type="text" name="noidung" placeholder="Nhập nội dung bình luận" required>
            <input type="submit" class="btn btn-danger" name="guibinhluan" value="Bình luận">
        </form>

        <?php
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['id'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    
        ?>
    </div>
</body>

</html>
<?php  ?>