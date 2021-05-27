<?php


class DatabaseUtils
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect()
    {
        $this->servername = '127.0.0.1';
        $this->username = 'root';
        $this->password = '2001';
        $this->dbname = 'productdb';
        $this->charset = 'utf8mb4';

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}
/*
 create table `productdb`.`dvd`(
ID int primary key auto_increment,
MB float not null
);

create table `productdb`.`furniture`(
ID int primary key auto_increment,
furHeight float not null,
furWidth float not null,
furLength float not null
);

create table `productdb`.`book`(
ID int primary key auto_increment,
KG float not null
);

create table `productdb`.`product`(
ID int primary key auto_increment,
SKU varchar(50) not null,
productName varchar(50) not null,
price float not null,
DVDID int,
FurnitureID int,
BookID int,
CONSTRAINT FK_Product_DVD FOREIGN KEY (DVDID)
    REFERENCES `productdb`.`dvd`(ID),
CONSTRAINT FK_Product_Furniture FOREIGN KEY (FurnitureID)
    REFERENCES `productdb`.`furniture`(ID),
CONSTRAINT FK_Product_Book FOREIGN KEY (BookID)
    REFERENCES `productdb`.`book`(ID)
);
 */