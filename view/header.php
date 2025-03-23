<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenShop</title>
    <link rel="shortcut icon" href="image/z5997987437570_2f0f54baee75c55fc405be751fd36416.jpg" image/x-icon">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontend/main.css">
    <link rel="stylesheet" href="./fontend/style.css">
</head>

<body>
    <div class="header-top ">
        <div class="hd-top-items d-flex">
            <div class="call">
                <i class="fa-solid fa-phone"></i> Hotline: 0968.444.644
            </div>
            <div class="menu d-flex">
                <div class="menu-1  flex-fill"><a class="btn" href="size.html">Cách Chọn Size</a></div>
                <div class="menu-1 flex-fill"><a class="btn" href="view/gioithieu.php">Chính Sách</a></div>
                <div class="menu-1 flex-fill"><a class="btn" href="view/gioithieu.php">Giới Thiệu</a></div>
            </div>
        </div>

    </div>
    <div class="container">
        <header class="d-flex">
            <div class="logo">
                <a href="index.php"><img style="width: 50px; border-radius: 25px;"
                        src="./fontend/image/logo.jpg" alt="Logo"></a>
            </div>
            <menu class="d-flex" style="margin-left: 20px">
                <a href="" class="btn">Hàng Mới Về</a>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                    
                    echo '
                       <a href="' . $linkdm . '" class="btn">' . $Name . '</a>
                    ';
                }
                ?>

                <!-- <a href="" class="btn">Quần Nam</a>
                <a href="" class="btn">Phụ Kiện</a>
                <a href="" class="btn">OutLet Sale</a> -->
            </menu>
            <div class="search d-flex" style="margin-left:10px">
                <form action="index.php?act=search" style="margin: 0;" method="post" class="d-flex">
                    <div class="text">
                        <input style="border-radius: 5px;" type="text" name="kyw" placeholder="Tìm kiếm sản phẩm...">
                    </div>
                    <div class="search-icon" style="padding-left: 10px">
                        <button style="border-radius: 5px ;" class="btn-danger btn" type="submit"><i class="fa-solid fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="cart" style="padding-right: 20px;">
                <a href="index.php?act=cart" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <div class="user d-flex">
                <?php
                if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
                    $user = $_SESSION['username'];
                ?>
                    <h5 style="color: black;line-height: 50px; padding-top: 10px">Xin Chào: <?= $user ?></h5>
                    <img style="width: 50px; margin-top: 15px" src="./fontend/image/Screenshot 2024-11-06 231314.png" alt="">
                    <a style="line-height: 50px; font-weight: bold;padding-top: 10px" href="index.php?act=logout" class="btn"><i class="fa-solid fa-power-off"></i></a>
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == '1') {
                    ?>
                        <a style="line-height: 50px; font-weight: bold;padding-top: 10px" href="admin/index.php" class="btn"><i class="fas fa-sign-out-alt"></i></a>
                    <?php
                    }
                    ?>
                    <a style="line-height: 50px; font-weight: bold;padding-top: 10px" href="index.php?act=history_bill" class="btn"><i class="fa-solid fa-truck"></i></a>
                <?php
                } else {
                ?>
                    <a href="index.php?act=login" style=" font-weight: bold;margin-top: 10px" class="btn">
                        <h4>Đăng Nhập</h4>
                    </a>
                    <a href="index.php?act=resignter" style=" font-weight: bold;margin-top: 10px" class="btn">
                        <h4>Đăng Ký</h4>
                    </a>
                <?php }
                ?>
            </div>
        </header>
        <marquee behavior="" direction="">MenShop Xin Chào !!!</marquee>