<?php
class CreditDB
{
    public static function get_all()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM credits';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public static function Amount_Card($creditCardCode)
    {
        $db = Database::getDB();
        $query = 'SELECT amount FROM credits WHERE creditCardCode=:creditCardCode';
        $statement = $db->prepare($query);
        $statement->bindValue(':creditCardCode', $creditCardCode);
        $statement->execute();
        $lists = $statement->fetchColumn();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public static function Update_Amount($creditCardCode, $value)
    {
        $db = Database::getDB();
        $query = 'UPDATE `credits` SET `amount`=amount-:value WHERE `creditCardCode`=:creditCardCode;';
        $statement = $db->prepare($query);
        $statement->bindValue(':creditCardCode', $creditCardCode);
        $statement->bindValue(':value', $value);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public static function Get_Infor_Credit($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT amount FROM credits  cr JOIN customers c ON cr.creditCardCode = c.creditCardCode
        WHERE c.customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $lists = $statement->fetchColumn();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
}
