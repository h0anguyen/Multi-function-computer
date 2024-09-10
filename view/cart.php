<?php include('../view/header.php');
require_once('../model/CategoryDB.php');
require_once('../model/ProductDB.php');
require_once('../model/CartDB.php');
require_once('../model/database.php');


?>
<?php if (isset($user['customerId']) == null) {
    $user['customerId'] = null;
} ?>
<div class="body">
    <section class="cart">
        <h1>Giỏ hàng</h1>
        <form action="../controller/user_controller.php?action=delete_cart" method="post">
            <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
            <input type="submit" value="Xóa toàn bộ giỏ hàng">
        </form>
        <?php
        $CartDB = new CartDB;
        $list_cart = $CartDB->Get_Product_Cart($user['customerId']);
        if ($list_cart != null) {
        ?>
        <table class="table_cart" border="1">
            <thead class="product_c">
                <th>STT</th>
                <th class="img_c">Ảnh</th>
                <th class="name_c">Tên sản phẩm</th>
                <th class="price_c">Đơn giá</th>
                <th class="quantity_c">Số lượng</th>
                <th class="total_c">Thành tiền</th>
                <th></th>
            </thead>
            <?php
                $sum_total = 0;
                $i = 1;
                foreach ($list_cart as $product) {  ?>
            <tbody>
                <?php if ($product['availableQuantity'] > 0) {
                        ?>
                <tr class="product_c">
                    <form action="../controller/user_controller.php?action=update_quantity" method="post">
                        <td><?php echo $i ?></td>
                        <?php $target_dir = '../img/';
                                    $addressimg = $product['productlmgMain'];
                                    if (file_exists("$target_dir/$addressimg")) {
                                    ?>
                        <td class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></td>
                        <?php } else { ?>
                        <td class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></td>
                        <?php } ?>
                        <td class="name_c"><?php echo $product['productName']  ?></td>
                        <?php $total = floatval($product['quantity']) * floatval($product['price']) ?>
                        <td class="total_c"><?php echo number_format($product['price'], 0, ',', '.') ?>đ</td>
                        <td class="quantity_c"><input type="number" min=1 name="quantity"
                                value="<?php echo $product['quantity'] ?>">
                        </td>
                        <td class="price_c">
                            <?php echo number_format($total, 0, ',', '.') ?>đ</td>
                        <input type="hidden" name="i" value="<?php $i ?>">
                        <input type="hidden" name="productId" value="<?php echo $product['productId'] ?>">
                        <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
                        <td><input type="submit" value="Cập nhật" class="xoa"></td>
                    </form>
                    <form action="../controller/user_controller.php?action=delete_product_cart" method="post">
                        <input type="hidden" name="productId" value="<?php echo $product['productId'] ?>">
                        <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
                        <td><input type="submit" value="Xóa" class="xoa"></td>
                    </form>

                </tr>
                <?php $sum_total = floatval($sum_total) + floatval($total);
                            ?>

                <?php } else { ?>

                <tr class="product_c" id="permanent">
                    <form action="../controller/user_controller.php?action=update_quantity" method="post">
                        <td><?php echo $i ?></td>
                        <?php $target_dir = '../img/';
                                    $addressimg = $product['productlmgMain'];
                                    if (file_exists("$target_dir/$addressimg")) {
                                    ?>
                        <td class="p_img"><img src="../img/<?php echo $product['productlmgMain'] ?>" alt=""></td>
                        <?php } else { ?>
                        <td class="p_img"><img src="<?php echo $product['productlmgMain'] ?>" alt=""></td>
                        <?php } ?>
                        <td class="name_c"><?php echo $product['productName']  ?></td>
                        <td class="total_c">0đ</td>
                        <td class="quantity_c"><input type="number" min=1 name="quantity" value="0">
                        </td>
                        <td class="price_c">
                            0đ</td>
                        <input type="hidden" name="i" value="<?php $i ?>">
                        <input type="hidden" name="productId" value="<?php echo $product['productId'] ?>">
                        <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
                        <td><input type="submit" value="Cập nhật" class="xoa"></td>
                    </form>
                    <form action="../controller/user_controller.php?action=delete_product_cart" method="post">
                        <input type="hidden" name="productId" value="<?php echo $product['productId'] ?>">
                        <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
                        <td><input type="submit" value="Xóa" class="xoa"></td>
                    </form>

                </tr>
                <?php } ?>
            </tbody>
            <?php $i = $i + 1;
                }
                ?>
            <tr>
                <td class=" delete_c"></td>
                <td class="delete_c"></td>
                <td class="delete_c"></td>
                <td class="delete_c"></td>
                <td class="delete_c" id="tt">Tổng tiền :</td>
                <td class="delete_c"><?php echo number_format($sum_total, 0, ',', '.')  ?>đ</td>
                <td class="delete_c"></td>
            </tr>
        </table>
        <?php  } else {
            echo '  
            <h4>Không có sản phẩm nào trong giỏ hàng của bạn </h4>
            ';
        } ?>
        <div class="payment_footer">
            <?php if ($list_cart != null) {
            ?>
            <a href="../view/bill.php" id="mua" class="xoa">Mua hàng</a>
            <?php } else { ?>
            <a href="../controller/user_controller.php?action=get_product_c&categoryId=1" id="mua" class="xoa">Tìm sản
                phẩm bạn muốn
                mua</a>
            <?php } ?>
        </div>
    </section>

</div>








<?php include('../view/footer.php'); ?>