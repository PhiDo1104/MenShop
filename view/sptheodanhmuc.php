<?php include_once 'header.php';
// extract($dssp);
// var_dump($listsanpham['i']);


// extract($dssp);
?>
<main>
    <div class="thoitranghot">
        <h3 class="products-hot mt-5 mb-5"><?= $dm['Name'] ?></h3>
        <div class="d-flex" style="flex-wrap:wrap; padding-left:20px">

            <?php
            // $listsanpham = loadAll_sanpham_DM();
            // var_dump($dssp);

            foreach ($dssp as $sanpham) {
                extract($sanpham);
                // var_dump($sanpham);
                $hinh = $img_path . $img;

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
                                    <form action="index.php?act=sanphamchitiet&idsp=' . $id . '" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="submit" class="btn btn-success" name="muangay" value="Mua Ngay">
                                    </form>
                                    <form action="index.php?act=sanphamchitiet&idsp=' . $id . '" method="post">
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
</main>
<?php include_once 'footer.php'; ?>