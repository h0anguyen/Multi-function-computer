<?php
class HistorySearchDB
{
    public function Get_Product_H($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT search FROM `historysearch` WHERE customerId=:customerId ORDER BY id DESC LIMIT 1';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
}
