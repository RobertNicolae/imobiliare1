<?php
require_once 'src/Entities/SimpleClient.php';
require_once 'src/Entities/PrivateClient.php';
require_once 'src/Entities/User.php';
require_once 'src/Entities/Immobile/Apartment.php';
require_once 'src/Services/OfferService.php';
require_once 'src/Services/AgencyService.php';
require_once 'src/Entities/Message.php';
require_once 'src/Entities/RealEstateDev.php';
require_once 'src/Services/RentServices.php';
require_once 'src/Services/SellServices.php';


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
use App\Services\RentServices;
use App\Services\SellServices;
use http\Client;

$privateClient = new PrivateClient();
$realestateDev = new RealEstateDev();

$date1 = new DateTime('May 13th, 1986');
$date2 = new DateTime('October 28th, 1989');
$difference = $date1->diff($date2);

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



$agencyService = new AgencyService();
$agency = $agencyService->createAgencyFromUser($privateClient, "ewrew", "rewrw", "rewrwe", "Alpha", "ANG");

$offerService = new OfferService();

$agencyrentOffer = $offerService->getAgencyRentOffer($agency, $apartament, 323, 12, 50);


$client = new SimpleClient();
$client->setName("barosanu")
    ->setEmail("eropjfisla@dsanjksa.ro")
    ->setAge(23)
    ->setCNP(1321312321414142121);


$realestateSellOffer = $offerService->getRealEstateSellOffer($realestateDev, $apartament, 100000, "Ap mare cu 49 camere", $date1, SellOffer::ACCEPT_CREDIT, 360);
$offerService->offerToClient($realestateDev, $apartament, $realestateSellOffer, $client, "Apartament 2020", 100000, "Alex");
//var_dump($realestateSellOffer);


$rentService = new RentServices();
$rentOff = $rentService->createRentOffer($agency, $apartament, 24, 500, true, 200);


$sellService = new SellServices();
$sellOff = $sellService->createSellOffer($realestateDev, $apartament, 100000, null, null, SellOffer::ACCEPT_CREDIT, 409);
var_dump($sellOff);


