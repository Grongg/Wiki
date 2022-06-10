<?php 

namespace App\Services;

use App\Entity\Champion;
use App\Entity\Spell;
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
                $champion->setMainImage("https://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $champ["id"] . "_0.jpg");
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

    public function createSpells(Champion $champion)
    {
        $passive = new Spell;
        $spell1 = new Spell;
        $spell2 = new Spell;
        $spell3 = new Spell;
        $spell4 = new Spell;

        $this->createSpell($spell1, $champion);
    }

    public function createSpell(Spell $spell, Champion $champion, int $nb)
    {
        $champ = DataDragonAPI::getStaticChampionDetails($champion->getName());
        $spellData = $champ["data"][$champion->getName()]["spells"][$nb];
        $spell->setSpellId($spellData["id"]);
        $spell->setName($spellData["name"]);
        $spell->setResume($spellData["description"]);
        $spell->setSpellImage(DataDragonAPI::getSpellIcon($spellData["id"])["src"]);
        $spell->setCost($spellData["cost"]);
        $spell->setCooldown($spellData["cooldown"]);
        $spell->setType($this->searchType($champion));

    }

    public function searchType(Champion $champion)
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


    public function isToggle(Champion $champion, Spell $spell) : bool
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://leagueoflegends.fandom.com/wiki/' . $champion->getName() . '/LoL');
        $passive = $crawler->filter(".skill_innate > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
                return $node->text();
        });
        $Q = $crawler->filter(".skill_Q > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
            return $node->text();
        });
        $W = $crawler->filter(".skill_W > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
            return $node->text();
        });
        $E = $crawler->filter(".skill_E > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
            return $node->text();
        });
        $R = $crawler->filter(".skill_R > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
            return $node->text();
        });
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
        $crawler = $client->request('GET', 'https://https://leagueoflegends.fandom.com/wiki/' . $name . '/LoL');
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