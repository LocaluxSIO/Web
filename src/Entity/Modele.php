<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleRepository::class)]
class Modele
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'idModele', targetEntity: Vehicule::class, orphanRemoval: true)]
    private Collection $vehicules;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $carburant = null;

    #[ORM\Column(length: 255)]
    private ?string $boiteVitesse = null;

    #[ORM\Column(length: 1000)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $prixBase = null;

    #[ORM\Column]
    private ?int $cheveaux = null;

    #[ORM\Column]
    private ?float $ZeroCent = null;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->setIdModele($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getIdModele() === $this) {
                $vehicule->setIdModele(null);
            }
        }

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getBoiteVitesse(): ?string
    {
        return $this->boiteVitesse;
    }

    public function setBoiteVitesse(string $boiteVitesse): self
    {
        $this->boiteVitesse = $boiteVitesse;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrixBase(): ?float
    {
        return $this->prixBase;
    }

    public function setPrixBase(float $prixBase): self
    {
        $this->prixBase = $prixBase;

        return $this;
    }

    public function getCheveaux(): ?int
    {
        return $this->cheveaux;
    }

    public function setCheveaux(int $cheveaux): self
    {
        $this->cheveaux = $cheveaux;

        return $this;
    }

    public function getZeroCent(): ?float
    {
        return $this->ZeroCent;
    }

    public function setZeroCent(float $ZeroCent): self
    {
        $this->ZeroCent = $ZeroCent;

        return $this;
    }
}
