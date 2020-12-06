<?php


namespace App\Services;


use App\Entities\Agency;
use App\Entities\Immobile\Immobile;
use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;
use App\Entities\Seller;
use App\Services\OfferService;
use DateTime;

final class RentServices
{
    private OfferService $offerService;

    public function __construct()
    {
        $this->offerService = new OfferService();
    }


    public function createRentOffer(Seller $seller, Immobile $immobile, int $rentPeriod, int $guaranteeValuee, bool $anaf, int $commision, DateTime $freeFromDate = null, DateTime $deadline = null)
    {
        $rentOffer = new RentOffer();
        $this->offerService->setDetailsToOffer($seller, $immobile, $rentOffer, $freeFromDate, $deadline);
        $rentOffer
            ->setRentPeriod($rentPeriod)
            ->setGuaranteeValue($guaranteeValuee)
            ->setAnaf($anaf)
            ->setCommision($commision);


    return $rentOffer;
    }
}