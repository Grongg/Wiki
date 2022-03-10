<?php

namespace App\Controller\Customer;

use App\Entity\Champion;
use App\Repository\ChampionRepository;
use App\Services\ChampionService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/customer/champion')]
class CustomerChampionController extends AbstractController
{
    #[Route('/', name: 'customer_champion_index', methods: ['GET'])]
    public function index(ChampionRepository $championRepository,
                          ChampionService $championService,
                          PaginatorInterface $paginator,
                          EntityManagerInterface $entityManager,
                          Request $request): Response
    {
        // $championService->createChampions($entityManager, $championRepository);
        $champions = $paginator->paginate(
            $championRepository->findBY([], ['name' => 'ASC']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('customer/champion/champion.html.twig', [
            'champions' =>$champions
        ]);
    }

    #[Route('/{id}', name: 'customer_champion_show', methods: ['GET'])]
    public function show(Champion $champion): Response
    {
        return $this->render('customer/champion/championProfile.html.twig', [
            'champion' => $champion,
        ]);
    }
}