<?php

namespace App\Controller\Customer;

use App\Entity\ContentCollection;
use App\Entity\SelectedChampion;
use App\Entity\User;
use App\Repository\ChampionRepository;
use App\Repository\ContentCollectionRepository;
use App\Repository\SelectedChampionRepository;
use App\Services\ContentCollectionService;
use App\Services\CookieService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentCollectionController extends AbstractController
{
    #[Route('/collection', name: 'nonsigned_collection')]
    public function index(ChampionRepository $championRepository, EntityManagerInterface $em, CookieService $cookieService, Request $request): Response
    {
        $champions = $championRepository->findAll();
        $champTab = [];
        $session = $cookieService->checkAndSetCookieNoRepeat($request);

        /** @var User $user */
        $user = $this->getUser();

        dump($user);

        if ($user)
        {
            $contentCollection = $user->getContentCollection();
            if (!$contentCollection)
            {
                $contentCollection = new ContentCollection();
                $user->setContentCollection($contentCollection);
                $em->persist($contentCollection);
                $em->persist($user);
                $em->flush();
            }

            $championCollected = [];

            if ($contentCollection)
            {
                if ($contentCollection->getSelectedChampions())
                {   
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
            'session' => $session
        ]);
    }

    #[Route('/toggle_collection/{id}', name: 'toggle_collection')]
    public function toggleContentCollection($id, ChampionRepository $championRepository, 
                                            EntityManagerInterface $em, 
                                            SelectedChampionRepository $selectedChampionRepository)
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
        // dd($selectedChampionClicked);
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
            $user->setContentCollection($contentCollection);
            $em->persist($user);
            $em->remove($selectedChampionClicked);
            $em->flush();
            return $this->json([
                'code' => 200,
                'message' => "Successfully removed"
            ], 200);
        }
    }

    #[Route('/favorites', name: 'collection_favorites')]
    public function collection_favorites(SelectedChampionRepository $selectedChampionRepository, 
    ChampionRepository $championRepository, CookieService $cookieService, Request $request) 
    {
        /** @var User $user */
        $user = $this->getUser();        
        $session = $cookieService->checkAndSetCookieNoRepeat($request);

        if ($user)
        {
            $selected = $selectedChampionRepository->findAll();
            $champs = [];
            foreach ($selected as $champion)
            {
                $champs[] = $championRepository->findOneBy(['id' => $champion->getChampion()->getId()]);
            }
            return $this->render('customer/collection/favorites.html.twig', [
                'champions' => $champs,
                'session' => $session
            ]);
        }
        else
            return $this->redirectToRoute('app_login');
    }
}