<?php

namespace Hwapp\Oop;

class Community {
    private $briefDescription;
    private string $region;
    private array $partakersList;

    public function __construct(string $briefDescription, array $partakers) {
        $this->briefDescription = $briefDescription;
        for($i = 0; $i < count($partakers); $i++) {
            $partakers[$i]->joinCommunityAnyway($this);
        }
        $this->partakersList = $partakers;
    }

    public function getDescription(): string {
        return $this->briefDescription;
    }

    public function checkMembership($person): bool {
        for($i = 0; $i < count($person->getGroupList()); $i++) {
            if($person->getGroupList()[$i]->getDescription() == $this->briefDescription) {
                return true;
            }
        }
        return false;
    }

    public function addNew($person): bool {
        array_push($this->partakersList, $person);
        $person->joinCommunityAnyway($this);
        return true;
    }

    public function toString(): string {
        $res = $this->briefDescription . PHP_EOL;
        foreach($this->partakersList as $partaker) {
            $res .= $partaker->getMy(); 
        }
        return $res;
    }
}