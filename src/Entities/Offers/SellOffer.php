<?php


namespace App\Entities\Offers;


use DateTime;

class SellOffer extends Offer
{

    protected int $monthPayments; //
    protected string $type = "SELL";

    public const ACCEPT_CREDIT = 1;
    public const NO_CREDIT = 0;
    public const CREDIT_LABELS = [
        self::ACCEPT_CREDIT => "DA",
        self::NO_CREDIT => "NU"
    ];


    /**
     * @return int
     */
    public function getAcceptCredit(): int
    {
        return $this->acceptCredit;
    }

    /**
     * @param int $acceptCredit
     * @return SellOffer
     */
    public function setAcceptCredit(int $acceptCredit): SellOffer
    {
        $this->acceptCredit = $acceptCredit;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonthPayments(): int
    {
        return $this->monthPayments;
    }

    /**
     * @param int $monthPayments
     * @return SellOffer
     */
    public function setMonthPayments(int $monthPayments): SellOffer
    {
        $this->monthPayments = $monthPayments;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }




}