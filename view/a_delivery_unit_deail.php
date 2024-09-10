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
    <style>
        tr.trtd>td {
            padding: 1pc;
        }
    </style>
</head>

<body>
    <div class="body" style="display: grid; grid-template-columns: 100%;">
        <div>
            <section class="main">
                <div class="nav">
                    <div>
                        <h1><i class="bi bi-caret-left-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg><a href="../view/a_delivery_unit.php" class="back">Quay lại</a></h1>
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
                $g_i_c = $OrderDetailDB->Get_Customer_Order($orderId);
                $lgc = $OrderDetailDB->Get_Orders_oId($orderId);
                $g_c = $OrderDetailDB->Get_Date_Orders_Admin($orderId);
                ?>
                <table style="margin: 1pc 0pc; width: 100%; background-color: white;padding: 1pc;">
                    <thead>
                        <tr style="text-align: left;">
                            <th>
                                <h2 style="color: green;"><i class="bi bi-geo-alt"></i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    <span style="color: black;">Địa chỉ nhận hàng</span>
                                </h2>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="trtd">
                            <td><b style="font-size: x-large ;"><?php echo $g_i_c['customerName'] ?></b><br><br><?php echo $g_i_c['phone'] ?>
                            </td>
                            <td></td>
                            <td><?php echo $g_i_c['address'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="body_main">

                    <div class="sp">
                        <h2 class="namett">Chi tiết đơn hàng</h2>
                    </div>
                    <div style="margin: 1pc;">Thời gian: &emsp;&emsp;<span style="font-size: x-large;"><?php echo $g_c['date'] ?></span>
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


                    <!-- <hr style="margin-bottom: 2pc;"> -->
                    <div>
                        <table class="table_order">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th>Đơn giá </th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ttt = 0;
                                foreach ($lgc as $products) { ?>
                                    <form action="." method="post">
                                        <tr>
                                            <td class="td1">
                                                <?php $target_dir = '../img/';
                                                $addressimg = $products['productlmgMain'];
                                                if (file_exists("$target_dir/$addressimg")) {
                                                ?>
                                                    <img class="img_product" id="img_product" src="../img/<?php echo $products['productlmgMain'] ?>" alt="">

                                                <?php } else { ?>
                                                    <img class="img_product" id="img_product" src="<?php echo $products['productlmgMain'] ?>" alt="">
                                                <?php } ?>

                                            </td>
                                            <td><b><?php echo $products['productName']; ?></b></td>
                                            <td class="td2">
                                                <?php echo number_format($products['price'], 0, ',', '.'); ?>đ
                                            </td>
                                            <td class="td3"><?php echo $products['quantity']; ?></td>
                                            <?php $tt = $products['price'] * $products['quantity']; ?>
                                            <td class="td4" style="color: red; font-family: fantasy;">
                                                <?php echo number_format($tt, 0, ',', '.'); ?>đ
                                            </td>
                                            <?php $ttt = $ttt + $tt;
                                            $paymentMethods = $products['paymentMethods'];
                                            ?>

                                        </tr>
                                    </form>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="padding: 0; width: 15%;">Tổng tiền</td>
                                    <td></td>
                                    <td style="color: red; font-family: fantasy; font-size: x-large;">
                                        <?php echo number_format($ttt, 0, ',', '.'); ?>đ</td>
                                </tr><?php if ($g_c['status'] == 1) { ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="padding: 0; width: 15%;">Cần thu</td>
                                        <td></td>
                                        <td style="color: red; font-family: fantasy; font-size: x-large;">
                                            <?php if ($g_c['paymentMethods'] == 'thanh toán khi nhận hàng') {
                                                echo number_format($ttt, 0, ',', '.');
                                            }
                                            if ($g_c['paymentMethods'] == 'Thanh toán bằng thẻ tín dụng') { ?>
                                                0
                                                <?php
                                            } ?>đ
                                        </td>
                                    </tr>
                                    <tr>
                                        <form action="../controller/admin_controller.php?action=delivered" method="post">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="input">
                                                <input type="hidden" name="orderId" value="<?php echo  $orderId ?>">
                                                <input type="hidden" name="status" value="<?php echo  $g_c['status'] ?>">
                                                <input type="submit" value="Xác nhận giao hàng">
                                            </td>
                                        </form>
                                    <?php
                                        } else {
                                    ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="input">
                                            <input type="hidden" name="orderId" value="<?php echo  $orderId ?>">
                                            <input type="hidden" name="status" value="<?php echo  $g_c['status'] ?>">
                                            <?php if ($g_c['status'] == 0) { ?>
                                                <input type="submit" value="Đang chuẩn bị hàng">
                                            <?php } ?>
                                            <?php if ($g_c['status'] == 2) { ?>
                                                <input type="submit" value="Đã giao hàng">
                                            <?php } ?>
                                        </td>

                                    </tr> <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
</body>

</html>