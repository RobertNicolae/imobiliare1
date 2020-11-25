<?php
require_once 'src/Entities/SimpleClient.php';
require_once 'src/Entities/PrivateClient.php';
require_once 'src/Entities/User.php';
require_once 'src/Entities/Immobile/Apartment.php';
require_once 'src/Services/OfferService.php';
require_once 'src/Services/AgencyService.php';
require_once 'src/Entities/Message.php';
require_once 'src/Entities/RealEstateDev.php';


use App\Entities\Agency;
use App\Entities\Immobile\Apartment;
use App\Entities\Message;
use App\Entities\Offers\Offer;
use App\Entities\Offers\SellOffer;
use App\Entities\RealEstateDev;
use App\Entities\SimpleClient;
use App\Entities\PrivateClient;
use App\Entities\User;
use App\Services\AgencyService;
use App\Services\OfferService;
use http\Client;

$privateClient = new PrivateClient();
$realestateDev = new RealEstateDev();

$privateClient
    ->setName("test")
    ->setEmail("test")
    ->setPassword("sidebands");
//echo $privateClient->getPassword();

$realestateDev
    ->setPassword("realestate2020");

$apartament = new Apartment();
$apartament->setComfort(Apartment::CONFORT_TYPE_1)
    ->setConstructYear(1924)
    ->setFloor(2)
    ->setAddress("aleea bicaz 20")
    ->setUsableArea(54)
    ->setPartitioning(Apartment::PARTITIONING_TYPE_1);


//echo Apartment::CONFORT_LABELS[$apartament->getComfort()];

$agencyService = new AgencyService();
$agency = $agencyService->createAgencyFromUser($privateClient, "ewrew", "rewrw", "rewrwe", "Alpha", "ANG");

$offerService = new OfferService();

$agencyrentOffer = $offerService->getAgencyRentOffer($agency, $apartament, 323, 12, 50);

//var_dump($agencyrentOffer);

$client = new SimpleClient();
$client->setName("barosanu")
    ->setEmail("eropjfisla@dsanjksa.ro")
    ->setAge(23)
    ->setCNP(1321312321414142121);


$messageToOffer = $offerService->messageToOffer($client, $agencyrentOffer, "blablab");

$realestateSellOffer = $offerService->getRealEstateSellOffer($realestateDev, $apartament, 100000, "Ap mare cu 49 camere", Offer::STATUS_TYPE_2, SellOffer::ACCEPT_CREDIT, 360);

//var_dump($realestateSellOffer);

$offerService->offerToClient($realestateSellOffer, $client);
var_dump($offerService->acceptSimpleOffer($client, $realestateSellOffer ));


