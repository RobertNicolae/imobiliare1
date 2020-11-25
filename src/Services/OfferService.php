<?php


namespace App\Services;

require_once 'src/Entities/Offers/RentOffer.php';

use App\Entities\Agency;
use App\Entities\Client;
use App\Entities\Immobile\Immobile;
use App\Entities\Message;
use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;
use App\Entities\Offers\SellOffer;
use App\Entities\PrivateClient;
use App\Entities\RealEstateDev;
use App\Entities\SimpleClient;

class OfferService
{
    public function getAgencyRentOffer(Agency $agency, Immobile $immobile, float $basePrice, int $rentMonthsPeriod, int $commisionPercentage = 0): RentOffer
    {
        $agencyrentOffer = new RentOffer();
        $agencyrentOffer
            ->setSeller($agency)
            ->setPrice($basePrice)
            ->setImmobil($immobile)
            ->setRentPeriod($rentMonthsPeriod);

        if ($commisionPercentage) {
            $agencyrentOffer->setCommision($commisionPercentage);
        }

        return $agencyrentOffer;
    }

    public function getPrivateRentOffer(PrivateClient $privateClient, Immobile $immobile, float $basePrice, int $rentPeriod, int $guaranteeValue, string $freeFromDate, string $anaf, string $description, string $date): RentOffer
    {
        $privaterentOffer = new RentOffer();
        $privaterentOffer
            ->setSeller($privateClient)
            ->setImmobil($immobile)
            ->setPrice($basePrice)
            ->setRentPeriod($rentPeriod)
            ->setGuaranteeValue($guaranteeValue)
            ->setFreeFromDate($freeFromDate)
            ->setAnaf($anaf)
            ->setDescription($description)
            ->setDate($date);

            return $privaterentOffer;
    }

    public function getAgencySellOffer(Agency $agency, Immobile $immobile, float $basePrice, string $description): SellOffer
    {
        $agencysellOffer = new SellOffer();
        $agencysellOffer
            ->setSeller($agency)
            ->setImmobil($immobile)
            ->setPrice($basePrice)
            ->setDescription($description);


    return $agencysellOffer;
    }

    public function getRealEstateSellOffer(RealEstateDev $realEstateDev, Immobile $immobile, float $baseprice, string $descripton, int $acceptCredit = 0, int $monthPayments = 0):SellOffer
    {
        $realestateSellOffer = new SellOffer();
        $realestateSellOffer
            ->setSeller($realEstateDev)
            ->setImmobil($immobile)
            ->setPrice($baseprice)
            ->setDescription($descripton)
            ->setMonthPayments($monthPayments);
            if($acceptCredit){
                $realestateSellOffer->setAcceptCredit($acceptCredit);
                $realestateSellOffer->setMonthPayments($monthPayments);
            }

    return $realestateSellOffer;
    }

    public function messageToOffer(SimpleClient $client, Offer $offer, string $description): Message
    {
        $messageToOffer = new Message();
        $messageToOffer
            ->setDescription($description)
            ->setClient($client)
            ->setOffer($offer);

        return $messageToOffer;
    }
}