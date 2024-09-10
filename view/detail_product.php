<?php include('../view/header.php');
global $detail_product;
require_once('../model/database.php');
require_once('../model/ProductDB.php');

$ProductDB = new ProductDB;
$lists = $ProductDB->Get_Product_Detail($detail_product['categoryId']);
$CategoryDB = new CategoryDB;
$g_c = $CategoryDB->Get_Category($detail_product['categoryId']);
?>
<div class="body">
    <div class="detail_product">
        <section class="detail_product" id="detail_product">
            <?php $target_dir = '../img/';
            $addressimg = $detail_product['productlmgMain'];
            if (file_exists("$target_dir/$addressimg")) {
            ?>
            <div class="img_detail_pd"><img src="../img/<?php echo $detail_product['productlmgMain'] ?>" alt="">
                <p>Lượt Xem: <?php echo $detail_product['numberViewed'] ?></p>
                <p>Lượt mua: <?php echo $detail_product['purchases'] ?></p>
                <p>Còn lại: <?php echo $detail_product['availableQuantity'] ?> cái </p>
            </div>
            <?php } else { ?>
            <div class="img_detail_pd"><img src="<?php echo $detail_product['productlmgMain'] ?>" alt="">
                <p>Lượt Xem: <?php echo $detail_product['numberViewed'] ?></p>
                <p>Lượt mua: <?php echo $detail_product['purchases'] ?></p>
                <p>Còn lại: <?php echo $detail_product['availableQuantity'] ?> cái </p>
            </div>
            <?php } ?>

            <div class="infor_detail_pd">
                <h2><?php echo $detail_product['productName'] ?></h2>
                <div>
                    <strong>Thông số kĩ thuật</strong>
                    <?php if ($detail_product['information'] != null) {
                        $token = strtok($detail_product['information'], '-'); ?>
                    <ul>
                        <?php while ($token !== false) { ?>
                        <li><?php echo $token ?></li>
                        <?php $token = strtok('-');
                            }  ?>
                    </ul>
                    <?php } else { ?>
                    <div>
                        <h3>Đang được cập nhật...</h3>
                    </div>
                    <?php } ?>

                </div>
                <div class="p_price_old">
                    <del><?php echo number_format($detail_product['priceOld'], 0, ',', '.') ?>đ</del>
                </div>
                <div class="price">

                    <h3>Giá :</h3>
                    <p><?php echo number_format($detail_product['price'], 0, ',', '.') ?>đ</p>
                </div>
                <div class="operation">
                    <form action="../controller/user_controller.php?action=add_product_cart" method="POST">
                        <input type="hidden" name="customerId" value="<?php if (isset($user['customerId'])) {
                                                                            echo $user['customerId'];
                                                                        } ?>">
                        <input type="hidden" name="productId" value="<?php echo $detail_product['productId'] ?>">
                        <input type="hidden" name="productName" value="<?php echo $detail_product['productName'] ?>">
                        <input type="hidden" name="price" value="<?php echo $detail_product['price'] ?>">
                        <input type="hidden" name="information" value="<?php echo $detail_product['information'] ?>">
                        <input type="hidden" name="productlmgMain"
                            value="<?php echo $detail_product['productlmgMain'] ?>">
                        <input type="hidden" name="quantity" value="">
                        <input type="submit" value="Thêm vào giỏ hàng">
                    </form>
                </div>
            </div>
            <div class="more_infor">
                <div class="infor_more">
                    <h2>Giới thiệu sản phẩm</h2>
                </div>
                <?php
                if (!empty($imgs)) {
                    foreach ($imgs as $img) : ?>
                <div class="p_img_more">
                    <p><?php echo $img['moreInfor']; ?></p>
                    <div>
                        <img src="<?php echo $img['addressImg'] ?>" alt="" class="img_more_infor">
                    </div>

                </div>
                <?php endforeach;
                } ?>
                <div class="endow">
                    <ul>
                        <h5>Các gói khuyến mãi kèm PC Multi-function computer hấp dẫn:</h5>

                        <li>🎁 Mua thêm RAM giảm ngay 200,000đ</li>

                        <li>🎁 Nâng cấp SSD giảm ngay 200.000đ</li>

                        <h5>♦ ƯU ĐÃI KHI MUA KÈM PC TẠI Multi-function computer:</h5>

                        <li>⭐ Giảm tới 500,000đ khi mua thêm màn hình máy tính.</li>

                        <li>⭐ Giảm ngay 100,000đ khi mua thêm Ổ cứng HDD</li>

                        <li>⭐ Giảm ngay 50,000đ mỗi loại khi mua thêm chuột, phím, tai nghe</li>

                        <li>⭐ Nâng cấp mạng không dây Wifi chỉ với 190.000đ</li>

                        <h5>DỊCH VỤ VIP ĐI KÈM CỦA PC Multi-function computer:</h5>
                        <p>Multi-function computer có chính sách mua
                            hàng trả góp 0% lãi suất với PC Văn Phòng, PC Gaming,PC cao cấp, linh kiện từ các thương
                            hiệu nổi tiếng như ASUS, GIGABYTE, ASUS, SAMSUNG,…</p>

                        <p>► Linh kiện được lựa chọn 100% chính hãng, sàng lọc kỹ càng với độ bền cao, chế độ bảo hành
                            tận nhà tại Đà Nẵng và giao hàng miễn phí toàn quốc là cam kết từ Multi-function computer.
                            Hy vọng một lần
                            được phục vụ quý khách hàng.</p>

                        <p> ►Giao hàng và lắp ráp tận nơi trong phạm vi 20km Đà Nẵng, Cần Thơ, Đà Lạt..
                        </p>
                        <p>► Hỗ trợ trực tiếp online 24/7 bất kì sự cố trong quá trình sự dụng, tận tâm với khách hàng
                        </p>
                        <p>► Trả góp linh hoạt dễ dàng qua các tổ chức tài chính ACS, HD saison, Mcredit, hoặc trả góp
                            0% qua thẻ tín dụng với mPOS hay online ngay trên Website: Multi_function_computer.com.vn.
                        </p>
                        <p>► Để được tư vấn thêm cấu hình nào phù hợp với bạn nhất, hãy nhấc máy và liên hệ ngay cho
                            chúng tôi qua HOTLINE: 00000000000 hoặc Facebook Multi-function computer Hi-end Computer &
                            technology
                        </p>
                    </ul>
                </div>
            </div>
        </section>
        <section class="suggest">
            <h3>Sản phẩm cùng doanh mục</h3>
            <a href=""></a>
            <?php
            if (!empty($lists)) { ?>
            <?php
                foreach ($lists as $product) : ?>
            <?php if ($product['availableQuantity'] > 0) { ?>

            <a
                href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>.categoryId=<?php echo $g_c['categoryId']  ?>">
                <div class="poster" id="product_product">
                    <div class="product" id="product">
                        <?php $target_dir = '../img/';
                                    $addressimg = $product['productlmgMain'];
                                    if (file_exists("$target_dir/$addressimg")) {
                                    ?>
                        <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                        <?php } else { ?>
                        <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                        <?php } ?>
                        <div class="box_content">

                            <div class="p_name"><?php echo $product['productName'] ?></div>
                            <div class="p_price_old">
                                <del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</del>
                            </div>
                            <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                        </div>
                    </div>
                </div>
            </a>
            <?php } else { ?>

            <a href="###" id="permanent">
                <div class="poster" id="product_product">
                    <div class="product" id="product">
                        <?php $target_dir = '../img/';
                                    $addressimg = $product['productlmgMain'];
                                    if (file_exists("$target_dir/$addressimg")) {
                                    ?>
                        <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                        <?php } else { ?>
                        <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                        <?php } ?>
                        <div class="box_content">
                            <div class="p_name"><?php echo $product['productName'] ?></div>
                            <div class="p_price_old">
                                <del>0đ</del>
                            </div>
                            <div class="p_price">ĐÃ HẾT HÀNG</div>
                        </div>
                    </div>
                </div>
            </a>
            <?php }
                endforeach;
            } ?>
            <div class="more"> <a
                    href="../controller/user_controller.php?action=get_product_c&categoryId=<?php echo $g_c['categoryId']  ?>"
                    class="more_sp">Xem
                    nhiều sản phẩm hơn <i class="bi bi-arrow-right"><svg xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg></i></a>
            </div>
        </section>
    </div>

</div>
<?php include('../view/footer.php'); ?>