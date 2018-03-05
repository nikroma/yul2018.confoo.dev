<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LockerRepository")
 */
class Locker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kiosk", inversedBy="lockers")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $kiosk;

    /**
     * @ORM\Column(length=3)
     */
    private $number;

    /**
     * @ORM\Column(length=1)
     */
    private $size;

    /**
     * @ORM\Column(length=20)
     */
    private $status;

    /**
     * @ORM\Column(length=6, nullable=true)
     */
    private $unlockCode;

    /**
     * @ORM\Column(type="datetimetz_immutable", nullable=true)
     */
    private $expiresAt;

    /**
     * @ORM\Column(type="uuid", nullable=true)
     */
    private $parcelUuid;
}
