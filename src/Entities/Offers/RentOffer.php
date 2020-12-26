<?php


namespace App\Entities\Offers;

use DateTime;

require_once 'src/Entities/Offers/Offer.php';

class RentOffer extends Offer
{
    protected int $rentPeriod;
    protected int $guaranteeValue;
    protected bool $anaf;
    protected int $commision = 0;


    /**
     * @return int
     */
    public function getRentPeriod(): int
    {
        return $this->rentPeriod;
    }

    /**
     * @param int $rentPeriod
     * @return RentOffer
     */
    public function setRentPeriod(int $rentPeriod): RentOffer
    {
        $this->rentPeriod = $rentPeriod;
        return $this;
    }

    /**
     * @return int
     */
    public function getGuaranteeValue(): int
    {
        return $this->guaranteeValue;
    }

    /**
     * @param int $guaranteeValue
     * @return RentOffer
     */
    public function setGuaranteeValue(int $guaranteeValue): RentOffer
    {
        $this->guaranteeValue = $guaranteeValue;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAnaf(): bool
    {
        return $this->anaf;
    }

    /**
     * @param bool $anaf
     * @return RentOffer
     */
    public function setAnaf(bool $anaf): RentOffer
    {
        $this->anaf = $anaf;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommision(): int
    {
        return $this->commision;
    }

    /**
     * @param int $commision
     * @return RentOffer
     */
    public function setCommision(int $commision): RentOffer
    {
        $this->commision = $commision;
        return $this;
    }












}