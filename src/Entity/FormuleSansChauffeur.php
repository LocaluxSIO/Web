<?php

namespace App\Entity;

use App\Repository\FormuleSansChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormuleSansChauffeurRepository::class)]
class FormuleSansChauffeur extends Formule
{
    #[ORM\Column]
    private ?float $duree = null;

    #[ORM\Column]
    private ?int $nbKmsInclus = null;

    #[ORM\OneToMany(mappedBy: 'idFormule', targetEntity: LocationSansChauffeur::class)]
    private Collection $locationSansChauffeurs;

    public function __construct()
    {
        $this->locationSansChauffeurs = new ArrayCollection();
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(float $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNbKmsInclus(): ?int
    {
        return $this->nbKmsInclus;
    }

    public function setNbKmsInclus(int $nbKmsInclus): self
    {
        $this->nbKmsInclus = $nbKmsInclus;

        return $this;
    }

    /**
     * @return Collection<int, LocationSansChauffeur>
     */
    public function getLocationSansChauffeurs(): Collection
    {
        return $this->locationSansChauffeurs;
    }

    public function addLocationSansChauffeur(LocationSansChauffeur $locationSansChauffeur): self
    {
        if (!$this->locationSansChauffeurs->contains($locationSansChauffeur)) {
            $this->locationSansChauffeurs->add($locationSansChauffeur);
            $locationSansChauffeur->setIdFormule($this);
        }

        return $this;
    }

    public function removeLocationSansChauffeur(LocationSansChauffeur $locationSansChauffeur): self
    {
        if ($this->locationSansChauffeurs->removeElement($locationSansChauffeur)) {
            // set the owning side to null (unless already changed)
            if ($locationSansChauffeur->getIdFormule() === $this) {
                $locationSansChauffeur->setIdFormule(null);
            }
        }

        return $this;
    }
}
