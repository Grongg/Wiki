<?php

namespace App\Entity;

use App\Repository\DeliveryAddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DeliveryAddressRepository::class)]
class DeliveryAddress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(inversedBy: 'deliveryAddress', targetEntity: CommandShop::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $commandShop;


    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le pays est requis')]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'La ville est requise')]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le code postal est requis')]
    private $postalCode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'La rue est requise')]
    private $street;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $commentary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandShop(): ?CommandShop
    {
        return $this->commandShop;
    }

    public function setCommandShop(CommandShop $commandShop): self
    {
        $this->commandShop = $commandShop;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCommentary(): ?string
    {
        return $this->commentary;
    }

    public function setCommentary(?string $commentary): self
    {
        $this->commentary = $commentary;

        return $this;
    }
}