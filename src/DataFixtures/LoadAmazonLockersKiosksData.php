<?php

namespace App\DataFixtures;

use App\Entity\Kiosk;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAmazonLockersKiosksData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = json_decode(
            file_get_contents(__DIR__.'/../../data/amazon-lockers-kiosks.json'),
            true
        );

        foreach ($data as $rawData) {
            $kiosk = $this->createKiosk($rawData);
            $manager->persist($kiosk);
        }

        $manager->flush();
    }

    private function createKiosk(array $data): Kiosk
    {
        return new Kiosk(
            $data['name'],
            $data['layout'],
            $data['address']['street1'],
            $data['address']['street2'],
            $data['address']['zipCode'],
            $data['address']['city'],
            $data['coordinates']['lat'],
            $data['coordinates']['lng']
        );
    }
}
