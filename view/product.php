<?php include('../view/header.php');
require_once('../model/CategoryDB.php');
require_once('../model/ProductDB.php');
require_once('../model/database.php');

?>

<div class="body">
    <div class="b_h b_h2">
        <section class="aside">
            <ul class="main_menu">
                <h1>Doanh mục</h1>
                <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=1">Cấu hình đã xây
                        dựng</a>
                    <ul class="sub_menu">
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=2">PC văn
                                phòng</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=3">PC
                                gamming</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=4">PC cao
                                cấp</a>
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
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=9">VGA-Card
                                màn
                                hình</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=10">Card
                                Mạng</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=11">PSU-Nguồn</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=12">Bộ tản
                                nhiệt</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=13">Case</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=14">Fan
                                case</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=15">Màn
                                hình</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=16">Bàn
                                phím</a>
                        </li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=17">Loa/tai
                                nghe</a></li>
                        <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=18">Chuột</a>
                        </li>


                    </ul>
                </li>
            </ul>
        </section>
        <details>
            <summary class="summary">
                <div class="menu_category">
                    <div><i class="bi bi-caret-right"></i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                            fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path
                                d="M6 12.796V3.204L11.481 8zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753" />
                        </svg></div>
                </div>
            </summary>
            <section class="aside">
                <ul class="main_menu">
                    <h1>Doanh mục</h1>
                    <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=1">Cấu hình đã
                            xây
                            dựng</a>
                        <ul class="sub_menu">
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=2">PC văn
                                    phòng</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=3">PC
                                    gamming</a>
                            </li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=4">PC cao
                                    cấp</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="">Linh kiện</a>
                        <ul class="sub_menu">
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=5">CPU-vi
                                    xử
                                    lí</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=6">Mainboard-Bo
                                    mạch chủ</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=7">Ram-Bộ
                                    nhớ
                                    đệm</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=8">HDD/SSD-Ổ
                                    cứng</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=9">VGA-Card
                                    màn
                                    hình</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=10">Card
                                    Mạng</a>
                            </li>
                            <li><a
                                    href="../controller/user_controller.php?action=get_product_c&categoryId=11">PSU-Nguồn</a>
                            </li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=12">Bộ
                                    tản
                                    nhiệt</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=13">Case</a>
                            </li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=14">Fan
                                    case</a>
                            </li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=15">Màn
                                    hình</a>
                            </li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=16">Bàn
                                    phím</a>
                            </li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=17">Loa/tai
                                    nghe</a></li>
                            <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=18">Chuột</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </details>
        <!-- <section></section> -->
        <?php global $c;
        if ($c != 1) {
        ?>
        <section class="body_product">
            <div class="categoryname">
                <h2><?php $CategoryDB = new CategoryDB;
                        $g_c = $CategoryDB->Get_Category($categoryId);
                        echo $g_c['categoryName'] ?>
                </h2>
                <p><?php echo $g_c['categoryInformation'] ?></p>
            </div>
            <section class="product_list" id="product_list">
                <?php if (!empty($lists)) { ?>
                <?php
                        foreach ($lists as $product) :
                        ?>
                <a
                    href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>.categoryId=<?php echo $g_c['categoryId'] ?>">
                    <div class="poster" id="product_product">
                        <div class="product" id="product">
                            <?php $target_dir = '../img/';
                                            $addressimg = $product['productlmgMain'];
                                            if (file_exists("$target_dir/$addressimg")) {
                                            ?>
                            <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt="">
                            </div>
                            <?php } else { ?>
                            <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                            <?php } ?>
                            <div class="p_name"><?php echo $product['productName'] ?></div>
                            <div class="p_price_old">
                                <del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</del>
                            </div>
                            <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                        </div>
                    </div>
                </a>

                <?php endforeach; ?>
                <?php $lists_a0=$ProductDB->Get_Product_A1($categoryId); foreach($lists_a0 as $product){ ?>
                <a href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>.categoryId=<?php echo $g_c['categoryId'] ?>&numberViewed=<?php echo $number['numberViewed'] ?>"
                    id="permanent">
                    <div class="poster" id="product_product">
                        <div class="product" id="product">
                            <?php $target_dir = '../img/';
                                            $addressimg = $product['productlmgMain'];
                                            if (file_exists("$target_dir/$addressimg")) {
                                            ?>
                            <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt="">
                            </div>
                            <?php } else { ?>
                            <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                            <?php } ?>
                            <div class="p_name"><?php echo $product['productName'] ?></div>
                            <div class="p_price_old">
                                <del>0đ</del>
                            </div>
                            <div class="p_price">ĐÃ HẾT HÀNG</div>
                        </div>
                    </div>
                </a>
                <?php  }
                    } else { ?>
                <h1></h1>
                <h4>Không có sản phẩm nào</h4>
                <?php  } ?>

            </section>

        </section>
        <?php } else { ?>
        <section class="body_product">
            <div class="categoryname">
                <h2>Cấu hình đề cử
                </h2>
                <p>Cấu hình đã được chúng tôi xem xét để xây dựng phù hợp với cá nhân hoặc doanh nghiệp. Đã được xây
                    dựng
                    theo mục đích sửa dụng.</p>
            </div>
            <section class="product_list" id="product_list">
                <?php for ($i = 2; $i <= 4; $i++) {
                        $ProductDB = new ProductDB;
                        $lists = $ProductDB->Get_Product_Category($i);
                    ?>
                <?php if (!empty($lists)) { ?>
                <?php
                            foreach ($lists as $product) :
                            ?>
                <?php if ($product['availableQuantity'] > 0) { ?>

                <a
                    href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>.categoryId=<?php echo $i ?>">
                    <div class="poster" id="product_product">
                        <div class="product" id="product">
                            <?php $target_dir = '../img/';
                                                $addressimg = $product['productlmgMain'];
                                                if (file_exists("$target_dir/$addressimg")) {
                                                ?>
                            <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt="">
                            </div>
                            <?php } else { ?>
                            <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                            <?php } ?>
                            <div class="p_name"><?php echo $product['productName'] ?></div>
                            <div class="p_price_old">
                                <del><?php echo number_format($product['priceOld'], 0, ',', '.') ?>đ</del>
                            </div>
                            <div class="p_price"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</div>
                        </div>
                    </div>
                </a>
                <?php } else { ?>

                <a href="../controller/user_controller.php?action=get_detail_product&productId=<?php echo $product['productId'] ?>.categoryId=<?php echo $g_c['categoryId'] ?>&numberViewed=<?php echo $number['numberViewed'] ?>"
                    id="permanent">
                    <div class="poster" id="product_product">
                        <div class="product" id="product">
                            <?php $target_dir = '../img/';
                                                $addressimg = $product['productlmgMain'];
                                                if (file_exists("$target_dir/$addressimg")) {
                                                ?>
                            <div class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt="">
                            </div>
                            <?php } else { ?>
                            <div class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></div>
                            <?php } ?>
                            <div class="p_name"><?php echo $product['productName'] ?></div>
                            <div class="p_price_old">
                                <del>0đ</del>
                            </div>
                            <div class="p_price">ĐÃ HẾT HÀNG</div>
                        </div>
                    </div>
                </a>


                <?php }
                            endforeach;
                        } else { ?>
                <h1></h1>
                <h4>Không có sản phẩm nào</h4>
                <?php  } ?>


                <?php  } ?>

            </section>

        </section>

        <?php } ?>




    </div>
</div>
<?php include('../view/footer.php') ?>