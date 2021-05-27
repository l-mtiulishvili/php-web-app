<?php
require "../Utils/DatabaseUtils.php";

//$productIDArr = $_POST['productIDArr'];
//$DVDIDArr = $_POST['DVDIDArr'];
//$FurnitureIDArr = $_POST['FurnitureIDArr'];
//$BookIDArr = $_POST['BookIDArr'];

/*
print_r($productIDArr);
print_r($DVDIDArr);
print_r($FurnitureIDArr);
print_r($BookIDArr);
*/
$dbobj = new DatabaseUtils();
$handler = $dbobj->connect();
$helper = "";
$script = "";
if (isset($_POST['productIDArr'])){
    $productIDArr = $_POST['productIDArr'];
    $helper = join(", ", $productIDArr);
    $script = "delete from `product` where `ID` IN (".$helper.")";
    $statement = $handler->prepare($script);
    $statement->execute();
}


if(isset($_POST['DVDIDArr'])){
    $DVDIDArr = $_POST['DVDIDArr'];
    $helper = join(", ", $DVDIDArr);
    $script = "delete from `dvd` where `ID` IN (".$helper.")";
    $statement = $handler->prepare($script);
    $statement->execute();
}

if(isset($_POST['FurnitureIDArr'])){
    $FurnitureIDArr = $_POST['FurnitureIDArr'];
    $helper = join(", ", $FurnitureIDArr);
    $script = "delete from `furniture` where `ID` IN (".$helper.")";
    $statement = $handler->prepare($script);
    $statement->execute();
}

if (isset($_POST['BookIDArr'])){
    $BookIDArr = $_POST['BookIDArr'];
    $helper = join(", ", $BookIDArr);
    $script = "delete from `book` where `ID` IN (".$helper.")";
    $statement = $handler->prepare($script);
    $statement->execute();
}

echo 'OK';
