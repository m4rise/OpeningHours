<?php

namespace App\Entity;

use App\Classes\Day;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 */
class Restaurant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OpeningHours", mappedBy="restaurant")
     * @ORM\OrderBy({"day" = "ASC", "start" = "ASC"})
     */
    private $openingHours;

    public function __construct()
    {
        $this->openingHours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|OpeningHours[]
     */
    public function getOpeningHours(): Collection
    {
        return $this->openingHours;
    }

    public function addOpeningHour(OpeningHours $openingHour): self
    {
        if (!$this->openingHours->contains($openingHour)) {
            $this->openingHours[] = $openingHour;
            $openingHour->setRestaurant($this);
        }

        return $this;
    }

    public function removeOpeningHour(OpeningHours $openingHour): self
    {
        if ($this->openingHours->contains($openingHour)) {
            $this->openingHours->removeElement($openingHour);
            // set the owning side to null (unless already changed)
            if ($openingHour->getRestaurant() === $this) {
                $openingHour->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * Génère un tableau associatif sur une semaine de couple jour => horaires d'ouverture
     *
     */
    public function getFormattedWeekOpeningHours()
    {
        $weekOpenHours = $this->getOpeningHours();
        $weekDays = [];

        // regroupe les différents horaires du même jour sous la même clé
        foreach ($weekOpenHours as $openingHour) {
            /**@var $openingHour OpeningHours */
            if (null !== $openingHour->getStart() | null !== $openingHour->getEnd()) {
                $weekDays[$openingHour->getDay()][] = $openingHour->toStringFormat();
            } else {
                $weekDays[$openingHour->getDay()][] = 'Fermé';
            }
        }

        return array_combine(Day::getWeekDays(), $this->dayOpeningHoursToString($weekDays));
    }

    /**
     * Renvoie le tableau après avoir éclaté les tableaux de valeur associé à chaque clé en une chaine de
     * caractère
     *
     * @param array $dayOpeningHours
     *
     * @return array
     */
    private function dayOpeningHoursToString(array $dayOpeningHours): array
    {
        foreach ($dayOpeningHours as $key => $value) {
            $value = implode(', ', $value);
            $dayOpeningHours[$key] = $value;
        }

        return $dayOpeningHours;
    }
}
