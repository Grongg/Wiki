<?php 

namespace App\Services;

use App\Entity\Champion;
use App\Repository\ChampionRepository;
use Doctrine\ORM\EntityManagerInterface;
use RiotAPI\DataDragonAPI\DataDragonAPI;
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
                // dd($champ);
                $link = substr(DataDragonAPI::getChampionLoading($champion->getName()), strpos(DataDragonAPI::getChampionLoading($champion->getName()), "src"), -1);
                $champion->setMainImage(substr(substr($link, 1), strpos($link, "\""), -1));
                $champion->setIcon("https://ddragon.leagueoflegends.com/cdn/" . $champ["version"] . "/img/champion/" . $champion->getName() . ".png"); 
                $champion->setBlurb($champ["blurb"]);
                $champion->setTags($champ["tags"]);
                $champion->setPrice(0);
                // dd($champion);
                if ($champion)
                {
                    $entityManager->persist($champion);
                    $entityManager->flush();
                }
            }
        }
    }
}

?>