<?php
class CustomerDB
{

    public function Update_Profile($customerId, $customerName, $phone, $email, $birthday, $gender)
    {
        $db = Database::getDB();
        $query = 'UPDATE `customers` SET `customerName`=:customerName,`phone`=:phone,`email`=:email,birthday=:birthday,gender=:gender WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':customerName', $customerName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':birthday', $birthday);
        $statement->bindValue(':gender', $gender);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Update_Img_Customer($customerId, $customerImg)
    {
        $db = Database::getDB();
        $query = 'UPDATE `customers` SET `customerImg`=:customerImg WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':customerImg', $customerImg);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Update_Address($customerId, $address)
    {
        $db = Database::getDB();
        $query = 'UPDATE `customers` SET address=:address WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':address', $address);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Update_Password($customerId, $password)
    {
        $db = Database::getDB();
        $query = 'UPDATE `customers` SET password=:password WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Add_Credit($customerId, $creditCardCode)
    {
        $db = Database::getDB();
        $query = 'UPDATE `customers` SET creditCardCode=:creditCardCode WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':creditCardCode', $creditCardCode);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Get_All_Customers()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM customers';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Customers($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT creditCardCode FROM customers where customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Delete_Customer_ADMIN($customerId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM `customers` WHERE  customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }


    public function Get_Customers_CustomerId($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT customerName FROM customers where customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Seach_Customer($seach)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM customers 
        WHERE customerName like :seach OR `phone` like :seach OR `email` like :seach ';
        $statement = $db->prepare($query);
        $statement->bindValue(':seach', $seach);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
}