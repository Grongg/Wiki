<?php

namespace App\Entity;

use App\Repository\ContentCollectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentCollectionRepository::class)]
class ContentCollection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'array', nullable: true)]
    private $champions = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getChampions(): ?array
    {
        return $this->champions;
    }

    public function setChampions(?array $champions): self
    {
        $this->champions = $champions;

        return $this;
    }

    public function addChampion(?Champion $champion): self
    {
        $this->champions[] = $champion;

        return $this;
    }

    public function removeChampion(?Champion $champion): self
    {
        $this->champions = array_splice($this->champions, array_search($champion, $this->champions), 1);

        return $this;
    }
}