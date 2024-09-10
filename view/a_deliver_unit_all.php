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

    </style>
</head>

<body>
    <div class="body" style="display: grid; grid-template-columns: 100%;">
        <div>
            <section class="main">
                <div class="nav">
                    <div>
                        <h1>Vận chuyển</h1>
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
                <div class="body_main">
                    <div class="sp" id="sp">

                        <h2 class="namett"><a href="../view/a_delivery_unit.php">Đơn hàng cần giao</a>
                        </h2>

                        <h2 class="orderall" id="choose"><a href="../view/a_deliver_unit_all.php">Tất cả đơn
                                hàng</a></h2>


                    </div>
                    <div class="search">
                        <form action="../controller/admin_controller.php?action=seach_order&seach=" method="post">
                            <input type="text" name="seach" placeholder="Nhập id hoặc khách hàng cần tìm kiếm" value="">
                            <input type="submit" value="Tìm">
                        </form>
                    </div>
                    <div>
                        <table class="table_order">
                            <thead>
                                <tr>
                                    <th>Id đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày thành đơn</th>
                                    <th>Tổng thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php global $seach_p;
                                $OrdersDB = new OrdersDB;
                                $OrderDetailDB = new OrderDetailDB;
                                $CustomerDB = new CustomerDB;
                                if ($seach_p == null) {
                                    $list_o = $OrdersDB->Delivery_Order_All();
                                    foreach ($list_o as $l_o) {
                                        $i_c = $CustomerDB->Get_Customers_CustomerId($l_o['customerId']);
                                        $tsum = $OrderDetailDB->Sum_Price_Product_Orders($l_o['customerId'], $l_o['orderId']);
                                ?>
                                        <tr>
                                            <form action="../controller/admin_controller.php?action=order_detail_ship" method="post">
                                                <td><?php echo  $l_o['orderId'] ?></td>
                                                <td><?php echo  $i_c['customerName'] ?></td>
                                                <td><?php echo  $l_o['date'] ?></td>
                                                <td style="color: red;">
                                                    <?php echo number_format($tsum, 0, ',', '.') ?><span style="font-weight: bolder;"> đ</span></td>
                                                <td>
                                                    <?php if ($l_o['status'] == 0) {
                                                        echo 'Đang chuẩn bị hàng';
                                                    }
                                                    if ($l_o['status'] == 1) {
                                                        echo 'Đang giao hàng';
                                                    }
                                                    if ($l_o['status'] == 2) {
                                                        echo '<h4  class="gttc">Giao hàng thành công</h4>';
                                                    } ?>
                                                </td>
                                                <input type="hidden" name="orderId" value="<?php echo $l_o['orderId'] ?>">
                                                <input type="hidden" name="date" value="<?php echo  $l_o['date'] ?>">
                                                <td class="subm"><input type="submit" value="Xem chi tiết"></td>
                                            </form>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <h3>Với từ khóa "<?php echo $seach ?>" có các kết quả sau:</h3>
                                    <?php
                                    foreach ($seach_order as $l_o) {
                                        $i_c = $CustomerDB->Get_Customers_CustomerId($l_o['customerId']);
                                        $tsum = $OrderDetailDB->Sum_Price_Product_Orders($l_o['customerId'], $l_o['orderId']); ?>
                                        <tr>
                                            <form action="../controller/admin_controller.php?action=order_detail_ship" method="post">
                                                <td><?php echo  $l_o['orderId'] ?></td>
                                                <td><?php echo  $i_c['customerName'] ?></td>
                                                <td><?php echo  $l_o['date'] ?></td>
                                                <td style="color: red;">
                                                    <?php echo number_format($tsum, 0, ',', '.') ?><span style="font-weight: bolder;"> đ</span></td>
                                                <td>
                                                    <?php if ($l_o['status'] == 0) {
                                                        echo 'Đang chuẩn bị hàng';
                                                    }
                                                    if ($l_o['status'] == 1) {
                                                        echo 'Đang giao hàng';
                                                    }
                                                    if ($l_o['status'] == 2) {
                                                        echo '<h4 class="gttc">Giao hàng thành công</h4>';
                                                    } ?>
                                                </td>
                                                <input type="hidden" name="orderId" value="<?php echo $l_o['orderId'] ?>">
                                                <input type="hidden" name="date" value="<?php echo  $l_o['date'] ?>">
                                                <td class="subm"><input type="submit" value="Xem chi tiết"></td>
                                            </form>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
</body>

</html>