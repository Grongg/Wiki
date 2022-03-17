<?php

namespace App\Controller\Customer;

use App\Entity\ContentCollection;
use App\Repository\ChampionRepository;
use App\Repository\ContentCollectionRepository;
use App\Services\ContentCollectionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentCollectionController extends AbstractController
{
    #[Route('/collection', name: 'nonsigned_collection')]
    public function index(ChampionRepository $championRepository,
                          ContentCollectionService $contentCollectionService,
                          EntityManagerInterface $em, ContentCollectionRepository $contentCollectionRepository): Response
    {
//        $contentCollectionService->createCollection($em, $championRepository);
        $contentCollection = $contentCollectionRepository->findOneBy(['id' => 3]);
        $champions = $contentCollection->getChampions();

        return $this->render('customer/collection/index.html.twig', [
            'contentCollection' => $contentCollection,
            'champions' => $champions,
        ]);
    }
}