<?php global $index;
global $ss; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../img/logo/icon.png">
    <link rel="stylesheet" href="../view/css/login.css">
</head>

<body>
    <div></div>
    <div class="full_form">
        <h2>Multi-function computer</h2>
        <form action="../controller/user_controller.php?action=login" method="post">
            <h1>Đăng Nhập</h1>
            <?php if ($index == 1) { ?>
                <h5>Sai email hoặc password!!! Kiểm tra lại</h5>
            <?php } ?>
            <?php
            if ($ss == 1) {
            ?>
                <h5>Bạn đăng kí thành công!</h5>
            <?php } ?>
            <input type="text" name="email" placeholder="Email đăng nhập" <?php if ($index == 1) {
                                                                                echo 'class="error"';
                                                                            } ?>value="<?php if (isset($email)) {
                                                                                            echo $email;
                                                                                        } ?>"><br><br>
            <input type="password" name="password" placeholder="Mật khẩu" <?php if ($index == 1) {
                                                                                echo 'class="error"';
                                                                            } ?>><br><br>
            <a href="">Quên mật khẩu?</a>&emsp; <a href="../view/register.php">Đăng kí</a> <br><br>
            <!-- <input type="hidden" name="action" value="login"> -->
            <input type="submit" value="Đăng nhập" class="submit1">
            <!-- <input type="hidden" name="action" value="home"> -->
            <input type="hidden" name="action" value="login">
            <br>
            <a href="../view/computer.php" class="submit1" id="submit1">Cancel</a>
        </form>
    </div>
</body>

</html>