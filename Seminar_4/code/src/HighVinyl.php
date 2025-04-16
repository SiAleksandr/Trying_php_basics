<?php

namespace Hwapp\Oop;

class HighVinyl extends Vinyl {

    private string $colorsPresent;

    public function __construct
    ( 
        string $performerOrComposer,
        string $contentName,
        int $releaseYear,
        string $briefNote = "",
        string $colorsPresent = "чёрный"
    ) {
        parent::__construct(
            $performerOrComposer,
            $contentName,
            $releaseYear,
            $briefNote
        );
        $this->colorsPresent = $colorsPresent;
    }

    public function toString(): string {
        return parent::toString() . 
        "(ВЫСОКОЕ качество звука, НЕ подходит для старой техники)" . 
        PHP_EOL . "Цвет(а) пластинки: " . $this->colorsPresent . PHP_EOL;
    }
    
}