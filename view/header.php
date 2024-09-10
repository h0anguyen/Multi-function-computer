<?php
session_start();
global $guests;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-function computer</title>
    <link rel="icon" href="../img/logo/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

                <li>
                    <div class="border">
                        <?php
                        if ($user['customerImg'] != null) { ?>
                        <img src="../img/<?php echo $user['customerImg']; ?>" alt="avatar">
                        <?php } ?>
                    </div>
                    <h6><?php
                        echo $user["customerName"];
                        ?></h6>
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
    <section class="herder">
        <div class="top">
            <div class="img"><img src="../img/logo/1.png" alt="" width="100%"></div>
            <form action="../controller/user_controller.php?action=seach" method="post">
                <div class="seach">
                    <input type="text" name="seach" placeholder="Nhập tên sản phẩm" value="<?php if (isset($seach)) {
                                                                                                echo $seach;
                                                                                            } ?>">
                    <input type="hidden" name="customerId" value="<?php echo $user["customerId"] ?>">
                    <input type="submit" class="seach" value="Tìm">
                </div>
            </form>
            <div class="cart"><a href="../view/cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                    <i class="bi bi-cart" id="cart"></i>
                </a>
            </div>
        </div>

    </section>
    <div class="permanent_menu">
        <section class="menu">
            <div>
                <i class="bi bi-list"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </div>
            <section class="nav2">
                <ul>
                    <li><a href="../controller/user_controller.php?action=get_product_home">Trang chủ</a></li>
                    <li><a href="../view/build.php">Xây dựng cấu hình</a></li>
                    <li><a href="../controller/user_controller.php?action=get_product_c&categoryId=1">Sản phẩm</a></li>
                    <li><a href="../view/transport.php">Vận chuyển</a></li>
                    <li><a href="../view/contact.php">Đóng góp ý kiến</a></li>
                </ul>
            </section>

        </section>
    </div>
    <hr class="hr">