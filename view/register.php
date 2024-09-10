<?php
global $ss;
global $messager; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../img/logo/icon.png">

    <link rel="stylesheet" href="../view/css/login.css">
</head>

<body>
    <div></div>
    <div class="full_form">
        <h2>Multi-function computer</h2>
        <form action="../cont
roller/user_controller.php?action=register" method="post">
            <h1>Đăng kí</h1>
            <?php if ($ss == 2) {  ?>
                <h5><?php echo $messager ?></h5>
                <input type="email" name="email" placeholder="Email" class="error" value="<?php echo $email ?>"><br><br>
                <input type="text" name="phone" placeholder="Số điện thoại" class="error" value="<?php echo $phone ?>"><br><br>
                <input type="text" name="customerName" placeholder="Họ và tên" class="error" value="<?php echo $customerName ?>"><br><br>
                <input type="password" name="password" placeholder="Password" class="error" value="<?php echo $password ?>"><br><br>
                <input type="password" name="password2" placeholder="Nhập lại password" class="error"><br><br>
                <input type="submit" value="register" class="submit1" name="action"><br><br>
                <a href="../view/login.php"><input type="button" value="Đăng nhập"></a>
            <?php } else { ?>
                <input type="email" name="email" placeholder="Email"><br><br>
                <input type="text" name="phone" placeholder="Số điện thoại"><br><br>
                <input type="text" name="customerName" placeholder="Họ và tên"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br>
                <input type="password" name="password2" placeholder="Nhập lại password"><br><br>
                <input type="submit" value="register" class="submit1" name="action"><br><br>
                <a href="../view/login.php"><input type="button" value="Đăng nhập"></a>
            <?php } ?>
        </form>
    </div>
    <footer>

    </footer>
</body>

</html>