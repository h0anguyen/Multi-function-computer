<?php
require_once('../model/database.php');
require_once('../model/CustomerDB.php');
require_once('../model/UserDB.php');
require_once('../model/ProductDB.php');
require_once('../model/CreditDB.php');
require_once('../model/CategoryDB.php');
require_once('../model/BuildDB.php');
require_once('../model/MailboxDB.php');

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
                    <div class="sp">
                        <h2 class="namett">Hòm thư</h2>
                    </div>
                    <div class="search">
                        <form action="../controller/admin_controller.php?action=seach_mailbox" method="post">
                            <input type="text" name="seach" placeholder="Nhập email , số điện thoại hoặc góp ý cần tìm kiếm" value="">
                            <input type="submit" value="Tìm">
                        </form>
                    </div>
                    <div>
                        <table class="table_order">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Góp ý</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                global $seach_mailbox;
                                global $seach;
                                $MailboxDB = new MailboxDB;
                                if ($seach_mailbox == null) {
                                    $g_m = $MailboxDB->Get_All_Mailbox();
                                    foreach ($g_m as $g_m) {
                                ?>
                                        <tr>
                                            <td><?php echo $g_m['id'] ?></td>
                                            <td><?php echo $g_m['name'] ?></td>
                                            <td><?php echo $g_m['email'] ?></td>
                                            <td><?php echo $g_m['phone'] ?></td>
                                            <td><?php echo $g_m['note'] ?></td>
                                        </tr>
                                    <?php }
                                } else {

                                    echo '<h3>Với từ khóa "' . $seach . '" có các kết quả sau:</h3>';
                                    foreach ($seach_mailbox as $g_m) { ?>
                                        <tr>
                                            <td><?php echo $g_m['id'] ?></td>
                                            <td><?php echo $g_m['name'] ?></td>
                                            <td><?php echo $g_m['email'] ?></td>
                                            <td><?php echo $g_m['phone'] ?></td>
                                            <td><?php echo $g_m['note'] ?></td>
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