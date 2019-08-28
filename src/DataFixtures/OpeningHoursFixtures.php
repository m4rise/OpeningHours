<?php

namespace App\DataFixtures;

use App\Entity\OpeningHours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class OpeningHoursFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $timeSlots = [
            'morning' => [
                'start' => ['11:00', '11:30', '12:00'],
                'end' => ['13:00','13:30','14:00']
            ],
            'evening' => [
                    'start' => ['18:30', '19:00', '19:30'],
                    'end' => ['20:00','21:00','22:00']
                ],
        ];
        $ms = $timeSlots['morning']['start'];
        $me = $timeSlots['morning']['end'];
        $es = $timeSlots['evening']['start'];
        $ee = $timeSlots['evening']['end'];

        // pour les 3 restaurants
        for ($i=0; $i<3; $i++) {
            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::MONDAY)
                ->setStart($es[$i])
                ->setEnd($ee[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::TUESDAY)
                ->setStart($ms[$i])
                ->setEnd($me[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::TUESDAY)
                ->setStart($es[$i])
                ->setEnd($ee[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::WEDNESDAY)
                ->setStart($ms[$i])
                ->setEnd($me[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::WEDNESDAY)
                ->setStart($es[$i])
                ->setEnd($ee[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::THURSDAY)
                ->setStart($ms[$i])
                ->setEnd($me[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::THURSDAY)
                ->setStart($es[$i])
                ->setEnd($ee[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::FRIDAY)
                ->setStart($ms[$i])
                ->setEnd($me[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::FRIDAY)
                ->setStart($es[$i])
                ->setEnd($ee[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::SATURDAY)
                ->setStart($ms[$i])
                ->setEnd($me[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::SATURDAY)
                ->setStart($es[$i])
                ->setEnd($ee[$i]);
            $manager->persist($oh);

            $oh = (new OpeningHours())
                ->setRestaurant($this->getReference('restaurant_'.$i))
                ->setDay(OpeningHours::SUNDAY);
            $manager->persist($oh);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          RestaurantFixtures::class
        ];
    }
}
