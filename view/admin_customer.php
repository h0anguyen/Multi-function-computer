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
    button {
        background-color: #0066FF;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }


    .cancelbtn,
    .deletebtn {
        float: left;
        width: 50%;
    }

    /* Add a color to the cancel button */
    .cancelbtn {
        background-color: #ccc;
        color: black;
    }

    /* Add a color to the delete button */
    .deletebtn {
        background-color: #0066FF;
        height: 43.54px;
    }

    /* Add padding and center-align text to the container */
    .container {
        padding: 16px;
        text-align: center;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 30%;
        top: 0;
        width: 40%;
        overflow: auto;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* Style the horizontal ruler */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* The Modal Close Button (x) */
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }

    .close:hover,
    .close:focus {
        color: #0066FF;
        cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and delete button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .deletebtn {
            width: 100%;
        }
    }
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
                        <h2 class="namett">Tài khoản khách hàng</h2>
                    </div>
                    <div class="search">
                        <form action="../controller/admin_controller.php?action=seach_customer" method="post">
                            <input type="text" name="seach" placeholder="Nhập tên,email hoặc số điện thoại khách hàng"
                                value="">
                            <input type="submit" value="Tìm">
                        </form>
                    </div>
                    <table class="table_one">
                        <thead>
                            <th class="th1" id="th">Tên khách hàng</th>
                            <th class="th2" id="th">Email</th>
                            <th class="th3" id="th">Số điện thoại</th>
                            <th class="th5" id="th">Địa chỉ</th>
                            <th class="th6" id="th"></th>
                        </thead>
                        <tbody>
                            <?php
                            $CustomerDB = new CustomerDB;
                            $cs = $CustomerDB->Get_All_Customers();
                            global $tt;
                            if(!isset($tt)){
                            foreach ($cs as $customer) {
                                if ($customer['customerId'] != 0) { ?>
                            <tr>
                                <td class="td1" id="th"><?php echo $customer['customerName'] ?></td>
                                <td class="td2" id="th"><?php echo $customer['email']; ?></td>
                                <td class="td3" id="th"><?php echo $customer['phone']; ?></td>
                                <td class="td4" id="th"><?php echo $customer['address']; ?></td>
                                <td class="td5" id="th">
                                    <button
                                        onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='block'">Xóa
                                        tài
                                        khoản <input type="hidden"
                                            value="<?php echo $customer['customerId'] ?>"></button>
                                    <div id="id0<?php echo $customer['customerId'] ?>" class="modal">
                                        <span
                                            onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='none'"
                                            class="close" title="Close Modal">×</span>
                                        <form class="modal-content"
                                            action="../controller/admin_controller.php?action=delete_customer"
                                            method="post">
                                            <div class="container">
                                                <h1>Xác nhận</h1>
                                                <p>Bạn chắc chắc xóa tài khoản này?</p>
                                                <div class="clearfix">
                                                    <button type="button"
                                                        onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='none'"
                                                        class="cancelbtn">Cancel</button>
                                                    <input type="hidden" name="customerId"
                                                        value="<?php echo $customer['customerId'] ?>"></button>

                                                    <button type="button"
                                                        onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='none'"
                                                        class="deletebtn"><input type="submit" value="Xóa"
                                                            style="background-color:#0066ff00 ; border: none; color: white;width: 100%;"></a></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <script>
                                    // Get the modal
                                    var modal = document.getElementById('id0<?php echo $customer['customerId'] ?>');

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                    </script>
                                </td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>

                        <?php }else{ ?>
                        <tbody>
                            <?php
                            foreach ($seach_customer as $customer) {
                                if ($customer['customerId'] != 0) { ?>
                            <tr>
                                <td class="td1" id="th"><?php echo $customer['customerName'] ?></td>
                                <td class="td2" id="th"><?php echo $customer['email']; ?></td>
                                <td class="td3" id="th"><?php echo $customer['phone']; ?></td>
                                <td class="td4" id="th"><?php echo $customer['address']; ?></td>
                                <td class="td5" id="th">
                                    <button
                                        onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='block'">Xóa
                                        tài
                                        khoản <input type="hidden"
                                            value="<?php echo $customer['customerId'] ?>"></button>
                                    <div id="id0<?php echo $customer['customerId'] ?>" class="modal">
                                        <span
                                            onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='none'"
                                            class="close" title="Close Modal">×</span>
                                        <form class="modal-content"
                                            action="../controller/admin_controller.php?action=delete_customer"
                                            method="post">
                                            <div class="container">
                                                <h1>Xác nhận</h1>
                                                <p>Bạn chắc chắc xóa tài khoản này?</p>
                                                <div class="clearfix">
                                                    <button type="button"
                                                        onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='none'"
                                                        class="cancelbtn">Cancel</button>
                                                    <input type="hidden" name="customerId"
                                                        value="<?php echo $customer['customerId'] ?>"></button>

                                                    <button type="button"
                                                        onclick="document.getElementById('id0<?php echo $customer['customerId'] ?>').style.display='none'"
                                                        class="deletebtn"><input type="submit" value="Xóa"
                                                            style="background-color:#0066ff00 ; border: none; color: white;width: 100%;"></a></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <script>
                                    // Get the modal
                                    var modal = document.getElementById('id0<?php echo $customer['customerId'] ?>');

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                    </script>
                                </td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
        </div>

</body>

</html>