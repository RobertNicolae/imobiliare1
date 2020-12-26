<?php
require_once 'src/Entities/SimpleClient.php';
require_once 'src/Entities/PrivateClient.php';
require_once 'src/Entities/User.php';
require_once 'src/Entities/Immobile/Apartment.php';
require_once 'src/Entities/Immobile/House.php';
require_once 'src/Services/OfferService.php';
require_once 'src/Services/AgencyService.php';
require_once 'src/Entities/Message.php';
require_once 'src/Entities/RealEstateDev.php';
require_once 'src/Services/RentServices.php';
require_once 'src/Services/SellServices.php';
require_once 'src/Services/UserBuilder.php';
require_once 'src/Services/PrivateClientBuilder.php';
require_once 'src/Entities/Offers/Offer.php';
require_once 'src/View/OfferView.php';

require_once 'src/Util/Table.php';
require_once 'src/Util/Cards.php';

use App\Entities\Immobile\Apartment;
use App\Entities\Immobile\House;
use App\Entities\Immobile\Immobile;
use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;
use App\Entities\Offers\SellOffer;
use App\Entities\RealEstateDev;
use App\Entities\Seller;
use App\Entities\SimpleClient;
use App\Services\AgencyService;
use App\Services\OfferService;
use App\Services\OfferTable;
use App\Services\PrivateClientBuilder;
use App\Services\RealEstateDevService;
use App\Services\RentServices;
use App\Services\SellServices;
use App\Util\Cards;
use App\Util\Table;
use App\View\OfferView;
use App\View\TableView;

$privateClientService = new PrivateClientBuilder();
$privateClient = $privateClientService->createPrivateClient("Robert", "test@test.ro", "12345");
$privateClient2 = $privateClientService->createPrivateClient('Cristian', 'cirstian@yahoo.com', 'cristi123');


$agencyService = new AgencyService();
$agency = $agencyService->createAgencyFromUser($privateClient, "ewrew", "rewrw", "rewrwe", "Alpha", "ANG");


$realEstateDev = new RealEstateDev();
$realEstateDev->setName("Cheloo");
$realEstateDev->setCompanyName('Consult Construct 2001');


$apartament = new Apartment();
$apartament
    ->setHeight("3")
    ->setTotalArea(120)
    ->setUsableArea(80)
    ->setNoOfRooms(4)
    ->setConstructYear(2019)
    ->setAddress("Pipera nr 1")
    ->setFloor(2)
    ->setComfort(Apartment::CONFORT_TYPE_1)
    ->setPrice(100000)
    ->setType(Immobile::TYPE_APARTMENT)
    ->setPartitioning(Apartment::PARTITIONING_TYPE_1);

$house = new House();
$house->setPrice(245000)
    ->setConstructYear(2020)
    ->setNoOfFronts(3)
    ->setType(Immobile::TYPE_HOUSE)
    ->setNoOfRooms(6)
    ->setAddress("Aleea bul 2")
    ->setLandAreaSurface(150);


$rentOfferService = new RentServices();
$sellOfferService = new SellServices();
$offerService = new OfferService();
$tableService = new Table();

$rentOfferOne = $rentOfferService->createPrivateClientRentOffer($privateClient, $apartament, 1200, 12, 1200, true, "Apartament oferit in chirie, cu 4 camere, zona pipera, 120mp constructie 2019", null, null);
$rentOfferOne->setCommision(50);
$sellOffer = $sellOfferService->createSellOffer($realEstateDev, $house, 100000, SellOffer::ACCEPT_CREDIT);
$offersList = [$rentOfferOne, $sellOffer];


?>
<html lang="en">
<head>
    <link href="/assets/css/style.css" rel="stylesheet"/>
</head>
<body>
<table id="" style="width:100%; text-align: left; font-size: 24px">

</table>


<?php


$card = new Cards();


require_once 'src/Services/OfferTable.php';

$offerTable = new OfferTable();

echo $offerTable
    ->setOffers($offersList)
    ->getTable();
$ImmobileDetails = new Table();
$ImmobileDetails->setHeaders(["Type", "Rooms", "Adress", "Price"]);

$ImmobileDetails->addRow([Immobile::TYPE_LABELS[$rentOfferOne->getImmobil()->getType()], $rentOfferOne->getImmobil()->getNoOfRooms(), $rentOfferOne->getImmobil()->getAddress(), $rentOfferOne->getPrice()]);
$ImmobileDetails->addRow([Immobile::TYPE_LABELS[$sellOffer->getImmobil()->getType()], $sellOffer->getImmobil()->getNoOfRooms(), $sellOffer->getImmobil()->getAddress(), $sellOffer->getPrice()]);
echo $ImmobileDetails->getTable();



foreach ($offersList as $offer) {
     echo OfferView::renderOfferCard($offer);
}

$dettable = new Table();
echo $offerTable->createTable($rentOfferOne, $dettable);

?>

<table id="" style="width:100%; text-align: left; font-size: 24px">
    <?php if ($offerService->getOfferType($rentOfferOne) === OfferService::RENT_OFFER) { ?>
        <tr>
            <th>Rent period</th>
            <th>Guarantee value (&euro;)</th>
        </tr>
        <tr>
            <td><?= $rentOfferOne->getRentPeriod() ?></td>
            <td><?= $rentOfferOne->getGuaranteeValue() ?></td>
        </tr>
    <?php } else { ?>
        <tr>
            <th>Month payments</th>
        </tr>
        <tr>
            <td><?= $rentOfferOne->getRentPeriod() ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>

