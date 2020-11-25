<?php


namespace App\Entities;


use App\Entities\Offers\Offer;
use App\Entities\Offers\RentOffer;

class Message
{
 protected string $description;
 protected SimpleClient $client;
 protected RentOffer $offer;
 /**
 * @return string
 */
public function getDescription(): string
{
    return $this->description;
}/**
 * @param string $description
 * @return Message
 */
public function setDescription(string $description): Message
{
    $this->description = $description;
    return $this;
}/**
 * @return Client
 */
public function getClient(): Client
{
    return $this->client;
}/**
 * @param Client $client
 * @return Message
 */
public function setClient(SimpleClient  $client): Message
{
    $this->client = $client;
    return $this;
}/**
 * @return Offer
 */
public function getOffer(): Offer
{
    return $this->offer;
}/**
 * @param Offer $offer
 * @return Message
 */
public function setOffer(RentOffer $offer): Message
{
    $this->offer = $offer;
    return $this;
}


}