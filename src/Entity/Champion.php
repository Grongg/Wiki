<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ChampionRepository::class)]
class Champion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs nom est requis.')]    
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $mainImage;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Le champs prix est requis.')]    
    private $price;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs titre est requis.')]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs resume est requis.')]
    private $blurb;

    #[ORM\Column(type: 'array')]
    #[Assert\NotBlank(message: 'Le champs tags est requis.')]
    private $tags = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $icon;

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

    public function getMainImage(): ?string
    {
        return $this->mainImage;
    }

    public function setMainImage(string $mainImage): self
    {
        $this->mainImage = $mainImage;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): self
    {
        $this->blurb = $blurb;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }
}
