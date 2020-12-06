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

public function __construct(){
    $this->offerService = new OfferService();
}

public function createSellOffer(Seller $seller, Immobile $immobile, $price, DateTime $freeFromDate = null, DateTime $deadline = null, int $credit, int $monthPayments = 0)
{
$sellOffer = new SellOffer();
$this->offerService->setDetailsToOffer($seller, $immobile, $sellOffer, $freeFromDate, $deadline);
$sellOffer
    ->setPrice($price)
    ->setAcceptCredit($credit);
    if($monthPayments) {
        $sellOffer->setMonthPayments($monthPayments);
    } else {
        $sellOffer->setMonthPayments(0);
    }
    return $sellOffer;
}

}