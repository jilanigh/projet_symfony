<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChauffeurRepository::class)]
class Chauffeur extends Personne
{

    #[ORM\Column(length: 255)]
    private ?string $permisConduire = null;


    public function getPermisConduire(): ?string
    {
        return $this->permisConduire;
    }

    public function setPermisConduire(string $permisConduire): static
    {
        $this->permisConduire = $permisConduire;

        return $this;
    }
}
