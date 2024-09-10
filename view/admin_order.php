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
                <div class="body_main">
                    <div class="sp">
                        <h2 class="namett">Đơn hàng</h2>
                    </div>
                    <div class="search">
                        <form action="../controller/admin_controller.php?action=seach_order" method="post">
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
                                    $list_o = $OrdersDB->Count_Orders_A();
                                    foreach ($list_o as $l_o) {
                                        $i_c = $CustomerDB->Get_Customers_CustomerId($l_o['customerId']);
                                        $tsum = $OrderDetailDB->Sum_Price_Product_Orders($l_o['customerId'], $l_o['orderId']);
                                ?>
                                <tr>
                                    <form action="../controller/admin_controller.php?action=order_detail" method="post">
                                        <td><?php echo  $l_o['orderId'] ?></td>
                                        <td><?php echo  $i_c['customerName'] ?></td>
                                        <td><?php echo  $l_o['date'] ?></td>
                                        <td style="color: red;">
                                            <?php echo number_format($tsum, 0, ',', '.') ?><span
                                                style="font-weight: bolder;"> đ</span></td>
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
                                    <form action="../controller/admin_controller.php?action=order_detail" method="post">
                                        <td><?php echo  $l_o['orderId'] ?></td>
                                        <td><?php echo  $i_c['customerName'] ?></td>
                                        <td><?php echo  $l_o['date'] ?></td>
                                        <td style="color: red;">
                                            <?php echo number_format($tsum, 0, ',', '.') ?><span
                                                style="font-weight: bolder;"> đ</span></td>
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
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
</body>

</html>