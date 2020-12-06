<?php


namespace App\Services;

require_once 'src/Entities/Offers/RentOffer.php';
require_once 'src/Entities/Offers/SellOffer.php';

use App\Entities\Agency;
use App\Entities\Client;
use App\Entities\Immobile\Immobile;
use App\Entities\Message;
use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;
use App\Entities\Offers\SellOffer;
use App\Entities\PrivateClient;
use App\Entities\RealEstateDev;
use App\Entities\Seller;
use App\Entities\SimpleClient;
use Cassandra\Date;
use DateTime;

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

    public function getPrivateRentOffer(PrivateClient $privateClient, Immobile $immobile, float $basePrice, int $rentPeriod, int $guaranteeValue, DateTime $freeFromDate, string $anaf, string $description, string $date): RentOffer
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
            ->setFreeFromDate($freeFromDate);

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

    public function getRealEstateSellOffer(RealEstateDev $realEstateDev, Immobile $immobile, float $baseprice, string $descripton, DateTime $deadline, int $acceptCredit = 0, int $monthPayments = 0): SellOffer
    {
        $realestateSellOffer = new SellOffer();
        $realestateSellOffer
            ->setSeller($realEstateDev)
            ->setStatus(Offer::STATUS_OFFER_PLACED)
            ->setImmobil($immobile)
            ->setPrice($baseprice)
            ->setDescription($descripton)
            ->setDeadline($deadline);





        if ($acceptCredit) {
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

    public function offerToClient(Seller $seller, Immobile $immobile, Offer $offer, Client $client, $description, $price, $name): Offer
    {
        $offer->setImmobil($immobile)
            ->setSeller($seller)
            ->setDescription($description)
            ->setPrice($price);
        $client->setName($name);


        return $offer;
    }



    public function setDetailsToOffer(Seller $seller, Immobile $immobile, Offer $offer, DateTime $freeFromDate = null, DateTime $deadLine = null ): Offer
    {
        $offer
            ->setSeller($seller)
            ->setStatus(Offer::STATUS_OFFER_PLACED)
            ->setImmobil($immobile);



        if ($freeFromDate) {
            $offer->setFreeFromDate($freeFromDate);
        } else {
            $offer->setFreeFromDate($this->getFreeNowDate());
        }
    if($deadLine){
        $offer->setDeadline($deadLine);
    } else {
        $this->getDefaultDeadline();
    }
        return $offer;
    }




    private function getDefaultDeadline(): DateTime
    {
        return new DateTime('+30 days');
    }
    private function getFreeNowDate(): DateTime
    {
        return new DateTime();
    }

}