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

    /**
     * @ORM\Column(type="decimal", precision=7, scale=4)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=4)
     */
    private $longitude;

    public function __construct(
        string $name,
        int $numberOfLockers,
        string $street1,
        string $street2,
        string $zipCode,
        string $cityName,
        float $latitude,
        float $longitude
    ) {
        $this->setName($name);
        $this->numberOfLockers = $numberOfLockers;
        $this->numberOfAvailableLockers = $numberOfLockers;
        $this->numberOfOccupiedLockers = 0;
        $this->street1 = $street1;
        $this->street2 = $street2;
        $this->zipCode = $zipCode;
        $this->setCity($cityName, $zipCode);
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    private function setName(string $name): void
    {
        $this->name = ucfirst($name);
        $this->slug = strtolower($name);
    }

    private function setCity(string $cityName, string $zipCode): void
    {
        $this->cityName = $cityName;
        $this->citySlug = sprintf(
            '%s-%s',
            substr($zipCode, 0, 2),
            preg_replace(
                '/[^a-z]/',
                '-',
                transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $cityName)
            )
        );
    }
}
