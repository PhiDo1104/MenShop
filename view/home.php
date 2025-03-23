<?php include_once 'header.php'; ?>
<div class="slide-show">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./fontend/image/banner-top-trang-chu-1-slide-19.png" height="600px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./fontend/image/banner-top-trang-chu-2-slide-20.png" height="600px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./fontend/image/slide-2-trang-chu-slide-2.jpg" height="600px" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<main>
    <div class="thoitranghot">
        <h3 class="products-hot mt-5 mb-5">THỜI TRANG HOT NHẤT</h3>
        <div class="d-flex" style="flex-wrap:wrap; padding-left:20px">

            <?php

            foreach ($listsanpham as $sanpham) {
                extract($sanpham);
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
                                    <form action="index.php?act=sanphamchitiet&idsp=' . $id .'" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="submit" class="btn btn-success" name="muangay" value="Mua Ngay">
                                    </form>
                                    <form action="index.php?act=sanphamchitiet&idsp=' . $id .'" method="post">
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
    <div class="thoitrangmoi">
        <h3 class="products-hot mt-5 mb-5">THỜI TRANG MỚI NHẤT</h3>
        <div class="d-flex" style="flex-wrap:wrap; padding-left:20px">

            <?php

            foreach ($listsanpham as $sanpham) {
                extract($sanpham);
                $hinh = $img_path . $img;

                echo '
                   <div class="products" style="padding:10px; width:24%">
                            <div class="card" style="width: 18rem;">
                                <a href="index.php?act=sanphamchitiet&idsp=' . $id . '"><img src="' . $hinh . '" class="card-img-top"  height="350px" alt="..."></a>
                                <div class="card-body text-center">
                                    <a class="btn " href="index.php?act=sanphamchitiet&idsp=' . $id . '"><h5 class="card-title">' . $name . ' </h5></a>
                                  <p class="card-text fw-bolder text-danger text-center">' . $del . ' VND
                                  <div class="fw-center">
                                  <p class="card-text fw-bolder text-center"><del class="text-body-secondary ">' . $price . ' VND</del></p>
                                  </div>
                                  </p>
                                    <div class="d-flex" style="justify-content: space-around;">
                                    <form action="index.php?act=sanphamchitiet&idsp=' . $id .'" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="submit" class="btn btn-success" name="muangay" value="Mua Ngay">
                                    </form>
                                    <form action="index.php?act=sanphamchitiet&idsp=' . $id .'" method="post">
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