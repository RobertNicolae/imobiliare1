<?php


namespace App\Services;


use App\Entities\User;

class UserBuilder
{
    public function setDefaultsDataOnUser(User $user, string $name, string $email, string $password): User {
        $user
            ->setName($name)
            ->setEmail($email)
            ->setPassword($password);

        return $user;
    }
}