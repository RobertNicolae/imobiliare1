<?php


namespace App\Entities\Immobile;


abstract class Structure
{
protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Structure
     */
    public function setName(string $name): Structure
    {
        $this->name = $name;
        return $this;
    }


}