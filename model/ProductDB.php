<?php
class ProductDB
{
    public function Get_Product_Category($categoryId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products  WHERE categoryId = :categoryId order by availableQuantity desc limit 4';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_To_Category($categoryId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products JOIN categorys on products.categoryId = categorys.categoryId  WHERE products.categoryId = :categoryId and availableQuantity>0 order by `productId` desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_A1($categoryId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products JOIN categorys on products.categoryId = categorys.categoryId  WHERE products.categoryId = :categoryId and availableQuantity=0 order by `productId` desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_To_Category_A($categoryId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products JOIN categorys on products.categoryId = categorys.categoryId  WHERE products.categoryId = :categoryId order by productId desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_Home()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products WHERE availableQuantity>0 and categoryId= 2 or categoryId= 3 or categoryId= 4 order by numberViewed desc LIMIT 5  ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }

    public function Get_Product_Build($productId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products  WHERE productId = :productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $lists = $statement->fetch();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_Detail($categoryId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products  WHERE categoryId = :categoryId LIMIT 5';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_Seach($seach)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM categorys JOIN products ON categorys.categoryId = products.categoryId
            WHERE categorys.categoryName like :seach OR products.productName like :seach ';
        $statement = $db->prepare($query);
        $statement->bindValue(':seach', $seach);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }

    public function Get_Product_Seach_Home($seach)
    {
        $db = Database::getDB();
        $query = 'SELECT *
        FROM categorys
        INNER JOIN products ON categorys.categoryId = products.categoryId
        WHERE (categorys.categoryName like :seach OR products.productName like :seach and availableQuantity>0)  
        ORDER BY RAND() LIMIT 5;
        ';
        $statement = $db->prepare($query);
        $statement->bindValue(':seach', $seach);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Number_Viewd($productId)
    {
        $db = Database::getDB();
        $query = 'SELECT numberViewed FROM products  WHERE productId = :productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Add_Number_View($productId)
    {
        $db = Database::getDB();
        $query = 'UPDATE products SET numberViewed=numberViewed+1 WHERE productId =:productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Add_products($productName, $information, $priceOld, $price, $categoryId, $productlmgMain, $availableQuantity)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO `products`(`productName`, `information`,priceOld,price,categoryId,productlmgMain,availableQuantity) VALUES (:productName,:information,:priceOld,:price,:categoryId,:productlmgMain,:availableQuantity)';
        $statement = $db->prepare($query);
        $statement->bindValue(':productName', $productName);
        $statement->bindValue(':information', $information);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':priceOld', $priceOld);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->bindValue(':productlmgMain', $productlmgMain);
        $statement->bindValue(':availableQuantity', $availableQuantity);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Get_Product_Home_Id()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products WHERE availableQuantity>0 and categoryId= 2 or categoryId= 3 or categoryId= 4 order by productId desc LIMIT 5 ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Product_Purchases()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products JOIN categorys on products.categoryId = categorys.categoryId WHERE availableQuantity>0 and products.categoryId= 2 or products.categoryId= 3 or products.categoryId= 4  order by products.purchases desc LIMIT 5 ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Get_Infor_Product($productId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products  WHERE productId = :productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }
    public function Update_product_ADMIN($productName, $information, $price, $priceOld, $categoryId, $productId, $availableQuantity)
    {
        $db = Database::getDB();
        $query = 'UPDATE `products` SET productName=:productName,information=:information,price=:price,priceOld=:priceOld,categoryId=:categoryId ,availableQuantity=:availableQuantity WHERE productId=:productId;';
        $statement = $db->prepare($query);
        $statement->bindValue(':productName', $productName);
        $statement->bindValue(':information', $information);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':priceOld', $priceOld);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->bindValue(':productId', $productId);
        $statement->bindValue(':availableQuantity', $availableQuantity);

        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Update_product_ADMIN_Img($productlmgMain, $productId)
    {
        $db = Database::getDB();
        $query = 'UPDATE `products` SET productlmgMain=:productlmgMain WHERE productId=:productId;';
        $statement = $db->prepare($query);
        $statement->bindValue(':productlmgMain', $productlmgMain);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Delete_Product_ADMIN($productId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM `products` WHERE productId=:productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Get_Product_View()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products  order by numberViewed desc ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;

        $db = Database::closeConnection();
    }
    public function Check_Product()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products ';
        $statement = $db->prepare($query);
        $statement->execute();
        $lists = $statement->fetchAll();
        $statement->closeCursor();
        return $lists;
        $db = Database::closeConnection();
    }


    public function Add_purchases($value, $productId)
    {
        $db = Database::getDB();
        $query = 'UPDATE products SET purchases=purchases+:value WHERE productId =:productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':value', $value);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
    public function Delete_AvailableQuantity($value, $productId)
    {
        $db = Database::getDB();
        $query = 'UPDATE products SET availableQuantity=availableQuantity-:value WHERE productId =:productId';
        $statement = $db->prepare($query);
        $statement->bindValue(':value', $value);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }

    public function History_Search($seach, $customerId)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO `historysearch`(`search`,customerId) VALUES (:seach,:customerId) ';
        $statement = $db->prepare($query);
        $statement->bindValue(':seach', $seach);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $statement->closeCursor();
        $db = Database::closeConnection();
    }
}