<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/{id}", name="restaurant.show")
     */
    public function show(Restaurant $restaurant)
    {
        $weekOpeningHours = $restaurant->getFormattedWeekOpeningHours();
        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $restaurant,
            'weekOpeningHours' => $weekOpeningHours
        ]);
    }
}
