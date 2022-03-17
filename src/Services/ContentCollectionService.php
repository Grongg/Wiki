<?php

namespace App\Services;

use App\Entity\ContentCollection;
use App\Repository\ChampionRepository;
use Doctrine\ORM\EntityManagerInterface;

class ContentCollectionService
{
    public function createCollection(EntityManagerInterface $em,
                                     ChampionRepository $championRepository)
    {
        $contentCollection = new ContentCollection();
        $contentCollection->setCreatedAt(new \DateTimeImmutable());
        $champions = $championRepository->findAll();
        foreach ($champions as $champion) {
            $contentCollection->addChampion($champion);
        }
        $em->persist($contentCollection);
        $em->flush();
    }
}