<?php

namespace App\Entity;

use App\Repository\FormuleAvecChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormuleAvecChauffeurRepository::class)]
class FormuleAvecChauffeur extends Formule
{
    #[ORM\Column(length: 255)]
    private ?string $nomChauffeur = null;

    #[ORM\OneToMany(mappedBy: 'idFormule', targetEntity: LocationAvecChauffeur::class)]
    private Collection $locationAvecChauffeurs;

    public function __construct()
    {
        $this->locationAvecChauffeurs = new ArrayCollection();
    }

    public function getNomChauffeur(): ?string
    {
        return $this->nomChauffeur;
    }

    public function setNomChauffeur(string $nomChauffeur): self
    {
        $this->nomChauffeur = $nomChauffeur;

        return $this;
    }

    /**
     * @return Collection<int, LocationAvecChauffeur>
     */
    public function getLocationAvecChauffeurs(): Collection
    {
        return $this->locationAvecChauffeurs;
    }

    public function addLocationAvecChauffeur(LocationAvecChauffeur $locationAvecChauffeur): self
    {
        if (!$this->locationAvecChauffeurs->contains($locationAvecChauffeur)) {
            $this->locationAvecChauffeurs->add($locationAvecChauffeur);
            $locationAvecChauffeur->setIdFormule($this);
        }

        return $this;
    }

    public function removeLocationAvecChauffeur(LocationAvecChauffeur $locationAvecChauffeur): self
    {
        if ($this->locationAvecChauffeurs->removeElement($locationAvecChauffeur)) {
            // set the owning side to null (unless already changed)
            if ($locationAvecChauffeur->getIdFormule() === $this) {
                $locationAvecChauffeur->setIdFormule(null);
            }
        }

        return $this;
    }
}
