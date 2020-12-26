<?php


namespace App\Util;
require_once 'src/Entities/Offers/Offer.php';
require_once 'assets/css/style.css';

use App\Entities\Offers\Offer;
use App\Entities\Offers\SellOffer;
use App\Services\OfferService;

class Cards
{
    protected Offer $offer;
    protected $card = "";


    public function renderCard(Offer $offer)
    {
       $this->card = '<div class="card" >
              <div class="card-body">
                <h5 class="card-title">' . $offer->getSeller() . '</h5>
                <h6 class="card-subtitle mb-2 text-muted">' . $offer->getDescription() . '</h6>
                <p class="card-text"></p>
                <a href="#" class="card-link">' . $offer->getPrice() . ' RON</a>
                <a href="#" class="btn btn-primary">Vezi oferta</a>
                
              </div>
            </div>';
    return $this->card;
    }
public function populateSite(Array $offerList){
        $cardList = "";
        foreach ($offerList as $offer){
            $cardList .= $this->renderCard($offer);
        }
        return $cardList;
}

}



