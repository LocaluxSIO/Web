<?php

namespace App\Entity;

use App\Repository\LocationSansChauffeurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationSansChauffeurRepository::class)]
class LocationSansChauffeur extends Location
{

    #[ORM\Column]
    private ?int $nbKmsDepart = null;

    #[ORM\Column]
    private ?int $nbKmsRetour;

    #[ORM\ManyToOne(inversedBy: 'locationSansChauffeurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FormuleSansChauffeur $idFormule = null;

    public function getNbKmsDepart(): ?int
    {
        return $this->nbKmsDepart;
    }

    public function setNbKmsDepart(int $nbKmsDepart): self
    {
        $this->nbKmsDepart = $nbKmsDepart;

        return $this;
    }

    public function getNbKmsRetour(): ?int
    {
        return $this->nbKmsRetour;
    }

    public function setNbKmsRetour(int $nbKmsRetour): self
    {
        $this->nbKmsRetour = $nbKmsRetour;

        return $this;
    }

    public function getIdFormule(): ?FormuleSansChauffeur
    {
        return $this->idFormule;
    }

    public function setIdFormule(?FormuleSansChauffeur $idFormule): self
    {
        $this->idFormule = $idFormule;

        return $this;
    }
}
