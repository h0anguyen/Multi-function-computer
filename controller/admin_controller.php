<?php
require('../model/CustomerDB.php');
require('../model/UserDB.php');
require('../model/ProductDB.php');
require('../model/CreditDB.php');
require('../model/CategoryDB.php');
require('../model/BuildDB.php');
require('../model/OrdersDB.php');
require('../model/MailboxDB.php');


require_once('../model/database.php');


$action = filter_input(INPUT_GET, 'action');

if ($action == null) {
    include('../view/admin_home.php');
}
if ($action == 'lists_customer') {
    include('../view/admin_customer.php');
}
if ($action == 'lists_product') {
    $categoryId = $_GET['categoryId'];
    include('../view/admin_product.php');
}
if ($action == 'delete_customer') {
    $customerId = $_POST['customerId'];
    $CustomerDB = new CustomerDB;
    $delete = $CustomerDB->Delete_Customer_ADMIN($customerId);
    include('../view/admin_customer.php');
}
if ($action == 'add_product') {
    $productName = filter_input(INPUT_POST, 'productName');
    $information = filter_input(INPUT_POST, 'information');
    $price = filter_input(INPUT_POST, 'price');
    $priceOld = filter_input(INPUT_POST, 'priceOld');
    $categoryId  = filter_input(INPUT_POST, 'categoryId');
    $availableQuantity  = filter_input(INPUT_POST, 'availableQuantity');
    $ProductDB = new ProductDB;
    $pdN = $ProductDB->Check_Product();

    $productlmgMain = basename($_FILES['productlmgMain']['name']);
    $target_dir = '../img/';
    $target_file = $target_dir . $productlmgMain;
    foreach ($pdN as $pdN) {
        if ($pdN['productName'] == $productName) {
            $c_pdn = 1;
        }
        if ($pdN['productlmgMain'] == $productlmgMain) {
            $c_pdImg = 1;
        }
    }
    if ($categoryId == null) {
        $categoryId = 2;
    }
    if ($productName != null  and $price != null and $productlmgMain != null and $availableQuantity != null) {
        if (!isset($c_pdn)) {
            if (is_numeric($price) && is_numeric($priceOld) && intval($priceOld) > intval($price)) {
                if (is_numeric($availableQuantity) && $availableQuantity > 0) {
                    if (!isset($c_pdImg)) {
                        move_uploaded_file($_FILES['productlmgMain']["tmp_name"], $target_file);
                        $add_product = $ProductDB->Add_products($productName, $information, $priceOld, $price, $categoryId, $productlmgMain, $availableQuantity);
                        $messenger = 'Thêm thành công';
                        header('Location: ../controller/admin_controller.php?action=lists_product&categoryId=' . $categoryId . '');
                        exit();
                    } else {
                        $messenger = 'Ảnh đã tồn tại';
                        include('../view/admin_form_add_product.php');
                    }
                } else {
                    $messenger = 'Số lượng tồn kho phải là số và lớn hơn 0';
                    include('../view/admin_form_add_product.php');
                }
            } else {
                $messenger = 'Giá tiền phải là số và Giá thị trường phải nhỏ hơn Giá ưu đãi';
                include('../view/admin_form_add_product.php');
            }
        } else {
            $messenger = 'Tên sản phẩm đã tồn tại';
            include('../view/admin_form_add_product.php');
        }
    } else {
        $messenger = 'Nhập thiếu dữ liệu';
        include('../view/admin_form_add_product.php');
    }
}

