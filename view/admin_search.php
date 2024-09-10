<?php
require_once('../model/database.php');
require_once('../model/CustomerDB.php');
require_once('../model/UserDB.php');
require_once('../model/ProductDB.php');
require_once('../model/CreditDB.php');
require_once('../model/CategoryDB.php');
require_once('../model/BuildDB.php'); ?>

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
                        <h2 class="namett">Sản phẩm cửa hàng</h2>
                        <a href="../view/add_products.php" class="button_add"><button>Thêm sản phẩm</button></a>
                    </div>
                    <div class="search">
                        <form action="../controller/admin_controller.php?action=seach_customer" method="post">
                            <input type="text" name="seach" placeholder="Nhập thông tin tìm kiếm" value="">
                            <input type="submit" value="Tìm">
                        </form>
                    </div>
                    <h2>Tìm kiếm với từ khóa "<?php if ($seach != null) {
                                                        echo $seach;
                                                    } ?>" có
                        <?php if ($seach_product != null) echo count($seach_product) ?>
                        sản phẩm :</h2>
                    <table class="table_one">
                        <thead>
                            <th class="th0"></th>
                            <th class="th1">Sản phẩm</th>
                            <th class="th2">Doanh mục</th>
                            <th class="th3">Thông tin</th>
                            <th class="th4">Tồn kho</th>
                            <th class="th5">Giá</th>
                            <th class="th6">Lượt xem</th>
                            <th class="th7">Đã bán</th>
                            <th class="th8"></th>
                            <th class="th8"></th>

                        </thead>
                        <tbody style="font-size: small;">
                            <?php
                           
                            foreach ($seach_product as $products) { ?>
                            <form action="." method="post">
                                <tr>
                                    <td class="td1 td0"><?php $target_dir = '../img/';
                                                            $addressimg = $products['productlmgMain'];
                                                            if (file_exists("$target_dir/$addressimg")) {
                                                            ?>
                                        <img class="img_product" src="../img/<?php echo $products['productlmgMain'] ?>"
                                            alt="">

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
                                    <td class="td6"><?php echo $products['numberViewed']; ?></td>
                                    <td class="td7"><?php echo $products['purchases']; ?></td>
                                    <td class="td8">
                                        <p class="action_p"><br><button><a class="edit"
                                                    href="../view/admin_form_edit.php?productId=<?php echo $products['productId'] ?>&categoryId=<?php echo $products['categoryId'] ?>">Cập
                                                    nhật</a></button><br>
                                            <button><a class="delete"
                                                    href="../controller/admin_controller.php?action=delete_product&productId=<?php echo $products['productId'] ?>&categoryId=<?php echo $products['categoryId'] ?>">Xóa</a></button><br>
                                        </p>
                                    </td>
                                </tr>
                            </form>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
        </div>
</body>

</html>