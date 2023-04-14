<?php

namespace App\Entity;

use App\Repository\LocationAvecChauffeurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationAvecChauffeurRepository::class)]
class LocationAvecChauffeur extends Location
{
    #[ORM\Column(length: 255)]
    private ?string $lieuDestination = null;

    #[ORM\ManyToOne(inversedBy: 'locationAvecChauffeurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FormuleAvecChauffeur $idFormule = null;

    #[ORM\ManyToOne(inversedBy: 'locationAvecChauffeurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chauffeur $idChauffeur = null;

    public function getLieuDestination(): ?string
    {
        return $this->lieuDestination;
    }

    public function setLieuDestination(string $lieuDestination): self
    {
        $this->lieuDestination = $lieuDestination;

        return $this;
    }

    public function getIdFormule(): ?FormuleAvecChauffeur
    {
        return $this->idFormule;
    }

    public function setIdFormule(?FormuleAvecChauffeur $idFormule): self
    {
        $this->idFormule = $idFormule;

        return $this;
    }

    public function getIdChauffeur(): ?Chauffeur
    {
        return $this->idChauffeur;
    }

    public function setIdChauffeur(?Chauffeur $idChauffeur): self
    {
        $this->idChauffeur = $idChauffeur;

        return $this;
    }
}
