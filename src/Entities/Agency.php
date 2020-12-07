<?php


namespace App\Entities;

require_once 'src/Entities/Seller.php';

class Agency extends Seller
{
    public const DEFAULT_RENT_COMMISSION = 50;

    protected int $rentCommission;

    /**
     * @return int
     */
    public function getRentCommission(): int
    {
        return $this->rentCommission;
    }

    /**
     * @param int $rentCommission
     * @return Agency
     */
    public function setRentCommission(int $rentCommission): Agency
    {
        $this->rentCommission = $rentCommission;
        return $this;
    }
}