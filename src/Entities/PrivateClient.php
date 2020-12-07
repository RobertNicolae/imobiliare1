<?php


namespace App\Entities;

require_once 'src/Entities/Seller.php';

class PrivateClient extends Seller
{
    protected string $CNP;
    protected string $status;
    protected int $age;

    /**
     * @return string
     */
    public function getCNP(): string
    {
        return $this->CNP;
    }

    /**
     * @param string $CNP
     */
    public function setCNP(string $CNP): void
    {
        $this->CNP = $CNP;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @param string $age
     */
    public function setAge(string $age): void
    {
        $this->age = $age;
    }


}