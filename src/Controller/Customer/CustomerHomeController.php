<?php

namespace App\Controller\Customer;

use Goutte\Client;
use App\Entity\Spell;
use App\Services\SpellService;
use App\Services\ChampionService;
use App\Repository\SpellRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\ChampionRepository;
use Doctrine\ORM\EntityManagerInterface;
use RiotAPI\DataDragonAPI\DataDragonAPI;
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
    EntityManagerInterface $em,
    ChampionService $championService,
    SpellService $spellService, SpellRepository $spellRepository): Response
    {
        $products = $productRepository->findBy([],[
            'id' => 'DESC'
        ],
        6);
        // $championService->deleteAllChamps($championRepository, $em);
        $championService->createChampions($em, $championRepository, $spellService, $spellRepository);
        $test = $spellRepository->findBy([], [
            'name' => 'ASC'
        ]);
        $spellNames = [];
        for ($i=0; $i < count($test); $i++) { 
            array_push($spellNames, $test[$i]->getName());
        }
        $spellCount = array_count_values($spellNames);
        foreach ($spellCount as $key => $value) {
            if ($value > 1)
                $em->remove($firstChamp = $spellRepository->findOneBy(["name" => $key]));
        }
        $em->flush();
        $count = 0;
        foreach($championRepository->findAll() as $val)
            $count++;
        $randChamps = array();
        $firstChamp = $championRepository->findOneBy([], [
                'id' => 'ASC'
            ]
        );
        $firstId = $firstChamp->getId();
        for ($i = 0; $i < 3; $i++)
        {
            $rand = rand($firstId, $firstId + $count);
            if ($championRepository->find($rand) && 
                $championRepository->find($rand)->getSpells()[0]->isIsToggle() === true 
                || $championRepository->find($rand)->getSpells()[1]->isIsToggle() === true
                || $championRepository->find($rand)->getSpells()[2]->isIsToggle() === true
                || $championRepository->find($rand)->getSpells()[3]->isIsToggle() === true
                || $championRepository->find($rand)->getName() === "Udyr")
            {
                $rand = rand($firstId, $firstId + $count);
                $i--;
            }
            else
                $randChamps[] = $rand;
        }
        $selectedChampions = [];
        for($i = 0; $i < count($randChamps); $i++)
        $selectedChampions[] = $championRepository->find($randChamps[$i]);

        // dump(DataDragonAPI::getStaticChampionDetails("Illaoi"));
        // dump($selectedChampions[0]);

        return $this->render('customer/home/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'products' => $products,
            'previewChamps' => $selectedChampions
        ]);
    }
}