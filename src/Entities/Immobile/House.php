<?php


namespace App\Entities\Immobile;

require_once 'src/Entities/Immobile/Immobile.php';

class House extends Immobile
{
    private int $landAreaSurface;
    private int $noOfFronts;
    private int $ExitFrontSurface;

    /**
     * @return int
     */
    public function getLandAreaSurface(): int
    {
        return $this->landAreaSurface;
    }

    /**
     * @param int $landAreaSurface
     * @return House
     */
    public function setLandAreaSurface(int $landAreaSurface): House
    {
        $this->landAreaSurface = $landAreaSurface;
        return $this;
    }

    /**
     * @return int
     */
    public function getNoOfFronts(): int
    {
        return $this->noOfFronts;
    }

    /**
     * @param int $noOfFronts
     * @return House
     */
    public function setNoOfFronts(int $noOfFronts): House
    {
        $this->noOfFronts = $noOfFronts;
        return $this;
    }

    /**
     * @return int
     */
    public function getExitFrontSurface(): int
    {
        return $this->ExitFrontSurface;
    }

    /**
     * @param int $ExitFrontSurface
     * @return House
     */
    public function setExitFrontSurface(int $ExitFrontSurface): House
    {
        $this->ExitFrontSurface = $ExitFrontSurface;
        return $this;
    }


}