<?php


namespace App\Entities;

require_once 'src/Entities/User.php';
abstract class Seller extends User
{
    protected string $CUI;
    protected string $ORC;
    protected string $companyName;
    protected string $IBAN;
    protected string $bankName;

    /**
     * @return string
     */
    public function getCUI(): string
    {
        return $this->CUI;
    }

    /**
     * @param string $CUI
     * @return Seller
     */
    public function setCUI(string $CUI): Seller
    {
        $this->CUI = $CUI;
        return $this;
    }

    /**
     * @return string
     */
    public function getORC(): string
    {
        return $this->ORC;
    }

    /**
     * @param string $ORC
     * @return Seller
     */
    public function setORC(string $ORC): Seller
    {
        $this->ORC = $ORC;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return Seller
     */
    public function setCompanyName(string $companyName): Seller
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIBAN(): string
    {
        return $this->IBAN;
    }

    /**
     * @param string $IBAN
     * @return Seller
     */
    public function setIBAN(string $IBAN): Seller
    {
        $this->IBAN = $IBAN;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     * @return Seller
     */
    public function setBankName(string $bankName): Seller
    {
        $this->bankName = $bankName;
        return $this;
    }

}