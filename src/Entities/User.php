<?php


namespace App\Entities;


abstract class User
{
    protected string $name;
    protected string $email;
    protected string $password;

    public function __toString() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): User
    {
        $this->password = $this->cryptPassword($password);
        return $this;
    }

    protected function cryptPassword(string $password): string
    {
        return sha1($password . strtotime("now"));
    }
}