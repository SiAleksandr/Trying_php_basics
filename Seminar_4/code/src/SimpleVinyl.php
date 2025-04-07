<?php

namespace Hwapp\Oop;

class SimpleVinyl extends Vinyl {

    private bool $oldTurntablesSuitable;

    public function __construct
    ( 
        string $performerOrComposer,
        string $contentName,
        int $releaseYear,
        string $briefNote = "",
        bool $oldTurntablesSuitable = false
    ) {
        parent::__construct
        (
            $performerOrComposer,
            $contentName,
            $releaseYear,
            $briefNote = ""
        );
        $this->oldTurntablesSuitable = $oldTurntablesSuitable;      
    }

    public function isOldTurntablesSuitable(): bool {
        return $this->oldTurntablesSuitable;
    }

    public function toString() {
        $grade;
        if($oldTurntablesSuitable) {
            $grade = "(подходит для старой техники)";
        } else {
            $grade = "(не подходит для старой техники)"
        }
        return parent::toString() . $grade . PHP_EOL;
    }
}