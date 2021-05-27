<?php
require "../Utils/DatabaseUtils.php";
require "../Model/DVD.php";
require "../Model/Furniture.php";
require "../Model/Book.php";

//echo 'backend is working fine';
$dbobj = new DatabaseUtils();
$handler = $dbobj->connect();

$type = $_POST['type'];
switch ($type) {
    case 'DVD':
    {
        $obj = new DVD(null, $_POST['SKU'], $_POST['productName'], $_POST['price'], null, $_POST['MB']);
        $statement = $handler->prepare("INSERT INTO `dvd` (`MB`) VALUES( :MB)");
        //$statement -> bindParam(':MB', $obj->getSKU());
        $statement->bindValue(':MB', $obj->getMB(), PDO::PARAM_STR);
        $statement->execute();
        $obj->setDVDID($handler->lastInsertId());

        $statement = $handler->prepare("INSERT INTO `product` (`SKU`, `productName`, `price`, `DVDID`, `FurnitureID`, `BookID`)
                                                        VALUES (:SKU, :productName, :price, :DVDID, :FurnitureID, :BookID)");
        $statement->bindValue(':SKU', $obj->getSKU(), PDO::PARAM_STR);
        $statement->bindValue(':productName', $obj->getProductName(), PDO::PARAM_STR);
        $statement->bindValue(':price', $obj->getPrice(), PDO::PARAM_STR);
        $statement->bindValue(':DVDID', $obj->getDVDID(), PDO::PARAM_INT);
        $statement->bindValue(':FurnitureID', null, PDO::PARAM_NULL);
        $statement->bindValue(':BookID', null, PDO::PARAM_NULL);
        $statement->execute();

        break;
    }
    case 'Furniture':
    {
        $obj = new Furniture(null, $_POST['SKU'], $_POST['productName'], $_POST['price'], null, $_POST['height'], $_POST['width'], $_POST['length']);
        $statement = $handler->prepare("INSERT INTO `furniture` (`furHeight`, `furWidth`, `furLength`)
                                                VALUES (:furHeight, :furWidth, :furLength)");
        $statement->bindValue(':furHeight', $obj->getFurHeight(), PDO::PARAM_STR);
        $statement->bindValue(':furWidth', $obj->getFurWidth(), PDO::PARAM_STR);
        $statement->bindValue(':furLength', $obj->getFurLength(), PDO::PARAM_STR);
        $statement->execute();
        $obj->setFurnitureID($handler->lastInsertId());


        $statement = $handler->prepare("INSERT INTO `product` (`SKU`, `productName`, `price`, `DVDID`, `FurnitureID`, `BookID`)
                                                        VALUES (:SKU, :productName, :price, :DVDID, :FurnitureID, :BookID)");
        $statement->bindValue(':SKU', $obj->getSKU(), PDO::PARAM_STR);
        $statement->bindValue(':productName', $obj->getProductName(), PDO::PARAM_STR);
        $statement->bindValue(':price', $obj->getPrice(), PDO::PARAM_STR);
        $statement->bindValue(':DVDID', null, PDO::PARAM_NULL);
        $statement->bindValue(':FurnitureID', $obj->getFurnitureID(), PDO::PARAM_INT);
        $statement->bindValue(':BookID', null, PDO::PARAM_NULL);
        $statement->execute();

        break;
    }

    case 'Book':
    {
        $obj = new  Book(null, $_POST['SKU'], $_POST['productName'], $_POST['price'], null, $_POST['KG']);
        $statement = $handler->prepare("INSERT INTO `book` (`KG`) VALUES (:KG)");
        $statement->bindValue(':KG', $obj->getKG(), PDO::PARAM_STR);
        $statement->execute();
        $obj->setBookID($handler->lastInsertId());

        $statement = $handler->prepare("INSERT INTO `product` (`SKU`, `productName`, `price`, `DVDID`, `FurnitureID`, `BookID`)
                                                        VALUES (:SKU, :productName, :price, :DVDID, :FurnitureID, :BookID)");
        $statement->bindValue(':SKU', $obj->getSKU(), PDO::PARAM_STR);
        $statement->bindValue(':productName', $obj->getProductName(), PDO::PARAM_STR);
        $statement->bindValue(':price', $obj->getPrice(), PDO::PARAM_STR);
        $statement->bindValue(':DVDID', null, PDO::PARAM_NULL);
        $statement->bindValue(':FurnitureID', null, PDO::PARAM_NULL);
        $statement->bindValue(':BookID', $obj->getBookID(), PDO::PARAM_INT);
        $statement->execute();

        break;
    }
}

echo 'OK';