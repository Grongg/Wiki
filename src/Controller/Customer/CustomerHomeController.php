<?php

namespace App\Controller\Customer;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\ChampionRepository;
use App\Services\CookieService;
use App\Services\SelectRandomChampionsService;
use RiotAPI\DataDragonAPI\DataDragonAPI;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
DataDragonAPI::initByCdn();

class CustomerHomeController extends AbstractController
{
    #[Route('/', name: 'customer_home')]
    public function index(CategoryRepository $categoryRepository,
                            ProductRepository $productRepository,
                            ChampionRepository $championRepository,
                            SelectRandomChampionsService $selectRandomChampionsService,
                            CookieService $cookieService,
                            Request $request): Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $products = $productRepository->findBy([],[
            'id' => 'DESC'
            ],
        6);
        $selectedChampions = $selectRandomChampionsService->selectChamp($championRepository);

        return $this->render('customer/home/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'products' => $products,
            'previewChamps' => $selectedChampions,
            'session' => $session
        ]);
    }
}