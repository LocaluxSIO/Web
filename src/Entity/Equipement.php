<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEquipement = null;

    #[ORM\ManyToMany(targetEntity: Controle::class, inversedBy: 'equipements')]
    private Collection $idControle;

    public function __construct()
    {
        $this->idControle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipement(): ?string
    {
        return $this->nomEquipement;
    }

    public function setNomEquipement(string $nomEquipement): self
    {
        $this->nomEquipement = $nomEquipement;

        return $this;
    }

    /**
     * @return Collection<int, Controle>
     */
    public function getIdControle(): Collection
    {
        return $this->idControle;
    }

    public function addIdControle(Controle $idControle): self
    {
        if (!$this->idControle->contains($idControle)) {
            $this->idControle->add($idControle);
        }

        return $this;
    }

    public function removeIdControle(Controle $idControle): self
    {
        $this->idControle->removeElement($idControle);

        return $this;
    }
}
