<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\NotBlank(message: 'Le champs email est requis.')]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs nom est requis.')]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs pseudo est requis.')]
    private $pseudo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CommandShop::class, orphanRemoval: true)]
    private $commandShops;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cover;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: ContentCollection::class, cascade: ['persist', 'remove'])]
    private $contentCollection;



    public function __construct()
    {
        $this->commandShops = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    /**
     * @return Collection<int, CommandShop>
     */
    public function getCommandShops(): Collection
    {
        return $this->commandShops;
    }

    public function addCommandShop(CommandShop $commandShop): self
    {
        if (!$this->commandShops->contains($commandShop)) {
            $this->commandShops[] = $commandShop;
            $commandShop->setUser($this);
        }

        return $this;
    }

    public function removeCommandShop(CommandShop $commandShop): self
    {
        if ($this->commandShops->removeElement($commandShop)) {
            // set the owning side to null (unless already changed)
            if ($commandShop->getUser() === $this) {
                $commandShop->setUser(null);
            }
        }

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getContentCollection(): ?ContentCollection
    {
        return $this->contentCollection;
    }

    public function setContentCollection(?ContentCollection $contentCollection): self
    {
        // unset the owning side of the relation if necessary
        if ($contentCollection === null && $this->contentCollection !== null) {
            $this->contentCollection->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($contentCollection !== null && $contentCollection->getUser() !== $this) {
            $contentCollection->setUser($this);
        }

        $this->contentCollection = $contentCollection;

        return $this;
    }

    public function agreeTerms()
    {
        $this->agreedTermsAt = new \DateTime();
    }

}