<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParcelRepository")
 */
class Parcel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private $uuid;

    /**
     * @ORM\Column(length=1)
     */
    private $size;

    /**
     * @ORM\Column(length=100)
     */
    private $customerEmailAddress;

    /**
     * @ORM\Column(length=15)
     */
    private $deliveryKiosk;

    /**
     * @ORM\Column(type="datetimetz_immutable", nullable=true)
     */
    private $deliveredAt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $weight;
}
