<?php 

namespace App\Services;

use Goutte\Client;
use App\Entity\Spell;
use App\Entity\Champion;
use App\Repository\SpellRepository;
use Doctrine\ORM\EntityManagerInterface;
use RiotAPI\DataDragonAPI\DataDragonAPI;
DataDragonAPI::initByCdn();

class SpellService
{
    public function createSpells(Champion $champion, string $championNameId, EntityManagerInterface $em, SpellRepository $spellRepository) : Champion
    {
        $passive = new Spell;
        $spell0 = new Spell;
        $spell1 = new Spell;
        $spell2 = new Spell;
        $spell3 = new Spell;

        $passive = $this->createSpell($passive, $champion, $championNameId, "passive", $em);
        if (!$spellRepository->findOneBy(["name" => $passive->getName()]))
        {
            $champion->addSpell($passive);
            $em->persist($passive);
            $em->persist($champion);        
        }
        $spell0 = $this->createSpell($spell0, $champion, $championNameId, "0", $em);
        if (!$spellRepository->findOneBy(["name" => $spell0->getName()]))
        {
            $champion->addSpell($spell0);
            $em->persist($spell0);
            $em->persist($champion);
        }
        $spell1 = $this->createSpell($spell1, $champion, $championNameId, "1", $em);
        if (!$spellRepository->findOneBy(["name" => $spell1->getName()]))
        {        
            $champion->addSpell($spell1);
            $em->persist($spell1);
            $em->persist($champion);
        }
        $spell2 = $this->createSpell($spell2, $champion, $championNameId, "2", $em);
        if (!$spellRepository->findOneBy(["name" => $spell2->getName()]))
        {
            $champion->addSpell($spell2);
            $em->persist($spell2);
            $em->persist($champion);
        }
        $spell3 = $this->createSpell($spell3, $champion, $championNameId, "3", $em);
        if (!$spellRepository->findOneBy(["name" => $spell3->getName()]))
        {
            $champion->addSpell($spell3);
            $em->persist($spell3);
            $em->persist($champion);
        }
        return $champion;
    }

    public function createSpell(Spell $spell, Champion $champion, string $championNameId, string $spellNb, EntityManagerInterface $em) : Spell
    {
        $champ = DataDragonAPI::getStaticChampionDetails($championNameId);
        if ($spellNb !== "passive")
        {
            $spellData = $champ["data"][$championNameId]["spells"][$spellNb];
            $spell->setSpellId($spellData["id"]);
            $spell->setCost($spellData["cost"]);
            $spell->setCooldown($spellData["cooldown"]);
            $spell->setSpellImage(DataDragonAPI::getSpellIcon($spellData["id"])->getAttribute("src"));
        }
        else
        {
            $spellData = $champ["data"][$championNameId]["passive"];
            $spell->setSpellId("passive");
            $spell->setCost(array("none"));
            $spell->setCooldown(array("none"));
            $spell->setSpellImage(DataDragonAPI::getPassiveIconUrl(substr($spellData["image"]["full"], 0, -4)));
        }
        $spell->setName($spellData["name"]);
        $spell->setResume($spellData["description"]);
        $this->setStatus($spellNb, $champion, $spell, $em);
        $spell->setType($this->getSpellType($spellNb, $champion->getName()));
        $spell->setChampion($champion);
        return $spell;
    }

