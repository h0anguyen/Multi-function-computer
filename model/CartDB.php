<?php
class CartDB
{
    public function ADD_TO_Cart($customerId, $productId, $quantity, $date)
    {
        $db = Database::getDB();
        $query = '	INSERT INTO `cart`(`customerId`, `productId`, `quantity`, `date`) VALUES (:customerId,:productId,:quantity,:date)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':productId', $productId);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Get_Product_Cart($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM cart c JOIN products p on c.productId=p.productId WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }

    public function UpdateCart($customerId, $productId, $quantity, $date)
    {
        $db = Database::getDB();
        $query = 'UPDATE `cart` SET quantity=:quantity,date=:date WHERE customerId=:customerId and productId=:productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':productId', $productId);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Delete_Product_Cart($customerId, $productId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM `cart` WHERE customerId=:customerId and productId=:productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Delete_Cart($customerId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM `cart` WHERE customerId=:customerId ';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
}
