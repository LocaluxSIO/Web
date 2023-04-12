<?php

namespace App\Entity;

use App\Repository\FormuleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormuleRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: "typeFormule", type: 'string')]
#[ORM\DiscriminatorMap(['avecChauffeur'=> FormuleAvecChauffeur::class, 'sansChauffeur'=> FormuleSansChauffeur::class])]
class Formule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomFormule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nomFormule;
    }

    public function setNom(string $nom): self
    {
        $this->nomFormule = $nom;

        return $this;
    }
}
