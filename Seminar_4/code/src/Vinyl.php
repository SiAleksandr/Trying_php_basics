<?php

namespace Hwapp\Oop;

abstract class Vinyl {

    protected string $performerOrComposer;
    protected string $contentName;
    protected int $releaseYear;
    protected string $briefNote;

    protected Fellow $owner;
    protected Fellow $holder;

    const AVAILABLE = 'may';
    const ALOOF = 'away';
    protected $posture;

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

        $this->posture = self::AVAILABLE;
    }

    public function changePosture(): void {
        if($this->posture == self::AVAILABLE) {
            $this->posture = self::ALOOF;
            return;
        }
        $this->posture = self::AVAILABLE;
        return;
    }
    public function getPosture() {
        return $this->posture;
    }

    public function appointTemporary(Fellow $holder): void {
        $this->holder = $holder;
    }

    public function getHolderName(): string {
        if(isset($this->holder)) {
            return $this->holder->getFullName();
        }
        return "";
    }

    public function showTheMain(): string {
        return $this->performerOrComposer . ", " . $this->contentName;
        // В других методых называю наименованием то, 
        // что здесь получается.
    }

    public function getPerformerOrComposer() {
        return $this->performerOrComposer;
        // Берётся для сравнения с исполнителем\композитором,
        // который ищется в функции поиска по исполнителю\композитору
    }

    public function decideTheOwner(Fellow $newOwner): void {
        if(!isset($this->owner)) {
            $this->owner = $newOwner;
        }
    }

    public function toString(): string {
        // вазывает свой showTheMain()
        // и добавляет в результат
        // остальные свойства, кроме
        // $this->owner , $this->holder 
        // $this->posture и констант.
        // Этот метод должен использоваться
        // при окончательном выборе пластинки.
    }

}