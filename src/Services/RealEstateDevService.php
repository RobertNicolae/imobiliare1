<?php


namespace App\Services;
require_once 'src/Entities/RealEstateDev.php';

use App\Entities\RealEstateDev;
use App\Entities\User;

class RealEstateDevService
{
    public function createDevFromUser(User $user, string $cui, string $orc, string $iban, string $bankname, string $companyName): RealEstateDev
    {
        $agency = new RealEstateDev();
        $agency
            ->setName($user->getName())
            ->setEmail($user->getEmail())
            ->setCUI($cui)
            ->setORC($orc)
            ->setBankName($bankname)
            ->setCompanyName($companyName)
            ->setIBAN($iban);
        return $agency;
    }
}