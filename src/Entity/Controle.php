<?php

namespace App\Entity;

use App\Repository\ControleRepository;
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
}
