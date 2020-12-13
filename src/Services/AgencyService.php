<?php


namespace App\Services;

require_once 'src/Entities/Agency.php';

use App\Entities\Agency;
use App\Entities\User;

class AgencyService
{
    protected UserBuilder $userBuilder;

    public function __construct()
    {
        $this->userBuilder = new UserBuilder();
    }

    public function createAgencyFromUser(User $user, string $cui, string $orc, string $iban, string $bankname, string $companyName, int $commissionValue = Agency::DEFAULT_RENT_COMMISSION): Agency
    {
        $agency = new Agency();

        $this->userBuilder->setDefaultsDataOnUser($agency, $user->getName(), $user->getEmail(), $user->getPassword());

        $agency
            ->setCUI($cui)
            ->setORC($orc)
            ->setBankName($bankname)
            ->setCompanyName($companyName)
            ->setIBAN($iban)
            ->setRentCommission($commissionValue);
        return $agency;
    }
}