<?php 

namespace App\Services;

use App\Entity\Champion;
use App\Repository\ChampionRepository;
use Doctrine\ORM\EntityManagerInterface;
use RiotAPI\DataDragonAPI\DataDragonAPI;
use Goutte\Client;
DataDragonAPI::initByCdn();

class ChampionService
{
    public function createChampions(EntityManagerInterface $entityManager, ChampionRepository $championRepository)
    {
        $data = DataDragonAPI::getStaticChampions()["data"];
        $champs = array_values($data);

        foreach ($champs as $champ)
        {
            if (!$championRepository->findOneBy(["name" => $champ["name"]]))
            {
                $champion = new Champion();
                $champion->setName($champ["name"]);
                $champion->setTitle($champ["title"]);
                $champion->setMainImage("https://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $champ["id"] . "_0.jpg");
                $champion->setIcon("https://ddragon.leagueoflegends.com/cdn/" . $champ["version"] . "/img/champion/" . $champ["id"] . ".png"); 
                $champion->setBlurb($champ["blurb"]);
                $champion->setTags($champ["tags"]);
                $champion->setPrice($this->getPrice($champion->getName()));
                if ($champion)
                {
                    $entityManager->persist($champion);
                    $entityManager->flush();
                }
            }
        }
    }

    public function deleteAllChamps(ChampionRepository $championRepository, EntityManagerInterface $entityManager)
    {
        $champions = $championRepository->findAll();
        foreach ($champions as $champ)
        {
            $entityManager->remove($champ);
            $entityManager->flush();
        }
        dd();
    }

    public function getPrice(string $name)
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://leagueoflegends.fandom.com/wiki/List_of_champions');
        $info = $crawler->filter("table.article-table > tbody > tr > td")->each(function ($node) {
            return $node->text();
        });
        for ($i = 0; $i < count($info); $i++)
        {
            if (strpos($info[$i], $name) !== false)
            {
                return $info[$i + 4];
            }
        }
    }
}

?>