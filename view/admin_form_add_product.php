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

    <style>

    </style>
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
                    <div class="add_p">
                        <h2>Thêm sản phẩm</h2>
                    </div>
                    <?php global $messager;
                    if (isset($messenger)) {
                        echo "<h4 style='color:red;'>" . $messenger . "</h4>";
                    }
                    ?>
                    <form action="../controller/admin_controller.php?action=add_product" method="post" class="form_add" enctype="multipart/form-data">

                        <input class="error" type="text" placeholder="Tên sản phẩm" name="productName" value="<?php if (isset($productName)) {
                                                                                                                    echo $productName;
                                                                                                                } ?>"><br>
                        <input class="error" type="text" placeholder="Thông tin sản phẩm" name="information" value="<?php if (isset($information)) {
                                                                                                                        echo $information;
                                                                                                                    } ?>"><br>
                        <input class="error" type="text" placeholder="Giá thị trường" name="priceOld" value="<?php if (isset($priceOld)) {
                                                                                                                    echo $priceOld;
                                                                                                                } ?>"><br>
                        <input class="error" type="text" placeholder="Giá ưu đãi" name="price" value="<?php if (isset($price)) {
                                                                                                            echo $price;
                                                                                                        } ?>"><br>
                        <select name="categoryId" id="select">
                            <?php $CategoryDB = new CategoryDB;
                            $category = $CategoryDB->Get_All_Categorys();
                            foreach ($category as $category) { ?>
                                <option value="<?php echo $category['categoryId'] ?>">
                                    <?php echo $category['categoryId'] . '.' . $category['categoryName']  ?></option>
                            <?php } ?>
                        </select> <br>
                        <input type="text" name="availableQuantity" placeholder="Số lượng tồn kho"><br>
                        <input type="file" name="productlmgMain"><br>
                        <input type="submit" value="Thêm">
                    </form>
            </section>

        </div>
    </div>
</body>

</html>