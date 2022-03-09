<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs nom est requis.')]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Le champs prix est requis.')]
    private $price;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: 'Le champs categorie est requis.')]
    private $category;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: CommandShopLine::class)]
    private $commandShopLines;

    public function __construct()
    {
        $this->commandShopLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, CommandShopLine>
     */
    public function getCommandShopLines(): Collection
    {
        return $this->commandShopLines;
    }

    public function addCommandShopLines(CommandShopLine $commandShopLines): self
    {
        if (!$this->commandShopLines->contains($commandShopLines)) {
            $this->commandShopLines[] = $commandShopLines;
            $commandShopLines->setProduct($this);
        }

        return $this;
    }

    public function removeCommandShopLines(CommandShopLine $commandShopLines): self
    {
        if ($this->commandShopLines->removeElement($commandShopLines)) {
            // set the owning side to null (unless already changed)
            if ($commandShopLines->getProduct() === $this) {
                $commandShopLines->setProduct(null);
            }
        }

        return $this;
    }
}