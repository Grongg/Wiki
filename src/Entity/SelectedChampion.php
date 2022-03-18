<?php

namespace App\Entity;

use App\Repository\SelectedChampionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SelectedChampionRepository::class)]
class SelectedChampion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: ContentCollection::class, inversedBy: 'selectedChampions')]
    private $contentCollection;

    #[ORM\ManyToOne(targetEntity: Champion::class, inversedBy: 'selectedChampions')]
    #[ORM\JoinColumn(nullable: false)]
    private $champion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentCollection(): ?ContentCollection
    {
        return $this->contentCollection;
    }

    public function setContentCollection(?ContentCollection $contentCollection): self
    {
        $this->contentCollection = $contentCollection;

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
}
