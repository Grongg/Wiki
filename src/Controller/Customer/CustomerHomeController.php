<?php

namespace App\Controller\Customer;

use App\Repository\ChampionRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Goutte\Client;
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
                            ChampionRepository $championRepository): Response
    {

        $products = $productRepository->findBy([],[
            'id' => 'DESC'
        ],
        6);

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
            $randChamps[] = rand($firstId, $firstId + $count);
        $selectedChampions = [];
        for($i = 0; $i < count($randChamps); $i++)
              $selectedChampions[] = $championRepository->find($randChamps[$i]);

        $varus = DataDragonAPI::getStaticChampionDetails("Varus");

        $client = new Client();
//        $info = $crawler->filter(".skill_innate > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
//            return $node->text();
//        });
//        $info2 = $crawler->filter(".skill_E > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
//            return $node->text();
//        });
//
//        $cnt = 0;
//        dump($info2);
//        for ($i = 0; $i < count($info2); $i++)
//        {
//            dump($info2[$i]);
//            if ($info2[$i] === "Innate:")
//            {
//                $cnt++;
//            }
//        }
//        $spellData = DataDragonAPI::getStaticChampionDetails("Akshan")["data"]["Akshan"]["spells"][0];
//        dump($crawler, $info2, $cnt, "hey ", $spellData["cost"]);

        $crawler = $client->request('GET', 'https://leagueoflegends.fandom.com/wiki/Twisted Fate/LoL');
        $typeData = $crawler->filter(".skill_e > .skill_header > .ability-info-container > div")->each(function ($node) {
            return $node->text();
        });
//        dd($type);
//        dd($typeData[0], strpos($typeData[0], "COST"));
        if (strpos($typeData[0], "COST") !== false)
        {
            $dirtyType = explode("COST", $typeData[0])[1] ;
            $dirtyType = explode("COOLDOWN", $dirtyType)[0];
            $dirtyType = explode(" ", $dirtyType);
            $type = $dirtyType[count($dirtyType) - 2];
        }
        else
        {
            $type = "empty";
        }
        dd($type);
//
        dump(DataDragonAPI::getSpellIcon($varus["data"]["Varus"]["spells"][0]["id"]));
        dd($varus["data"]["Varus"]["spells"]);
        dd($selectedChampions[0]);


        return $this->render('customer/home/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'products' => $products,
            'previewChamps' => $selectedChampions
        ]);
    }
}