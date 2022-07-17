<?php

namespace App\Controller\Customer;

use App\Entity\ContentCollection;
use App\Entity\SelectedChampion;
use App\Entity\User;
use App\Repository\ChampionRepository;
use App\Repository\ContentCollectionRepository;
use App\Repository\SelectedChampionRepository;
use App\Services\ContentCollectionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentCollectionController extends AbstractController
{
    #[Route('/collection', name: 'nonsigned_collection')]
    public function index(ContentCollectionRepository $contentCollectionRepository, ChampionRepository $championRepository): Response
    {
        $champions = $championRepository->findAll();
        $champTab = [];

        /** @var User $user */
        $user = $this->getUser();

        if ($user)
        {
            $contentCollection = $user->getContentCollection();

            $championCollected = [];

            foreach ($contentCollection->getSelectedChampions() as $champ)
            {
                $championCollected[] = $champ->getChampion();
            }

            foreach ($champions as $item)
            {
                if (in_array($item, $championCollected))
                {
                    $data = [
                        "isSelected" => true,
                        "champion" => $item
                    ];
                    $champTab[] = $data;
                }
                else
                {
                    $data = [
                        "isSelected" => false,
                        "champion" => $item
                    ];
                    $champTab[] = $data;
                }
            }
        }
        else
        {
            foreach ($champions as $item)
            {
                    $data = [
                        "isSelected" => false,
                        "champion" => $item
                    ];
                    $champTab[] = $data;
                }
        }
        return $this->render('customer/collection/index.html.twig', [
            'champions' => $champTab,
        ]);
    }

    #[Route('/toggle_collection/{id}', name: 'toggle_collection')]
    public function toggleContentCollection($id, ChampionRepository $championRepository, EntityManagerInterface $em, SelectedChampionRepository $selectedChampionRepository)
    {
        $champion = $championRepository->find($id);

        if (!$champion)
        {
            return $this->json([
                'code' => 404,
                'message' => "Le champion est introuvable"
            ], 404);
        }

        /** @var User $user */
        $user = $this->getUser();
        if (!$user)
        {
            return $this->json([
                'code' => 404,
                'message' => "Aucun utilisateur trouvé"
            ], 404);
        }

        $contentCollection = $user->getContentCollection();

        $selectedChampionClicked = $selectedChampionRepository->findOneBy([
          'contentCollection' => $contentCollection,
          'champion' => $champion
        ]);
        if (!$selectedChampionClicked)
        {
            $selectedChampion = new SelectedChampion();
            $selectedChampion->setChampion($champion);
            $selectedChampion->setContentCollection($contentCollection);
            $em->persist($selectedChampion);
            $em->flush();
            return $this->json([
                'code' => 200,
                'message' => "Successfully Added"
            ], 200);
        }
        else
        {
            $em->remove($selectedChampionClicked);
            $em->flush();
            return $this->json([
                'code' => 200,
                'message' => "Successfully removed"
            ], 200);
        }
    }
}