<?php

namespace Hwapp\Oop;

abstract class Vinyl {

    protected string $performerOrComposer;
    protected string $contentName;
    protected int $releaseYear;
    protected string $briefNote;

    protected Fellow $owner;

    public function __construct
    (
        string $performerOrComposer,
        string $contentName,
        int $releaseYear,
        string $briefNote = ""
    ) {
        $this->performerOrComposer = $performerOrComposer;
        $this->contentName = $contentName;
        $this->releaseYear = $releaseYear;
        $this->briefNote = $briefNote;
    }

    public function showTheMain(): string {
        return $this->performerOrComposer . ", " . $this->contentName;
        // Основное использование при 
        // поиске по исполнителю\композитору,
        // как один из подходящих вариантов,
        // то есть его наименование
    }

    public function getPerformerOrComposer() {
        return $this->performerOrComposer;
        // Берётся для сравнения с исполнителем\композитором,
        // Который ищется в функции поиска по исполнителю\композитору
    }

    public function decideTheOwner($newOwner): void {
        if(!isset($this->owner)) {
            $this->owner = $newOwner;
        }
    }

    public function toString(): string {
        // вазывает свой showTheMain()
        // и добавляет в результат
        // остальные свойства.
        // Должен использоваться при выборе
        // строго определённой пластинки
    }

}