if ($action == 'logout') {
    session_start();
    session_destroy();
    // Xóa cookie
    setcookie('customerId', '', time() - 3600);
    setcookie('email', '', time() - 3600);
    // header('Location: ../view/login.php');
    include('../view/login.php');
    exit();
}
if ($action == 'edit_product') {
    $categoryId = $_POST['categoryId'];
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $information = $_POST['information'];
    $price = $_POST['price'];
    $priceOld = $_POST['priceOld'];
    $availableQuantity = $_POST['availableQuantity'];
    $productlmgMain  = basename($_FILES['productlmgMain']['name']);
    $target_dir = '../img/';
    $target_file = $target_dir . $productlmgMain;
    $imageFileType = strtolower(pathinfo($productlmgMain, PATHINFO_EXTENSION));
    $ProductDB = new ProductDB;
    if ($categoryId != null && $productId != null && $productName != null && $price != null) {
        if (is_numeric($priceOld) && is_numeric($price)) {
            if (intval($priceOld) > intval($price)) {
                if ($target_file == null) {
                    $update = $ProductDB->Update_product_ADMIN($productName, $information, $price, $priceOld, $categoryId, $productId, $availableQuantity);
                    $messenger = 'Cập nhật thành công';
                    include('../view/admin_form_edit.php');
                } else {
                    if ($_FILES["productlmgMain"]["size"] > 500000 and $imageFileType != "jpg" && $imageFileType != "png") {
                        $messenger = 'file ảnh sai định dạng hoặc kích thước ảnh quá lớn';
                        include('../view/admin_form_edit.php');
                        exit;
                    } else {
                        move_uploaded_file($_FILES['productlmgMain']["tmp_name"], $target_file);
                        if ($productlmgMain == null) {
                            $update = $ProductDB->Update_product_ADMIN($productName, $information, $price, $priceOld, $categoryId, $productId, $availableQuantity);
                            $messenger = 'Cập nhật thành công';
                            include('../view/admin_form_edit.php');
                        } else {
                            $update_img = $ProductDB->Update_product_ADMIN_Img($productlmgMain, $productId);
                            $update = $ProductDB->Update_product_ADMIN($productName, $information, $price, $priceOld, $categoryId, $productId, $availableQuantity);
                            $messenger = 'Cập nhật thành công';
                            include('../view/admin_form_edit.php');
                        }
                    }
                }
            } else {
                $messenger = 'Giá giảm giá phải lớn hơn giá thị trường';
                include('../view/admin_form_edit.php');
            }
        } else {
            $messenger = 'Giá giảm giá và giá thị trường phải là số';
            include('../view/admin_form_edit.php');
        }
    } else {
        $messenger = 'Nhập thiếu dữ liệu.';
        include('../view/admin_form_edit.php');
    }
}

if ($action == "delete_product") {
    $productId = $_GET['productId'];
    $ProductDB = new ProductDB;
    $delete = $ProductDB->Delete_Product_ADMIN($productId);
    header('Location: ../controller/admin_controller.php?action=lists_product&categoryId=' . $_GET['categoryId'] . '');
    exit();
}
if ($action == 'seach') {
    $seach = filter_input(INPUT_POST, 'seach');
        $seach_p = '%' . $seach . '%';
        $ProductDB = new ProductDB;
        $seach_product = $ProductDB->Get_Product_Seach($seach_p);
        include('../view/admin_search.php');
}
if ($action == 'seach_customer') {
        $seach = filter_input(INPUT_POST, 'seach');
        $seach_p = '%' . $seach . '%';
        $CustomerDB=new CustomerDB;
        $seach_customer = $CustomerDB->Seach_Customer($seach_p);    
        $tt=1;
        include('../view/admin_customer.php');
}
if ($action == 'arrange') {
    $value = $_GET['value'];
    header('Location: ../view/admin_home.php?value=' . $_GET['value'] . '');
    exit();
}
if ($action == 'order_detail_ship') {
    $orderId = $_POST['orderId'];
    include('../view/a_delivery_unit_deail.php');
}
if ($action == 'order_detail') {
    $orderId = $_POST['orderId'];
    include('../view/admin_order_detail.php');
}
if ($action == 'seach_order') {
    $seach = filter_input(INPUT_POST, 'seach');
    $seach_p = '%' . $seach . '%';
    $OrderDB = new OrdersDB;
    $seach_order = $OrderDB->Seach_order($seach_p);
    include('../view/admin_order.php');
}
if ($action == 'seach_mailbox') {
    $seach = filter_input(INPUT_POST, 'seach');
    $seach_p = '%' . $seach . '%';
    $MailboxDB = new MailboxDB;
    $seach_mailbox = $MailboxDB->Seach_Mailbox($seach_p);
    include('../view/admin_mailbox.php');
}
if ($action == 'delivered') {
    $orderId = $_POST['orderId'];
    $status = $_POST['status'];
    $value = $status + 1;
    $OrderDB = new OrdersDB;
    $OrderDB->Delivered($orderId, $value);
    include('../view/a_delivery_unit.php');
}
if ($action == 'order_confirmation') {
    $orderId = $_POST['orderId'];
    $status = $_POST['status'];
    $value = $status + 1;
    $OrderDB = new OrdersDB;
    $OrderDB->Delivered($orderId, $value);
    include('../view/admin_order_detail.php');
}