<?php include('../view/header.php');
require_once('../model/CategoryDB.php');
require_once('../model/ProductDB.php');
require_once('../model/BuildDB.php');
require_once('../model/database.php'); ?>
<div class="body">
    <session class="builds">
        <div class="builds_header">
            <h1>Xây dựng cấu hình</h1>
            <p>Xây dựng tự do theo sở thích của bạn</p><br><br>
        </div>
        <?php if (isset($user['customerId']) == null) {
            $user['customerId'] = null;
        } ?>
        <div class="builds_header" id="builds_header">
            <input type="button" name="reset_build" value="📇 Build lại" class="reset" id="reset-button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content" id="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có muốn xóa toàn bộ cấu hình hiện tại
                        </div>
                        <div class="modal-footer">
                            <form action="../controller/user_controller.php?action=reset_build" method="post">
                                <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
                                <button type="button" class="btn btn-primary"><input type="submit" value="OK" style="background-color:rgb(23 40 159 / 0%) ;
                                border:none; color:white"></button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <tr style="border-top: ridge 1px;">
                <td class="td_name">1.CPU-Bộ vi sử lý</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(5, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <div class="modal fade" id="staticBackdrop">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">1.CPU-Bộ vi sử lý</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(5);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php
                                            endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <img src="<?php echo $get_build['productlmgMain']  ?>" alt="">
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p1 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>
                            <!-- <div></div> -->
                            <!-- <div class="quantity_product_build"><input type="number" name="quantity" value="<?php echo $get_build['quantity']  ?>" min=1></div> -->
                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">
                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">
                            </div>
                        </td>

                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">2.Mainboard-Bo mạch chủ</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(6, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        <div class="modal fade" id="staticBackdrop2">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">2.Mainboard-Bo mạch chủ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(6);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">

                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p2 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">3.Ram-Bộ nhớ đệm</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(7, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                        <div class="modal fade" id="staticBackdrop3">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">3.Ram-Bộ nhớ đệm</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(7);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p3 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">4.HDD/SSD-Ổ cứng</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(8, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                        <div class="modal fade" id="staticBackdrop4">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">4.HDD/SSD-Ổ cứng</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(8);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p4 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">5.VGA-Card màn hình</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(9, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                        <div class="modal fade" id="staticBackdrop5">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">5.VGA-Card màn hình</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(9);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p5 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">6.Card Mạng</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(10, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop6">
                        <div class="modal fade" id="staticBackdrop6">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">6.Card Mạng</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(10);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p6 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">7.PSU-Nguồn</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(11, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop7">
                        <div class="modal fade" id="staticBackdrop7">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">7.PSU-Nguồn</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(11);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p7 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">8.Bộ tản nhiệt</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(12, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop8">
                        <div class="modal fade" id="staticBackdrop8">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">8.Bộ tản nhiệt</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(12);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p8 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">9.Case</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(13, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop9">
                        <div class="modal fade" id="staticBackdrop9">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">9.Case</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(13);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p9 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">10.Fan case </td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(14, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop10">
                        <div class="modal fade" id="staticBackdrop10">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">10.Fan case</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(14);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p10 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">
                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">11.Màn hình</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(15, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop11">
                        <div class="modal fade" id="staticBackdrop11">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">11.Màn hình</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(15);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p11 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">12.Bàn phím</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(16, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop12">
                        <div class="modal fade" id="staticBackdrop12">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">12.Bàn phím</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(16);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p12 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">13.Loa/tai nghe</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(17, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop13">
                        <div class="modal fade" id="staticBackdrop13">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">13.Loa/tai nghe</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(17);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p13 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <tr style="border-top: ridge 1px;">
                <td class="td_name">14.Chuột</td>
                <?php $BuildDB = new BuildDB;
                $get_build = $BuildDB->Get_Product_Build(18, $user['customerId']);
                if ($get_build == null) { ?>
                    <td class="td_function"><input type="button" value="➕ Chọn linh kiện" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop14">
                        <div class="modal fade" id="staticBackdrop14">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">14.Chuột</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $ProductDB = new ProductDB;
                                        $lists = $ProductDB->Get_Product_To_Category(18);
                                        if (!empty($lists)) { ?>
                                            <?php
                                            foreach ($lists as $product) : ?>
                                                <?php if ($product['availableQuantity'] > 0) { ?>
                                                    <div class="list_product_build">
                                                        <form action="../controller/user_controller.php?action=add_to_build" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price">
                                                                    <?php echo number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <input type="submit" value="Chọn">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="list_product_build" id="permanent">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                                                            <div class="pd">
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
                                                                <div class="p_price"> 0
                                                                    <?php number_format($product['price'], 0, ',', '.') ?>đ
                                                                </div>
                                                                <div class="add_build">
                                                                    <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                                                                    <h3>ĐÃ HẾT HÀNG</h3>
                                                                    <!-- <input type="submit" value="Chọn"> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach;
                                            echo '<h4>Không còn sản phẩm nào</h4>';
                                        } else { ?>
                                            <h1></h1>
                                            <h4>Không có sản phẩm nào</h4>
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                <?php } else {
                ?>
                    <form action="../controller/user_controller.php" action="post">
                        <td class="product_build_show">
                            <div class="img_product_build">
                                <?php $target_dir = '../img/';
                                $addressimg = $get_build['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                                    <img src="../img/<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $get_build['productlmgMain'] ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="name_product_build"><?php echo $get_build['productName'] ?></div>
                            <?php $tt_p14 = $get_build['quantity'] * $get_build['price'];
                            if ($get_build['quantity'] == null) {
                                $quantity = 1;
                            }
                            ?>

                            <div class="price_product_build"><?php echo number_format($get_build['price'], 0, ',', '.') ?>đ
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $get_build['productId'] ?>">

                            <div class="delete">
                                <input type="hidden" name="action" value="delete_build">
                                <input type="submit" name="delete_build" value="Xóa khỏi cấu hình">

                            </div>
                        </td>
                    </form>
                <?php } ?>

            </tr>
            <?php $BuildDD = new BuildDB;
            $tt_b = 0;
            $list = $BuildDB->Get_build($user['customerId']);
            if ($list == null) {
                $tt_b = 0;
            } else {
                foreach ($list as $list) {
                    $tt_b = $tt_b + $list['price'];
                }
            } ?>
            <tr>
                <td class="" id="bodder"></td>
                <td class="total" id="bodder">Tổng tiền:
                    <b><?php echo number_format($tt_b, 0, ',', '.'); ?>đ</b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="add_all_cart">
                    <form action="../controller/user_controller.php?action=add_cart_to_build" method="post">
                        <input type="hidden" value="<?php echo $user['customerId']  ?>" name="customerId">

                        <input type="submit" value=" 🛒 Thêm vào giỏ hàng" class="reset" id="reset">
                    </form>
                </td>
            </tr>
        </table>
    </session>
</div>

<?php include('../view/footer.php'); ?>