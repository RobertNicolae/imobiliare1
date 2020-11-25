<?php
require_once 'src/Entities/SimpleClient.php';
require_once 'src/Entities/PrivateClient.php';
require_once 'src/Entities/User.php';
require_once 'src/Entities/Immobile/Apartment.php';
require_once 'src/Services/OfferService.php';
require_once 'src/Services/AgencyService.php';
require_once 'src/Entities/Message.php';


use App\Entities\Agency;
use App\Entities\Immobile\Apartment;
use App\Entities\Message;
use App\Entities\SimpleClient;
use App\Entities\PrivateClient;
use App\Entities\User;
use App\Services\AgencyService;
use App\Services\OfferService;
use http\Client;

$privateClient = new PrivateClient();

$privateClient
    ->setName("test")
    ->setEmail("test")
    ->setPassword("sidebands");
//echo $privateClient->getPassword();

$apartament = new Apartment();
$apartament->setComfort(Apartment::CONFORT_TYPE_1);


//echo Apartment::CONFORT_LABELS[$apartament->getComfort()];

$agencyService = new AgencyService();
$agency = $agencyService->createAgencyFromUser($privateClient, "ewrew", "rewrw", "rewrwe", "Alpha", "ANG");

$offerService = new OfferService();

$agencyrentOffer = $offerService->getAgencyRentOffer($agency, $apartament, 323, 12, 50);

//var_dump($agencyrentOffer);

$client = new SimpleClient();
$client -> setName("barosanu")
        ->setEmail("eropjfisla@dsanjksa.ro")
    ->setAge(23)
    ->setCNP(1321312321414142121);


$messageToOffer = $offerService->messageToOffer($client, $agencyrentOffer, "blablab");

var_dump($messageToOffer);
