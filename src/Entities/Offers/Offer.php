<?php


namespace App\Entities\Offers;


use App\Entities\Client;
use App\Entities\Immobile\Immobile;
use App\Entities\Seller;
use DateTime;

abstract class Offer
{
    protected int $price;
    protected DateTime $deadline;
    private DateTime $freeFromDate;
    protected string $description = "";
    protected Immobile $immobil;
    protected Seller $seller;
    protected int $status;
    protected ?Client $clientGranted = null;

    public const STATUS_OFFER_PLACED = 1;
    public const STATUS_OFFER_FINISH = 2;
    public const STATUS_OFFER_EXPIRED = 3;
    public const STATUS_LABELS = [
        self::STATUS_OFFER_PLACED => "Oferta plasata",
        self::STATUS_OFFER_FINISH => "Oferta finalizata",
        self::STATUS_OFFER_EXPIRED => "Oferta expirata"

    ];


    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }


    /**
     * @param int $price
     * @return Offer
     */
    public function setPrice(int $price): Offer
    {
        $this->price = $price;
        return $this;
    }


    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Offer
     */
    public function setDescription(string $description): Offer
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Immobile
     */
    public function getImmobil(): Immobile
    {
        return $this->immobil;
    }

    /**
     * @param Immobile $immobil
     * @return Offer
     */
    public function setImmobil(Immobile $immobil): Offer
    {
        $this->immobil = $immobil;
        return $this;
    }

    /**
     * @return Seller
     */
    public function getSeller(): Seller
    {
        return $this->seller;
    }

    /**
     * @param Seller $seller
     * @return Offer
     */
    public function setSeller(Seller $seller): Offer
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Offer
     */
    public function setStatus(int $status): Offer
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDeadline(): DateTime
    {
        return $this->deadline;
    }

    /**
     * @param DateTime $deadline
     * @return Offer
     */
    public function setDeadline(DateTime $deadline): Offer
    {
        $this->deadline = $deadline;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFreeFromDate(): DateTime
    {
        return $this->freeFromDate;
    }

    /**
     * @param DateTime $freeFromDate
     * @return Offer
     */
    public function setFreeFromDate(DateTime $freeFromDate): Offer
    {
        $this->freeFromDate = $freeFromDate;
        return $this;
    }

    /**
     * @return Client|null
     */
    public function getClientGranted(): ?Client
    {
        return $this->clientGranted;
    }

    /**
     * @param Client|null $clientGranted
     * @return Offer
     */
    public function setClientGranted(?Client $clientGranted): Offer
    {
        $this->clientGranted = $clientGranted;
        return $this;
    }


}
