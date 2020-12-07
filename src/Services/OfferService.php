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
use DateTime;
use Exception;

class OfferService
{
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

    /**
     * @param Offer $offer
     * @param Client $client
     * @throws Exception
     */
    public function offerToClient(Offer $offer, Client $client): void
    {
        if ($offer->getStatus() === Offer::STATUS_OFFER_PLACED) {
            $offer
                ->setStatus(Offer::STATUS_OFFER_FINISH)
                ->setClientGranted($client);
        } else {
            throw new Exception("This offer already has a granted client " . $offer->getClientGranted()->getName());
        }
    }


    public function setDetailsToOffer(Seller $seller, Immobile $immobile, Offer $offer, int $price, DateTime $freeFromDate = null, DateTime $deadLine = null): Offer
    {
        $offer
            ->setSeller($seller)
            ->setStatus(Offer::STATUS_OFFER_PLACED)
            ->setImmobil($immobile)
            ->setPrice($price);

        if ($freeFromDate) {
            $offer->setFreeFromDate($freeFromDate);
        } else {
            $offer->setFreeFromDate($this->getFreeNowDate());
        }
        if ($deadLine) {
            $offer->setDeadline($deadLine);
        } else {
            $offer->setDeadline($this->getDefaultDeadline());
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