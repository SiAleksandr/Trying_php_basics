<?php

// $line = readline("Go -> ");
// echo $line;
// $d1 = new DateTime("2010")
date_default_timezone_set("Europe/Moscow");

function getComponents(string $stringValue): array | bool {
    $components = explode(", ", $stringValue);
    if (count($components) === 2) {
        $nameValues = explode(" ", $components[0]);
        $wordsNumber = count($nameValues);
        if (($wordsNumber < 2) || ($wordsNumber > 3)) {
            return false;
        }
        else {
            if (validateDate($components[1])) {
                return $components;
            }
            else {
                return false;
            }
        }
    }
    else {
        return false;
    }
}

function validateDate(string $date): bool {
    $dateBlocks = explode("-", $date);

    if(!(isset($dateBlocks) && count($dateBlocks) === 3)) {
        return false;
    }
    $date = $dateBlocks[2] . "-" . $dateBlocks[1] . "-" . $dateBlocks[0];

    if(!date_create_immutable($date)) {
        return false;
    }
    $targetDate = date_create_from_format("d-m-Y", $date);
    $currentDate = date_create_from_format("d-m-Y", date('d-m-Y'));
    if ($targetDate > $currentDate) {
        return false;
    }
    return true;
}

// $line = "Василий Васильев, 07-03-2002";
$line = "Василий Иванович Васильев, 28-02-2010";
// $v = str_replace("", "-", $v);
$res = getComponents($line);
// $d = date_create_from_format("d-m-Y", $res[1]);
// var_dump($d);

var_dump($res);
// $d = date_create_from_format("d-m-Y", $t);
// $ch = ($v > $d);
// var_dump($d);
