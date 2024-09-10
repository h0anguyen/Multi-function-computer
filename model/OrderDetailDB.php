<?php
class OrderDetailDB
{
    public function Add_Order_Detail()
    {
        $db = Database::getDB();
        $query = 'INSERT INTO orderdetail (orderdetail.`orderId`,orderdetail.`productId`,orderdetail.`quantity`,orderdetail.`price`)
        SELECT orders.orderId,cart.productId,cart.quantity,(SELECT price FROM products WHERE products.productId=cart.productId)
        FROM orders
        JOIN cart ON orders.customerId = cart.customerId JOIN products p on p.productId=cart.productId
        WHERE orders.orderId=(SELECT orderId FROM orders ORDER BY orderId DESC LIMIT 1) and p.availableQuantity>0 ';
        $statement = $db->prepare($query);
        $statement->execute();
        return $kq = 1;
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Sum_Price_Product_Orders($customerId, $orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT sum((orderdetail.price)*(orderdetail.quantity)) FROM `orders` JOIN orderdetail on orders.orderId=orderdetail.orderId 
        JOIN products p on orderdetail.productId=p.productId
        WHERE customerId=:customerId and orders.orderId=:orderId  ORDER BY date DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetchColumn();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_Orders($customerId, $orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` JOIN orderdetail on orders.orderId=orderdetail.orderId 
        JOIN products p on orderdetail.productId=p.productId
        WHERE customerId=:customerId and orders.orderId=:orderId  ORDER BY date DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Date_Orders($customerId, $orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` WHERE customerId=:customerId and orderId=:orderId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Order_Detail()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` GROUP BY `orderId`';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Sum_Order_Order($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` o JOIN orderdetail od WHERE o.customerId=:customerId GROUP BY od.orderId ORDER BY od.orderId DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Count_P_P()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orderdetail';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Count_P_P_M()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orderdetail od JOIN orders o on od.orderId=o.orderId
        WHERE date BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) AND CURRENT_DATE();
        ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Count_P_P_2M()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM orderdetail od JOIN orders o on od.orderId=o.orderId
        WHERE date BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 2 MONTH) AND DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH);
        ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }











    ///////////////////////////////////////////Admin//////////////////////////////

    public function Get_All_Order()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` o JOIN orderdetail od GROUP BY od.orderId ORDER BY od.orderId DESC ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }

    public function Get_Orders_oId($orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` JOIN orderdetail on orders.orderId=orderdetail.orderId 
        JOIN products p on orderdetail.productId=p.productId
        WHERE orders.orderId=:orderId  ORDER BY date DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Sum_Order($orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT sum((orderdetail.price)*(orderdetail.quantity)) FROM `orders` JOIN orderdetail on orders.orderId=orderdetail.orderId 
        JOIN products p on orderdetail.productId=p.productId
        WHERE orders.orderId=:orderId  ORDER BY date DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetchColumn();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Date_Orders_Admin($orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` WHERE  orderId=:orderId';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Customer_Order($orderId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `orders` JOIN customers ON orders.customerId=customers.customerId WHERE orderId=:orderId  ';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
}
