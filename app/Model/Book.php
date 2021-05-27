<?php


class Book extends Product
{
    private $BookID, $KG;

    /**
     * Book constructor.
     * @param $ID
     * @param $SKU
     * @param $productName
     * @param $price
     * @param $BookID
     * @param $KG
     */
    public function __construct($ID, $SKU, $productName, $price, $BookID, $KG)
    {
        parent::__construct($ID, $SKU, $productName, $price);
        $this->BookID = $BookID;
        $this->KG = $KG;
    }

    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->BookID;
    }

    /**
     * @param mixed $BookID
     */
    public function setBookID($BookID)
    {
        $this->BookID = $BookID;
    }

    /**
     * @return mixed
     */
    public function getKG()
    {
        return $this->KG;
    }

    /**
     * @param mixed $KG
     */
    public function setKG($KG)
    {
        $this->KG = $KG;
    }




}