    public function getSpellType(string $spellNb, string $championName) : string
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://leagueoflegends.fandom.com/wiki/' . $championName . '/LoL');
        if ($spellNb == "0")
            $spellLetter = 'q';
        else if ($spellNb == "1")
            $spellLetter = 'w';            
        else if ($spellNb == "2")
            $spellLetter = 'e';            
        else if ($spellNb == "3")
            $spellLetter = 'r';
        else 
            return "Champion's passive";
        $speData = $crawler->filter(".skill_" . $spellLetter . "  > .skill_header > div > div >  .ability-info-container > div")->each(function ($node) {
            return $node->text();
        });
        if (!$speData)
            $typeData = $crawler->filter(".skill_" . $spellLetter . "  > .skill_header > .ability-info-container > div")->each(function ($node) {
            return $node->text();
            });
        else
            $typeData = $speData;
        // dump($typeData[0], $championName);
        if (strpos($typeData[0], "COST") !== false)
        {
            $dirtyType = explode("COST", $typeData[0])[1] ;
            if (strpos($dirtyType, "COOLDOWN") !== false)
            {
                $dirtyType = explode("COOLDOWN", $dirtyType)[0];
                $dirtyType = explode(" ", $dirtyType);
                $type = $dirtyType[count($dirtyType) - 2];
            }
                else
                $type = "unknown";
        }
        else
            $type = "empty";
        return $type;
    }

    public function getSpellNode(string $spellNb, string $championName) : array
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://leagueoflegends.fandom.com/wiki/' . $championName . '/LoL');
        if ($spellNb == "0")
            $spellLetter = 'q';
        else if ($spellNb == "1")
            $spellLetter = 'w';            
        else if ($spellNb == "2")
            $spellLetter = 'e';            
        else if ($spellNb == "3")
            $spellLetter = 'r';
        else 
            $spellLetter = "innate"; 

        $spell = $crawler->filter(".skill_".  $spellLetter ." > .skill_header > .ability-info-container > div > div > div > p > span > b")->each(function ($node) {
                return $node->text();
        });

        $cleanSpell = array_filter($spell, function ($element) { 
            if (strpos($element, "Innate") === 0 
                || strpos($element, "Active") === 0)
                return $element;
            }
        );
        return $cleanSpell;
    }

    public function setStatus(string $spellNb,  Champion $champion, Spell $spell, EntityManagerInterface $em) : Spell
    {
        $championName = $champion->getName();
        $cleanSpell = $this->getSpellNode($spellNb, $championName);
        if (array_search("Innate:", $cleanSpell) !== false)
        {
            $spell->setIsChampPassive(true);
            $spell->setIsToggle(false);
            $spell->setIsBoth(false);
            $spell->setIsActive(false);
            $spell->setIsPassive(false);
            return $spell;
        }
        if ((array_search("Passive:", $cleanSpell) !== false && array_count_values($cleanSpell)["Passive:"] > 1) 
            || (array_search("Active:", $cleanSpell) !== false && array_count_values($cleanSpell)["Active:"] > 1))
        {
            $spell->setIsChampPassive(false);
            $spell->setIsToggle(true);
            $champion->setIsToggle(true);
            $spell->setIsBoth(false);
            $spell->setIsActive(false);
            $spell->setIsPassive(false);
            $em->persist($champion);
            return $spell;
        }
        if (array_search("Active:", $cleanSpell) !== false && array_search("Passive:", $cleanSpell) !== false)
        {
            $spell->setIsChampPassive(false);
            $spell->setIsToggle(false);
            $spell->setIsBoth(true);
            $spell->setIsActive(false);
            $spell->setIsPassive(false);
            return $spell;
        }
        if (array_search("Active:", $cleanSpell) !== false)
        {
            $spell->setIsChampPassive(false);
            $spell->setIsToggle(false);
            $spell->setIsBoth(false);
            $spell->setIsActive(true);
            $spell->setIsPassive(false);
            return $spell;
        }
        if (array_search("Passive:", $cleanSpell) !== false)
        {
            $spell->setIsChampPassive(false);
            $spell->setIsToggle(false);
            $spell->setIsBoth(false);
            $spell->setIsActive(false);
            $spell->setIsPassive(true);
            return $spell;
        }
        $spell->setIsChampPassive(false);
        $spell->setIsToggle(false);
        $spell->setIsBoth(false);
        $spell->setIsActive(false);
        $spell->setIsPassive(false);
        return $spell;
    }
}

?>