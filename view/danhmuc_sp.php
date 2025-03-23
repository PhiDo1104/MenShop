<?php include "header.php"; ?>
<main>
    <div class="thoitranghot">
        <h3 class="products-hot mt-5 mb-5">Kết Quả Tìm KIếm</h3>
        <div class="d-flex" style="flex-wrap:wrap">
            <?php if (!empty($listsanphamsearch)) { ?>
            <?php
            foreach ($listsanphamsearch as $sanpham) {
                extract($sanpham);
                $hinh = $img_path . $img;

                echo '
                   <div class="products" style="padding: 0 10px;width:24%">
                            <div class="card" style="width: 18rem;">
                                <a href="index.php?act=sanphamchitiet&idsp='.$id.'"><img src="' . $hinh . '" class="card-img-top"  height="350px" alt="..."></a>
                                <div class="card-body">
                                    <a class="btn" href="index.php?act=sanphamchitiet&idsp='.$id.'"><h5 class="card-title">' . $name . ' </h5></a>
                                  <p class="card-text fw-bolder text-danger">' . $price . ' <del 
                                            class="text-body-secondary">'.$del.' đ</del></p>
                                    <div class="d-flex" style="justify-content: space-around;">
                                    <a href="#" class="btn btn-success">Mua Ngay</a>
                                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
            }}else { ?>
            <p class="text-center">Không tìm thấy sản phẩm nào với từ khoá bạn nhập.</p>
            <?php } ?>
        </div>
    </div>
</main>
<?php include_once 'footer.php'; ?>