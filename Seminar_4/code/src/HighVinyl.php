<?php

namespace Hwapp\Oop;

class HighVinil extends Vinyl {

    private string $colorsPresent;

    public function __construct
    ( 
        string $performerOrComposer,
        string $contentName,
        int $releaseYear,
        string $briefNote = "",
        string $colorsPresent = "black"
    ) {
        parent::__construct(
            $performerOrComposer,
            $contentName,
            $releaseYear,
            $briefNote = ""
        );
        $this->colorsPresent = $colorsPresent;
    }

    public function showColorsPresent(): string {
        return $this->colorsPresent;
    }
    
}