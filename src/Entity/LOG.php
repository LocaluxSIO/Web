<?php

namespace App\Entity;

use App\Repository\LOGRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LOGRepository::class)]
class LOG
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $evenements = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateLOG = null;

    #[ORM\ManyToOne(inversedBy: 'lOGs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Salarie $idSalarie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenements(): ?string
    {
        return $this->evenements;
    }

    public function setEvenements(?string $evenements): self
    {
        $this->evenements = $evenements;

        return $this;
    }

    public function getDateLOG(): ?\DateTimeInterface
    {
        return $this->dateLOG;
    }

    public function setDateLOG(\DateTimeInterface $dateLOG): self
    {
        $this->dateLOG = $dateLOG;

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
