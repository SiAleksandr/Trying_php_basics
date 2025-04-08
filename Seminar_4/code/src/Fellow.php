<?php

namespace Hwapp\Oop;

class Fellow {

    private static $lastId = 0;

    private $Id;

    private string $name;

    private string $lastName;

    private array $collection;

    private array $membership;

    public function __construct
    (
        string $name, 
        string $lastName,
        array $vinylList
    ) {
        $this->Id = self::$lastId;
        self::$lastId += 1;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->membership = array();
        $this->listAssign($vinylList);
    }

    private function listAssign(array $vinylList): void {
        foreach($vinylList as $vinyl) {
            if($vinyl instanceof Vinyl) {
                $vinil->decideTheOwner($this);
            }
        }
        $this->collection = $vinylList;
    }

    public function searchByArtist(string $artist): array {
        // Возвращает Имя и Фамилию этого пользователя в
        // нулевом элементе возвращаемого массива,
        // а в остальных элементах = наименования виниловых пластинок
        // заданного в параметрах исполнителя\композитора 
        // из коллекции этого пользователя.
    }

    public function takeOneVinyl(string $targetName): bool {

    }

    // может быть получится совместить поиск конкретной пластинки
    // и просьбу дать её послушать (может быть и не получится)


    public function getGroupList(): array {
        return $this->membership;
    }

    public function askToJoin($middleman): bool {
        if(count($middleman->getGroupList()) > 0) {
            for($i = 0; $i < count($middleman->getGroupList()); $i++) {
                if(!$middleman->getGroupList()[$i]->checkMembership($this)) {
                    echo $middleman->getGroupList()[$i]->getDescription() . PHP_EOL;
                    $answer = readline("Вступить в такую группу (y/n): ");
                    if($answer == "y") {
                        return $middleman->getGroupList()[$i]->addNew($this);
                    }
                }
            }
        }
        return false;
    }

    public function addInGroup($person, int $index): bool {
        if($index < count($this->membership) && $index >= 0
        && !($this->membership[$index]->checkMembership($person))) {
            return $this->membership[$index]->addNew($person);
        }
        return false;
    }

    public function joinCommunityAnyway($community): void {
        array_push($this->membership, $community);
    }

    public function joinCommunity($community): bool {
        if($community->checkMembership($this)) {
            return false;
        }
        $this->joinCommunityAnyway($community);
        return true;
    }

    public function getMy(): string {
        $res = $this->name . " " . $this->lastName . PHP_EOL;
        for($i = 0; $i < count($this->membership); $i++) {
            $res .= $this->membership[$i]->getDescription() . PHP_EOL;
        }
        return $res;
    }
}