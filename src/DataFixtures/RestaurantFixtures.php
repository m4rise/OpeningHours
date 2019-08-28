<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $restaurantNames = [
            "Le bon séjour",
            "Food Express",
            "Palais d'Asie"
        ];

        for ($i = 0, $r = count($restaurantNames); $i < $r; $i++) {
            $restaurant = (new Restaurant())
                ->setName($restaurantNames[$i]);
            $this->addReference('restaurant_'.$i, $restaurant);
            $manager->persist($restaurant);
        }

        $manager->flush();
    }
}
