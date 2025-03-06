<?php

// $line = readline("Go -> ");
// echo $line;
// $d1 = new DateTime("2010")


function getComponents(string $stringValue): array | bool {
    $components = explode(", ", $stringValue);
    if (count($components) === 2) {
        $nameValues = explode(" ", $components[0]);
        $wordsNumber = count($nameValues);
        if (($wordsNumber < 2) || ($wordsNumber > 3)) {
            return false;
        }
        else {
            $dateValues = explode("-", $components[1]);
            if (!count($dateValues) === 3) {
                return false;
            }
            else {
                $correctDate = $dateValues[2] . "-" . $dateValues[1] . "-" . $dateValues[0]; 
                if (!date_create_immutable($correctDate)) {
                    return false;
                }
                else {
                    return $components;
                }
            }
        }
    }
    else {
        return false;
    }
}

$line = "Василий Васильев, 07-03-2002";
$res = getComponents($line);
$d = date_create_from_format("d-m-Y", $res[1]);
var_dump($d);
