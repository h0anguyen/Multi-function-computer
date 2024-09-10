<?php
require_once('../model/database.php');
require_once('../model/CustomerDB.php');
require_once('../model/UserDB.php');
require_once('../model/ProductDB.php');
require_once('../model/CreditDB.php');
require_once('../model/CategoryDB.php');
require_once('../model/BuildDB.php');
require_once('../model/CartDB.php');
require_once('../model/OrdersDB.php');
require_once('../model/MailboxDB.php');
require_once('../model/OrderDetailDB.php');

$action = filter_input(INPUT_GET, 'action');
if ($action == null) {
    $action = 'home';
}
if ($action == 'home') {
    include('../view/computer.php');
}
if ($action == 'login') {
    $email = filter_input(INPUT_POST, 'email');
    $password = md5(filter_input(INPUT_POST, 'password'));
    $UserDB = new UserDB;
    $user = $UserDB->Check_Email($email);
    if ($user) {
        if ($password == $user["password"]) {
            $guests = 1;
            session_start();
            $_SESSION['customerId'] = $user;
            if ($user['customerId'] == 0) {
                header('Location: ../controller/admin_controller.php');
                exit();
            } else {
                if ($user['customerId'] == 1) {
                    header('Location: ../view/a_delivery_unit.php');
                    exit();
                } else {
                    if ($user['customerId'] == 0 || $user['customerId'] == 1) {
                        $_SESSION['customerId'] = null;
                    }
                    header('Location: ../view/computer.php');
                    exit();
                }
            }
        } else {
            $index = 1;
            include('../view/login.php');
        }
    } else {
        $index = 1;
        include('../view/login.php');
    }
}
if ($action == 'register') {
    $email = filter_input(INPUT_POST, 'email');
    $customerName = filter_input(INPUT_POST, 'customerName');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');
    $password2 = filter_input(INPUT_POST, 'password2');
    $hashedPassword = md5($password);
    $UserDB = new UserDB;
    $c_e = $UserDB->Check_Email($email);
    $c_p = $UserDB->Check_Phone($phone);
    if ($c_e == false and $c_p == false) {
        if ($email != null  && $password != null && $password2 != null && $phone != null & $customerName != null) {
            if (preg_match("/^0[0-9]{9}$/", $phone)) {
                if (preg_match("/^.{6,}$/", $password)) {
                    if ($password == $password2) {
                        $UserDB = new UserDB;
                        $user = $UserDB->Register($email, $hashedPassword, $phone, $customerName);
                        $ss = 1;
                        include('../view/login.php');
                    } else {
                        $ss = 2;
                        $messager = 'Xác nhận mật khẩu không trùng khớp';
                        include('../view/register.php');
                    }
                } else {
                    $ss = 2;
                    $messager = 'mật khẩu phải từ 6 trở lên và không được chứa khoảng trắng';
                    include('../view/register.php');
                }
            } else {
                $ss = 2;
                $messager = 'Số điện thoại không đúng định dạng ';
                include('../view/register.php');
            }
        } else {
            $ss = 2;
            $messager = 'Nhập thiếu dữ liệu ';
            include('../view/register.php');
        }
    } else {
        $ss = 2;
        $messager = 'Email hoặc SDT đã được đăng kí trước';
        include('../view/register.php');
    }
}

if ($action == 'logout') {
    session_start();
    session_destroy();
    // Xóa cookie
    setcookie('customerId', '', time() - 3600);
    setcookie('email', '', time() - 3600);
    header('Location: ../view/computer.php');
    exit();
}

// update user

