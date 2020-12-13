<?php


namespace App\Services;


use App\Entities\SimpleClient;
use App\Entities\User;

class SimpleClientService
{
public function createSimpleClientFromUser(User $user, string $cnp, int $age, string $name, string $email): SimpleClient {

        $simpleClient = new SimpleClient();
        $simpleClient
            ->setName($user->getName())
            ->setEmail($user->getEmail())
            ->setCNP($cnp)
            ->setAge($age);
        return $simpleClient;
    }

}