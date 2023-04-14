<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChauffeurRepository::class)]
class Chauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Nom = null;

    #[ORM\Column(length: 30)]
    private ?string $Prenom = null;

    #[ORM\Column]
    private ?int $Age = null;

    #[ORM\Column(length: 500)]
    private ?string $ImageChauffeur = null;

    #[ORM\OneToMany(mappedBy: 'idChauffeur', targetEntity: FormuleAvecChauffeur::class, orphanRemoval: true)]
    private Collection $formuleAvecChauffeurs;

    #[ORM\OneToMany(mappedBy: 'idChauffeur', targetEntity: LocationAvecChauffeur::class, orphanRemoval: true)]
    private Collection $locationAvecChauffeurs;

    public function __construct()
    {
        $this->formuleAvecChauffeurs = new ArrayCollection();
        $this->locationAvecChauffeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getImageChauffeur(): ?string
    {
        return $this->ImageChauffeur;
    }

    public function setImageChauffeur(string $ImageChauffeur): self
    {
        $this->ImageChauffeur = $ImageChauffeur;

        return $this;
    }

    /**
     * @return Collection<int, FormuleAvecChauffeur>
     */
    public function getFormuleAvecChauffeurs(): Collection
    {
        return $this->formuleAvecChauffeurs;
    }

    public function addFormuleAvecChauffeur(FormuleAvecChauffeur $formuleAvecChauffeur): self
    {
        if (!$this->formuleAvecChauffeurs->contains($formuleAvecChauffeur)) {
            $this->formuleAvecChauffeurs->add($formuleAvecChauffeur);
            $formuleAvecChauffeur->setIdChauffeur($this);
        }

        return $this;
    }

    public function removeFormuleAvecChauffeur(FormuleAvecChauffeur $formuleAvecChauffeur): self
    {
        if ($this->formuleAvecChauffeurs->removeElement($formuleAvecChauffeur)) {
            // set the owning side to null (unless already changed)
            if ($formuleAvecChauffeur->getIdChauffeur() === $this) {
                $formuleAvecChauffeur->setIdChauffeur(null);
            }
        }

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
            $locationAvecChauffeur->setIdChauffeur($this);
        }

        return $this;
    }

    public function removeLocationAvecChauffeur(LocationAvecChauffeur $locationAvecChauffeur): self
    {
        if ($this->locationAvecChauffeurs->removeElement($locationAvecChauffeur)) {
            // set the owning side to null (unless already changed)
            if ($locationAvecChauffeur->getIdChauffeur() === $this) {
                $locationAvecChauffeur->setIdChauffeur(null);
            }
        }

        return $this;
    }
}
