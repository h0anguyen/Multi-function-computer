<?php include('../view/header.php'); ?>
<div class="body" id="bodycontact">
    <h1 class="tieude">Đóng góp ý kiến của bạn để giúp Multi-function computer hoàn thiệt hơn :</h1>
    <div>
        <section class="contact">
            <div>
                <div>
                    <!-- <h2>Liên hệ</h2>
                    <p><b>Địa chỉ:</b> đường DSDN,T.Quảng Nam</p>
                    <p><b>Điện thoại:</b> 0000000000-01111111111</p>
                    <p><b>Email:</b> Multi_function_computer.com</p> -->
                </div>
                <div>
                    <form action="../controller/user_controller.php?action=opinion" method="post" class="formcontact">
                        <h2>Hòm thư</h2>
                        <?php if (isset($mess)) {
                            echo '<h4 class="error">' . $mess . '</h4>';
                        } ?>
                        <input type="text" name="name" placeholder="Họ và tên"><br>
                        <input type="email" name="email" placeholder="Email"><br>
                        <input type="text" name="phone" placeholder="Số điện thoại"><br>
                        <textarea cols="20" rows="10" placeholder="Nhập ý kiến của bạn" name="note"></textarea><br>
                        <input type="submit" value="Gửi">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include('../view/footer.php'); ?>