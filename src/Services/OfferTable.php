<?php


namespace App\Services;


use App\Entities\Immobile\Immobile;
use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;
use App\Entities\Offers\SellOffer;
use App\Util\Table;

class OfferTable extends Table
{
    protected array $headers = ['Offer type', 'Immobile price', 'Seller name', 'Offer status', 'Deadline', 'Description'];

    /**
     * @var Offer[]
     */
    protected array $offers = [];

    public function setOffers(array $offers): OfferTable
    {
        $this->offers = $offers;

        return $this;
    }


    protected function getRowsHtml(): string
    {
        $rowsHtml = '';
        foreach ($this->offers as $offer) {

            $rowsHtml .= $this->renderRow($this->getOfferRowElements($offer));
        }

        return $rowsHtml;
    }

    private function getOfferRowElements(Offer $offer): array
    {

        $offerService = new OfferService();

        return [
            $offerService->getOfferType($offer),
            $offer->getPrice(),
            $offer->getSeller(),
            Offer::STATUS_LABELS[$offer->getStatus()],
            $offer->getDeadline()->format('d/m/Y'),
            $offer->getDescription()
        ];
    }

    public function createTable(Offer $offer, Table $table)
    {
        $offerService = new OfferService();
        $table = new Table();
        if ($offerService->getOfferType($offer) === OfferService::OFFER_TYPE[OfferService::RENT_OFFER]) {
            $this->setTableForRentOffer($offer, $table);
        } else {
           $this->setTableForSellOffer($offer, $table);

        }
        return $table->getTable();

    }
    private function setTableForRentOffer(RentOffer $rentOffer, Table $table){
        $table->setHeaders(["Anaf", "Agency Comission", "FreeFromDate"]);
        $table->addRow([$rentOffer->isAnaf(), $rentOffer->getCommision(), $rentOffer->getFreeFromDate()->format("d/m/Y")]);
    }
    private function setTableForSellOffer(SellOffer $sellOffer, Table $table){
        $table->setHeaders((["Rate credit", "Negociat"]));
        $table->addRow([$sellOffer->getSeller(), $sellOffer->getPrice()]);
    }
}