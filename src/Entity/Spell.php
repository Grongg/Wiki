<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SpellRepository::class)]
class Spell
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs nom est requis.')]
    private $name; //y
    
    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'Le champs description est requis.')]
    private $resume; //y
    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs image du sort est requis.')]
    private $spellImage;//y 
    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le champs type est requis.')]
    private $type; //y 
    
    #[ORM\Column(type: 'string', length: 255)]
    private $spellId; //y
    
    #[ORM\Column(type: 'boolean')]
    private $isToggle; //y 
    
    #[ORM\Column(type: 'boolean')]
    private $isBoth; //y
    
    #[ORM\Column(type: 'boolean')]
    private $isChampPassive; //y 
    
    #[ORM\Column(type: 'boolean')]
    #[Assert\NotBlank(message: 'Le champs actif est requis.')]
    private $isActive; //y
    
    #[ORM\Column(type: 'boolean')]
    #[Assert\NotBlank(message: 'Le champs passif est requis.')]
    private $isPassive; //y

    #[ORM\Column(type: 'array')]
    private $cost = []; //y
    
    #[ORM\Column(type: 'array')]
    private $cooldown = []; //y
    
    #[ORM\ManyToOne(targetEntity: Champion::class, inversedBy: 'spells')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: 'Le champs champion est requis.')]
    private $champion;

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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsPassive(): ?bool
    {
        return $this->isPassive;
    }

    public function setIsPassive(bool $isPassive): self
    {
        $this->isPassive = $isPassive;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getSpellImage(): ?string
    {
        return $this->spellImage;
    }

    public function setSpellImage(string $spellImage): self
    {
        $this->spellImage = $spellImage;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getChampion(): ?Champion
    {
        return $this->champion;
    }

    public function setChampion(?Champion $champion): self
    {
        $this->champion = $champion;

        return $this;
    }

    public function getSpellId(): ?string
    {
        return $this->spellId;
    }

    public function setSpellId(string $spellId): self
    {
        $this->spellId = $spellId;

        return $this;
    }

    public function isIsToggle(): ?bool
    {
        return $this->isToggle;
    }

    public function setIsToggle(bool $isToggle): self
    {
        $this->isToggle = $isToggle;

        return $this;
    }

    public function isIsBoth(): ?bool
    {
        return $this->isBoth;
    }

    public function setIsBoth(bool $isBoth): self
    {
        $this->isBoth = $isBoth;

        return $this;
    }

    public function getCost(): ?array
    {
        return $this->cost;
    }

    public function setCost(array $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCooldown(): ?array
    {
        return $this->cooldown;
    }

    public function setCooldown(array $cooldown): self
    {
        $this->cooldown = $cooldown;

        return $this;
    }

    public function isIsChampPassive(): ?bool
    {
        return $this->isChampPassive;
    }

    public function setIsChampPassive(bool $isChampPassive): self
    {
        $this->isChampPassive = $isChampPassive;

        return $this;
    }

}