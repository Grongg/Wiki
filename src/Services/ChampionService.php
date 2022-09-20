<?php 

namespace App\Services;

use Goutte\Client;
use App\Entity\Champion;
use App\Repository\ChampionRepository;
use App\Services\SpellService;
use App\Repository\SpellRepository;
use Doctrine\ORM\EntityManagerInterface;
use RiotAPI\DataDragonAPI\DataDragonAPI;
DataDragonAPI::initByCdn();

class ChampionService
{
    public function createChampions(EntityManagerInterface $entityManager, ChampionRepository $championRepository, SpellService $spellService, SpellRepository $spellRepository)
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
                $champion->setMainImage("https://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $champ["id"] . "_0.jpg");
                $champion->setIcon("https://ddragon.leagueoflegends.com/cdn/" . $champ["version"] . "/img/champion/" . $champ["id"] . ".png");
                $champion->setBlurb($champ["blurb"]);
                $champion->setTags($champ["tags"]);
                $champion->setPrice(0);
                $champion->setIsToggle(false);
                $champion->setPrice($this->getPrice($champion->getName()));
                $spellService->createSpells($champion, $champ["id"], $entityManager, $spellRepository);
                if ($champion)
                {
                    $entityManager->persist($champion);
                    $entityManager->flush();
                }
            }
        }
    }

    public function getBlurb(array $champ) : array
    {
        $dirtyBlurb = $champ["blurb"];
        $cleanBlurb = [];
        if (strlen($dirtyBlurb) >= 250)
        {
            array_push($cleanBlurb, substr($dirtyBlurb, 0, 250));
            if (strlen($dirtyBlurb) >= 500 && strlen($dirtyBlurb) <=750)
            {
                array_push($cleanBlurb, substr($dirtyBlurb, 250, 500));
                array_push($cleanBlurb, substr($dirtyBlurb, 500));
            }
            else if (strlen($dirtyBlurb) >= 750)
            {
                array_push($cleanBlurb, substr($dirtyBlurb, 250, 500));
                array_push($cleanBlurb, substr($dirtyBlurb, 500, 750));
                array_push($cleanBlurb, substr($dirtyBlurb, 750, 900));
                array_push($cleanBlurb, substr($dirtyBlurb, 900, 1150));
                array_push($cleanBlurb, substr($dirtyBlurb, 1150, 1400));
                array_push($cleanBlurb, substr($dirtyBlurb, 1400));
            }
            else
                array_push($cleanBlurb, substr($dirtyBlurb, 250));
        }
        else
            array_push($cleanBlurb, $dirtyBlurb);
        return $cleanBlurb;
    }

    public function searchChampionType(Champion $champion)
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://leagueoflegends.fandom.com/wiki/' . $champion->getName() . '/LoL');
        $typeData = $crawler->filter("[data-source=\"resource\"] > div > span > a")->each(function ($node) {
            return $node->text();
        });

        for ($i = 0; $i < count($typeData); $i++)
        {
            if (empty($typeData[$i]) === false && strpos($typeData[$i], "<img") !== true)
            {
                $type = $typeData[$i];
                return ($type);
            }
        }
    }

    public function deleteAllChamps(ChampionRepository $championRepository, EntityManagerInterface $entityManager)
    {
        $champions = $championRepository->findAll();
        foreach ($champions as $champ)
        {
            $entityManager->remove($champ);
            $entityManager->remove($champ->getSpells()[0]);
            $entityManager->remove($champ->getSpells()[1]);
            $entityManager->remove($champ->getSpells()[2]);
            $entityManager->remove($champ->getSpells()[3]);
            $entityManager->remove($champ->getSpells()[4]);
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