<?php


namespace App\View;


use App\Entities\Offers\Offer;

class OfferView
{
    public static function renderOfferCard(Offer $offer): string
    {
        return '
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">' . $offer->getImmobil()->getAddress() . '</h5>
                <h6 class="card-subtitle mb-2 text-muted">' . $offer->getDescription() . '</h6>
                <p class="card-text"></p>
                <a href="#" class="card-link">' . $offer->getPrice() . ' RON</a>
                <a href="#" class="card-link">Vezi oferta</a>
              </div>
            </div>
        ';
    }
}