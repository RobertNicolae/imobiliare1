<?php


namespace App\Entities;
require_once 'src/Entities/PrivateClient.php';
require_once 'src/Entities/Client.php';

class SimpleClient extends Client
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
     * @return SimpleClient
     */
    public function setCNP(string $CNP): SimpleClient
    {
        $this->CNP = $CNP;
        return $this;
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
     * @return SimpleClient
     */
    public function setStatus(string $status): SimpleClient
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return SimpleClient
     */
    public function setAge(int $age): SimpleClient
    {
        $this->age = $age;
        return $this;
    }

}