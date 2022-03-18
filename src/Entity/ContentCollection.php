<?php

namespace App\Entity;

use App\Repository\ContentCollectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentCollectionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ContentCollection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;


    #[ORM\OneToOne(inversedBy: 'contentCollection', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

    #[ORM\OneToMany(mappedBy: 'contentCollection', targetEntity: SelectedChampion::class)]
    private $selectedChampions;

    public function __construct()
    {
        $this->selectedChampions = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function prePersist()
    {
        if (empty($this->createdAt)) {
            $this->createdAt = new \DateTimeImmutable();
        }
    }

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


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
            $selectedChampion->setContentCollection($this);
        }

        return $this;
    }

    public function removeSelectedChampion(SelectedChampion $selectedChampion): self
    {
        if ($this->selectedChampions->removeElement($selectedChampion)) {
            // set the owning side to null (unless already changed)
            if ($selectedChampion->getContentCollection() === $this) {
                $selectedChampion->setContentCollection(null);
            }
        }

        return $this;
    }

}