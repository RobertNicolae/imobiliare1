<?php


namespace App\Services;


use App\Entities\Immobile\Immobile;
use App\Entities\Offers\Offer;
use App\Entities\Offers\SellOffer;
use App\Entities\Seller;
use DateTime;

final class SellServices
{
    private OfferService $offerService;

    public function __construct()
    {
        $this->offerService = new OfferService();
    }

    public function createSellOffer(Seller $seller, Immobile $immobile, float $price, int $credit, DateTime $freeFromDate = null, DateTime $deadline = null, int $monthPayments = 0)
    {
        $sellOffer = new SellOffer();
        $this->offerService->setDetailsToOffer($seller, $immobile, $sellOffer, $price, $freeFromDate, $deadline);
        $sellOffer
            ->setPrice($price)
            ->setAcceptCredit($credit)
            ->setMonthPayments($monthPayments);

        return $sellOffer;
    }

}