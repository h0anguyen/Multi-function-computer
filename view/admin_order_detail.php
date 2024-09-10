<?php
require_once('../model/database.php');
require_once('../model/CustomerDB.php');
require_once('../model/UserDB.php');
require_once('../model/ProductDB.php');
require_once('../model/CreditDB.php');
require_once('../model/CategoryDB.php');
require_once('../model/OrdersDB.php');
require_once('../model/OrderDetailDB.php');
require_once('../model/BuildDB.php');
global $orderId;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-function computer</title>
    <link rel="icon" href="../img/logo/icon.png">
    <link rel="stylesheet" href="../view/css/admin.css">
</head>

<body>
    <div class="body">
        <div></div>
        <section class="menu">
            <ul class="ul_dad">
                <h2>Multi-function computer</h2>
                <li><a href="../view/admin_home.php">Tổng quan</a></li>
                <details>
                    <summary>
                        <li><a href="#">Sản phẩm</a></li>
                    </summary>
                    <ul class="ul_child">
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=2">PC
                                văn phòng</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=3">PC
                                gamming</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=4">PC
                                cao cấp</a></li>

                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=5">CPU-vi
                                xử
                                lí</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=6">Mainboard-Bo
                                mạch chủ</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=7">Ram-Bộ
                                nhớ
                                đệm</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=8">HDD/SSD-Ổ
                                cứng</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=9">VGA-Card
                                màn
                                hình</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=10">Card
                                Mạng</a>
                        </li>
                        <li><a
                                href="../controller/admin_controller.php?action=lists_product&categoryId=11">PSU-Nguồn</a>
                        </li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=12">Bộ
                                tản
                                nhiệt</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=13">Case</a>
                        </li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=14">Fan
                                case</a>
                        </li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=15">Màn
                                hình</a>
                        </li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=16">Bàn
                                phím</a>
                        </li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=17">Loa/tai
                                nghe</a></li>
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=18">Chuột</a>
                        </li>
                    </ul>
                </details>
                <li><a href="../view/admin_customer.php">Tài khoản khách hàng</a></li>

                <li><a href="../view/admin_order.php">Đơn hàng</a></li>

                <li><a href="../view/admin_mailbox.php">Hòm thư</a></li>


            </ul>
        </section>
        <div>
            <section class="main">
                <div class="nav">
                    <div>
                        <h1>Admin Page</h1>
                    </div>
                    <div></div>
                    <div class="nav_admin">
                        <h2>
                            <a href="../controller/user_controller.php?action=logout">Đăng xuất</a>
                        </h2>
                    </div>
                </div>
                <div class="header">
                </div>
                <?php $OrderDetailDB = new OrderDetailDB;
                $lgc = $OrderDetailDB->Get_Orders_oId($orderId);
                $g_c = $OrderDetailDB->Get_Date_Orders_Admin($orderId);
                ?>
                <div class="body_main">
                    <div class="sp">
                        <h2 class="namett">Chi tiết đơn hàng</h2>
                    </div>
                    <div>Thời gian: &emsp;&emsp;<span style="font-size: x-large;"><?php echo $g_c['date'] ?></span>
                        <div style="float: right;"><?php if ($g_c['status'] == 0) {
                                                        echo 'Đang chuẩn bị hàng';
                                                    }
                                                    if ($g_c['status'] == 1) {
                                                        echo 'Đang giao hàng';
                                                    }
                                                    if ($g_c['status'] == 2) {
                                                        echo '<h4  class="gttc">Giao hàng thành công</h4>';
                                                    } ?></div>

                    </div>

                    <div>
                        <table class="table_order">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th>Đơn giá </th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <!-- <th>Thanh toán</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ttt = 0;
                                foreach ($lgc as $products) { ?>
                                <form action="." method="post">
                                    <tr>
                                        <td class="td1" id="td1">
                                            <?php $target_dir = '../img/';
                                                $addressimg = $products['productlmgMain'];
                                                if (file_exists("$target_dir/$addressimg")) {
                                                ?>
                                            <img class="img_product" id="img_products"
                                                src="../img/<?php echo $products['productlmgMain'] ?>" alt=""
                                                width="30%">

                                            <?php } else { ?>
                                            <img class="img_product" id="img_products"
                                                src="<?php echo $products['productlmgMain'] ?>" alt="" width="30%">
                                            <?php } ?>

                                        </td>
                                        <td><b><?php echo $products['productName']; ?></b></td>
                                        <td class="td2"><?php echo number_format($products['price'], 0, ',', '.'); ?>đ
                                        </td>
                                        <td class="td3"><?php echo $products['quantity']; ?></td>
                                        <?php $tt = $products['price'] * $products['quantity']; ?>
                                        <td class="td4" style="color: red; font-family: fantasy;">
                                            <?php echo number_format($tt, 0, ',', '.'); ?>đ
                                        </td>
                                        <!-- <td class="td4"><?php echo $g_c['paymentMethods']; ?></td> -->
                                        <?php $ttt = $ttt + $tt ?>
                                    </tr>
                                </form>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="padding: 0; width: 15%;">Tổng thanh toán</td>
                                    <td></td>
                                    <td style="color: red; font-family: fantasy; font-size: x-large;">
                                        <?php echo number_format($ttt, 0, ',', '.'); ?>đ</td>
                                </tr>
                                <!-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php echo 'Đã thanh toán'; ?></td>
                                    </tr> -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <?php if ($products['status'] == 0) { ?>
                                        <form action="../controller/admin_controller.php?action=order_confirmation"
                                            method="post">
                                    <td class="input">
                                        <input type="hidden" name="orderId" value="<?php echo  $orderId ?>">
                                        <input type="hidden" name="status" value="<?php echo  $g_c['status'] ?>">
                                        <input type="submit" value="Xác nhận đơn hàng">
                                    </td>
                                    </form>
                                    <?php } ?>
                                    <?php if ($products['status'] == 1) { ?>
                                    <form action="#">
                                        <td class="input">
                                            <input type="submit" value="Đơn hàng đang được giao" disabled>
                                        </td>
                                    </form>
                                    <?php } ?>
                                    <?php if ($products['status'] == 2) { ?>
                                    <form action="#">
                                        <td class="input">
                                            <input type="submit" value="Đã giao thành công" disabled>
                                        </td>
                                    </form>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
</body>

</html>