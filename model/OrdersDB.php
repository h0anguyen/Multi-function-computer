<?php
class OrdersDB
{
    public function Add_Order($customerId, $date, $paymentMethods)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO `orders`( `customerId`,date,status,paymentMethods) VALUES (:customerId,:date,0,:paymentMethods)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':paymentMethods', $paymentMethods);
        $statement->execute();
        return $kq = 1;
        $statement->closeCursor();
        $db = Database::closeConnection();
    }

    public function Count_Orders()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }

    public function Count_Orders_A()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` ORDER BY status ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Delivery_Order()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders where status=1';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Delivery_Order_Status()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders where status=0';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Delivery_Order_All()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` ORDER BY date DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Count_Orders_M()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders
        WHERE date BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) AND CURRENT_DATE();';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Count_Orders_2M()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders
        WHERE date BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 2 MONTH) AND DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH);';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_All_Order()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` o JOIN orderdetail od on o.orderId=od.orderId  ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_All_Order_M()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders
        WHERE date BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) AND CURRENT_DATE();
         ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Seach_order($seach)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders o JOIN customers c ON o.customerId = c.customerId 
        WHERE o.orderId like :seach OR c.customerName like :seach ';
        $statement = $db->prepare($query);
        $statement->bindValue(':seach', $seach);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Delivered($orderId, $value)
    {
        $db = Database::getDB();
        $query = 'UPDATE `orders` SET `status`=:value WHERE orderId=:orderId';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->bindValue(':value', $value);

        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
}