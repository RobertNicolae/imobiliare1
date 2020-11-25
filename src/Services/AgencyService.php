<?php


namespace App\Services;

require_once 'src/Entities/Agency.php';

use App\Entities\Agency;
use App\Entities\User;

class AgencyService
{
    public function createAgencyFromUser(User $user, string $cui, string $orc, string $iban, string $bankname, string $companyName): Agency
    {
        $agency = new Agency();
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