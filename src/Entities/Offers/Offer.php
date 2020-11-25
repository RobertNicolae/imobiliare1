<?php


namespace App\Entities\Offers;


use App\Entities\Immobile\Immobile;
use App\Entities\Seller;
use App\Entities\User;

abstract class Offer
{
    protected int $price;
    protected string $date;
    protected string $description;
    protected Immobile $immobil;
    protected Seller $seller;


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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Offer
     */
    public function setDate(string $date): Offer
    {
        $this->date = $date;
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


}