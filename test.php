<?php

use App\Entities\Agency;

function sayWelcome(A $a): void
{
    $a->name = "test";
}

class A
{
    public string $name;
}


$a = new A();

$a->name = "Robert";

$b = $a;

sayWelcome($b);
echo $a->name;

$agency = new Agency();
