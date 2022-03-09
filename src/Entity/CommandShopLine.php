<?php

namespace App\Entity;

use App\Repository\CommandShopLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandShopLineRepository::class)]
class CommandShopLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: CommandShop::class, inversedBy: 'commandShopLines')]
    #[ORM\JoinColumn(nullable: false)]
    private $commandShop;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'quantity')]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandShop(): ?CommandShop
    {
        return $this->commandShop;
    }

    public function setCommandShop(?CommandShop $commandShop): self
    {
        $this->commandShop = $commandShop;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