if ($action == 'update_profile') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $customerName = filter_input(INPUT_POST, 'customerName');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $gender = filter_input(INPUT_POST, 'gender');
    $CustomerDB = new CustomerDB;
    $UserDB = new UserDB;
    if ($email != null and $phone != null and $customerName != null) {
        if (preg_match("/^0[0-9]{9}$/", $phone)) {
            $u = $CustomerDB->Update_Profile($customerId, $customerName, $phone, $email, $birthday, $gender);
            $user = $UserDB->Check_Email($email);
            session_start();
            $_SESSION['customerId'] = $user;
            session_write_close();
            $messager = 'Cập nhật thành công.';
            include('../view/user_profile.php');
            exit();
        } else {
            $messager = 'Số điện thọai không đúng định dạng';
            include('../view/user_profile.php');
        }
        $messager = 'Không được để trống email ,số điện thoại , họ và tên';
        include('../view/user_profile.php');
    }
}
if ($action == 'update_img_customer') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $email = filter_input(INPUT_POST, 'email');
    $customerImg = basename($_FILES['customerImg']['name']);
    $target_dir = '../img/';
    $target_file = $target_dir . $customerImg;
    move_uploaded_file($_FILES['customerImg']["tmp_name"], $target_file);
    $CustomerDB = new CustomerDB;
    $UserDB = new UserDB;
    $u = $CustomerDB->Update_Img_Customer($customerId, $customerImg);
    $user = $UserDB->Check_Email($email);
    session_start();
    $_SESSION['customerId'] = $user;
    session_write_close();
    include('../view/user_profile.php');
}
if ($action == 'update_address') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $email = filter_input(INPUT_POST, 'email');
    $specific_address = filter_input(INPUT_POST, 'specific_address');
    $general_address = filter_input(INPUT_POST, 'general_address');
    $address = $specific_address . '-' . $general_address;
    $CustomerDB = new CustomerDB;
    $UserDB = new UserDB;
    $u = $CustomerDB->Update_Address($customerId, $address);
    $user = $UserDB->Check_Email($email);
    session_start();
    $_SESSION['customerId'] = $user;
    session_write_close();
    $messager = 'Cập nhật thành công.';
    include('../view/user_address.php');
    exit();
}
if ($action == 'update_password') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $passwordOld = filter_input(INPUT_POST, 'passwordOld');
    $passwordNew = filter_input(INPUT_POST, 'passwordNew');
    $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');
    $hashedPassword = md5($passwordNew);
    $hashedPasswordOld = md5($passwordOld);
    $CustomerDB = new CustomerDB;
    $UserDB = new UserDB;
    $c_p = $UserDB->Check_Password($customerId);
    if ($c_p === $hashedPasswordOld) {
        if (preg_match("/^.{6,}$/", $password)) {
            if ($passwordNew == $passwordConfirm) {
                $u_p = $CustomerDB->Update_Password($customerId, $hashedPassword);
                $messager = "Chỉnh sửa thành công.";
                include("../view/user_change_password.php");
            } else {
                $messager = "Xác nhận mật khẩu không chính xác.";
                include("../view/user_change_password.php");
            }
        } else {
            $messager = "Mật khẩu không được ít hơn 6 kí tự";
            include("../view/user_change_password.php");
        }
    } else {
        $messager = "Mật khẩu cũ không chính xác.";
        include("../view/user_change_password.php");
    }
}
if ($action == 'get_product_home') {
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $categoryId = filter_input(INPUT_GET, 'categoryId');
    $ProductDB = new ProductDB;
    $ProductDB->Get_Product_Home($categoryId);
    include('../view/computer.php');
}
if ($action == 'get_product_c') {
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $categoryId = filter_input(INPUT_GET, 'categoryId');
    $ProductDB = new ProductDB;

    if ($categoryId == null) {
        $categoryId = 2;
    }
    if ($categoryId == 1) {
        $c = 1;
    }
    $lists = $ProductDB->Get_Product_To_Category($categoryId);
    $lists_a0=$ProductDB->Get_Product_A1($categoryId);
    include('../view/product.php');
}
if ($action == 'get_product_build') {
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $categoryId = filter_input(INPUT_GET, 'categoryId');
    $ProductDB = new ProductDB;
    $lists = $ProductDB->Get_Product_To_Category($categoryId);
    include('../view/build.php');
}
if ($action == 'get_category') {
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $categoryId = filter_input(INPUT_GET, 'categoryId');
    $CategoryDB = new CategoryDB;
    $get_category = $CategoryDB->Get_Category($categoryId);
    include('../view/product.php');
}
if ($action == 'get_detail_product') {
    $productId = filter_input(INPUT_GET, 'productId');
    $ProductDB = new ProductDB;
    $add_number_view = $ProductDB->Add_Number_View($productId);
    $detail_product = $ProductDB->Get_Product_Build($productId);

    include('../view/detail_product.php');
}
if ($action == 'seach') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $seach = ltrim(filter_input(INPUT_POST, 'seach'));
    $ProductDB = new ProductDB;
    if ($seach == null) {
        include('../view/computer.php');
    } else {
        $seach_p = '%' . $seach . '%';
        $ProductDB->History_Search($seach, $customerId);
        $seach_product = $ProductDB->Get_Product_Seach($seach_p);
        include('../view/seach.php');
    }
}





