<?php
require "../Utils/DatabaseUtils.php";
require "../Model/Entry.php";

//echo 'backend is working fine';
$dbobj = new DatabaseUtils();
$handler = $dbobj->connect();

$myQuery = $handler->query("SELECT `product`.`ID` as productID,
    `SKU`,
    `productName`,
    concat(`price`, ' $') as price,
    `DVDID`,
    `FurnitureID`,
    `BookID`,
    CASE
	WHEN `DVDID` IS NOT NULL THEN concat('Size: ', `MB`, ' MB')
    WHEN `FurnitureID` IS NOT NULL THEN concat('Dimension: ', `furHeight`, 'x', `furWidth`, 'x', `furLength`)
    WHEN `BookID` IS NOT NULL THEN concat('Weight: ', `KG`, 'KG')
    END as info
FROM `productdb`.`product`
left join `productdb`.`dvd` on `product`.`DVDID` = `dvd`.`ID`
left join `productdb`.`furniture` on `product`.`FurnitureID` = `furniture`.`ID`
left join `productdb`.`book` on `product`.`BookID` = `book`.`ID`;
");
$myQuery->setFetchMode(PDO::FETCH_CLASS, 'Entry');

$arr = array();
while ($row = $myQuery->fetch()){
  array_push($arr, $row);
}

echo json_encode($arr);