<?php

namespace Hwapp\Oop;

class Community {
    private $briefDescription;
    private string $region;
    private array $partakersList;

    public function __construct(string $briefDescription, array $partakers) {
        $this->briefDescription = $briefDescription;
        $this->partakersAssign($partakers);
    }

    public function partakersAssign(array $partakers): bool {
        $test = 0;
        for($i = 0; $i < count($partakers); $i++) {
            if($partakers[$i]->inspectCollection()) {
                $test += 1;
            }           
        }
        if($test == count($partakers)) {
            $this->partakersList = $partakers;
            foreach($partakers as $one) {
                $one->joinCommunityAnyway($this);
            }
            return true;
        }
        return false;
    }

    public function getDescription(): string {
        return $this->briefDescription;
    }

    public function inspectPartakersList(): bool {
        if(isset($this->partakersList)) {
            return true;
        }
        return false;
    }

    public function getPartakersList(): array {
        return $this->partakersList;
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
        if($person->inspectCollection() && !$this->checkMembership($person)) {
            array_push($this->partakersList, $person);
            $person->joinCommunityAnyway($this);
            return true;
        }
        return false;
    }

    public function setRegion(string $region): void {
        if(!isset($this->region)) {
            $this->region = $region;
        }
    }

    public function toString(): string {
        $res = $this->briefDescription . PHP_EOL;
        foreach($this->partakersList as $partaker) {
            $res .= $partaker->getId() . " " 
            . $partaker->getFullName() . PHP_EOL; 
        }
        return $res;
    }
}