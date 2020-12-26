<?php


namespace App\Entities\Immobile;


abstract class Immobile
{
    protected string $address;
    protected string $constructYear;
    protected string $noOfRooms;
    protected string $usableArea;
    protected string $totalArea;
    protected string $height;
    protected Structure $structure;
    protected int $type;

    public const TYPE_HOUSE = 1;
    public const TYPE_APARTMENT = 2;
    public const TYPE_LABELS = [
        self::TYPE_HOUSE => "House",
        self::TYPE_APARTMENT => "Apartment"

        ];

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Immobile
     */
    public function setType(int $type): Immobile
    {
        $this->type = $type;
        return $this;
    }


    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Immobile
     */
    public function setAddress(string $address): Immobile
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getConstructYear(): string
    {
        return $this->constructYear;
    }

    /**
     * @param string $constructYear
     * @return Immobile
     */
    public function setConstructYear(string $constructYear): Immobile
    {
        $this->constructYear = $constructYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getNoOfRooms(): string
    {
        return $this->noOfRooms;
    }

    /**
     * @param string $noOfRooms
     * @return Immobile
     */
    public function setNoOfRooms(string $noOfRooms): Immobile
    {
        $this->noOfRooms = $noOfRooms;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsableArea(): string
    {
        return $this->usableArea;
    }

    /**
     * @param string $usableArea
     * @return Immobile
     */
    public function setUsableArea(string $usableArea): Immobile
    {
        $this->usableArea = $usableArea;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalArea(): string
    {
        return $this->totalArea;
    }

    /**
     * @param string $totalArea
     * @return Immobile
     */
    public function setTotalArea(string $totalArea): Immobile
    {
        $this->totalArea = $totalArea;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @param string $height
     * @return Immobile
     */
    public function setHeight(string $height): Immobile
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return Structure
     */
    public function getStructure(): Structure
    {
        return $this->structure;
    }

    /**
     * @param Structure $structure
     * @return Immobile
     */
    public function setStructure(Structure $structure): Immobile
    {
        $this->structure = $structure;
        return $this;
    }

    /**
     * @return int
     */



}