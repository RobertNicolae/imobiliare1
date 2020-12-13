<?php


namespace App\Services;


use App\Entities\PrivateClient;

class PrivateClientBuilder
{
    protected UserBuilder $userBuilder;

    public function __construct()
    {
        $this->userBuilder = new UserBuilder();
    }

    public function createPrivateClient(string $name, string $email, string $password): PrivateClient
    {
        $privateClient = new PrivateClient();
        $this->userBuilder->setDefaultsDataOnUser($privateClient, $name, $email, $password);

        return $privateClient;
    }
}