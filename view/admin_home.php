<?php
require_once('../model/OrdersDB.php');
require_once('../model/OrderDetailDB.php');
require_once('../model/CartDB.php');
require_once('../model/database.php');
require_once('../model/ProductDB.php');
require_once('../model/CategoryDB.php');
require_once('../model/CustomerDB.php');



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
                        <li><a href="../controller/admin_controller.php?action=lists_product&categoryId=11">PSU-Nguồn</a>
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
                    <h2>Doanh thu</h2>
                    <h4>Trong 1 tháng nay</h4>
                    <hr>
                    <div class="revenue">
                        <?php $OrdersDB = new OrdersDB;
                        $total_revenue = 0;
                        $count = 0;
                        $count_p = 0;
                        $sum_o = $OrdersDB->Count_Orders_M();
                        foreach ($sum_o as $s_o) {
                            $count = $count + 1;
                        }
                        $OrderDetailDB = new OrderDetailDB;
                        $p_p = $OrderDetailDB->Count_P_P_M();
                        foreach ($p_p as $p_p) {
                            $count_p = $count_p + $p_p['quantity'];
                            $total_revenue = $total_revenue + $p_p['price'];
                        }
                        ?>
                        <div class="index">
                            <img src="https://vanchuyentrungquoc247.com/wp-content/uploads/2015/04/icon-giao-hang.png" alt="" width="90%">
                            <div>
                                <p>Tổng đơn hàng được đặt</p>
                                <h1><?php echo $count ?></h1>
                            </div>
                        </div>
                        <div class="index">
                            <img src="https://tudienthicong.com/wp-content/uploads/2021/09/San-pham-icon-1.png" alt="" width="100%">
                            <div>
                                <p>Tổng sản phẩm đã được bán</p>
                                <h1><?php echo $count_p  ?></h1>
                            </div>
                        </div>
                        <div class="index">
                            <img src="https://media.istockphoto.com/id/1281579246/vi/vec-to/quay-l%E1%BA%A1i-ti%E1%BB%81n-bi%E1%BB%83u-t%C6%B0%E1%BB%A3ng-ho%C3%A0n-ti%E1%BB%81n-phi%C3%AAn-b%E1%BA%A3n-m%C3%A0u-cam.jpg?s=612x612&w=0&k=20&c=zbUoqzVnlGC_ScXuo79gG2mruqZbgCCmv7my1JB3l-k=" alt="" width="100%">
                            <div>
                                <p>Tổng doanh thu</p>
                                <h1><?php echo number_format($total_revenue, 0, ',', '.') ?>đ</h1>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <details>
                        <summary class="summary_three">
                            <li class="view_more"> Xem chi tiết </li>
                        </summary>
                        <h4>Doanh thu tháng trước</h4>
                        <hr>
                        <div class="revenue">
                            <?php $OrdersDB = new OrdersDB;
                            $total_revenue = 0;
                            $count = 0;
                            $count_p = 0;
                            $sum_o = $OrdersDB->Count_Orders_2M();
                            foreach ($sum_o as $s_o) {
                                $count = $count + 1;
                            }
                            $OrderDetailDB = new OrderDetailDB;
                            $p_p = $OrderDetailDB->Count_P_P_2M();
                            foreach ($p_p as $p_p) {
                                $count_p = $count_p + $p_p['quantity'];
                                $total_revenue = $total_revenue + $p_p['price'];
                            }
                            ?>
                            <div class="index">
                                <img src="https://vanchuyentrungquoc247.com/wp-content/uploads/2015/04/icon-giao-hang.png" alt="" width="90%">
                                <div>
                                    <p>Tổng đơn hàng được đặt</p>
                                    <h1><?php echo $count ?></h1>
                                </div>
                            </div>
                            <div class="index">
                                <img src="https://tudienthicong.com/wp-content/uploads/2021/09/San-pham-icon-1.png" alt="" width="100%">
                                <div>
                                    <p>Tổng sản phẩm đã được bán</p>
                                    <h1><?php echo $count_p  ?></h1>
                                </div>
                            </div>
                            <div class="index">
                                <img src="https://media.istockphoto.com/id/1281579246/vi/vec-to/quay-l%E1%BA%A1i-ti%E1%BB%81n-bi%E1%BB%83u-t%C6%B0%E1%BB%A3ng-ho%C3%A0n-ti%E1%BB%81n-phi%C3%AAn-b%E1%BA%A3n-m%C3%A0u-cam.jpg?s=612x612&w=0&k=20&c=zbUoqzVnlGC_ScXuo79gG2mruqZbgCCmv7my1JB3l-k=" alt="" width="100%">
                                <div>
                                    <p>Tổng doanh thu</p>
                                    <h1><?php echo number_format($total_revenue, 0, ',', '.') ?>đ</h1>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Doanh thu cửa hàng</h2>
                            <hr>
                            <div class="revenue">
                                <?php $OrdersDB = new OrdersDB;
                                $total_revenue = 0;
                                $count = 0;
                                $count_p = 0;
                                $sum_o = $OrdersDB->Count_Orders();
                                foreach ($sum_o as $s_o) {
                                    $count = $count + 1;
                                }
                                $OrderDetailDB = new OrderDetailDB;
                                $p_p = $OrderDetailDB->Count_P_P();
                                foreach ($p_p as $p_p) {
                                    $count_p = $count_p + $p_p['quantity'];
                                    $total_revenue = $total_revenue + $p_p['price'];
                                }
                                ?>
                                <div class="index">
                                    <img src="https://vanchuyentrungquoc247.com/wp-content/uploads/2015/04/icon-giao-hang.png" alt="" width="90%">
                                    <div>
                                        <p>Tổng đơn hàng được đặt</p>
                                        <h1><?php echo $count ?></h1>
                                    </div>
                                </div>
                                <div class="index">
                                    <img src="https://tudienthicong.com/wp-content/uploads/2021/09/San-pham-icon-1.png" alt="" width="100%">
                                    <div>
                                        <p>Tổng sản phẩm đã được bán</p>
                                        <h1><?php echo $count_p  ?></h1>
                                    </div>
                                </div>
                                <div class="index">
                                    <img src="https://media.istockphoto.com/id/1281579246/vi/vec-to/quay-l%E1%BA%A1i-ti%E1%BB%81n-bi%E1%BB%83u-t%C6%B0%E1%BB%A3ng-ho%C3%A0n-ti%E1%BB%81n-phi%C3%AAn-b%E1%BA%A3n-m%C3%A0u-cam.jpg?s=612x612&w=0&k=20&c=zbUoqzVnlGC_ScXuo79gG2mruqZbgCCmv7my1JB3l-k=" alt="" width="100%">
                                    <div>
                                        <p>Tổng doanh thu</p>
                                        <h1><?php echo number_format($total_revenue, 0, ',', '.') ?>đ</h1>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a class="view_more" href="">Ẩn</a>
                    </details>
                </div>

            </section>
            <section class="main_two">
                <h2>Đơn hàng đang chờ xác nhận</h2>
                <hr>
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
                            $list_o = $OrdersDB->Delivery_Order_Status();
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
                                            <?php echo number_format($tsum, 0, ',', '.') ?><span style="font-weight: bolder;">
                                                đ</span></td>
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
                                            <?php echo number_format($tsum, 0, ',', '.') ?><span style="font-weight: bolder;">
                                                đ</span></td>
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
            </section>
            <section class="main_two">
                <h2>Sản phẩm được bán chạy gần đây</h2>
                <hr>
                <table class="table_one" border="1">
                    <thead>
                        <th class="th1">Sản phẩm</th>
                        <th class="th1">Tên sản phẩm</th>
                        <th class="th2">Doanh mục</th>
                        <th class="th3">Thông tin</th>
                        <th class="th4">Tồn kho</th>
                        <th class="th5">Giá</th>
                        <!-- <th class="th6">Lượt xem</th> -->
                        <th class="th7">Đã bán</th>
                    </thead>
                    <tbody>
                        <?php
                        $ProductDB = new ProductDB;
                        $list = $ProductDB->Get_Product_Purchases();
                        foreach ($list as $products) { ?>
                            <form action="." method="post">
                                <tr>
                                    <td class="td1 td0"><?php $target_dir = '../img/';
                                                        $addressimg = $products['productlmgMain'];
                                                        if (file_exists("$target_dir/$addressimg")) {
                                                        ?>
                                            <img class="img_product" src="../img/<?php echo $products['productlmgMain'] ?>" alt="">

                                        <?php } else { ?>
                                            <img class="img_product" src="<?php echo $products['productlmgMain'] ?>" alt="">
                                        <?php } ?>
                                    </td>
                                    <td class="td1">
                                        <?php echo $products['productName']; ?>
                                    </td>
                                    <td class="td2"><?php echo $products['categoryName']; ?></td>
                                    <td class="td3">
                                        <p style="height: 6pc; overflow: auto;"><?php echo $products['information']; ?>
                                        </p>
                                    </td>
                                    <td class="td4"><?php echo $products['availableQuantity']; ?></td>
                                    <td class="td5"><?php echo number_format($products['price'], 0, ',', '.'); ?>đ
                                    </td>
                                    <!-- <td class="td6"><?php echo $products['numberViewed']; ?></td> -->
                                    <td class="td7"><?php echo $products['purchases']; ?></td>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>
                </table>
                <hr>
                <!-- <a class="view_more" href="">Xem chi tiết</a> -->
            </section>
        </div>
    </div>
</body>

</html>