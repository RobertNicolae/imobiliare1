<?php


namespace App\Entities\Offers;

require_once 'src/Entities/Offers/Offer.php';

class RentOffer extends Offer
{
private int $rentPeriod;
private int $guaranteeValue;
private string $freeFromDate;
private string $anaf;
protected int $commision;



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
     * @return string
     */
    public function getFreeFromDate(): string
    {
        return $this->freeFromDate;
    }

    /**
     * @param string $freeFromDate
     * @return RentOffer
     */
    public function setFreeFromDate(string $freeFromDate): RentOffer
    {
        $this->freeFromDate = $freeFromDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnaf(): int
    {
        return $this->anaf;
    }

    /**
     * @param int $anaf
     * @return RentOffer
     */
    public function setAnaf(int $anaf): RentOffer
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
    } // de facut LABELS



}