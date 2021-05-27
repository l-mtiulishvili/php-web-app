<?php


class Furniture extends Product
{
    private $FurnitureID, $furHeight, $furWidth, $furLength;

    /**
     * Furniture constructor.
     * @param $ID
     * @param $SKU
     * @param $productName
     * @param $price
     * @param $FurnitureID
     * @param $furHeight
     * @param $furWidth
     * @param $furLength
     */
    public function __construct($ID, $SKU, $productName, $price, $FurnitureID, $furHeight, $furWidth, $furLength)
    {
        parent::__construct($ID, $SKU, $productName, $price);
        $this->FurnitureID = $FurnitureID;
        $this->furHeight = $furHeight;
        $this->furWidth = $furWidth;
        $this->furLength = $furLength;
    }

    /**
     * @return mixed
     */
    public function getFurnitureID()
    {
        return $this->FurnitureID;
    }

    /**
     * @param mixed $FurnitureID
     */
    public function setFurnitureID($FurnitureID)
    {
        $this->FurnitureID = $FurnitureID;
    }

    /**
     * @return mixed
     */
    public function getFurHeight()
    {
        return $this->furHeight;
    }

    /**
     * @param mixed $furHeight
     */
    public function setFurHeight($furHeight)
    {
        $this->furHeight = $furHeight;
    }

    /**
     * @return mixed
     */
    public function getFurWidth()
    {
        return $this->furWidth;
    }

    /**
     * @param mixed $furWidth
     */
    public function setFurWidth($furWidth)
    {
        $this->furWidth = $furWidth;
    }

    /**
     * @return mixed
     */
    public function getFurLength()
    {
        return $this->furLength;
    }

    /**
     * @param mixed $furLength
     */
    public function setFurLength($furLength)
    {
        $this->furLength = $furLength;
    }


}