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
require_once 'src/Services/UserBuilder.php';
require_once 'src/Services/PrivateClientBuilder.php';

use App\Entities\Immobile\Apartment;
use App\Entities\SimpleClient;
use App\Services\AgencyService;
use App\Services\OfferService;
use App\Services\PrivateClientBuilder;
use App\Services\RentServices;

$privateClientService = new PrivateClientBuilder();
$privateClient = $privateClientService->createPrivateClient("Robert", "test@test.ro", "12345");

$agencyService = new AgencyService();
$agency = $agencyService->createAgencyFromUser($privateClient, "ewrew", "rewrw", "rewrwe", "Alpha", "ANG");

$apartament = new Apartment();
$apartament->setComfort(Apartment::CONFORT_TYPE_1)
    ->setConstructYear(1924)
    ->setFloor(2)
    ->setAddress("aleea bicaz 20")
    ->setUsableArea(54)
    ->setPartitioning(Apartment::PARTITIONING_TYPE_1);

$rentOfferService = new RentServices();
$offerService = new OfferService();

$rentOfferOne = $rentOfferService->createPrivateClientRentOffer($privateClient, $apartament, 1200, 12, 1200, true, "Test");
$rentOfferTwo = $rentOfferService->createPrivateClientRentOffer($privateClient, $apartament, 2500, 12, 1200, true, "Test");
$rentOfferThree = $rentOfferService->createPrivateClientRentOffer($privateClient, $apartament, 1800, 24, 1200, true, "Test");
$rentOfferFour = $rentOfferService->createPrivateClientRentOffer($privateClient, $apartament, 4000, 24, 1200, true, "Test");

$offers = [$rentOfferOne, $rentOfferTwo, $rentOfferThree, $rentOfferFour];
