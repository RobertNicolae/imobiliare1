<?php


namespace App\Entities\Immobile;

require_once 'src/Entities/Immobile/Immobile.php';

class Apartment extends Immobile
{
    public const CONFORT_TYPE_1 = 1;
    public const CONFORT_TYPE_2 = 2;
    public const CONFORT_TYPE_3 = 3;
    public const CONFORT_TYPE_4 = 4;
    public const CONFORT_LABELS = [
        self::CONFORT_TYPE_1 => "Confort 1",
        self::CONFORT_TYPE_2 => "Confort 2",
        self::CONFORT_TYPE_3 => "Confort 3",
        self::CONFORT_TYPE_4 => "Confort LUX"
    ];
    public const PARTITIONING_TYPE_1 = 1;
    public const PARTITIONING_TYPE_2 = 2;
    public const PARTITIONING_TYPE_3 = 3;
    public const PARTITIONING_LABELS = [
        self::PARTITIONING_TYPE_1 => "SemiDecomandat",
        self::PARTITIONING_TYPE_2 => "Decomandat",
        self::PARTITIONING_TYPE_3 => "Vagon"
    ];
    private int $partitioning;
    private int $comfort;
    private string $floor;


    /**
     * @return string
     */
    public function getPartitioning(): string
    {
        return $this->partitioning;
    }

    /**
     * @param string $partitioning
     * @return Apartment
     */
    public function setPartitioning(string $partitioning): Apartment
    {
        $this->partitioning = $partitioning;
        return $this;
    }

    /**
     * @return string
     */
    public function getComfort(): string
    {
        return $this->comfort;
    }

    /**
     * @param string $comfort
     * @return Apartment
     */
    public function setComfort(string $comfort): Apartment
    {
        $this->comfort = $comfort;
        return $this;
    }

    /**
     * @return string
     */
    public function getFloor(): string
    {
        return $this->floor;
    }

    /**
     * @param string $floor
     * @return Apartment
     */
    public function setFloor(string $floor): Apartment
    {
        $this->floor = $floor;
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
     * @return Apartment
     */
    public function setHeight(string $height): Apartment
    {
        $this->height = $height;
        return $this;
    }


}