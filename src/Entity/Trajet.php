<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrajetRepository::class)]
class Trajet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pointDepart = null;

    #[ORM\Column(length: 255)]
    private ?string $pointArrivee = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDepart = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $placeDisponibles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointDepart(): ?string
    {
        return $this->pointDepart;
    }

    public function setPointDepart(string $pointDepart): static
    {
        $this->pointDepart = $pointDepart;

        return $this;
    }

    public function getPointArrivee(): ?string
    {
        return $this->pointArrivee;
    }

    public function setPointArrivee(string $pointArrivee): static
    {
        $this->pointArrivee = $pointArrivee;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): static
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPlaceDisponibles(): ?int
    {
        return $this->placeDisponibles;
    }

    public function setPlaceDisponibles(int $placeDisponibles): static
    {
        $this->placeDisponibles = $placeDisponibles;

        return $this;
    }
}
