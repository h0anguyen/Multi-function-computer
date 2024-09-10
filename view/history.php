<?php include('../view/header.php');
require_once('../model/OrdersDB.php');
require_once('../model/CartDB.php');
require_once('../model/database.php');
require_once('../model/OrderDetailDB.php');

?>

<div class="body" id="histoty">
    <section class="history">
        <h1>Lịch sử mua hàng</h1>

        <?php
        $OrderDetailDB = new OrderDetailDB;
        $list_o = $OrderDetailDB->Sum_Order_Order($user['customerId']);

        foreach ($list_o  as $l_o) {
            $list_cart = $OrderDetailDB->Get_Product_Orders($user['customerId'], $l_o['orderId']);
            $sum_total = 0;
            $tsum = $OrderDetailDB->Sum_Price_Product_Orders($user['customerId'], $l_o['orderId']);
            $date = $OrderDetailDB->Get_Date_Orders($user['customerId'], $l_o['orderId']);
            if ($list_cart != null) { ?>
        <table>
            <tr>
                <td>Ngày thành đơn:&emsp;&emsp;<span class="span"><?php echo $date['date'] ?></span>
                </td>
                <td></td>
                <td></td>
                <td><span class="span" style="list-style: none;"><?php if ($date['status'] == 0) {
                                                                                echo 'Đang chuẩn bị hàng';
                                                                            }
                                                                            if ($date['status'] == 1) {
                                                                                echo 'Đang giao hàng';
                                                                            }
                                                                            if ($date['status'] == 2) {
                                                                                echo '<h4 style="color: #33CC33;" class="gttc">Giao thành công</h4>';
                                                                            } ?></span></td>

            </tr>
            <tr class="nav_tr">
                <td class="product_b">Sản phẩm</td>
                <td class="price_b">Đơn giá</td>
                <td class="quantity_b">Số lượng</td>
                <td class="tt">Thành tiền</td>
            </tr>
            <?php foreach ($list_cart as $product) {
                    ?>
            <tr class="nav_tr">
                <td class="img_name">
                    <?php $target_dir = '../img/';
                                $addressimg = $product['productlmgMain'];
                                if (file_exists("$target_dir/$addressimg")) {
                                ?>
                    <img src="../img/<?php echo $product['productlmgMain'] ?>" alt="">
                    <?php } else { ?>
                    <img src="<?php echo $product['productlmgMain'] ?>" alt="">
                    <?php } ?>
                    <p><?php echo $product['productName'] ?></p>
                </td>
                <td><?php echo number_format($product['price'], 0, ',', '.') ?>đ</td>
                <td><?php echo $product['quantity'] ?></td>
                <td class="tt_price">
                    <?php $tt = $product['price'] *  $product['quantity'];
                                echo number_format($tt, 0, ',', '.')   ?>đ
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td class="product_b"></td>
                <td class="price_b"></td>
                <td class="quantity_b">Tổng thanh toán :</td>
                <td class="tt_price tt_prices"><?php echo number_format($tsum, 0, ',', '.') ?>đ</td>
            </tr>
        </table>
        <?php  } else {  ?>
        <?php }
        } ?>
        <!-- <hr> -->


    </section>
</div>









<?php include('../view/footer.php')  ?>