<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KioskRepository")
 * @ORM\Table(
 *   uniqueConstraints={
 *     @ORM\UniqueConstraint(name="kiosk_slug_unique", columns="slug")
 *   }
 * )
 */
class Kiosk
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(length=15)
     */
    private $name;

    /**
     * @ORM\Column(length=15)
     */
    private $slug;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberOfLockers;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberOfAvailableLockers;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberOfOccupiedLockers;

    /**
     * @ORM\Column(length=100)
     */
    private $street1;

    /**
     * @ORM\Column(length=100)
     */
    private $street2;

    /**
     * @ORM\Column(length=5)
     */
    private $zipCode;

    /**
     * @ORM\Column(length=50)
     */
    private $cityName;

    /**
     * @ORM\Column(length=50)
     */
    private $citySlug;

    /**
     * @ORM\OneToMany(
     *   targetEntity="App\Entity\Locker",
     *   mappedBy="kiosk",
     *   cascade={"all"}
     * )
     * @ORM\OrderBy({"number": "ASC"})
     */
    private $lockers;
}
