<?php include "header.php"; ?>
<h3 style="text-align: center;" class="mt-5">CHI TIẾT SẢN PHẨM</h3>
<?php

extract($onesanpham);
$hinh = $img_path . $img; ?>
<main class="chitiet mt-5 mb-5">
    <div class="sp-centrer d-flex">
        <img src="<?= $hinh ?>"
            width="400px" height="450px" alt="">
        <!-- <img src="https://4menshop.com/images/thumbs/2022/06/-16908-slide-products-62b161ef0a82d.png"
                    width="300px" alt="">
                <img src="https://4menshop.com/images/thumbs/2022/06/-16908-slide-products-62b161ee099d1.png"
                    width="300px" alt=""> -->
    </div>
    <div class="thongtin fw-bold">
        <div class="mb-5">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
        </div>
        <label class="mb-3 fs-3" for="">Tên Sản Phẩm: <?= $name ?>
        </label>
        <div>
            <label>Giá bán: <b class="fs-5 fw-bold " style="color: red;margin-right: 40px"><?= $del ?> VNĐ</b></label>
            <label>Giá gốc: <del class="fs-6 fw-bold"><?= $price ?> VNĐ</del></label>
        </div>
        <hr>
        <div>
            <form action="index.php?act=addCart" method="post" id="addCartForm">
                <label class="mb-3">Size:
                    <select name="size" id="addCartSize">
                        <?php
                        $s = explode(",", $size);
                        for ($i = 0; $i < count($s); $i++) { ?>
                            <option value="<?= $s[$i] ?>"><?= $s[$i] ?></option>
                        <?php } ?>
                    </select>
                </label>
                <label style="margin-left: 60px;" class="mb-3">Màu Sắc:
                    <select name="color" id="addCartColor">
                        <?php
                        $c = explode(",", $color);
                        for ($i = 0; $i < count($c); $i++) { ?>
                            <option value="<?= $c[$i] ?>"><?= $c[$i] ?></option>
                        <?php } ?>
                    </select>
                </label>
                <div>Số Lượng<input type="number" name="quantity" value="1" min="1" id="addCartQuantity"></div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden" name="img" value="<?= $img ?>">
                <input type="hidden" name="del" value="<?= $del ?>">
                <input type="submit" class="btn btn-danger mt-3" name="addCart" value="Thêm Giỏ Hàng">
            </form>
            <form action="index.php?act=muangay" method="post" id="muangayForm">
                <input type="hidden" name="size" id="muangaySize">
                <input type="hidden" name="color" id="muangayColor">
                <input type="hidden" name="quantity" id="muangayQuantity">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden" name="img" value="<?= $img ?>">
                <input type="hidden" name="del" value="<?= $del ?>">

                <input type="submit" class="btn btn-success" name="muangay" value="Mua Ngay">
            </form>

            <script>
                // Lấy các giá trị từ form addCart và cập nhật vào form muangay
                document.getElementById('addCartSize').addEventListener('change', function() {
                    document.getElementById('muangaySize').value = this.value;
                });

                document.getElementById('addCartColor').addEventListener('change', function() {
                    document.getElementById('muangayColor').value = this.value;
                });

                document.getElementById('addCartQuantity').addEventListener('input', function() {
                    document.getElementById('muangayQuantity').value = this.value;
                });

                // Đồng bộ giá trị ban đầu (nếu cần)
                document.getElementById('muangaySize').value = document.getElementById('addCartSize').value;
                document.getElementById('muangayColor').value = document.getElementById('addCartColor').value;
                document.getElementById('muangayQuantity').value = document.getElementById('addCartQuantity').value;
            </script>
        </div>
    </div>
    <div class="noidung"><?= $mota ?></div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $name = $('#name').val();
        $("#binhluan").load("view/binhluan/formbinhluan.php", {
            idpro: <?= $id ?>
        });
    })
</script>
<div id="binhluan">

</div>
<div class="thoitranghot">
    <h3 class="products-hot mt-5 mb-5">THỜI TRANG LIÊN QUAN</h3>
    <div class="d-flex" style="flex-wrap:wrap; padding-left:20px">

        <?php

        foreach ($listsanpham_cungloai as $spcungloai) {
            extract($spcungloai);
            extract($onesanpham);
            $img = $img_path . $img;
            $linksp = "index.php?act=sanphamchitiet&idsp=" . $id;

            echo '
                   <div class="products" style="padding:10px; width:24%">
                            <div class="card" style="width: 18rem;">
                                <a href="index.php?act=sanphamchitiet&idsp=' . $id . '"><img src="' . $hinh . '" class="card-img-top"  height="350px" alt="..."></a>
                                <div class="card-body text-center">
                                    <a class="btn " href="index.php?act=sanphamchitiet&idsp=' . $id . '"><h5 class="card-title text-center">' . $name . ' </h5></a>
                                  <p class="card-text fw-bolder text-danger text-center">' . $del . ' VND
                                  <div class="fw-center">
                                  <p class="card-text fw-bolder text-center"><del class="text-body-secondary ">' . $price . ' VND</del></p>
                                  </div>
                                  </p>
                                    <div class="d-flex" style="justify-content: space-around;">
                                    <form action="index.php?act=muangay" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="submit" class="btn btn-success" name="muangay" value="Mua Ngay">
                                    </form>
                                    <form action="index.php?act=addCart" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="submit" class="btn btn-danger" name="addCart" value="Thêm Giỏ Hàng">
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
        } ?>
    </div>
</div>
<?php include "footer.php"; ?>