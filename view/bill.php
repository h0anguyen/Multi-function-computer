<?php
session_start();
global $guests;
require_once('../model/CartDB.php');
require_once('../model/OrdersDB.php');

require_once('../model/database.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-function computer</title>
    <link rel="icon" href="../img/logo/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../view/css/home.css">
    <link rel="stylesheet" href="../view/css/user.css">
    <link rel="stylesheet" href="../view/css/product.css">

</head>

<body>
    <section class="nav">
        <p class="p">Chào mừng bạn đến với Multi-function computer ||</p>
        <?php
        if (isset($_SESSION["customerId"]) and $_SESSION['customerId']['customerId'] != 0) {

            $user = $_SESSION["customerId"];
        ?>
        <div class="login">
            <ul class="main">
                <div class="border">
                    <?php
                        if ($user['customerImg'] != null) { ?>
                    <img src="../img/<?php echo $user['customerImg']; ?>" alt="avatar">
                    <?php } ?>
                </div>
                <li>
                    <?php
                        echo $user["customerName"];
                        ?>
                    <ul class="sub">
                        <li><a href="../view/user_profile.php">Tài khoản</a></li>
                        <li><a href="../view/history.php">Đơn hàng</a></li>
                        <li><a href="../controller/user_controller.php?action=logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <?php } else {

        ?>
        <div class="login">
            <a href="../view/register.php">Đăng kí</a>&nbsp;
            <a href="">|&nbsp;&nbsp;|</a>
            <a href="../view/login.php">Đăng nhập</a>
        </div>
        <?php } ?>
    </section>



    <div class="body_bill">
        <section class="header_bill">
            <h1><a href="../view/cart.php"><i class="bi bi-x-lg"><svg xmlns="http://www.w3.org/2000/svg" width="100%"
                            height="100%" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path
                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg></i></a></h1>
            <!-- <h1 class="trademark">Multi-function computer </h1> -->
            <h1>Đặt hàng</h1>
            <?php global $messager;
            global $messagers;
            if ($messager || $messagers) {
            ?>
            <h4 style="color: red;">
                <?php echo $messagers . ' ' . $messager . '.'  ?>
            </h4>
            <?php  } ?>
        </section>
        <section class="nav_bill">
            <table>
                <tr class="nav_tr">
                    <td class="td1">Địa chỉ nhận hàng</td>
                    <td class="td2"></td>
                    <td class="td3"></td>
                </tr>
                <tr>
                    <td>
                        <h4><?php echo $user['customerName'] ?></h4>
                        <h4><?php echo $user['phone'] ?></h4>
                    </td>
                    <td><?php echo $user['address'] ?></td>
                    <td><a href="../view/user_address.php">Thay đổi</a></td>
                </tr>
            </table>
        </section>
        <section class="main_buil">
            <table>
                <tr class="nav_tr">
                    <td class="product_b">Sản phẩm</td>
                    <td class="price_b">Đơn giá</td>
                    <td class="quantity_b">Số lượng</td>
                    <td class="tt">Thành tiền</td>
                </tr>

                <?php
                $CartDB = new CartDB;
                $list_cart = $CartDB->Get_Product_Cart($user['customerId']);
                $sum_total = 0;
                $tt = 0;
                foreach ($list_cart as $product) {
                    if ($product['availableQuantity'] > 0) {
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
                        <?php $tt = $product['price'] * $product['quantity'];
                                echo number_format($tt, 0, ',', '.')   ?>đ
                    </td>
                </tr>
                <?php $sum_total = floatval($sum_total) + floatval($tt);
                        ?>
                <?php }
                } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Tổng thanh toán:</td>
                    <td class="tt_price" id="tt_price"> <?php echo number_format($sum_total, 0, ',', '.') ?>đ</td>
                </tr>
            </table>
        </section>

        <form action="../controller/user_controller.php?action=payment" method="post">
            <section class="footer_bill">
                <h2>Phương thức thanh toán</h2>
                <table>
                    <tr>
                        <td>
                            <label for="">Thanh toán qua tài khoản tín dụng</label>
                            <input type="radio" value="Thanh toán bằng thẻ tín dụng" name="paymentMethods">
                        </td>
                        <td>
                            <label for="">Thanh toán khi nhận hàng</label>
                            <input type="radio" value="thanh toán khi nhận hàng" name="paymentMethods" checked>
                        </td>
                    </tr>
                </table>
            </section>
            <section class="payment_bill">
                <input type="hidden" name="customerId" value="<?php echo $user['customerId'] ?>">
                <input type="hidden" name="address" value="<?php echo $user['address'] ?>">
                <input type="submit" value="Thanh toán" class="TT">
        </form>
        </section>

    </div>

    <?php include('../view/footer.php')  ?>