if ($action == 'add_to_build') {
    $productId = filter_input(INPUT_POST, 'productId');
    $customerId = filter_input(INPUT_POST, 'customerId');
    $quantity = filter_input(INPUT_POST, 'quantity');
    if ($quantity == null) {
        $quantity = 1;
    }
    if ($customerId != null) {
        $BuildDB = new BuildDB;
        $a_t_b = $BuildDB->ADD_TO_BUILD($customerId, $productId, $quantity);
        if ($a_t_b) {
            $messager = "Thêm thành công";
            include('../view/build.php');
        } else {
            $messager = "Thêm thất bại";
            include('../view/build.php');
        }
    } else {
        include('../view/login.php');
    }
}

if ($action == 'get_build') {

    include('../view/build.php');
}

if ($action == 'reset_build') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $BuildDB = new BuildDB;
    $reset_build = $BuildDB->Reset_Build($customerId);
    include('../view/build.php');
}
if ($action == 'delete_build') {
    $productId = filter_input(INPUT_GET, 'productId');
    $BuildDB = new BuildDB;
    $delete_build = $BuildDB->Delete_Product_To_Build($productId);
    include('../view/build.php');
}


if ($action == 'add_cart_to_build') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $productId = filter_input(INPUT_GET, 'productId');

    $date = date('Y-m-d');
    $BuildDB = new BuildDB;
    $add = $BuildDB->Add_Cart_To_Build($customerId, $date);
    $delete_build = $BuildDB->Reset_Build($customerId);
    include('../view/build.php');
}

// cart_-------------



if ($action == 'add_product_cart') {
    $customerId = $_POST['customerId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    if ($quantity == null) {
        $quantity = 1;
    }
    if ($quantity == 0) {
        $quantity = 0;
    }
    $date = date('Y-m-d');
    if ($customerId != null) {
        $CartDB = new CartDB;
        $c_pr = $CartDB->Get_Product_Cart($customerId);
        $c_product = 0;
        foreach ($c_pr as $c_pr) {
            if ($c_pr['productId'] == $productId) {
                $c_product = 1;
            }
        }
        if ($c_product == 0) {
            $CartDB->ADD_TO_Cart($customerId, $productId, $quantity, $date);
        } else {
            $newquantity = $quantity + $c_pr['quantity'];
            $CartDB = new CartDB;
            $CartDB->UpdateCart($customerId, $productId, $newquantity, $date);
        }
        include('../view/cart.php');
    } else {
        include('../view/login.php');
    }
}
if ($action == 'delete_product_cart') {
    $customerId = $_POST['customerId'];
    $productId = $_POST['productId'];
    $CartDB = new CartDB;
    $CartDB->Delete_Product_Cart($customerId, $productId);
    header('Location: ../view/cart.php');
    exit();
}

