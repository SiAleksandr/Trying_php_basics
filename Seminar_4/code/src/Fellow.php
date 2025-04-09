<?php

namespace Hwapp\Oop;

class Fellow {

    private static $lastId = 0;

    private $Id;

    private string $name;

    private string $lastName;

    private array $collection;

    private array $trialVinyls;

    private array $vinylsToOversight;

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
           // Метод вызывается у пользователя,
           // и ищет пластинку с наименованием, которое принимает
           // как аргумент. Ищет в своём сообществе, которое берётся
           // из массива его сообществ по индексу, который
           // приходит как второй аргумент метода.
           // ВАЖНО! Когда находится пластинка, у которой
           // совпадает наименование, метод выводит полную
           // информацию о ней и предлагает попросить её.
           // Если этот данный пользователь соглашается
           // попросить её, то потом хозяин пластинки должен либо
           // дать согласие, либо отказать. Если получено согласие,
           // то метод возвращает true, добавив её экземпляр
           // в специальный массив у исходного пользователя
           // В цикле поиска каждый раз проверяется id, и если
           // оно совпадает с id того, кто ищет, то происходит
           // переход к следующей итерации, чтобы не обращаться
           // к самому себе. Это делается в цикле, перебирающем
           // пользователей. В этотм цикле работает вложенный
           // цикл, перебирающий пластинки пользователя.
           // Если завершают работу оба цикла, цикла
           // то метод возвращает false.
    }

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