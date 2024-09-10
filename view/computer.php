<?php include('../view/header.php');
require_once('../model/CategoryDB.php');
require_once('../model/ProductDB.php');
require_once('../model/database.php');
require_once('../model/HistorySearchDB.php');

?>

<div class="body">
    <div class="b_h">
        <section class="aside">
            <ul class="main_menu">
                <h1>Doanh mục</h1>
                <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=2">Cấu hình đã xây
                        dựng</a>
                    <ul class="sub_menu">
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=2">PC văn
                                phòng</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=3">PC gamming</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=4">PC cao cấp</a>
                        </li>
                    </ul>
                </li>
                <li><a href="">Linh kiện</a>
                    <ul class="sub_menu">
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=5">CPU-vi xử
                                lí</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=6">Mainboard-Bo
                                mạch chủ</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=7">Ram-Bộ nhớ
                                đệm</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=8">HDD/SSD-Ổ
                                cứng</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=9">VGA-Card màn
                                hình</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=10">Card Mạng</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=11">PSU-Nguồn</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=12">Bộ tản
                                nhiệt</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=13">Case</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=14">Fan case</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=15">Màn hình</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=16">Bàn phím</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=17">Loa/tai
                                nghe</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=18">Chuột</a>
                        </li>


                    </ul>
                </li>
            </ul>
        </section>
        <section class="slayshow">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/computer/1.png" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/computer/2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/computer/3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/computer/4.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <div class="banner"><img src="../img/computer/7.png" alt="" width="100%" class=""></div>
            </div>
        </section>
    </div>
    <div class="header_aside">
        <div class="img1">
            <img src="../img/computer/5.png" alt="">
        </div>
        <div>
            <img src="../img/computer/6.png" alt="">
        </div>
    </div>
    <?php if (isset($_SESSION["customerId"])) { ?>
    <section class="body_aside">
        <div class="body_aside_nav">
            <div>
                <p class="main">Sản phẩm bạn tìm kiếm gần đây</p>
            </div>
        </div>
    </section>
    <section class="product_list">
        <?php
            $ProductDB = new ProductDB;
            $HistorySearchDB = new HistorySearchDB;
            $s = $HistorySearchDB->Get_Product_H($user["customerId"]);
            if ($s != null) {
                $search = '%' . $s['search'] . '%';
            } else {
                $search = null;
            }
            $list = $ProductDB->Get_Product_Seach_Home($search);
            if (!empty($list)) { ?>
        <?php
                foreach ($list as $product) : ?>
        <?php if ($product['availableQuantity'] > 0) { ?>
        <a
            href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>">
            <div class="poster">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                    $addressimg = $product['productlmgMain'];
                                    if (file_exists("$target_dir/$addressimg")) {
                                    ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</div>
                    </del>
                    <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                </div>
            </div>
        </a>
        <?php }
                endforeach;  ?>
        <?php } else { ?>
        <h1></h1>
        <h4>Không có sản phẩm nào</h4>
        <?php  } ?>
    </section>
    <?php } ?>


    <section class="body_aside">
        <div class="body_aside_nav">
            <div>
                <p class="main">Sản phẩm có lượt xem nhiều nhất</p>
            </div>
        </div>
    </section>
    <section class="product_list">
        <!-- <div class="poster" id="poster"><img src="https://img.pikbest.com/origin/06/44/36/88wpIkbEsTnfB.jpg!w700wp"
                alt="">
        </div> -->
        <?php
        $ProductDB = new ProductDB;
        $list = $ProductDB->Get_Product_Home();
        if (!empty($list)) { ?>
        <?php
            foreach ($list as $product) : ?>
        <?php if ($product['availableQuantity'] > 0) { ?>
        <a
            href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>">
            <div class="poster">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</div>
                    </del>
                    <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                </div>
            </div>
        </a>
        <?php } else { ?>

        <a href="###" id="permanent">
            <div class="poster" id="permanent">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</div>
                    </del>
                    <div class="p_price">ĐÃ HẾT HÀNG</div>
                </div>
            </div>
        </a>

        <?php  }
            endforeach;  ?>
        <?php } else { ?>
        <h1></h1>
        <h4>Không có sản phẩm nào</h4>
        <?php  } ?>
    </section>
    </section>
    <section class="body_aside">
        <div class="body_aside_nav">
            <div>
                <p class="main">Sản phẩm mới</p>
            </div>
        </div>
    </section>
    <section class="product_list">
        <!-- <div class="poster" id="poster"><img src="../img/622885449934d.jpg" alt="">
        </div> -->
        <?php
        $ProductDB = new ProductDB;
        $list = $ProductDB->Get_Product_Home_Id();
        if (!empty($list)) { ?>
        <?php
            foreach ($list as $product) : ?>
        <?php if ($product['availableQuantity'] > 0) { ?>
        <a
            href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>">
            <div class="poster">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</div>
                    </del>
                    <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                </div>
            </div>
        </a>
        <?php } else { ?>

        <a href="###" id="permanent">
            <div class="poster">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del>0đ</div>
                    </del>
                    <div class="p_price">ĐÃ HẾT HÀNG</div>
                </div>
            </div>
        </a>

        <?php  }
            endforeach;  ?>
        <?php } else { ?>
        <h1></h1>
        <h4>Không có sản phẩm nào</h4>
        <?php  } ?>
    </section>
    </section>
    <section class="body_aside">
        <div class="body_aside_nav">
            <div>
                <p class="main">Sản phẩm bán chạy</p>
            </div>
        </div>
    </section>
    <section class="product_list">
        <!-- <div class="poster" id="poster"><img src="../img/622885449934d.jpg" alt="">
        </div> -->
        <?php
        $ProductDB = new ProductDB;
        $list = $ProductDB->Get_Product_Purchases();
        if (!empty($list)) { ?>
        <?php
            foreach ($list as $product) : ?>
        <?php if ($product['availableQuantity'] > 0) { ?>
        <a
            href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>">
            <div class="poster">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</div>
                    </del>
                    <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                </div>
            </div>
        </a>
        <?php } else { ?>
        <a href="###" id="permanent">
            <div class="poster">
                <div class="product" id="product">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } else { ?>
                    <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                    <?php } ?>
                    <div class="p_name"><?php echo $product['productName'] ?></div>
                    <div class="p_price_old"><del>0đ</div>
                    </del>
                    <div class="p_price">ĐÃ HẾT HÀNG</div>
                </div>
            </div>
        </a>

        <?php  }
            endforeach;  ?>
        <?php } else { ?>
        <h1></h1>
        <h4>Không có sản phẩm nào</h4>
        <?php  } ?>
    </section>
    </section>
    <div class="more"><a href="../controller/user_controller.php?action=get_product_c&categoryId=1"> Xem nhiều sản phẩm
            hơn <i class="bi bi-arrow-right"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                    fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg></i></a>

    </div>

</div>
<section class="form_email_support">
    <form action="../controller/user_controller.php?action=opinion" method="post">
        <h3>Đăng kí email để nhận thông báo ưu đãi và được tư vấn miễn phí</h3>
        <input type="hidden" placeholder="Nhập email của bạn" name="name">
        <input type="hidden" placeholder="Nhập email của bạn" name="note">
        <input type="hidden" placeholder="Nhập email của bạn" name="phone">
        <input type="email" placeholder="Nhập email của bạn" name="email">
        <input type="submit">
    </form>
</section>
<?php include('../view/footer.php') ?>