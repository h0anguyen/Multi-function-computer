<?php
class  MailboxDB
{
    public function Add_Mailbox($name, $email, $phone, $note)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO `mailbox`( `name`, `email`, `phone`, `note`) VALUES (:name,:email,:phone,:note)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':note', $note);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Get_All_Mailbox()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `mailbox` ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Seach_Mailbox($seach)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM `mailbox` WHERE `email` like :seach OR `phone` like :seach OR `note` like :seach ';
        $statement = $db->prepare($query);
        $statement->bindValue(':seach', $seach);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
}
