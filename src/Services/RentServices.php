<?php


namespace App\Services;


use App\Entities\Agency;
use App\Entities\Immobile\Immobile;
use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;
use App\Entities\PrivateClient;
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

    /**
     * Create an agency offer: a guarantee month is equal with a month of rent
     *
     * @param Agency $agency
     * @param Immobile $immobile
     * @param float $price
     * @param int $rentPeriod
     * @return RentOffer
     */
    public function createAgencyRentOffer(Agency $agency, Immobile $immobile, float $price, int $rentPeriod): RentOffer
    {
        return $this->createRentOffer($agency, $immobile, $price, $rentPeriod, $price, true, $agency->getRentCommission());
    }

    public function createPrivateClientRentOffer(PrivateClient $privateClient, Immobile $immobile, float $basePrice, int $rentPeriod, int $guaranteeValue, bool $anaf, string $description, DateTime $freeFromDate = null, DateTime $deadline = null): RentOffer
    {
        $privateRentOffer = $this->createRentOffer($privateClient, $immobile, $basePrice, $rentPeriod, $guaranteeValue, $anaf, 0, $freeFromDate, $deadline);
        $privateRentOffer->setDescription($description);

        return $privateRentOffer;
    }

    private function createRentOffer(Seller $seller, Immobile $immobile, float $price, int $rentPeriod, int $guaranteeValuee, bool $anaf, int $commision, DateTime $freeFromDate = null, DateTime $deadline = null)
    {
        $rentOffer = new RentOffer();
        $this->offerService->setDetailsToOffer($seller, $immobile, $rentOffer, $price, $freeFromDate, $deadline);
        $rentOffer
            ->setRentPeriod($rentPeriod)
            ->setGuaranteeValue($guaranteeValuee)
            ->setAnaf($anaf)
            ->setCommision($commision);

        return $rentOffer;
    }
}