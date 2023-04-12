<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: SalarieRepository::class)]
class Salarie implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $login = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateMdp = null;

    #[ORM\OneToMany(mappedBy: 'idSalarie', targetEntity: LOG::class)]
    private Collection $lOGs;

    #[ORM\OneToMany(mappedBy: 'idSalarie', targetEntity: Controle::class)]
    private Collection $controles;

    public function __construct()
    {
        $this->lOGs = new ArrayCollection();
        $this->controles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->login;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateMdp(): ?\DateTimeInterface
    {
        return $this->dateMdp;
    }

    public function setDateMdp(?\DateTimeInterface $dateMdp): self
    {
        $this->dateMdp = $dateMdp;

        return $this;
    }

    /**
     * @return Collection<int, LOG>
     */
    public function getLOGs(): Collection
    {
        return $this->lOGs;
    }

    public function addLOG(LOG $lOG): self
    {
        if (!$this->lOGs->contains($lOG)) {
            $this->lOGs->add($lOG);
            $lOG->setIdSalarie($this);
        }

        return $this;
    }

    public function removeLOG(LOG $lOG): self
    {
        if ($this->lOGs->removeElement($lOG)) {
            // set the owning side to null (unless already changed)
            if ($lOG->getIdSalarie() === $this) {
                $lOG->setIdSalarie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Controle>
     */
    public function getControles(): Collection
    {
        return $this->controles;
    }

    public function addControle(Controle $controle): self
    {
        if (!$this->controles->contains($controle)) {
            $this->controles->add($controle);
            $controle->setIdSalarie($this);
        }

        return $this;
    }

    public function removeControle(Controle $controle): self
    {
        if ($this->controles->removeElement($controle)) {
            // set the owning side to null (unless already changed)
            if ($controle->getIdSalarie() === $this) {
                $controle->setIdSalarie(null);
            }
        }

        return $this;
    }
}
