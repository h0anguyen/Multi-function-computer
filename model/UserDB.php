<?php
class UserDB
{
   

    public function Check_Email($email)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM customers WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $c_e = $statement->fetch();
        $statement->closeCursor();
        return $c_e;
        $db = Database::closeConnection();
    }

    public function Check_Phone($phone)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM customers WHERE phone = :phone';
        $statement = $db->prepare($query);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $c_p = $statement->fetch();
        $statement->closeCursor();
        return $c_p;
        $db = Database::closeConnection();
    }
    public function Register($email, $password, $phone, $customerName)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO `customers`(`email`, `password`,phone,customerName) VALUES (:email,:password,:phone,:customerName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':customerName', $customerName);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Check_Password($customerId)
    {
        $db = Database::getDB();
        $query = 'SELECT password FROM customers WHERE customerId=:customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $c_p = $statement->fetchColumn();
        $statement->closeCursor();
        return $c_p;
        $db = Database::closeConnection();
    }
}
