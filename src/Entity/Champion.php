<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'array')]
    #[Assert\NotBlank(message: 'Le champs tags est requis.')]
    private $tags = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $icon;

    #[ORM\OneToMany(mappedBy: 'champion', targetEntity: Spell::class, orphanRemoval: true, cascade: array("persist"))]
    private $spells;

    #[ORM\OneToMany(mappedBy: 'champion', targetEntity: SelectedChampion::class, orphanRemoval: true)]
    private $selectedChampions;

    #[ORM\Column(type: 'boolean')]
    private $isToggle;

    #[ORM\Column(type:"text", length: 65535)]
    private $blurb;

    public function __construct()
    {
        $this->spells = new ArrayCollection();
        $this->selectedChampions = new ArrayCollection();
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

    /**
     * @return Collection|Spell[]
     */
    public function getSpells(): Collection
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): self
    {
        if (!$this->spells->contains($spell)) {
            $this->spells[] = $spell;
            $spell->setChampion($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): self
    {
        if ($this->spells->removeElement($spell)) {
            // set the owning side to null (unless already changed)
            if ($spell->getChampion() === $this) {
                $spell->setChampion(null);
            }
        }

        return $this;
    }

    public function getBright(): ?bool
    {
        return $this->bright;
    }

    public function setBright(bool $bright): self
    {
        $this->bright = $bright;

        return $this;
    }

    /**
     * @return Collection<int, SelectedChampion>
     */
    public function getSelectedChampions(): Collection
    {
        return $this->selectedChampions;
    }

    public function addSelectedChampion(SelectedChampion $selectedChampion): self
    {
        if (!$this->selectedChampions->contains($selectedChampion)) {
            $this->selectedChampions[] = $selectedChampion;
            $selectedChampion->setChampion($this);
        }

        return $this;
    }

    public function removeSelectedChampion(SelectedChampion $selectedChampion): self
    {
        if ($this->selectedChampions->removeElement($selectedChampion)) {
            // set the owning side to null (unless already changed)
            if ($selectedChampion->getChampion() === $this) {
                $selectedChampion->setChampion(null);
            }
        }

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

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): self
    {
        $this->blurb = $blurb;

        return $this;
    }

}