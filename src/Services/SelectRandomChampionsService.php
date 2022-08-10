<?php 

namespace App\Services;

use App\Repository\ChampionRepository;

class SelectRandomChampionsService
{
    public function selectChamp(ChampionRepository $championRepository)
    {

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
            if (!$championRepository->find($rand)||
                (is_null($championRepository->find($rand)->getSpells()[0])
                || is_null($championRepository->find($rand)->getSpells()[1])
                || is_null($championRepository->find($rand)->getSpells()[2])
                || is_null($championRepository->find($rand)->getSpells()[3]))
                || ($championRepository->find($rand)->getSpells()[0]->isIsToggle() === true 
                    || $championRepository->find($rand)->getSpells()[1]->isIsToggle() === true
                    || $championRepository->find($rand)->getSpells()[2]->isIsToggle() === true
                    || $championRepository->find($rand)->getSpells()[3]->isIsToggle() === true
                    || $championRepository->find($rand)->getName() === "Udyr"))
                $i--;
            else
                $randChamps[] = $rand;
        }
        $selectedChampions = [];
        for($i = 0; $i < count($randChamps); $i++)
            $selectedChampions[] = $championRepository->find($randChamps[$i]);
        
        return $selectedChampions;
    }
}