<?php

namespace App\Entity;

use App\Repository\PassagerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassagerRepository::class)]
class Passager extends Personne
{

    #[ORM\Column]
    private ?float $moyenneEvaluation = null;


    public function getMoyenneEvaluation(): ?float
    {
        return $this->moyenneEvaluation;
    }

    public function setMoyenneEvaluation(float $moyenneEvaluation): static
    {
        $this->moyenneEvaluation = $moyenneEvaluation;

        return $this;
    }
}
