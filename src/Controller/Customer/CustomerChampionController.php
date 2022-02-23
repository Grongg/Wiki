<?php

namespace App\Controller\Customer;

use App\Repository\ChampionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerChampionController extends AbstractController
{
    #[Route('/customer/champion', name: 'customer_champion')]
    public function index(ChampionRepository $championRepository): Response
    {
        $champions = $championRepository->findAll();

        return $this->render('customer/champion/champion.html.twig', [
            'champions' => $champions
        ]);
    }

    #[Route('/customer/champion/{id}', name: 'customer_champion_show')]
    public function show(int $id, ChampionRepository $championRepository)
    {
        $champion = $championRepository->find($id);

        return $this->render('customer/champion/championProfile.html.twig', [
            'champion' => $champion
        ]);
    }
}
