<?php

namespace App\Entity;

use App\Repository\ControleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ControleRepository::class)]
class Controle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'controles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $idLocation = null;

    #[ORM\ManyToOne(inversedBy: 'controles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Salarie $idSalarie = null;

    #[ORM\ManyToMany(targetEntity: Equipement::class, mappedBy: 'idControle')]
    private Collection $equipements;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLocation(): ?Location
    {
        return $this->idLocation;
    }

    public function setIdLocation(?Location $idLocation): self
    {
        $this->idLocation = $idLocation;

        return $this;
    }

    public function getIdSalarie(): ?Salarie
    {
        return $this->idSalarie;
    }

    public function setIdSalarie(?Salarie $idSalarie): self
    {
        $this->idSalarie = $idSalarie;

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements->add($equipement);
            $equipement->addIdControle($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        if ($this->equipements->removeElement($equipement)) {
            $equipement->removeIdControle($this);
        }

        return $this;
    }
}