if ($action == 'delete_cart') {
    $customerId = $_POST['customerId'];
    $CartDB = new CartDB;
    $CartDB->Delete_Cart($customerId);
    // echo 'xóa thành công';
    header('Location: ../view/cart.php');
    exit();
}
if ($action == 'update_quantity') {
    $customerId = $_POST['customerId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    if ($quantity == null) {
        $quantity = 1;
    }
    $date = date('Y-m-d');
    $CartDB = new CartDB;
    $newquantity = $quantity;
    $CartDB->UpdateCart($customerId, $productId, $newquantity, $date);
    header('Location: ../view/cart.php');
    exit();
}


// ........thanh toán 


if ($action == 'payment') {
    $customerId = $_POST['customerId'];
    $address = $_POST['address'];
    $paymentMethods = $_POST['paymentMethods'];
    date_default_timezone_get();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date("Y-m-d H:i:s");
    $OrdersDB = new OrdersDB;
    $CartDB = new CartDB;
    $ProductDB = new ProductDB;
    $list_cart = $CartDB->Get_Product_Cart($customerId);
    if ($list_cart != null) {
        if ($address != null) {
            foreach ($list_cart as $product) {
                $p = $ProductDB->Get_Product_Build($product['productId']);
                $chek_q = $p['availableQuantity'] >= $product['quantity'];
                if ($chek_q) {
                    $ProductDB->Delete_AvailableQuantity($product['quantity'], $product['productId']);
                    $ProductDB->Add_purchases($product['quantity'], $product['productId']);
                    if ($paymentMethods == 'Thanh toán bằng thẻ tín dụng') {
                        $tt = $CartDB->Get_Product_Cart($customerId);
                        $sum = 0;
                        foreach ($tt as $tt) {
                            $sum = $sum + $tt['price'];
                        }
                        $CustomerDB = new CustomerDB;
                        $cs = $CustomerDB->Get_Customers($customerId);
                        $CreditDB = new CreditDB;
                        $amount = $CreditDB->Get_Infor_Credit($customerId);
                        if ($amount >= $sum) {
                            $CreditDB->Update_Amount($cs['creditCardCode'], $sum);
                        } else {
                            $messager = 'Số dư tài khoản bạn không đủ';
                            include('../view/bill.php');
                            exit();
                        }
                    }
                }
            }
            if ($chek_q == false) {
                $messager = 'Số lượng bạn yêu cầu trong kho không đủ';
                $kq = null;
                include('../view/bill.php');
            } else {
                $k = $OrdersDB->Add_Order($customerId, $date,$paymentMethods);
                $OrderDetailDB = new OrderDetailDB;
                $q = $OrderDetailDB->Add_Order_Detail();
                if ($k and $q) {
                    $kq = 1;
                }
            }
            if ($kq == 1) {
                $CartDB->Delete_Cart($customerId);
                include('../view/history.php');
            } else {
                $messagers = 'Đặt hàng thất bại thử lại sau';
            }
        } else {
            $messagers = 'Vui lòng nhập địa chỉ nhận hàng';
            include('../view/bill.php');
        }
    } else {
        $messagers = 'Không tìm thấy sản phẩm bạn muốn mua';
        include('../view/bill.php');
    }
}




if ($action == 'add_credit') {
    $customerId = $_POST['customerId'];
    $creditCardCode = $_POST['creditCardCode'];
    $email = $_POST['email'];
    $CustomerDB = new CustomerDB;
    $CustomerDB->Add_Credit($customerId, $creditCardCode);
    $UserDB = new UserDB;
    $user = $UserDB->Check_Email($email);
    session_start();
    $_SESSION['customerId'] = $user;
    session_write_close();
    include('../view/user_payment.php');
}

if ($action == 'opinion') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];
    if ($note == null) {
        $note = 'Nhận thông báo ưu đãi và tư vấn';
    }
    if ($name != null and $email != null and $phone != null) {
        $MailboxDB = new MailboxDB;
        $MailboxDB->Add_Mailbox($name, $email, $phone, $note);
        $mess = 'Cảm ơn bạn đã góp ý với cửa hàng';
    } else {
        $mess = 'Mời bạn nhập đủ các thông tin góp ý';
    }
    include('../view/contact.php');
}